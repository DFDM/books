@extends('adminlte::page')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Добавление автора</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Имя автора</label>
                            <input id="first_name" type="text" class="form-control" name="first_name"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Фамилия автора</label>
                            <input id="last_name" type="text" class="form-control" name="last_name"
                                value="{{ old('last_name') }}">
                            @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="avatar_url" class="form-label">Аватар</label>
                            <input id="avatar_url" type="file" class="form-control" name="avatar_url"
                                value="{{ old('avatar_url') }}">
                            @error('avatar_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rank" class="form-label">Рейтинг</label>
                            <input id="rank" type="number" class="form-control" name="rank"
                                value="{{ old('rank') }}">
                            @error('rank')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить автора</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('authors.index') }}" сlass="btn btn-primary">Назад</a>
@endsection
