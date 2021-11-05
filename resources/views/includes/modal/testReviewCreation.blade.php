<div class="modal fade successModalDialog" id="testReviewCreation" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span>
                @lang('service/message.should_loged_to_review')
            </span>
            <div class="d-sm-flex justify-content-center">
                <div class="col-md-5">
                    <a role="button" href="{{ route('login') }}" class="otherButton">
                        @lang('service/index.sign_in')
                    </a>
                </div>
                <div class="col-md-3">
                    <button class="otherButton" type="button" data-dismiss="modal">
                        @lang('service/index.cancel')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
