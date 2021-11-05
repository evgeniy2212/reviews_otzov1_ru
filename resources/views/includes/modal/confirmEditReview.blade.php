@extends('profile.index')

@section('form_content')
    <form action="{{ route("profile-reviews.update", ":id") }}" id="editReviewForm" method="post">
        <div>
            {{ csrf_field() }}
            @method('PATCH')
            <p >{!! __('service/message.edit_confirmation_question') !!}</p>
            <p>"<span id="reviewName"></span>" @lang('service/index.review')?</p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-3">
                <button class="otherButton" type="button" data-dismiss="modal">
                    @lang('service/index.no')
                </button>
            </div>
            <div class="col-md-3">
                <button class="otherButton" id="confirmReviewButton" name="" data-dismiss="modal">
                    @lang('service/index.yes')
                </button>
            </div>
        </div>
    </form>
@endsection
