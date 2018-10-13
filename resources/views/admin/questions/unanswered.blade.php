@extends('admin.layouts.admin_app')

@section('content')

<div class="container">

    @component('admin.components.pagination')
    @slot('title') Список вопросов без ответа @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы без ответа @endslot
    @endcomponent

<a href="{{ route('admin.question.create') }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Задать вопрос</a>
<table class="table table-striped">
    <thead class="text-center">
        <th>Описание</th>
        <th>Дата создания</th>
        <th>Действие</th>
        <th>Удаление</th>
    </thead>
    <tbody class="text-center">
        @forelse ($questions as $question)
        <tr>
            <td>{{ $question->question }}</td>
            <td>{{ $question->created_at }}</td>
            <td>
                <p><a href="{{route('admin.question.edit', $question)}}">Редактировать</a></p>
                <p><a href="{{route('admin.question.answer', $question)}}">{{$question->answer == NULL ? 'Ответить' : ''}}</a></p>
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
            <td colspan="3" class="text-center"> <h2>Данных нет</h2></td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <ul class="pagination pull-right">
                    {{$questions->links()}}
                </ul>
            </td>
        </tr>
    </tfoot>
</table>
</div>
@endsection
