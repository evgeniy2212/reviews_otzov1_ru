<div class="modal fade" id="instructionModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal content-->
            <div class="instruction-title">
                @lang('service/message.instruction_message')
            </div>
            <div class="instruction-videos">
                <div class="col-md-3 instruction-preview">
                    <div class="previewInstructionImage" style="height: 121px; background-position: center top; background-image: url('{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}'); background-size: 177px 100px;">
                        <span>{{ __('service/index.tutorial_part', ['number' => 1]) }}</span>
                    </div>
                    {{--                    <img src="{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}"--}}
                    {{--                         alt=""--}}
                    {{--                         class="previewInstructionImage">--}}
                    <a class="otherButton"
                       type="button"
                       target="_blank"
                       href="https://www.youtube.com/watch?v=Yl_FJAOcFgQ"
                       id="instruction-video2">
                        @lang('service/index.play_video')
                    </a>
                </div>
                <div class="col-md-3 instruction-preview">
                    <div class="previewInstructionImage" style="height: 121px; background-position: center top; background-image: url('{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}'); background-size: 177px 100px;">
                        <span>{{ __('service/index.tutorial_part', ['number' => 2]) }}</span>
                    </div>
{{--                    <img src="{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}"--}}
{{--                         alt=""--}}
{{--                         class="previewInstructionImage">--}}
                    <a class="otherButton"
                       type="button"
                       target="_blank"
                       href="https://www.youtube.com/watch?v=Yl_FJAOcFgQ"
                       id="instruction-video2">
                        @lang('service/index.play_video')
                    </a>
                </div>
                <div class="col-md-3 instruction-preview">
                    <div class="previewInstructionImage" style="height: 121px; background-position: center top; background-image: url('{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}'); background-size: 177px 100px;">
                        <span>{{ __('service/index.tutorial_part', ['number' => 3]) }}</span>
                    </div>
                    {{--                    <img src="{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}"--}}
                    {{--                         alt=""--}}
                    {{--                         class="previewInstructionImage">--}}
                    <a class="otherButton"
                       type="button"
                       target="_blank"
                       href="https://www.youtube.com/watch?v=Yl_FJAOcFgQ"
                       id="instruction-video2">
                        @lang('service/index.play_video')
                    </a>
                </div>
            </div>
            <div class="instruction-control">
                <div class="col-md-4">
                    <button class="otherButton" type="submit" data-dismiss="modal">
                        @lang('service/index.close')
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="otherButton"
                            type="button"
                            data-dismiss="modal"
                            id="dontShowAgainInstruction">
                        @lang('service/index.close_and_dont_show')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
