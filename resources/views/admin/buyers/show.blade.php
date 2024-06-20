@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-light table-striped-columns mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>

                <tr>
                    <td>{{ $buyer->id }}</td>
                    <td>{{ $buyer->name }}</td>
                    <td>{{ $buyer->email }}</td>
                </tr>

            </table>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-primary mb-3 mt-3" href="{{ route('buyers.edit', $buyer->id) }}">Редактировать</a>

        <form action="{{ route('buyers.destroy', $buyer->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mb-3">Удалить</button>
        </form>

        <a href="{{ route('buyers.index') }}" class="btn btn-secondary">Назад</a>
    </div>
@endsection
