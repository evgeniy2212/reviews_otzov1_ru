<div class="modal fade" id="deleteLogoModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <!-- Modal content-->
                <form action="{{ route("admin.delete_logo", ':id') }}"
                      data-action="{{ route("admin.delete_logo", ':id') }}"
                      id="deleteLogoForm"
                      method="post">
                    <div>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <p >{!! ('service/message.delete_confirmation_question') !!}</p>
                        <p>"<span id="reviewName"></span>" {!! __('service/message.delete_confirmation_same') !!} "<span id="reviewCategoryName"></span>"?</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-3">
                            <button class="otherButton" type="button" data-dismiss="modal">
                                @lang('service/index.no')
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="otherButton" type="submit">
                                @lang('service/index.yes')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
