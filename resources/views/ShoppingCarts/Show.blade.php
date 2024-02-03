@extends('layouts.main')

@section('container')
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/products/'.$ShoppingCart->product_image) }}" class="w-100 rounded">
                        <hr>
                        <label>Product Name</label>
                        <h4>{{ $ShoppingCart->id_product }}</h4>

                        <label>Product Category</label>
                        <p class="tmt-3">
                            {!! $ShoppingCart->id_category!!}
                        </p>

                        <label>Product Orderer</label>
                        <p class="tmt-3">
                            {!! $ShoppingCart->id_member!!}
                        </p>
                        <label>Order Amount</label>
                        <p class="tmt-3">
                            {!! $ShoppingCart->amount!!}
                        </p>
                        <label>Product Price</label>
                        <p class="tmt-3">
                            {!! $ShoppingCart->price!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
