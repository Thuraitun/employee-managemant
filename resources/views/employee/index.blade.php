@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <h4 class="text-danger text-center">Employee List</h4>
        <a href="{{route('employee.create')}}" class="d-flex justify-content-end mb-4">
            <button class="btn btn-primary">Create Employee</button>
        </a>

        {{-- Alert --}}
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
                    <th scope="col">Employee Name</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $k => $employee)
                    <tr class="">
                        <th scope="row">{{ ++$k }}</th>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('employee.edit', $employee->id) }}" class="me-3"><button class="btn btn-warning"><i
                                        class="fa-solid fa-pen text-light"></i></button></a>
                                <form method="POST" action="{{ route('employee.destroy', $employee->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger confirm-button"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


