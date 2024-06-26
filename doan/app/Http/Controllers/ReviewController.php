<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productId)
    {

        $validatedData = Validator::make($request->all(), [
            'review_content' => ['required', 'min:1', 'max:255'],
        ], [
            'review_content.required' => 'Vui lòng nhập nội dung đánh giá',
            'review_content.min' => 'Nội dung đánh giá phải có ít nhất 1 ký tự',
            'review_content.max' => 'Nội dung đánh giá không được vượt quá 255 ký tự',
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->messages();
            return redirect()->route('show.detail', ['id' => $productId])
                ->withErrors($errors)
                ->withInput();
        }
        //
        $review = new Review($request->all());
        $review->product_id = $productId;
        $review->user_id = Auth::id();
        $review->save();
        return redirect()->route('show.detail', ['id' => $productId]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);
        
        if (auth()->check() && auth()->user()->role === 'admin') {
            $review->delete();
            return redirect()->route('show.detail',$review->product_id)->with('destroy', 'Xóa thành công !!!');
        }
        else if($review->user_id == Auth::id()) {
            $review->delete();
            return redirect()->route('show.detail',$review->product_id)->with('destroy', 'Xóa thành công !!!');
        }
    }
}
