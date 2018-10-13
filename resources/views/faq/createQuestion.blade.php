@extends('faq.app')

@section('content')
<div>
<form action="{{ route('faq.store') }}" method="post">
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
<button class="btn btn-primary" type="submit">Задать вопрос</button>
</form>

</div>
@endsection