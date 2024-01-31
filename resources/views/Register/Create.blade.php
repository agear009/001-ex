@extends('layouts.main')

@section('container')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">

                                   <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
                                   <main class="form-signin">
                        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

           <div class="form-floating">

             <input type="hidden" class="form-control @error('level') is-invalid @enderror" id="floatingLevel"  placeholder="1122@gG" name="level" value="user"  required>



           </div>
           <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput"  placeholder="Andy" name="name" value="{{ old('name') }}" required>
             <label for="floatingInput">Name</label>
             <!-- error message untukname -->
             @error('name')
                 <div class="alert alert-danger mt-2">
                     {{ $message }}
                 </div>
             @enderror
           </div>
           <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="1122@gG" name="email" value="{{ old('email') }}" required>
             <label for="floatingInput">Email</label>
             <!-- error message untukname -->
             @error('name')
                 <div class="alert alert-danger mt-2">
                     {{ $message }}
                 </div>
             @enderror
           </div>
           <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder="1122@gG" name="password" required>
             <label for="floatingInput">Password</label>
             <!-- error message untuk price -->
             @error('password')
                 <div class="alert alert-danger mt-2">
                     {{ $message }}
                 </div>
             @enderror
           </div>

           <div class="form-floating">
               <input type="password" class="form-control @error('stock') is-invalid @enderror rounded-bottom" id="floatingInput" placeholder="1122@gG" name="confrimpassword"  required>
               <label for="floatingInput">Confrim Password</label>
               <!-- error message untuk stock -->
               @error('confirmpassword')
               <div class="alert alert-danger mt-2">
                   {{ $message }}
                </div>
                @enderror
            </div>

           <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
           <small class="d-block text-center mt-3">All Redy registerd ? <a href="/">Login Now!</a></small>

                        </form>
                    </main>
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
