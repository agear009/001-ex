@extends('layouts.main')

@section('container')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('shippingcosts.create') }}" class="btn btn-md btn-success mb-3">Insert Shipping</a>
                        <table class="table" border="0">
                            <thead>

                            </thead>
                            <tbody>
                              @forelse ($shippingCosts as $shippingCost)
                                <tr>

                                    <td>{{ $shippingCost->country_name }}</td>
                                    <td>{{ $shippingCost->cost }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('shippingcosts.destroy', $shippingCost->id) }}" method="POST">

                                            <a href="{{ route('shippingcosts.edit', $shippingCost->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>

                    </div>
                    {{--  {{ $countrys->links() }}  --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>
@endsection
