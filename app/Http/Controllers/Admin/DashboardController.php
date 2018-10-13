<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5),
            'questions' => Question::Unanswered(),
            'count_categories' => Category::count(),
            'count_questions' => Question::count(),
            'count_admins' => User::count(),
            'count_unanswered' => Question::where('answer', null)->count(),
            'questions' => Question::lastQuestions(5)
        ]);
    }
}
