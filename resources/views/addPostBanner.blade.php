@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place">
            {!! \App\Services\ServiceInfoService::getInfoValueByName('privacy_policy') !!}
        </div>
    </div>
@endsection
