@extends('layouts.main')

@section('container')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('members.create') }}" class="btn btn-md btn-success mb-3">Insert Member</a>
                        <table class="table" border="0">
                            <thead>
                              <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col">Country</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($members as $member)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/members/'.$member->photo) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $member->username }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->gender }}</td>
                                    <td>{{ $member->address }}</td>
                                    <td>{{ $member->country_name }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('members.destroy', $member->id) }}" method="POST">
                                            <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-dark">Show</a>
                                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
                          {{-- $members->links() --}}
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
