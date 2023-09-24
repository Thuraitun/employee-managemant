@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <h4 class="text-danger">Company List</h4>
        <a href="{{ route('company.create') }}" class="d-flex justify-content-end">
            <button class="btn btn-primary">Create Company</button>
        </a>
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
                @foreach ($companies as $k=>$company)
                    <tr class="">
                        <th scope="row">{{ ++$k }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <img src="{{ asset('storage/company/'.$company->logo) }}" alt="" width="100px" height="100px">
                        </td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{route('company.edit',$company->id)}}">edit</a>
                            <a href="" class="text-danger">del</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
