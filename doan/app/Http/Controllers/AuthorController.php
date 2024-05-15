<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Author;

class AuthorController extends Controller
{
    //
    public function listAuthor()
    {
        $authors = Author::paginate(5);
        return view('admin.author.list_author', ['authors' => $authors]);
    }
    public function showAddAuthor()
    {
        return view('admin.author.create_author');
    }
    public function createAuthor(Request $request)
    {
        
        $validatedData = Validator::make($request->all(), [
            'author_name'=> ['required', 'regex:/^[^!@#$%^&*()_+\[\]{}|;\'":,.\/<>?]*$/', 'min:10', 'max:50'],
            'pseudonym'=> ['nullable', 'regex:/^[^!@#$%^&*()_+\[\]{}|;\'":,.\/<>?]*$/', 'min:10', 'max:50'],
            'year_of_birth'=>['required', 'numeric','min:1900', 'max:2000'],
        ], [
            'author_name.required' => 'Vui lòng nhập tên tác giả',
            'author_name.min' => 'Tên tác giả phải có ít nhất 10 ký tự',
            'author_name.max' => 'Tên tác giả không được vượt quá 50 ký tự',
            'author_name.regex' => 'Tên tác giả không được chứa ký tự đặc biệt',

            'pseudonym.min' => 'Bút danh tác giả phải có ít nhất 10 ký tự',
            'pseudonym.max' => 'Bút danh tác giả không được vượt quá 50 ký tự',
            'pseudonym.regex' => 'Bút danh tác giả không được chứa ký tự đặc biệt',

            'year_of_birth.required' => 'Vui lòng nhập năm sinh tác giả',
            'year_of_birth.numeric' => 'Năm sinh tác giả phải là một số hợp lệ',
            'year_of_birth.min' => 'Năm sinh tác giả phải ít nhất là 1900',
            'year_of_birth.max' => 'Năm sinh tác giả không được vượt quá 2000',
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->messages();
            return redirect()->route('createAuthor')
                ->withErrors($errors)
                ->withInput();
        }
        $sale = new Author($request->all());
        $sale->save();
        return redirect("listauthor")->with('success', 'Thêm Tác Giả  Thành Công');
    }
    public function getDataEditAuthor($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.author.edit_author', compact('author'));
    }
    public function updateAuthor(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'author_name'=> ['required', 'regex:/^[^!@#$%^&*()_+\[\]{}|;\'":,.\/<>?]*$/', 'min:10', 'max:50'],
            'pseudonym'=> ['nullable', 'regex:/^[^!@#$%^&*()_+\[\]{}|;\'":,.\/<>?]*$/', 'min:10', 'max:50'],
            'year_of_birth'=>['required', 'numeric','min:1900', 'max:2000'],
        ], [
            'author_name.required' => 'Vui lòng nhập tên tác giả',
            'author_name.min' => 'Tên tác giả phải có ít nhất 10 ký tự',
            'author_name.max' => 'Tên tác giả không được vượt quá 50 ký tự',
            'author_name.regex' => 'Tên tác giả không được chứa ký tự đặc biệt',

            'pseudonym.min' => 'Bút danh tác giả phải có ít nhất 10 ký tự',
            'pseudonym.max' => 'Bút danh tác giả không được vượt quá 50 ký tự',
            'pseudonym.regex' => 'Bút danh tác giả không được chứa ký tự đặc biệt',

            'year_of_birth.required' => 'Vui lòng nhập năm sinh tác giả',
            'year_of_birth.numeric' => 'Năm sinh tác giả phải là một số hợp lệ',
            'year_of_birth.min' => 'Năm sinh tác giả phải ít nhất là 1900',
            'year_of_birth.max' => 'Năm sinh tác giả không được vượt quá 2000',
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->messages();
            return redirect()->route('getDataEditAuthor', ['id' => $id])
                ->withErrors($errors)
                ->withInput();
        }
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return redirect("listauthor")->with('success', 'Sửa Tác Giả Thành Công');
    }
    public function destroyAuthor($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect("listauthor")->with('success', 'Xóa Tác Giả Thành Công');
    }
}
