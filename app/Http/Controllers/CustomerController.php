<?php

namespace App\Http\Controllers;

use App\Models\User;

class CustomerController extends Controller
{
    public function index()
{
   $customers = \App\Models\User::orderBy('id','desc')->get();
    return view('admin.customers', compact('customers'));
}

}
