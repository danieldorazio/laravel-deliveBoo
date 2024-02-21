<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::check() && Auth::user()->restaurant) {
            return view('admin.dashboard')  ;  
        }else{
            $categories = Category::all();
            return view('admin.restaurants.create', compact('categories'));
        }
        
    }
}
