<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function create()
    {

    }

    public function update(Categories $categories, Request $request)
    {
        
    }
}
