<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OrdersController extends Controller
{
    public function index()
    {
        return view('profile.orders.index');
    }
}
