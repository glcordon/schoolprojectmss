{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">

                                @if(setting('auth.email_or_username') && setting('auth.email_or_username') == 'username')
                                    <label for="username" class="col-sm-4 col-form-label text-md-right">Username</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <div class="text-danger">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">Email Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <div class="text-danger">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>

                                    @if ($errors->has('password'))
                                        <div class="text-danger" uk-alert>
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>

                        </form>

                    </div><!-- .card-body -->
                </div><!-- .card -->

            </div><!-- .col-md-8 -->
        </div><!-- .row -->
    </div>
@endsection
