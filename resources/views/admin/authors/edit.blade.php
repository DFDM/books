@extends('adminlte::page')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Редактирование автора</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('authors.update', $author->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Имя автора</label>
                            <input id="first_name" type="text" class="form-control"
                                value="{{ old('first_name', $author->first_name) }}" name="first_name">
                            @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Фамилия автора</label>
                            <input id="last_name" type="text" class="form-control"
                                value="{{ old('last_name', $author->last_name) }}" name="last_name">
                            @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="avatar_url" class="form-label">Аватар</label>
                            <div class="mb-3">
                                <img src="{{ $author->avatar_url != '' ? $author->avatar_url : Vite::asset('resources/images/no-image.svg') }}"
                                    class="card-img-top w-25" alt="...">
                            </div>
                            <input id="avatar_url" type="file" class="form-control" name="avatar_url"
                                value="{{ old('avatar_url') }}">
                            @error('avatar_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rank" class="form-label">Рейтинг</label>
                            <input id="rank" type="number" class="form-control"
                                value="{{ old('rank', $author->rank) }}" name="rank">
                            @error('rank')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('authors.index') }}" сlass="btn btn-primary">Назад</a>
@endsection
