@extends('layout.master')
@section('title', "Transaction History")
@section('content')
<div class = "d-flex justify-content-start align-items-center flex-column w-100">
    <div class = "text-white">
        <h3>
            My History Transaction
        </h3>
    </div>
    <div class = "d-flex justify-content-start align-items-center w-75 rounded bg-white">
        <div class = "accordion w-100 rounded" id = "transaction_accordion">
            @forelse ($transactions as $transaction)
                <h2 class = "accordion-header rounded" id = "header_{{ $transaction -> id }}">
                    <button class = "accordion-button" type = "button" data-bs-toggle="collapse"
                    data-bs-target = "#transaction_{{ $transaction -> id }}" aria-expanded="true"
                    aria-controls="transaction_{{ $transaction -> id }}">
                        {{ $transaction -> created_at }}
                    </button>
                </h2>
                <div id="transaction_{{ $transaction -> id}}" class="accordion-collapse collapse show"
                    aria-labelledby="header_{{ $transaction -> id }}"
                    data-bs-parent="#accordionExample">
                    <div class = "d-flex flex-column justify-content-center align-items-center p-3">
                        @include('transaction.list')
                    </div>
                </div>
                <div class = "w-100 p-3 d-flex justify-content-end align-items-center">
                    <b>
                        Total Price: &ensp;&ensp;IDR. {{ $transaction -> detail -> sum(function($t){
                            return $t -> quantity * $t -> product -> price;
                        }) }}
                    </b>
                </div>
            @empty
                <div class = "w-100 h-100 d-flex justify-content-center align-items-center">
                    <h1>Cart is empty!</h1>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
