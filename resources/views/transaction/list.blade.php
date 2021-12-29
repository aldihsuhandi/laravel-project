@foreach ($transaction -> detail as $detail)
    <div class = "rounded bg-white border border-secondary w-100 d-flex flex-row justify-content-center align-items-start m-1">
        <div class = "w-25">
            <img src="{{ asset($detail -> product -> image) }}" alt="" class = "w-100 p-2" height = 150px>
        </div>
        <div class = "w-75 d-flex flex-column justify-content-center fill py-3">
            <div class = "d-flex flex-row">
                <h2><b>{{ $detail -> product -> name}}</b></h2>&ensp;<div class = "text-secondary">(IDR. {{ $detail -> product -> price }})</div>
            </div>
            <p class = "py-2">x{{ $detail -> quantity }} pcs</p>
            <p class = "py-2">IDR. {{ $detail -> quantity * $detail -> product -> price }}</p>
        </div>
    </div>
@endforeach
