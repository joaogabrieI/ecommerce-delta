<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OrdersController extends Controller
{
    public function index(User $user)
    {
        return view('profile.orders.index');
    }
}
