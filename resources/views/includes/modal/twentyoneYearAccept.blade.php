<div class="modal fade acceptModalDialog" id="acceptFormModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                @lang('service/message.person_old_confirm')
                <br>
                <br>
                @lang('service/message.person_old_terms')
            </div>
            <div class="d-flex justify-content-center flex-wrap">
                <div class="col-12 col-md-5">
                    <button class="otherButton" type="button" id="acceptModal">
                        @lang('service/message.person_old_confirmation')
                    </button>
                </div>
                <div class="col-12 col-md-3">
                    <button class="otherButton" type="button" data-dismiss="modal">
                        @lang('service/index.cancel')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
