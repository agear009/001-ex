@extends('layouts.main')

@section('container')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group"><img src="{{ asset('storage/members/'.$member->photo) }}" class="w-100 rounded">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control" name="photo">
                            </div>




                            {{--  mulai dari sini  --}}

                            <div class="form-group">
                                <label class="font-weight-bold">NAME</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('title', $member->name) }}" placeholder="insert name" required>

                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">GENDER</label>
                                <select type="text" class="form-control @error('contry') is-invalid @enderror" name="gender" value="{{ old('title', $member->gender) }}" placeholder="insert gender" required>
                                <option name="gender" value="">-- Select Gender --</option>
                                <option name="gender" value="male">Male</option>
                                <option name="gender" value="female">Female</option>
                                </select>
                                <!-- error message untuk title -->
                                @error('gender')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">ADDRESS</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('title', $member->address) }}" placeholder="insert address" required>

                                <!-- error message untuk title -->
                                @error('address')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">COUNTRY</label>
                                <select type="text" class="form-control @error('contry') is-invalid @enderror" name="country_id" value="{{ old('title', $member->country_id) }}" placeholder="insert contry" required>
                                <option name="country_id" value="">-- Select contry --</option>
                                <option name="country_id" value="1">Indonesia</option>
                                <option name="country_id" value="2">Arab</option>
                                </select>
                                <!-- error message untuk title -->
                                @error('contry')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">EMAIL ADDRESS</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('title', $member->email) }}" placeholder="insert email" required>

                                <!-- error message untuk title -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">PHONE (WhatsApp, Telegram)</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('title', $member->phone) }}"" placeholder="insert phone" required>

                                <!-- error message untuk phone -->
                                @error('phone')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">USERNAME</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('title', $member->username) }}" placeholder="insert username" required>

                                <!-- error message untuk phone -->
                                @error('username')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">PASSWORD</label>
                                <input type="password" class="form-control @error('phone') is-invalid @enderror" name="password" placeholder="insert password" required>

                                <!-- error message untuk phone -->
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  ini akhirnya  --}}


                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

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
