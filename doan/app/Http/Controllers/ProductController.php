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

class ProductController extends Controller
{
    public function listProduct()
    {
        $products = Product::paginate(5);

        return view('admin.product.list_product', ['products' => $products]);
    }
    public function showAddProduct()
    {
        $sales = Sale::all();
        return view('admin.product.create_product', ['sales' => $sales]);
    }
    public function createProduct(Request $request)
    {
        $requied = [
            'name' => 'required', 'regex:/^[0-9a-zA-Z\s]+$/', 'min:10', 'max:50',
            'description' => 'required', 'min:1', 'max:255',
            'price' => 'required', 'numeric', 'min:1', 'max:9999999.99',
            'image' => 'required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'publishing_year' => 'required', 'numeric', 'max:2024',
            'author_id' => 'required',
            'sale_id' => 'nullable',
            'category_id' => 'required',
        ];

        $messages = [
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

            'publishing_year.required ' => 'Vui lòng nhập năm xuất bản',
            'publishing_year.numeric' => 'Năm xuất bản phải là số',
            'publishing_year.max' => 'Năm xuất bản không được vượt quá năm hiện tại',

            'auth_id.required' => 'Vui lòng chọn tác giả cho sản phẩm',

            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
        ];
        $attribute = [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'price' => 'Giá sản phẩm',
            'image' => 'Ảnh sản phẩm',
            'publishing_year' => 'Năm xuất bản',
            'sale_id' => 'Giảm giá',
            'author_id' => 'Tác giả',
            'category_id' => 'Danh mục sản phẩm',
        ];
        $validator = Validator::make($request->all(), $requied, $messages, $attribute);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
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
        return redirect("listproduct")->with('success', 'Thêm Sản Phẩm Thành Công');
    }
    public function getDataEdit($id)
    {
        $product = Product::findOrFail($id);
        $sales = Sale::all();
        $authors = Author::all();
        return view('admin.product.edit_product', compact('product', 'sales', 'authors'));
    }
    public function updateProduct(Request $request, $id)
    {
        $requied = [
            'name' => 'required', 'regex:/^[0-9a-zA-Z\s]+$/', 'min:10', 'max:50',
            'description' => 'required', 'min:1', 'max:255',
            'price' => 'required', 'numeric', 'min:1', 'max:9999999.99',
            'image' => 'nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'publishing_year' => 'required', 'numeric', 'max:2024',
            'author_id' => 'required',
            'sale_id' => 'nullable',
            'category_id' => 'required',
        ];

        $messages = [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có ít nhất 10 ký tự',
            'name.max' => 'Tên sản phẩm không được vượt quá 50 ký tự',
            'name.regex' => 'Tên không được chứa ký tự đặc biệt',

            'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            'description.min' => 'Mô tả sản phẩm phải có ít nhất 1 ký tự',
            'description.max' => 'Mô tả sản phẩm không được vượt quá 255 ký tự',

            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm phải là một số hợp lệ',
            'price.min' => 'Giá sản phẩm phải ít nhất là 1',
            'price.max' => 'Giá sản phẩm không được vượt quá 9,999,999.99',

            'image.image' => 'Tệp được tải lên phải là hình ảnh',
            'image.mimes' => 'Hình ảnh sản phẩm phải ở một trong các định dạng sau: jpeg, png, jpg, gif',
            'image.max' => 'Dung lượng ảnh vượt quá giới hạn',

            'publishing_year.required ' => 'Vui lòng nhập năm xuất bản',
            'publishing_year.numeric' => 'Năm xuất bản phải là số',
            'publishing_year.max' => 'Năm xuất bản không được vượt quá năm hiện tại',

            'auth_id.required' => 'Vui lòng chọn tác giả cho sản phẩm',

            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
        ];
        $attribute = [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'price' => 'Giá sản phẩm',
            'image' => 'Ảnh sản phẩm',
            'publishing_year' => 'Năm xuất bản',
            'sale_id' => 'Giảm giá',
            'author_id' => 'Tác giả',
            'category_id' => 'Danh mục sản phẩm',
        ];
        $validator = Validator::make($request->all(), $requied, $messages, $attribute);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
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
        $product->update($request->all());
        return redirect("listproduct")->with('success', 'Sửa Sản Phẩm Thành Công');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect("listproduct")->with('success', 'Xóa Sản Phẩm Thành Công');
    }
}
