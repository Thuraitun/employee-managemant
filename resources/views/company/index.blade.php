@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <h4 class="text-danger text-center">Company List</h4>
        <a href="{{ route('company.create') }}" class="d-flex justify-content-end mb-4">
            <button class="btn btn-primary">Create Company</button>
        </a>

        {{-- alert --}}
        @if (session('success'))
            <div class="col-4 offset-8">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Website</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $k => $company)
                    <tr class="">
                        <th scope="row">{{ ++$k }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <img src="{{ asset('storage/company/' . $company->logo) }}" alt="" width="50px"
                                height="50px">
                        </td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('company.edit', $company->id) }}" class="me-3"><button
                                        class="btn btn-warning"><i class="fa-solid fa-pen text-light"></i></button></a>
                                <form method="POST" action="{{ route('company.destroy', $company->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger confirm-button"><i
                                            class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script type="text/javascript">
    $('.confirm-button').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this row?`,
                text: "It will gone forevert",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
