<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.product.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request): RedirectResponse
    {
        //
        // dd($request->all());
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        $notification = array(
            'message' => 'Thêm dữ liệu thành công !',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('admin.product.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        $notification = array(
            'message' => 'Cập nhật dữ liệu thành công !',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // try {
        //     Category::findOrFail($id)->delete();
        //     return response(['message' => 'success', 'alert-type' => 'Xóa thành công!']);
        // } catch (\Exception $e) {
        //     return response(['message' => 'error', 'alert-type' => 'Xóa thất bại!']);
        // }

        {
            try {
                $categories = Category::findOrFail($id);
                $categories->delete();
                return response(['status' => 'success', 'message' => 'Xóa thành công!']);
            } catch (\Exception $e) {
                logger($e);
                return response(['status' => 'error', 'message' => 'Đã xảy ra lỗi!']);
            }
        }
    }
}
