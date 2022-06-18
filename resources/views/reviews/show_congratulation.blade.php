@extends('layouts.app')

@section('modal_forms')
    @include('includes.modal.complainModal')
@endsection

@section('content')
    <div class="container">
        <div class="content-place">
            <div class="review-items">
                @forelse($reviews as $review)
                    @include('reviews.single_congratulation')
                @empty
                    <span>@lang('service/index.reviews.you_dont_have')</span>
                @endforelse
            </div>
        </div>
    </div>
@endsection
