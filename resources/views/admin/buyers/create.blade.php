@extends('adminlte::page')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Добавление покупателя</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('buyers.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя покупателя</label>
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email покупателя</label>
                            <input id="email" type="text" class="form-control" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить покупателя</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('buyers.index') }}" сlass="btn btn-primary">Назад</a>
@endsection
