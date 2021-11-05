<div class="modal fade" id="shareModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <!-- Modal content-->
                <form action="{{ route('share') }}"
                      id="shareForm"
                      method="POST">
                    @csrf
                    <div>
                        <span>@lang('service/message.share')</span>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-8">
                            <input id="email"
                                   type="email"
                                   class="form-control input"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email">
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
