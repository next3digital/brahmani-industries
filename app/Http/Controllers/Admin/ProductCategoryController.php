<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductCategoryRequest;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ProductCategory::query()->select(sprintf('%s.*', (new ProductCategory)->getTable()));
            $table = DataTables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'product_category_show';
                $editGate      = 'product_category_edit';
                $deleteGate    = 'product_category_delete';
                $crudRoutePart = 'product-categories';

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
            
            $table->editColumn('image', function ($row) {
                if ($photo = $row->getFirstMedia('image')) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->getUrl(),
                        $photo->getUrl('thumb')
                    );
                }

                return '';
            });
            
            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'is_active']);

            return $table->make(true);
        }

        return view('admin.productCategories.index');
    }

    public function create()
    {
        return view('admin.productCategories.create');
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $category = ProductCategory::create($request->all());

        if ($request->input('image', false)) {
            $category->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return redirect()->route('admin.product-categories.index')->with('success', 'Product Category created successfully.');
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('admin.productCategories.edit', compact('productCategory'));
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->all());

        if ($request->input('image', false)) {
            if (! $productCategory->getFirstMedia('image') || $request->input('image') !== $productCategory->getFirstMedia('image')->file_name) {
                if ($productCategory->getFirstMedia('image')) {
                    $productCategory->getFirstMedia('image')->delete();
                }
                $productCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($productCategory->getFirstMedia('image')) {
            $productCategory->getFirstMedia('image')->delete();
        }

        return redirect()->route('admin.product-categories.index')->with('success', 'Product Category updated successfully.');
    }

    public function show(ProductCategory $productCategory)
    {
        return view('admin.productCategories.show', compact('productCategory'));
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return back()->with('success', 'Product Category deleted successfully.');
    }

    public function massDestroy(MassDestroyProductCategoryRequest $request)
    {
        $categories = ProductCategory::find(request('ids'));

        foreach ($categories as $category) {
            $category->delete();
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
}
