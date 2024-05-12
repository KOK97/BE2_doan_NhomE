<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Author;
use App\Models\Category;
use App\Models\ProductCategory;
use PhpParser\Node\Stmt\Foreach_;

class ProductController extends Controller
{
    public function showProductByCategory()
    {
        $products = Product::all();
        $categories = Category::take(5)->get();

        $productshow = collect([]);
        foreach ($products as $value) {
            foreach ($value->categories as $cate) {
                foreach ($categories as $category) {
                    if ($cate->id == $category->id) {
                        $productshow->push($value);
                    }
                }
            }
        }
        return view('content.home', ['products' => $products,'categories'=>$categories,'productshow'=>$productshow]);
    }
    public function listProduct()
    {
        $products = Product::paginate(5);

        return view('admin.product.list_product', ['products' => $products]);
    }
    public function showAddProduct()
    {
        $sales = Sale::all();
        $authors = Author::all();
        $categories =  Category::all();
        return view('admin.product.create_product', ['sales' => $sales, 'authors' => $authors, 'categories' => $categories]);
    }
    public function createProduct(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[\p{L}\s]+$/u', 'min:10', 'max:50'],
            'description' => ['required', 'min:1', 'max:255'],
            'price' => ['required', 'numeric', 'min:1', 'max:9999999.99'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'publishing_year' => ['required', 'numeric', 'max:2024'],
            'author_id' => ['required'],
            'sale_id' => ['nullable'],
            'categories' => ['required'],
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có ít nhất 10 ký tự',
            'name.max' => 'Tên sản phẩm không được vượt quá 50 ký tự',
            'name.regex' => 'Tên không được chứa ký tự đặc biệt',

            'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            'description.min' => 'Mô tả sản phẩm phải có ít nhất 1 ký tự',
            'description.max' => 'Mô tả sản phẩm không được vượt quá 255 ký tự',

            'price.numeric' => 'Giá sản phẩm phải là một số hợp lệ',
            'price.min' => 'Giá sản phẩm phải ít nhất là 1',
            'price.max' => 'Giá sản phẩm không được vượt quá 9,999,999.99',

            'image.required' => 'Vui lòng tải lên hình ảnh sản phẩm',
            'image.image' => 'Tệp được tải lên phải là hình ảnh',
            'image.mimes' => 'Hình ảnh sản phẩm phải ở một trong các định dạng sau: jpeg, png, jpg, gif',
            'image.max' => 'Dung lượng ảnh vượt quá giới hạn',

            'publishing_year.required' => 'Vui lòng nhập năm xuất bản',
            'publishing_year.numeric' => 'Năm xuất bản phải là số',
            'publishing_year.max' => 'Năm xuất bản không được vượt quá năm hiện tại',

            'author_id.required' => 'Vui lòng chọn tác giả cho sản phẩm',

            'categories.required' => 'Vui lòng chọn danh mục cho sản phẩm',
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->messages();
            return redirect()->route('createProduct')
                ->withErrors($errors)
                ->withInput();
        }
        $file = $request->file('image');
        $path = 'images/products';
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);
        $product = new Product($request->all());
        $product->image = $fileName;

