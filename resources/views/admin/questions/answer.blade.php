@extends('admin.layouts.admin_app')

@section('content')
<div class="container">
    @component('admin.components.pagination')
    @slot('title') Редактирование вопроса @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
    @endcomponent

<form class="form-horizontal" action="{{ route('admin.question.update', $question) }}" method="post">
    <input type="hidden" name="_method" value="put">
    @csrf
    <p><b>Вопрос:</b><br>{{ $question->question }}</p>
    <p><b>Ответ:</b></p>
    <textarea rows="10" cols="50" name="answer" required></textarea>
    <p><i>Опубликовать:</i>
    <input type="checkbox" name="published" value="1"></p>
    <input class="btn btn-primary" type="submit" value="Ответить">
</form>
</div>
@endsection
