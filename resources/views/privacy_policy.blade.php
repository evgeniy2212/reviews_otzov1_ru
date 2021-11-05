@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place">
            {!! nl2br(e($content)) !!}
        </div>
    </div>
@endsection
