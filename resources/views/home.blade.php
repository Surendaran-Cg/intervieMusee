@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <h5>Personal Details</h5>
                    <form action="" method="POST">
                        @csrf

                        <div class="row">
                            <label for="">Name <span style="color: red">*</span></label>
                            <input type="text" value="{{ Auth::user()->name }}" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="email">Email <span style="color: red">*</span></label>
                            <input type="email" name="email"  value="{{ Auth::user()->email }}" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="">Mobile Number<span style="color: red">*</span></label>
                            <input type="tel" value="" name="mobile_number">
                            @error('mobile_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    <h5>NumberEducation Details</h5>

                        <div class="row">
                            <div class="col-6">
                                <label for="">Passed out Year <span style="color: red">*</span></label>
                                <input type="text" value="" name="pass_out">
                                @error('pass_out')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 mt-5">
                                <label for="">Branch <span style="color: red">*</span></label>
                                <input type="text" value="" name="branch">
                                @error('branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Collage <span style="color: red">*</span></label>
                                <input type="tel" name="college">
                                @error('college')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    @if (Auth::user()->user_type == 'Fresher')
                        
                    @else

                    <h5>Job Details</h5>

                    <div class="row">
                        <div class="col-6">
                            <label for="">Current company name<span style="color: red">*</span></label>
                            <input type="text" name="current_company">
                            @error('current_company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="">Designation <span style="color: red">*</span></label>
                            <input type="text" name="designation">
                            @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="">Location <span style="color: red">*</span></label>
                            <input type="text" name="location">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @endif

                        <button type="submit">Update Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
