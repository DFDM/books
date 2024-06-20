@extends('adminlte::page')
@section('content')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <a  class="btn btn-primary mb-3 mt-3" role="button" href="{{route('sales.create')}}" >Добавить продажу книги</a>
            <table class="table table-light table-striped-columns mt-3">
                <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Покупатель</th>
                          <th scope="col">Заказ</th>
                          <th scope="col">Сумма заказа</th>
                          <th scope="col">Дата заказа</th>
                        </tr>
                </thead>
                @foreach ($sales as $sale)
                    <tr>
                        <td><a href="{{route('sales.show', $sale->id)}}">{{$sale->id}}</a></td>
                        <td>{{$sale->buyer->name}} ({{$sale->buyer->email}})</td>
                        <td>
                            @foreach ($sale->books as $book)
                                {{$book->title}} <small >({{$book->price}})</small><br>
                            @endforeach
                        </td>
                        <td>{{$sale->price}}</td>
                        <td>{{$sale->created_at}}</td>
                    </tr>
                @endforeach
            </table>
    </div>
    <div class="row mt-3">
        {{ $sales->links() }}
    </div>
@endsection
