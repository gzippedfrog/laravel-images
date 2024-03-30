@extends('layouts.app')

@section('content')
    <form class="mb-3" action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label class="form-label mb-3" for="images">Выберите изображения (до 5 шт.)</label>
        <div class="input-group">
            <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*" required>
            <button type="submit" class="btn btn-primary">Загрузить</button>
        </div>
    </form>
@endsection
