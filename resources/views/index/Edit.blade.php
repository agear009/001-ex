@extends('layouts.MainMembers')

@section('Container')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('dashboardindexs.update', $ShoppingCart->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <img src=" {{ asset('/storage/products/'.$ShoppingCart->product_image) }}" width="160" height="145">
                            <div class="form-floating">
                               <table>
                                <tr>
                                    <td>Product</td>
                                    <td>:</td>
                                    <td> {{ $ShoppingCart->product_name }}</td>
                                </tr>

                                <tr>
                                    <td> Price </td>
                                    <td>:</td>
                                    <td> {{ $ShoppingCart->price }}</td>
                                </tr>

                               </table>
                               <div class="form-floating">
                                <input type="hidden" class="form-control @error('name') is-invalid @enderror" id="floatingInput" name="id_member" value="{{ $ShoppingCart->id_member }}" required>

                                 <!-- error message untukname -->
                                 @error('name')
                                     <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                     </div>
                                 @enderror
                               </div>
                               <div class="form-floating">
                                <input type="hidden" class="form-control @error('name') is-invalid @enderror" id="floatingInput" name="id_product" value="{{ $ShoppingCart->product_name }}" required>

                                 <!-- error message untukname -->
                                 @error('name')
                                     <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                     </div>
                                 @enderror
                               </div>
                               <div class="form-floating">
                                <input type="hidden" class="form-control @error('price') is-invalid @enderror" id="floatingInput" name="price" value="{{ $ShoppingCart->price }}">
                                 <label for="floatingInput">price</label>
                                 <!-- error message untuk price -->
                                 @error('price')
                                     <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                     </div>
                                 @enderror
                               </div>
                               <div class="form-floating">
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="floatingInput" name="amount" value="{{ $ShoppingCart->amount }}" required>
                                 <label for="floatingInput">amount</label>
                                 <!-- error message untuk amount -->
                                 @error('amount')
                                     <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                     </div>
                                 @enderror
                               </div>

                               <select type="text" class="form-control @error('contry') is-invalid @enderror" name="shippingcost" value="{{ old('shippingcost') }}" placeholder="insert contry" required>
                                   <option name="country_id" value="">-- Select contry --</option>
                                   @forelse($ShippingCosts as $ShipingCost)
                                   <option name="country_id" value="{{ $ShipingCost->cost }}">{{ $ShipingCost->id_country }} | {{ $ShipingCost->cost }}</option>
                                   @empty
                                   <div class="alert alert-danger">
                                       Data Post belum Tersedia.
                                   </div>
                                   @endforelse

                                   </select>
                                   <!-- error message untuk title -->
                                   @error('contry')
                                       <div class="alert alert-danger mt-2">
                                           {{ $message }}
                                       </div>
                                   @enderror
                               </div>

                               <div class="form-floating">
                                <input type="hidden" class="form-control @error('status') is-invalid @enderror" id="floatingInput" name="status" value="Progres" required>

                                 <!-- error message untuk amount -->
                                 @error('status')
                                     <div class="alert alert-danger mt-2">
                                         {{ $message }}
                                     </div>
                                 @enderror
                               </div>



                               <button class="btn btn-primary w-100 py-2" type="submit">Order</button>

                            <button type="reset" class="btn btn-md btn-warning w-100 py-2">RESET</button>

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
