@extends('admin.layouts.admin_app')

@section('content')
<div class="container">

    @component('admin.components.pagination')
    @slot('title') Список категорий @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
    @endcomponent
       
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Создать категорию</a>
    
    <table class="table table-striped">
    <thead class="text-center">
        <th style="width:200px;">Название</th>
        <th>Вопросов в категории</th>
        <th>Вопросов без ответа</th>
        <th>Опубликовано</th>
        <th>Действие</th>
        <th>Удаление</th>
    </thead >
    <tbody class="text-center">
        @forelse ($categories as $category)
        <tr>
            <td>{{$category->category}}</td>
            <td>{{$category->question()->count()}}</td>
            <td>{{$category->question()->where('answer', NULL)->count()}}</td>
            <td>{{$category->question()->where('published', 1)->count()}}</td>
            <td>
                <a href="{{ route('admin.category.edit', $category) }}">Редактировать<i class="fa fa-edit"></i></a>
            </td>
            <td>
                 <form action="{{ route('admin.category.destroy', $category) }}" method="post">
                    <input class="btn btn-danger" type="submit" value="Удалить категорию вместе с вопросами">
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center"> 
            <h2>Данных нет</h2></td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <ul class="pagination">
                    {{ $categories->links() }}
                </ul>
            </td>
        </tr>
    </tfoot>
    </table>   
</div>

@endsection('content')