<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories|max:255',
        ], [
            'category_name.required' => 'Tên thể loại là bắt buộc.',
            'category_name.unique' => 'Tên thể loại đã tồn tại.',
            'category_name.max' => 'Tên thể loại không được vượt quá 255 ký tự.',
        ]);

        if ($validatedData->fails()) {

            if ($validatedData->errors()->has('category_name')) {
                $errors['category_name'] = $validatedData->errors()->first('category_name');
            }

            return redirect()->route('category.create')
                ->withErrors($errors)
                ->withInput();
        }

        $data = $request->all();
        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Bạn đã thêm một thể loại!');
    }


    public function edit($category_id)
    {
        $category = Category::find($category_id);
        if (!$category) {
            return back()->with('error', 'Category not found');
        }
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        if (!$category) {
            return back()->with('error', 'Category not found');
        }

        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        $category->category_name = $validatedData['category_name'];
        $category->save();

        return redirect()->route('category.index')->with('success', 'Đã cập nhật thành công thể loại!');
    }


    public function destroy($category_id)
    {
        $category = Category::find($category_id);
        if (!$category) {
            return back()->with('error', 'Category not found');
        }
        $category->delete();
        return redirect()->route('category.index')->with('destroy', 'Đã xóa thành công thể loại!');
    }
}
