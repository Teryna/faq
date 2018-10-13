@extends('admin.layouts.admin_app')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Категорий: {{ $count_categories }}</span></p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Всего вопросов: {{ $count_questions }}</span></p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Вопросов без ответа: {{ $count_unanswered }}</span></p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="jumbotron">
                <p><span class="label label-primary">Администраторов: {{ $count_admins }}</span></p>
            </div>
        </div>
    </div>
    
 <div class="row">
    <div class="col-sm-6">
        <a href="{{route('admin.category.create')}}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Создать категорию</a> 
    </div> 
           
    <div class="col-sm-6">
        <a href="{{route('admin.question.index')}}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>Последние добавленные вопросы</a> 
    </div>
               
    <div class="col-sm-6">  
    @foreach($categories as $category)
    <a class="list-group-item" href="{{ route('admin.category.edit', $category) }}">
        <h5 class="list-group-item-heading">{{$category->category}}</h5></a>
        @if($category->question()->where('answer', NULL)->count() > 0)
        <a class="list-group-item" href="{{ route('admin.question.unanswered') }}"><span class="list-group-item-text">
        Кол-во вопросов без ответа: {{ $category->question()->where('answer', NULL)->count() }}
        </span></a>
        @else 
        <span class="list-group-item">Кол-во вопросов без ответа: {{ $category->question()->where('answer', NULL)->count() }}
        </span>
        @endif
    @endforeach
    </div>
   
    <div class="col-sm-6">  
        @foreach($questions as $question)
        <ul class="list-group-item">  
            <li class="list-group-item">{{ $question->question }}</li>
            <li class="list-group-item">{{ $question->created_at }}</li>
        </ul>
        @endforeach
    </div>   
</div>
</div>

@endsection
