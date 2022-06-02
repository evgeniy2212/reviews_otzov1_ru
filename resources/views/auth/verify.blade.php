@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place d-flex flex-column justify-content-center align-items-center">
            <div class="container loginForm">
                {{--<div class="successMessage">{!! session('success') !!}</div>--}}
                <div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.fresh_verify_link') }}
                        </div>
                    @endif
                        {!! __('auth.check_verify_link') !!}
                </div>
                <div class="form-group verifyRegisterControl">
                    <div class="col-md-3">
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="loginButton">{{ __('auth.request_another') }}</button>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <a role="button" href="{{ route('home') }}" id="cancelButton">
                            @lang('service/index.close')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

