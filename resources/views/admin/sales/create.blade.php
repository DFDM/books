@extends('adminlte::page')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Добавление продажи</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="book_id" class="form-label">Купленные книги</label>
                            <select id="book_id" class="w-100" size="15" multiple name="book_id[]">
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}"
                                        {{ collect(old('books_id'))->contains($book->id) ? ' selected' : '' }}>
                                        {{ $book->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('books_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="buyers_id" class="form-label">Покупатель</label>
                            <select id="buyers_id" class="form-select" name="buyers_id">
                                @foreach ($buyers as $buyer)
                                    <option value="{{ $buyer->id }}"
                                        {{ collect(old('buyers_id'))->contains($buyer->id) ? ' selected' : '' }}>
                                        {{ $buyer->name }}
                                        ({{ $buyer->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('buyers_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить продажу книги</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2 mt-3 d-md-block">
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Назад</a>
    </div>
@endsection
