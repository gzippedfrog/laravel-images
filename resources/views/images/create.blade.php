@extends('layouts.app')

@section('content')
    <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="images">Выберите изображения:</label>
            <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Загрузить</button>
    </form>
@endsection
