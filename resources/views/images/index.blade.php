@extends('layouts.app')

@section('content')
    @if(count($images) === 0)
        <div>Сначала загрузите изображения</div>
    @else
        @foreach ($images as $image)
            <div class="card mb-3">
                <div class="card-header">
                </div>

                <img src="{{ asset('storage/images/' . $image->name) }}" alt="{{ $image->name }}">

                <div class="card-body">
                    <p>{{ $image->name }}</p>
                    <p>Загружено: {{ $image->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        @endforeach
    @endif
@endsection
