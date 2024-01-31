@extends('layouts.main')

@section('container')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/members/'.$member->photo) }}" class="w-100 rounded">
                        <hr>
                        <h4>{{ $member->name }}</h4>
                        <h4>{{ $member->gender }}</h4>
                        <h4>{{ $member->address }}</h4>
                        <h4>{{ $member->country_id }}</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
