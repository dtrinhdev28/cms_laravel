<h1>Tin trong loại</h1>
@foreach ($data as $item)
    <strong>{{ $item->tieuDe }}</strong>
    <p>
        {{ $item->tomTat }}
    </p>
    <hr>
@endforeach
