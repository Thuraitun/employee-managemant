@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-danger text-center my-5">Edit Employee</h4>

        <div class="col-8 offset-2">
            <form action="{{route('employee.update', $employee->id)}}" method="post">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name"> Full Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" value="{{ $employee->name }}" class="form-control"
                        placeholder="Enter full name">
                </div>

                <div class="mb-3">
                    <label for="company_id">Company Name</label>
                    <select name="company_id" id="" class="form-select">
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" @if ($company->id == $employee->company_id) selected @endif>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email"> Email Address <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" value="{{ $employee->email }}" class="form-control"
                        placeholder="Enter email address">
                </div>

                <div class="mb-3">
                    <label for="phone"> Phone Number <span class="text-danger">*</span> </label>
                    <input type="text" id="phone" name="phone" value="{{ $employee->phone }}" class="form-control"
                        placeholder="Enter phone number">
                </div>

                <div class="mb-3 d-flex">
                    <a href="{{ route('employee.index') }}" class="me-3 btn btn-danger">
                        back
                    </a>
                    <button class="btn btn-primary">Create</button>
                </div>

            </form>
        </div>
    </div>
@endsection
