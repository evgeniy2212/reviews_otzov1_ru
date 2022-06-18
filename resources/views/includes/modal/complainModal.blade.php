<div class="modal fade" id="complainModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <!-- Modal content-->
                <form action="{{ route('complain_review') }}"
                      id="complainForm"
                      method="POST">
                    <input type="hidden" name="model_id" value="1">
                    <input type="hidden" name="model_type" value="{{ \App\Models\Review::class }}">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="col-md-10">
                                <textarea name="msg"
                                          type="text"
                                          id="complain-msg"
                                          autofocus
                                          placeholder="@lang('service/index.review_complain_placeholder')"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-md-3">
                            <button class="otherButton" type="submit">
                                @lang('service/index.send')
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="otherButton" type="button" data-dismiss="modal">
                                @lang('service/index.cancel')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
