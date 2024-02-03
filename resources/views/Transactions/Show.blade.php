@extends('layouts.main')

@section('container')
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/products/'.$Transaction->product_image) }}" class="w-100 rounded">
                        <hr>
                        <label>Name </label>
                        <h4>{{ $Transaction->user_name }}</h4>

                        <label>Product</label>
                        <p class="tmt-3">
                            {!! $Transaction->id_product!!}
                        </p>

                        <label>Order Price</label>
                        <p class="tmt-3">
                            {!! $Transaction->allprice !!}
                        </p>
                        <label>Shipping Cost</label>
                        <p class="tmt-3">
                            {!! $Transaction->shippingcost !!}
                        </p>
                        <label>Total Cost</label>
                        <p class="tmt-3">
                            {!! $Transaction->totalcost!!}
                        </p>
                        <label>Status</label>
                        <p class="tmt-3">
                            {!! $Transaction->status!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
