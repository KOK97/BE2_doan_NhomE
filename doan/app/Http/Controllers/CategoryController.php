<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5)->withPath(route('category.index'));
        $currentPage = $categories->currentPage();
        $startIndex = ($currentPage - 1) * $categories->perPage() + 1;
        return view('admin.category.index', compact('categories', 'startIndex'));
    }

    public function search(Request $request)
    {
        $categories = Category::orderBy('created_at', 'desc');

        if ($request->has('search')) { // Kiểm tra xem có tham số search không
            $searchTerm = $request->input('search');
            $categories = $categories->where('category_name', 'like', '%' . $searchTerm . '%');
        }

        $categories = $categories->paginate(5)->withQueryString();

        // Thêm từ khóa tìm kiếm vào URL phân trang
        $categories->appends(['search' => $searchTerm]);

        $currentPage = $categories->currentPage();
        $startIndex = ($currentPage - 1) * $categories->perPage() + 1;

        if ($categories->isEmpty()) {
            return redirect()->route('category.index')->with('message', 'Không tìm thấy !!!');
        } else {
            return view('admin.category.index', compact('categories', 'startIndex'));
        }
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories|max:255',
            'category_description' => 'required|max:1000',
        ], [
            'category_name.required' => 'Tên thể loại là bắt buộc.',
            'category_description.required' => 'Mô tả là bắt buộc.',
            'category_name.unique' => 'Tên thể loại đã tồn tại.',
            'category_name.max' => 'Tên thể loại không được vượt quá 255 ký tự.',
            'category_description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        ]);

        if ($validatedData->fails()) {

            if ($validatedData->errors()->has('category_name')) {
                $errors['category_name'] = $validatedData->errors()->first('category_name');
            }

            if ($validatedData->errors()->has('category_description')) {
                $errors['category_description'] = $validatedData->errors()->first('category_description');
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

        $validatedData = Validator::make($request->all(), [
            'category_name' => 'required|max:255',
            'category_description' => 'required|max:1000',
        ], [
            'category_name.required' => 'Tên thể loại là bắt buộc.',
            'category_description.required' => 'Mô tả là bắt buộc.',
            'category_name.unique' => 'Tên thể loại đã tồn tại.',
            'category_name.max' => 'Tên thể loại không được vượt quá 255 ký tự.',
            'category_description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        ]);

        if ($validatedData->fails()) {

            if ($validatedData->errors()->has('category_name')) {
                $errors['category_name'] = $validatedData->errors()->first('category_name');
            }

            if ($validatedData->errors()->has('category_description')) {
                $errors['category_description'] = $validatedData->errors()->first('category_description');
            }

            return redirect()->route('category.edit')
                ->withErrors($errors)
                ->withInput();
        } else {
            $category->category_name = $request->input('category_name');
            $category->category_description = $request->input('category_description');
            $category->save();
            return redirect()->route('category.index')->with('success', 'Đã cập nhật thành công thể loại!');
        }
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