        $sale = Sale::findOrFail($request->sale_id);
        if ($request->sale_id !== null) {
            $reduce = ($request->price * $sale->discount) / 100;
            $newReducedPrice = $request->price - $reduce;
        } else {
            $product->reduced_price = 0;
        }
        if ($product->reduced_price !== $newReducedPrice) {
            $product->reduced_price = $newReducedPrice;
        }
        $product->save();
        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $product->categories()->attach($categories);
        }
        return redirect("listproduct")->with('success', 'Thêm Sản Phẩm Thành Công');
    }
    public function getDataEdit($id)
    {
        $product = Product::findOrFail($id);
        $sales = Sale::all();
        $authors = Author::all();
        $categories =  Category::all();
        $allproductCategory = ProductCategory::where('product_id', 'like', $id)->get();
        $categorySelect = collect([]);
        foreach ($allproductCategory as $key => $value) {
            $categorySelect->push($value->category_id);
        };

        return view('admin.product.edit_product', compact('product', 'sales', 'authors', 'categories', 'categorySelect'));
    }
    public function updateProduct(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[\p{L}\s]+$/u', 'min:10', 'max:50'],
            'description' => ['required', 'min:1', 'max:255'],
            'price' => ['required', 'numeric', 'min:1', 'max:9999999.99'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'publishing_year' => ['required', 'numeric', 'max:2024'],
            'author_id' => ['required'],
            'sale_id' => ['nullable'],
            'categories' => ['required'],
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có ít nhất 10 ký tự',
            'name.max' => 'Tên sản phẩm không được vượt quá 50 ký tự',
            'name.regex' => 'Tên không được chứa ký tự đặc biệt',

            'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            'description.min' => 'Mô tả sản phẩm phải có ít nhất 1 ký tự',
            'description.max' => 'Mô tả sản phẩm không được vượt quá 255 ký tự',

            'price.numeric' => 'Giá sản phẩm phải là một số hợp lệ',
            'price.min' => 'Giá sản phẩm phải ít nhất là 1',
            'price.max' => 'Giá sản phẩm không được vượt quá 9,999,999.99',

            'image.image' => 'Tệp được tải lên phải là hình ảnh',
            'image.mimes' => 'Hình ảnh sản phẩm phải ở một trong các định dạng sau: jpeg, png, jpg, gif',
            'image.max' => 'Dung lượng ảnh vượt quá giới hạn',

            'publishing_year.required' => 'Vui lòng nhập năm xuất bản',
            'publishing_year.numeric' => 'Năm xuất bản phải là số',
            'publishing_year.max' => 'Năm xuất bản không được vượt quá năm hiện tại',

            'author_id.required' => 'Vui lòng chọn tác giả cho sản phẩm',

            'categories.required' => 'Vui lòng chọn danh mục cho sản phẩm',
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->messages();
            return redirect()->route('getdataeditProduct', ['id' => $id])
                ->withErrors($errors)
                ->withInput();
        }
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($product->image) {
                $oldImagePath = public_path('images/products/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Upload anh
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }
        $sale = Sale::findOrFail($request->sale_id);
        if ($request->sale_id !== null) {
            $reduce = ($request->price * $sale->discount) / 100;
            $newReducedPrice = $request->price - $reduce;
        } else {
            $product->reduced_price = 0;
        }
        if ($product->reduced_price !== $newReducedPrice) {
            $product->reduced_price = $newReducedPrice;
        }

        $allproductCategory = ProductCategory::where('product_id', 'like', $id)->get();
        $array1 = collect([]);
        $array2 = collect([]);
        foreach ($allproductCategory as $key => $value) {
            $array1->push($value->category_id);
        }
        foreach ($request->categories as $key => $value) {
            $array2->push($value);
        }
        $oldPC = array_map('strval', $array1->toArray());
        $newPC = array_map('strval', $array2->toArray());
        var_dump($oldPC);
        var_dump($newPC);
        if ($oldPC === $newPC) {
        } else {
            foreach ($allproductCategory as $value) {
                $value->delete();
            }
            if ($request->has('categories')) {
                $categories = $request->input('categories');
                $product->categories()->attach($categories);
            }
        }
        $product->update($request->all());
        return redirect("listproduct")->with('success', 'Sửa Sản Phẩm Thành Công');
    }
    public function destroy($id)
    {
        $allproductCategory = ProductCategory::where('product_id', 'like', $id)->get();
        $product = Product::findOrFail($id);
        if ($allproductCategory->count() != 0) {
            foreach ($allproductCategory as $value) {
                $value->delete();
            }
            $product->delete();
        } else {
            $product->delete();
        }
        return redirect("listproduct")->with('success', 'Xóa Sản Phẩm Thành Công');
    }
}
