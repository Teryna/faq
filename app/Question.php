<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'category_id', 
        'question', 
        'name', 
        'users_email', 
        'answer',
        'published'
    ];
    
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
    
    public function scopeUnanswered($query)
    {
        return $query->where('answer', null)->orderBy('created_at');
    }
    
    public function scopePublished($query)
    {
        return $query->where('hidden', false);
    }
    
     public function scopeLastQuestions($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
