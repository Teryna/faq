@extends('admin.layouts.admin_app')

@section('content')
<div class="container">
    @component('admin.components.pagination')
    @slot('title') Редактировать категорию @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
    @endcomponent
<div>
<form action="{{ route('admin.category.update', $category) }}" method="post">
    <input type="hidden" name="_method" value="put">
    @csrf
    <p>Название категории</p>  
    <input type="text" name="category" value="{{ $category->category }}">
    <button>Сохранить</button>
</form>
</div>
@endsection