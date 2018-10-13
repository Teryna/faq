@extends('admin.layouts.admin_app')

@section('content')
<div class="container">

    @component('admin.components.pagination')
    @slot('title') Список вопросов  @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
    @endcomponent
       
    <a href="{{ route('admin.question.create') }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Задать вопрос</a>
    
    <table class="table table-striped">
    <thead class="text-center">
        <th width="350px">Вопрос</th>
        <th>Категория</th>
        <th>Состояние</th>
        <th>Дата создания</th>
        <th>Действие</th>
        <th>Удаление</th>
    </thead>
    <tbody>
        @forelse ($questions as $question)
        <tr>
            <td>{{$question->question}}</td>
            <td>
                @foreach($categories as $category)
                    @if($question->category_id == $category->id)
                    {{ $category->category }}
                    @endif
                @endforeach
            </td>
            <td>
                @if($question->answer == NULL)
                Ожидает Ответа
                @else
                    @if($question->published == 0)
                        Скрыт
                    @else
                        Опубликован
                    @endif
                @endif
            </td>
            <td>{{$question->created_at}}</td>
            <td>
                <p><a href="{{ route('admin.question.edit', $question) }}">Редактировать</a></p>
                <p><a href="{{ route('admin.question.hidden', $question) }}">{{$question->published == 1 ? 'Скрыть' : 'Опубликовать'}}</a></p>
                <p><a href="{{ route('admin.question.answer', $question) }}">{{$question->answer == NULL ? 'Ответить' : ''}}</a></p>
            </td>        
            <td>
                 <form action="{{ route('admin.question.destroy', $question) }}" method="post">
                    <input class="btn btn-danger" type="submit" value="Удалить вопрос">
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
                    {{$questions->links()}}
                </ul>
            </td>
        </tr>
    </tfoot>
    </table>   
</div>

@endsection('content')