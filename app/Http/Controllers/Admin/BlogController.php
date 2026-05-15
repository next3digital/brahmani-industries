<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBlogRequest;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\SitemapUploadingTrait;

class BlogController extends Controller
{
    use MediaUploadingTrait;
    use SitemapUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Blog::query()->select(sprintf('%s.*', (new Blog)->table));
            $table = DataTables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'blog_show';
                $editGate      = 'blog_edit';
                $deleteGate    = 'blog_delete';
                $crudRoutePart = 'blogs';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('main_image', function ($row) {
                if ($photo = $row->main_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('gallary', function ($row) {
                if (! $row->gallary) {
                    return '';
                }
                $links = [];
                foreach ($row->gallary as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('meta_title', function ($row) {
                return $row->meta_title ? $row->meta_title : '';
            });
            $table->editColumn('meta_description', function ($row) {
                return $row->meta_description ? $row->meta_description : '';
            });
            $table->editColumn('sort_description', function ($row) {
                return $row->sort_description ? $row->sort_description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'main_image', 'gallary']);

            return $table->make(true);
        }

        return view('admin.blogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogs.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create($request->all());

        if ($request->input('main_image', false)) {
            $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_image'))))->toMediaCollection('main_image');
        }

        foreach ($request->input('gallary', []) as $file) {
            $blog->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallary');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $blog->id]);
        }

        $this->generateBlogPostSitemap();
        return redirect()->route('admin.blogs.index');
    }

    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());

        if ($request->input('main_image', false)) {
            if (! $blog->main_image || $request->input('main_image') !== $blog->main_image->file_name) {
                if ($blog->main_image) {
                    $blog->main_image->delete();
                }
                
                $tmpPath = storage_path('tmp/uploads/' . basename($request->input('main_image')));
                if (file_exists($tmpPath)) {
                    $blog->addMedia($tmpPath)->toMediaCollection('main_image');
                }
            }
        } elseif ($blog->main_image) {
            $blog->main_image->delete();
        }

        if (count($blog->gallary) > 0) {
            foreach ($blog->gallary as $media) {
                if (! in_array($media->file_name, $request->input('gallary', []))) {
                    $media->delete();
                }
            }
        }
        $media = $blog->gallary->pluck('file_name')->toArray();
        foreach ($request->input('gallary', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $tmpPath = storage_path('tmp/uploads/' . basename($file));
                if (file_exists($tmpPath)) {
                    $blog->addMedia($tmpPath)->toMediaCollection('gallary');
                }
            }
        }

        $this->generateBlogPostSitemap();
        return redirect()->route('admin.blogs.index');
    }

    public function show(Blog $blog)
    {
        abort_if(Gate::denies('blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blogs.show', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->delete();

        $this->generateBlogPostSitemap();
        return back();
    }

    public function massDestroy(MassDestroyBlogRequest $request)
    {
        $blogs = Blog::find(request('ids'));

        foreach ($blogs as $blog) {
            $blog->delete();
        }

        $this->generateBlogPostSitemap();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('blog_create') && Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Blog();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
