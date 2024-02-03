@extends('layouts.main')

@section('container')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('shoppingcarts.update', $ShoppingCart->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                        <img src="{{ asset('/storage/products/'.$ShoppingCart->product_image) }}" class="w-20 rounded justify-content-center" >
                        <hr>
                        <label>Product Name</label>

                        <h4>{{ $ShoppingCart->product_name }}</h4>

                        <label>Product Category</label>
                        <p class="tmt-3">
                            {!! $ShoppingCart->id_category!!}
                        </p>

                        <label>Product Orderer</label>
                        <p class="tmt-3">
                            {!! $ShoppingCart->user_name !!}
                        </p>
                        <label>Order Amount</label>
                        <p class="tmt-3">
                            {!! $ShoppingCart->amount!!}
                        </p>
                        <label>Product Price</label>
                        <p class="tmt-3">
                            {!! $ShoppingCart->price!!}
                        </p>
                        <label>Status</label>
                        <div class="form-floating">
                                 <select type="text" class="form-control @error('category') is-invalid @enderror" id="floatingCategory" placeholder="Category" name="status" value="$ShoppingCart->status" required>
                                 <option name="category" value="{{ $ShoppingCart->status }}">{{ $ShoppingCart->status }} (Status at the buyer)</option>
                                 <option name="category" value="">--++-- Select !--++--</option>
                                 <option name="category" value="Processed">Processed</option>
                                 <option name="category" value="Sent by seller">Delivery is complete</option>
                                 <option name="category" value="Canceled">Canceled</option>
                                 </select>
                                 <label for="floatingPassword">Category</label>
                                 <!-- error message untuk category -->
                                 @error('category')
                                     <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                     </div>
                                 @enderror
                                    </div>
                               <button class="btn btn-primary w-100 py-2" type="submit">Update Status</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
