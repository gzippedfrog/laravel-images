@extends('layouts.app')

@section('content')
    @if(count($images) === 0)
        <div>Сначала загрузите изображения</div>
    @else
        @foreach ($images as $image)
            <div class="card mb-3 col-6" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/images/thumbnails/thumb_' . $image->name) }}"
                     alt="{{ $image->name }}">

                <div class="card-body">
                    <p>{{ $image->name }}</p>
                    <p>Загружено: {{ $image->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        @endforeach
    @endif
@endsection
