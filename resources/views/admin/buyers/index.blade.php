@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-3 mt-3" role="button" href="{{ route('buyers.create') }}">Добавить покупателя</a>
            <table class="table table-light table-striped-columns mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                @foreach ($buyers as $buyer)
                    <tr>
                        <td>{{ $buyer->id }}</td>
                        <td><a href="{{ route('buyers.show', $buyer->id) }}">{{ $buyer->name }}</a></td>
                        <td>{{ $buyer->email }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row mt-3">
        {{ $buyers->links() }}
    </div>
@endsection
