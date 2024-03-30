@extends('layouts.app')

@section('content')
    @if(count($images) === 0)
        <div class="mb-3">Сначала загрузите изображения</div>
    @else
        <form class="mb-3" action="{{ route('images.index') }}" method="get">
            @csrf

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

        <form action="{{ route('images.download') }}" method="get">
            <button class="btn btn-primary mb-3" type="submit">Скачать zip архив</button>
            @csrf

            <div class="row row-cols g-1">
                @foreach ($images as $image)
                    <div class="col-4">
                        <div class="card mb-3" style="width: 18rem;">
                            <img class="card-img-top"
                                 src="{{ asset('storage/images/thumbnails/thumb_' . $image->name) }}"
                                 alt="{{ $image->name }}">

                            <div class="card-body">
                                <p>
                                    <a class="card-link" target="_blank"
                                       href="{{asset('storage/images/' . $image->name)}}">
                                        {{ $image->name }}
                                    </a>
                                </p>

                                <div class="form-check">
                                    <label>Добавить в архив</label>
                                    <input class="form-check-input" type="checkbox" name="images[]"
                                           value="{{$image->id}}">
                                </div>
                            </div>

                            <div class="card-footer">
                                <small class="text-body-secondary">
                                    {{ $image->uploaded_at->format('H:i:s d.m.Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
        </div>
    @endif
@endsection
