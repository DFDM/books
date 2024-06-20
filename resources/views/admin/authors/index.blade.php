@extends('adminlte::page')
@section('content')
    <a class="btn btn-primary mb-3 mt-3" role="button" href="{{ route('authors.create') }}">Добавить автора</a>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Поиск авторов</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <form method="GET" action="{{ route('authors.index') }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">Имя автора</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ $data['first_name'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Фамилия автора</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ $data['last_name'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row flex-row-reverse">
                            <div class="col-sm-2 float-right">
                                <button type="submit" class="btn btn-primary align-self-end w-100">Найти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        @foreach ($authors as $author)
            <div class="col-md-3 mx-auto mb-3 border-0">
                <div class="card h-100">
                    <a href="{{ route('authors.show', $author->id) }}">
                        <img src="{{ $author->avatar_url != '' ? $author->avatar_url : Vite::asset('resources/images/no-image.svg') }}"
                            class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a
                                href="{{ route('authors.show', $author->id) }}">{{ $author->first_name }}</a></h5>
                        <p class="card-text">{{ $author->last_name }}</p>
                        <p class="card-text">Рейтинг: {{ $author->rank }}</p>
                        <a href="{{ route('authors.show', $author->id) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-3">
        {{ $authors->withQueryString()->links() }}
    </div>
@endsection
