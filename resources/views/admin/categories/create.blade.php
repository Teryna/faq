@extends('admin.layouts.admin_app')

@section('content')
<div class="container">
    @component('admin.components.pagination')
    @slot('title') Создание категории @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
    @endcomponent
<div>
<form action="{{ route('admin.category.store') }}" method="post">
    @csrf 
    <p>Название категории</p>  
    <input type="text" name="category">
    <button class="btn btn-primary">Добавить</button>
</form>
</div>
@endsection