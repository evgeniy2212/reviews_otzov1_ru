<div class="modal fade successModalDialog" id="addPostRedirect" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span>
                @lang('service/index.header_site_name')@lang('service/index.header_site_name_dom') @lang('service/index.post_redirect')
            </span>
            <div class="d-sm-flex justify-content-center">
                <div class="col-md-5">
                    <a role="button" href="{{ route('home') }}" class="otherButton">
                        @lang('service/index.for_more_information')
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
