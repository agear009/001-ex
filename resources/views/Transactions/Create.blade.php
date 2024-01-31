@extends('layouts.main')

@section('container')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-7">

                                   <h1 class="h3 mb-3 fw-normal text-center">Product</h1>
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <main class="form-signin">
           <div class="form-floating">
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="floatingInput" name="image" required>
             <label for="floatingInput">Image Product</label>

                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
           </div>
           <div class="form-floating">

             <select type="text" class="form-control @error('category') is-invalid @enderror" id="floatingCategory" placeholder="Category" name="category" {{ old('category') }} required>
             <option name="category" value="">--Select--</option>
             <option name="category" value="Not Registerd">Not Registerd</option>
             @forelse($category_products as $cp)
             <option name="category" value="{{ $cp->name }}">{{ $cp->name }}</option>
             @empty

             @endforelse


             </select>
             <label for="floatingPassword">Category</label>
             <!-- error message untuk category -->
             @error('category')
                 <div class="alert alert-danger mt-2">
                     {{ $message }}
                 </div>
             @enderror
           </div>
           <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" name="name" {{ old('name') }} required>
             <label for="floatingInput">name</label>
             <!-- error message untukname -->
             @error('name')
                 <div class="alert alert-danger mt-2">
                     {{ $message }}
                 </div>
             @enderror
           </div>
           <div class="form-floating">
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="floatingInput" name="price" {{ old('price') }} required>
             <label for="floatingInput">price</label>
             <!-- error message untuk price -->
             @error('price')
                 <div class="alert alert-danger mt-2">
                     {{ $message }}
                 </div>
             @enderror
           </div>

           <div class="form-floating">
               <input type="text" class="form-control @error('stock') is-invalid @enderror" id="floatingInput" name="stock" value="{{ old('name') }}" required>
               <label for="floatingInput">stock</label>
               <!-- error message untuk stock -->
               @error('stock')
               <div class="alert alert-danger mt-2">
                   {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
             <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="floatingInput" name="description" required>{{ old('content') }}</textarea>

             <label for="floatingInput">description</label>
              <!-- error message untuk description -->
              @error('description')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
              @enderror
            </div>


           <button class="btn btn-primary w-100 py-2" type="submit">Simpan</button>
           <button type="reset" class="btn btn-md btn-warning w-100 py-2">RESET</button>
        </main>
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
