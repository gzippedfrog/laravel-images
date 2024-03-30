@extends('layouts.app')

@section('content')
    @if(count($images) === 0)
        <div class="mb-3">Сначала загрузите изображения</div>
    @else
        <form class="mb-3" action="{{ route('images.index') }}" method="get">
            <div class="input-group">
                <select class="form-select" name="sort">
                    <option value="" disabled selected>Сортировка</option>
                    <option value="name_asc">Имя (возрастание)</option>
                    <option value="name_desc">Имя (убывание)</option>
                    <option value="date_asc">Дата (возрастание)</option>
                    <option value="date_desc">Дата (убывание)</option>
                </select>
                <button class="btn btn-primary" type="submit">Применить</button>
            </div>
        </form>

        <div class="row row-cols">
            @foreach ($images as $image)
                <div class="col">
                    <div class="card mb-3" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('storage/images/thumbnails/thumb_' . $image->name) }}"
                             alt="{{ $image->name }}">

                        <div class="card-body">
                            <a target="_blank" href="{{asset('storage/images/' . $image->name)}}">{{ $image->name }}</a>
                        </div>
                        <div class="card-footer">
                            {{ $image->created_at->format('H:i:s d.m.Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
