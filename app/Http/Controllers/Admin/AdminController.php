<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')
            ->limit(10)
            ->get();

        $products = Product::with('category:id,name')
            ->limit(10)
            ->orderByDesc('id')
            ->get();

        $countUser    = User::count();
        $countProduct = Product::count();
        $countOrder   = Order::count();

        $viewData = [
            'users'        => $users,
            'products'     => $products,
            'countUser'    => $countUser,
            'countOrder'   => $countOrder,
            'countProduct' => $countProduct,
        ];

        return view('admin.pages.index', $viewData ?? []);
    }
}
