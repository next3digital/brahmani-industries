<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::with('productCategory')->select(sprintf('%s.*', (new Product)->getTable()));
            $table = DataTables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_show';
                $editGate      = 'product_edit';
                $deleteGate    = 'product_delete';
                $crudRoutePart = 'products';

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
            
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            
            $table->addColumn('product_category_name', function ($row) {
                return $row->productCategory ? $row->productCategory->name : '';
            });
            
            $table->editColumn('main_image', function ($row) {
                if ($photo = $row->getFirstMedia('main_image')) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->getUrl(),
                        $photo->getUrl('thumb')
                    );
                }

                return '';
            });
            
            $table->editColumn('is_featured', function ($row) {
                return $row->is_featured ? '<span class="badge badge-warning">Featured</span>' : '';
            });
            
            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
            });

            $table->rawColumns(['actions', 'placeholder', 'main_image', 'is_featured', 'is_active', 'product_category_name']);

            return $table->make(true);
        }

        return view('admin.products.index');
    }

    public function create()
    {
        $categories = ProductCategory::active()->orderBy('name')->pluck('name', 'id')->prepend('Select Category', '');
        
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->input('main_image', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_image'))))->toMediaCollection('main_image');
        }

        foreach ($request->input('gallery', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::active()->orderBy('name')->pluck('name', 'id')->prepend('Select Category', '');
        
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->input('main_image', false)) {
            if (! $product->getFirstMedia('main_image') || $request->input('main_image') !== $product->getFirstMedia('main_image')->file_name) {
                if ($product->getFirstMedia('main_image')) {
                    $product->getFirstMedia('main_image')->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_image'))))->toMediaCollection('main_image');
            }
        } elseif ($product->getFirstMedia('main_image')) {
            $product->getFirstMedia('main_image')->delete();
        }

        if (count($product->getMedia('gallery')) > 0) {
            foreach ($product->getMedia('gallery') as $media) {
                if (! in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->getMedia('gallery')->pluck('file_name')->toArray();
        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function show(Product $product)
    {
        $product->load('productCategory');
        
        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
