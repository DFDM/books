@extends('adminlte::page')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Редактирование продажи</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.update', $sale->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="book_id" class="form-label">Купленная книга</label>
                            <select id="book_id" class="w-100" size="15" multiple name="book_id[]">
                                @foreach ($sale->books as $book)
                                    <option value="{{ $book->id }}" selected>{{ $book->title }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="buyers_id" class="form-label">Покупатель</label>
                            <select id="buyers_id" class="form-select" name="buyers_id">
                                <option value="{{ $sale->buyers_id }}">{{ $sale->buyer->name }} ({{ $sale->buyer->email }})
                                </option>
                            </select>
                            @error('buyers_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cover_url" class="form-label">Стоимость продажи</label>
                            <input id="cover_url" type="text" class="form-control" disabled value="{{ $sale->price }}"
                                name="price">
                        </div>

                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2 mt-3 d-md-block">
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Назад</a>
    </div>
@endsection
