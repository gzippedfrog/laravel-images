@extends('layouts.app')

@section('content')
    <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="images">Выберите изображения:</label>
            <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*" required>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif

        <button type="submit" class="btn btn-primary">Загрузить</button>
    </form>
@endsection
