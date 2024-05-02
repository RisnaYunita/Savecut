@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Login -->
      <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
            @include('_partials.macros',["height"=>30])
          </a>
        </div>
        <!-- /Logo -->

        <div class="card-body mt-2">
          <h4 class="mb-2">Welcome to {{config('variables.templateName')}}! 👋</h4>
          <p class="mb-4">Please sign-in to your account</p>
          <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Oops!</b> {{session('error')}}
            </div>
            @endif
            @if(session('berhasil'))
            <div class="alert alert-success">
                {{session('berhasil')}}
            </div>
            @endif
            @if(session('changed'))
            <div class="alert alert-success">
                {{session('changed')}}
            </div>
            @endif
          <form id="formAuthentication" class="mb-3"  action="{{ route('actionlogin') }}" method="post">
          @csrf
            <div class="form-floating form-floating-outline mb-3">
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required autofocus>
              <label for="email">Email</label>
              @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="mb-3">
              <div class="form-password-toggle">
                <div class="input-group input-group-merge">
                  <div class="form-floating form-floating-outline">
                    <input type="password" id="password" class="form-control" name="password" placeholder="············" required/>
                    <label for="password">Password</label>
                  </div>
                  <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                  @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <a href="{{url('auth/forgot-password')}}" class="float-end mb-1">
                <span>Forgot Password?</span>
              </a>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New?</span>
            <a href="{{url('auth/register')}}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
      <!-- /Login -->
      <img src="{{asset('assets/img/illustrations/scissor.png')}}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block">
      <img src="{{asset('assets/img/illustrations/auth-basic-mask-light.png')}}" class="authentication-image d-none d-lg-block" alt="triangle-bg">
      <img src="{{asset('assets/img/illustrations/straightener.png')}}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block">
    </div>
  </div>
</div>
@endsection
