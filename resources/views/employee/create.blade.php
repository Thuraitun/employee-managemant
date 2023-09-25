@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-danger text-center my-5">Create Employee</h4>

        <div class="col-8 offset-2">
            <form action="{{ route('employee.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name"> Full Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter full name">
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="company_id">Company Name</label>
                    <select name="company_id" id="" class="form-select @error('company_id') is-invalid @enderror">
                        <option value="">Choose Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email"> Email Address <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter email address">
                    @error('email')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone"> Phone Number <span class="text-danger">*</span> </label>
                    <input type="number" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        placeholder="Enter phone number">
                    @error('phone')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
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
