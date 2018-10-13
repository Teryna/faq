@extends('admin.layouts.admin_app')

@section('content')
<div class="container">
    @component('admin.components.pagination')
    @slot('title') Редактирование данных администратора @endslot
    @slot('parent') Главная @endslot
    @slot('active') Администраторы @endslot
    @endcomponent

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('admin.user.update', $user) }}">
            <input type="hidden" name="_method" value="put">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p>Имя</p>
            <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ $user->name }}" required>
            <p>Email</p>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}" required>
            <p>Пароль</p>
            <input type="password" class="form-control" name="password" value="{{ $user->password }}">
            <p>Подтверждение</p>
            <input type="password" class="form-control" name="password_confirmation" value="{{ $user->password }}">
            <input class="btn btn-primary" type="submit" value="Сохранить">  
        </form>
    </div>
</div>
@endsection