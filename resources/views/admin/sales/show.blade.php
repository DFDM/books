@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-light table-striped-columns mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Покупатель</th>
                        <th scope="col">Заказ</th>
                        <th scope="col">Цена</th>
                    </tr>
                </thead>
                <tr>
                    <td><a href="{{ route('sales.show', $sale->id) }}">{{ $sale->id }}</a></td>
                    <td>{{ $sale->buyer->email }}</td>
                    <td>
                        @foreach ($sale->books as $book)
                            {{ $book->title }} <br>
                        @endforeach
                    </td>
                    <td>{{ $sale->price }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-primary mb-3 mt-3" href="{{ route('sales.edit', $sale->id) }}">Редактировать</a>

        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mb-3">Удалить</button>
        </form>

        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Назад</a>
    </div>
@endsection
