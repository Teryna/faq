@extends('admin.layouts.admin_app')

@section('content')

<div class="container">

    @component('admin.components.pagination')
    @slot('title') Список администраторов @endslot
    @slot('parent') Главная @endslot
    @slot('active') Администраторы @endslot
    @endcomponent

<a href="{{ route('admin.user.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i>Добавить администратора</a>
<table class="table table-striped">
    <thead class="text-center">
        <th>Имя</th>
        <th>Почта</th>
        <th>Действие</th>
        <th>Удаление</th>
    </thead>
    <tbody class="text-center">
        @forelse ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{route('admin.user.edit', $user)}}"><i class="fa fa-edit"></i>Редактировать</a>
            </td>
            <td>
                <form action="{{ route('admin.user.destroy', $user) }}" method="post">
                    <input class="btn btn-danger" type="submit" value="Удалить Администратора">
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
                <ul class="pagination pull-right">
                    {{$users->links()}}
                </ul>
            </td>
        </tr>
    </tfoot>
</table>
</div>
@endsection