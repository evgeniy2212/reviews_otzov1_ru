@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place">
            {!! nl2br(e(\App\Services\ServiceInfoService::getInfoValueByName('term_of_service'))) !!}
        </div>
    </div>
@endsection
