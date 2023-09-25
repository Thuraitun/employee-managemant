@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-danger text-center my-5">Edit Company</h4>

        <div class="col-8 offset-2">
            <form action="{{ route('company.update',$company->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name"> Company Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" value={{ $company->name }} class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter company name">
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email"> Email Address <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" value={{ $company->email }} class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter email address">
                    @error('email')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="logo"> Comany Logo </label><br>
                    <img src="{{asset('storage/company/'.$company->logo)}}" width="100px" height="100px" class=" img-thumbnail mb-2" alt="">
                    <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
                    @error('logo')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="website"> Company Website </label>
                    <input type="text" id="website" name="website" value={{ $company->website }} class="form-control @error('website') is-invalid @enderror"
                        placeholder="Enter website address">
                    @error('website')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 d-flex">
                    <a href="{{ route('company.index') }}" class="me-3 btn btn-danger">
                        back
                    </a>
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
@endsection
