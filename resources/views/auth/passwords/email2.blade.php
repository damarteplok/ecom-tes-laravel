@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Reset Password') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('customer.password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="col-md-6 offset-md-3 text-center">{{ __('E-Mail Address') }}</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>

            <div class="form-group">
                <div class="ml-auto">
                    <a href="/" class="btn btn-primary" role="button" aria-pressed="true">Back</a>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
