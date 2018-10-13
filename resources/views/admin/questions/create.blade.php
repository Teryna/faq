@extends('admin.layouts.admin_app')

@section('content')
<div class="container">
    @component('admin.components.pagination')
    @slot('title') Задать вопрос  @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
    @endcomponent
<div>
<form action="{{ route('admin.question.store') }}" method="post">
    @csrf 
    <h3>Выберите категорию</h3>  
    <select name="category_id" required>
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{ $category->category }}</option>
        @endforeach    
    </select>

<h3>Ваш вопрос</h3>
<p>Максимальное кол-во 300 символов</p>
<textarea cols="100" rows="10" name="question" required></textarea>
<p>Ваше имя</p>
<input type="text" name="name" required>
<p>Ваш email</p>
<input type="email" name="users_email" required>
<button class="btn btn-primary">Задать вопрос</button>
</form>

</div>
@endsection