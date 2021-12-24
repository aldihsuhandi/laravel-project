@forelse ($carts as $cart)
    <div class = "rounded bg-white border border-secondary w-100 d-flex flex-row justify-content-center align-items-start m-5">
        <div class = "w-25">
            <img src="{{ asset($cart -> product -> image) }}" alt="" class = "w-100 p-2" height = 350px>
        </div>
        <div class = "w-75 d-flex flex-column justify-content-center fill py-3">
            <div class = "d-flex flex-row">
                <h2><b>{{ $cart -> product -> name}}</b></h2>&ensp;<div class = "text-secondary">(IDR. {{ $cart -> product -> price }})</div>
            </div>
            <p class = "py-2">x{{ $cart -> quantity }} pcs</p>
            <p class = "py-2">IDR. {{ $cart -> quantity * $cart -> product -> price }}</p>
            <div class = "d-flex flex-row align-items-center">
                <a href="" class = "btn btn-warning mx-1">Edit</a>
                <form action="/cart/delete" method = "post">
                    @csrf
                    <input type="hidden" name="user_id" value = "{{ Auth::user() -> id }}">
                    <input type="hidden" name="product_id" value = "{{ $cart -> product -> id }}">
                    <input type = "submit" class = "btn btn-danger text-white mx-1" value = "Delete">
                </form>
            </div>
        </div> 
    </div>
@empty
    <div class = "w-100 h-100 d-flex justify-content-center align-items-center text-white">
        <h1>Cart is empty!</h1>
    </div>
@endforelse