<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\Other;
use App\Models\Payment;
use App\Models\User;

class MyController extends Controller
{
    // function search()
    // {
    //     session()->put('option', request()->option);
    //     session()->put('key', request()->key);
    //     $user = Auth::user();
    //     if ($user != NULL) {
    //         $allothers = Other::where('user_id', $user->id)->where('like', 1)->whereNotNull('like')->get();
    //         $allpayments = Payment::where('user_id', $user->id)->get();
    //     } else {
    //         $allothers = [];
    //         $allpayments = [];
    //     }
    //     $allmanus = Manufacturer::all();
    //     $allproducts = Product::all();
    //     $topsellings = Product::where('sale', '>', 0)->orderBy('sale', 'desc')->take(3)->get();
    //     if (request()->option == 'description') {
    //         $search = Product::where('description', 'like', '%' . request()->key . '%')->paginate(6);
    //         $allsearchs = Product::where('description', 'like', '%' . request()->key . '%')->get();
    //     } else if (request()->option == 'product_name') {
    //         $search = Product::where('product_name', 'like', '%' . request()->key . '%')->paginate(6);
    //         $allsearchs = Product::where('product_name', 'like', '%' . request()->key . '%')->get();
    //     } else if (request()->option == 'manu_name') {
    //         $manus = Manufacturer::where('manu_name', 'like', '%' . request()->key . '%')->first();
    //         $search = Product::where('manu_id', $manus->manu_id)->paginate(6);
    //         $allsearchs = Product::where('manu_id', $manus->manu_id)->get();
    //     } else if (request()->option == "alls") {
    //         $search = Product::whereNotNull('manu_id')->paginate(6);
    //         $allsearchs = Product::whereNotNull('manu_id')->get();
    //     } else if (request()->option == "wishlist") {
    //         $allothers = Other::where('user_id', $user->id)->where('like', 1)->whereNotNull('like')->get('product_id');
    //         $arrothers = [];
    //         foreach ($allothers as $value) {
    //             $arrothers[] = $value->product_id;
    //         }
    //         $search = Product::whereIn('product_id', $arrothers)->paginate(6);
    //         $allsearchs = Product::whereIn('product_id', $arrothers)->get();
    //     }
    //     return view('search', [
    //         'user' => $user,
    //         'allmanus' => $allmanus,
    //         'allothers' => $allothers,
    //         'allpayments' => $allpayments,
    //         'allproducts' => $allproducts,
    //         'search' => $search,
    //         'topsellings' => $topsellings,
    //         'allsearchs' => $allsearchs,
    //     ]);
    // }
}
