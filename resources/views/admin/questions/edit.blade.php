@extends('admin.layouts.admin_app')

@section('content')
<div class="container">
    @component('admin.components.pagination')
    @slot('title') Задать вопрос  @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
    @endcomponent
<div>
<form action="{{ route('admin.question.update', $question) }}" method="post">
    <input type="hidden" name="_method" value="put">
    @csrf 
    <p>Категория вопроса</p>  
    <select name="category_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category }}</option>
        @endforeach    
    </select>

<p>Задайте вопрос</p>
<textarea cols="100" rows="10" name="question" required>{{ $question->question }}</textarea>
<p>Ваше имя</p>
<input type="text" name="name" value="{{ $question->name }}" required>
<p>Ваш email</p>
<input type="email" name="users_email" value="{{ $question->users_email }}" required>
<button class="btn btn-primary">Сохранить</button>
</form>

</div>
@endsection