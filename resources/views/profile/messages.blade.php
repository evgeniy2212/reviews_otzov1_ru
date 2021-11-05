@extends('profile.index')

@section('profile_message_content')
    <div class="profile-review-place">
        @foreach($reviews as $review)
            @include('profile.single_message')
        @endforeach
        @if($reviews->total() > $reviews->count())
            <div class="pagination-container">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>
@endsection
@section('modal_forms')
    @include('includes.modal.confirmDeleteMessage')
@endsection
