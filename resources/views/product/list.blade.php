@foreach ($products as $product)
    <div class = "rounded bg-white border border-warning w-25 d-flex flex-column justify-content-center align-items-center m-5" style = "height: 500px;">
        <img src="{{ asset($product -> image) }}" alt="" class = "w-100" style = "height: 40%;">
        <div class = "d-flex justify-content-between w-100 p-3">
            <div class = "d-flex flex-column justify-content-start align-items-start w-100 p-2 mx-2">
                <div>
                    {{ $product -> name }}<br>
                    IDR. {{ $product -> price }}
                </div>
                <div class = "d-flex justify-content-start pt-2 mt-2">
                    <a href = "/product/{{ $product -> id }}/view" class="btn btn-warning rounded">More Detail</a>
                </div>
            </div>
            <div>
                <p>{{ $product -> category -> name }}</p>
            </div>
        </div>
    </div>
@endforeach
<div class = "d-flex justify-content-start" style = "width: 85%;">
    {{ $products -> links() }}
</div>