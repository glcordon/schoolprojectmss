@extends('theme::layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-center">

            <form class="uk-form-stacked" id="@if(setting('billing.card_upfront')){{ 'payment-form' }}@endif" role="form" method="POST" action="@if(setting('billing.card_upfront')){{ route('wave.register-subscribe') }}@else{{ route('register') }}@endif">
                <div uk-grid>

                    <div class="uk-width-1-2@m uk-align-center">


                        <div class="uk-padding uk-box-shadow-large">
                        @if(setting('billing.card_upfront'))
                                <h2>Select A Plan</h2>

                                @include('theme::partials.plans')
                                <hr>
                        @endif

                            @if(setting('billing.card_upfront'))
                                <h2>Profile Information</h2>
                            @else
                                <h2>Register</h2>
                            @endif

                                {{ csrf_field() }}

                                <div>
                                    <label class="uk-form-label">Name</label>
                                    <input id="name" type="text" class="uk-input{{ $errors->has('name') ? ' uk-form-danger' : '' }}" name="name" value="{{ old('name') }}" required @if(!setting('billing.card_upfront')){{ 'autofocus' }}@endif>

                                    @if ($errors->has('name'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                @if(setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes')
                                    <div class="uk-margin">
                                        <label class="uk-form-label">Username</label>
                                        <input id="username" type="text" class="uk-input{{ $errors->has('username') ? ' uk-form-danger' : '' }}" name="username" value="{{ old('username') }}" required>

                                        @if ($errors->has('username'))
                                            <div class="uk-alert-danger" uk-alert>
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <div class="uk-margin">
                                    <label class="uk-form-label">Email Address</label>
                                    <input id="email" type="email" class="uk-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">Password</label>
                                    <input id="password" type="password" class="uk-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}" name="password" value="{{ old('password') }}" required>

                                    @if ($errors->has('password'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="uk-input{{ $errors->has('password_confirmation') ? ' uk-form-danger' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required>

                                    @if ($errors->has('password_confirmation'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>



                                @if(!setting('billing.card_upfront'))
                                    <div class="uk-margin">
                                        <button class="uk-button uk-button-primary" type="submit" name="button">Register</button>
                                        <a class="uk-float-right" href="{{ route('login') }}">
                                            Already have an account?
                                        </a>
                                    </div>
                                @endif




                            @if(setting('billing.card_upfront'))
                                <hr class="uk-margin-medium-top">

                                <h2>Billing Information</h2>

                                @include('theme::partials.payment-form', ['exclude_form_el' => true])
                                <button class="uk-button uk-button-primary uk-margin-medium-top uk-align-right" type="submit" name="button">Register</button>
                                <div class="uk-clearfix"></div>


                            @endif

                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection
