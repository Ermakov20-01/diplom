<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAdmin()
    {
        return view('Admin.Admin', [
            'applications' => Application::all()
        ]);
    }

    public function showCategory()
    {
        return view('admin.create_category');
    }

    public function createCategory(Request $request){

        $file = $request->file('image');
        $file->move(public_path('img/categories'), $file->getClientOriginalName());

        Category::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'alias' => $request->alias,
            'image' => $file->getClientOriginalName(),
        ]);
        return redirect('admin.admin');
    }

}
