@extends('layouts.main')
    @section('container')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        {{--  <a href="{{ route('Transactions.create') }}" class="btn btn-md btn-success mb-3">Insert Transaction</a>  --}}
                        <table class="table" border="0">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Product</th>
                                <th scope="col">Order Price</th>
                                <th scope="col">Shipping Cost</th>
                                <th scope="col">Total Cost</th>
                                <th scope="col">Date Order</th>

                                <th scope="col">Menu</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($Transactions as $Transaction)
                                <tr>

                                    <td>{{ $Transaction->member_name }}</td>
                                    <td>{!! $Transaction->id_product !!}</td>
                                    <td>{!! $Transaction->allprice !!}</td>
                                    <td>{!! $Transaction->shippingcost !!}</td>
                                    <td>{!! $Transaction->totalcost !!}</td>
                                    <td>{!! $Transaction->transactionmonth !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('transactions.destroy', $Transaction->id) }}" method="POST">
                                            <a href="{{ route('transactions.show', $Transaction->id) }}" class="btn btn-sm btn-dark">Show </a>
                                            <a href="{{ route('transactions.edit', $Transaction->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Transaction Not Found.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{--  {{ $Transactions->links() }}  --}}
                    </div>
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
