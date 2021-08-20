@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('app.subscription.expired') }}</div>

                    <div class="card-body">
                        {{ __('app.subscription.expired_description') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
