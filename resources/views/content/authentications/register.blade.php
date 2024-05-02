@extends('layouts/blankLayout')

@section('title', 'Register')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Register Card -->
      <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
          @include('_partials.macros',["height"=>30])
          </a>
        </div>
        <!-- /Logo -->
        <div class="card-body mt-2">
          <h4 class="mb-2">Make an Account</h4>
          <p class="mb-4">Make your experience easy and fun!</p>
          <hr>
            @if(session('link'))
            <div class="alert alert-success">
                {{session('link')}}
            </div>
            @endif
            @if(session('gagal'))
            <div class="alert alert-danger">
                {{session('gagal')}}
            </div>
            @endif
            @if(session('errror'))
            <div class="alert alert-danger">
                {{session('errror')}}
            </div>
            @endif
          <form id="formAuthentication" class="mb-3" action="{{route('actionregister')}}" method="post">
            @csrf
            <div class="form-floating form-floating-outline mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required="">
              <label for="name">Name</label>
            </div>
            <div class="form-floating form-floating-outline mb-3">
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required="">
              <label for="email">Email</label>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="password" class="form-control" name="password" placeholder="············" required="" />
                  <label for="password">Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100" type="submit">
              Sign up
            </button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{url('auth/login')}}">
              <span>Sign in</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
      <img src="{{asset('assets/img/illustrations/scissor.png')}}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block">
      <img src="{{asset('assets/img/illustrations/auth-basic-mask-light.png')}}" class="authentication-image d-none d-lg-block" alt="triangle-bg">
      <img src="{{asset('assets/img/illustrations/straightener.png')}}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block">
    </div>
  </div>
</div>
@endsection
