<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class FormController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('form', compact('categories'));
    }
}
