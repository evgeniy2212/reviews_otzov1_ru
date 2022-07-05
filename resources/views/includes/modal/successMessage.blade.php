<div class="modal fade successModalDialog" id="successMessage" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span id="successMessageContent" hidden></span>
            @if(session()->has('success'))
                @foreach (session()->get('success') as $message)
                    <span class="successMessageContent">{!! $message !!}</span>
                @endforeach
            @endif
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

@if(session()->has('success'))
    <script>
        $(document).ready(function() {
            $('#successMessage').modal();
        });
    </script>
@endif
