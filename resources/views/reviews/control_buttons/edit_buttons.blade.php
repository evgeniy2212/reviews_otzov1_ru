<div class="edit-review-buttons">
    <div class="col-md-2">
        <button data-toggle="modal"
                type="submit"
                id="editReview"
                class="loginButton submitReviewButton">
            @lang('service/index.save')
        </button>
    </div>
    <div class="col-md-2">
        <a role="button" href="{{ route('profile-reviews.index') }}" class="" id="cancelButton">
            @lang('service/index.cancel')
        </a>
    </div>
</div>
