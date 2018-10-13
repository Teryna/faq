<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Questions;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('faq.index');
    }
}
