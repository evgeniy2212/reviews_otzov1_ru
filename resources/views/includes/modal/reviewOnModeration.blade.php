<div class="modal fade successModalDialog" id="reviewModerationModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span>
                {{ __('service/index.thank_you_for', ['item' => 'review']) }}
            </span>
            <span>
                @lang('service/message.review_on_moderation')
            </span>
            <span>
                @lang('service/index.header_site_name')@lang('service/index.header_site_name_dom') @lang('service/index.team').
            </span>
            <div class="d-flex justify-content-center">
                <div class="col-md-3">
                    <button class="otherButton" type="button" data-dismiss="modal">
                        @lang('service/index.cancel')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->has('review_moderation'))
    <script>
        $(document).ready(function() {
            $('#reviewModerationModal').modal();
        });
    </script>
@endif
