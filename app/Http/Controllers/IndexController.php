<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $questions = Question::all();
        return view('faq.index', compact('categories', 'questions'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('faq.createQuestion', compact('categories'));
    }
     
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'question' => 'required|string|max:300',
            'name' => 'required|string|max:50',
            'users_email' => 'required|string|email|max:50' 
        ]);

    Question::create($request->all());

        return redirect()->route('faq.index');
  }
}
