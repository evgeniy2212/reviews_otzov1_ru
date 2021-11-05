<div class="modal fade" id="deleteMessageModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <!-- Modal content-->
                <form action="{{ route("delete-profile-message", ":id") }}"
                      data-action="{{ route("delete-profile-message", ":id") }}"
                      id="deleteMessageForm"
                      method="post">
                    <div>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <p >{!! __('service/message.delete_confirmation', ['item' => 'mail']) !!}</p>
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
