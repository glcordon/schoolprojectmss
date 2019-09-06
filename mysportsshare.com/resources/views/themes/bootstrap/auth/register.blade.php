{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <form id="@if(setting('billing.card_upfront')){{ 'payment-form' }}@endif" role="form" method="POST" action="@if(setting('billing.card_upfront')){{ route('wave.register-subscribe') }}@else{{ route('register') }}@endif">

                    @if(setting('billing.card_upfront'))
                        <div class="card">
                            <div class="card-header">Select A Plan</div>

                            <div class="card-body pt-2">
                                @include('theme::partials.plans')
                            </div>
                        </div>

                    @endif

                        <div class="card mt-4">
                            @if(setting('billing.card_upfront'))
                                <div class="card-header">Profile Information</div>
                            @else
                                <div class="card-header">Register</div>
                            @endif

                                {{ csrf_field() }}

                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required @if(!setting('billing.card_upfront')){{ 'autofocus' }}@endif>

                                        @if ($errors->has('name'))
                                            <div class="text-danger" uk-alert>
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if(setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes')
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right">Username</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                            @if ($errors->has('username'))
                                                <div class="text-danger" uk-alert>
                                                    {{ $errors->first('username') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right">Email Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <div class="text-danger" uk-alert>
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>

                                        @if ($errors->has('password'))
                                            <div class="text-danger" uk-alert>
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required>

                                        @if ($errors->has('password_confirmation'))
                                            <div class="text-danger" uk-alert>
                                                {{ $errors->first('password_confirmation') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>



                                @if(!setting('billing.card_upfront'))
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <a class="uk-float-right" href="{{ route('login') }}">
                                                Already have an account? Login Here
                                            </a>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                @endif



                            </div>

                        </div><!-- .card -->


                        @if(setting('billing.card_upfront'))

                            <div class="card mt-4">

                                <div class="card-header">Billing Information</div>

                                <div class="card-body">
                                    @include('theme::partials.payment-form', ['exclude_form_el' => true])
                                    <div class="text-right pr-0">
                                        <button class="btn btn-primary" type="submit" name="button">Register</button>
                                    </div>
                                </div>
                            </div>

                        @endif

                </form>

            </div>

        </div>
    </div>
@endsection
