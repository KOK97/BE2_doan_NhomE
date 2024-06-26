<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sale;

class SaleController extends Controller
{
    public function listSale()
    {
        $sales = Sale::paginate(5);
        return view('admin.sale.list_sale', ['sales' => $sales]);
    }
    public function showAddSale()
    {
        return view('admin.sale.create_sale');
    }
    public function createSale(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'discount' => ['required', 'numeric', 'min:1', 'max:100'],
            'sale_content' => ['required', 'regex:/^[^!@#$%^&*()_+\[\]{}|;\'":,.\/<>?]*$/', 'min:10', 'max:50'],
        ], [
            'discount.required' => 'Vui lòng nhập mức giảm giá',
            'discount.numeric' => 'Mức giảm giá phải là một số hợp lệ',
            'discount.min' => 'Mức giảm giá phải ít nhất là 1',
            'discount.max' => 'Mức giảm giá không được vượt quá 100',

            'sale_content.required' => 'Vui lòng nhập nội dung giảm',
            'sale_content.min' => 'Nội dung giảm giá phải có ít nhất 10 ký tự',
            'sale_content.max' => 'Nội dung giảm giá không được vượt quá 50 ký tự',
            'sale_content.regex' => 'Nội dung giảm giá không được chứa ký tự đặc biệt',
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->messages();
            return redirect()->route('createSale')
                ->withErrors($errors)
                ->withInput();
        }
        $sale = new sale($request->all());
        $sale->save();
        return redirect("listsale")->with('success', 'Thêm giảm giá  Thành Công');
    }
    public function getDataEdit($id)
    {
        $sale = Sale::findOrFail($id);
        return view('admin.sale.edit_sale', compact('sale'));
    }
    public function updateSale(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'discount' => ['required', 'numeric', 'min:1', 'max:100'],
            'sale_content' => ['required', 'regex:/^[^!@#$%^&*()_+\[\]{}|;\'":,.\/<>?]*$/', 'min:10', 'max:50'],
        ], [
            'discount.required' => 'Vui lòng nhập mức giảm giá',
            'discount.numeric' => 'Mức giảm giá phải là một số hợp lệ',
            'discount.min' => 'Mức giảm giá phải ít nhất là 1',
            'discount.max' => 'Mức giảm giá không được vượt quá 100',

            'sale_content.required' => 'Vui lòng nhập nội dung giảm',
            'sale_content.min' => 'Nội dung giảm giá phải có ít nhất 10 ký tự',
            'sale_content.max' => 'Nội dung giảm giá không được vượt quá 50 ký tự',
            'sale_content.regex' => 'Nội dung giảm giá không được chứa ký tự đặc biệt',
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->messages();
            return redirect()->route('getdataeditSale',['id' => $id])
                ->withErrors($errors)
                ->withInput();
        }
        $product = Sale::findOrFail($id);
        $product->update($request->all());
        return redirect("listsale")->with('success', 'Sửa giảm giá Thành Công');
    }
    public function destroySale($id)
    {
        $product = Sale::findOrFail($id);
        $product->delete();
        return redirect("listsale")->with('success', 'Xóa giảm giá Thành Công');
    }
}
