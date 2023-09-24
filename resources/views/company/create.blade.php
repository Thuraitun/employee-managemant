@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-danger text-center my-5">Create Company</h4>

        <div class="col-8 offset-2">
            <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name"> Company Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control"
                        placeholder="Enter company name">
                </div>

                <div class="mb-3">
                    <label for="email"> Email Address <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control"
                        placeholder="Enter email address">
                </div>

                <div class="mb-3">
                    <label for="logo"> Comany Logo <span class="text-danger">*</span></label>
                    <input type="file" id="logo" name="logo" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="website"> Company Website <span class="text-danger">*</span></label>
                    <input type="text" id="website" name="website" class="form-control"
                        placeholder="Enter website address">
                </div>

                <div class="mb-3 d-flex">
                    <a href="{{ route('company.index') }}" class="me-3 btn btn-danger">
                        back
                    </a>
                    <button class="btn btn-primary">Create</button>
                </div>

            </form>
        </div>
    </div>
@endsection
