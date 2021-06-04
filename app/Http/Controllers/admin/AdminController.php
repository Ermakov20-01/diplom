<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAdmin()
    {
        return view('Admin.Admin');
    }

    public function showCategory()
    {
        return view('admin.create_category');
    }

    public function createCategory(Request $request){
        Category::create([
            'title' => $request -> title,
            'desc' => $request -> desc,

            'alias' => $request -> alias,
        ]);
        return redirect('admin.admin');
    }

}
