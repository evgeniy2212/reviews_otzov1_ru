@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place">
            <div class="col-md-3" style="width: 200px">
                <a type="button"
                   class="otherButton"
                   href="{{ asset('files/reviews4info.zip') }}"
                   download="reviews4info">@lang('service/index.upload_shortcut')</a>
            </div>
            <div class="col-md-12">
                <ul id="shortcutInstructionModal">
                    <li>
                        <span class="shortcut">@lang('service/instructions.safari.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.safari.open')</li>
                            <li>@lang('service/instructions.safari.navigate')<a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>.</li>
                            <li>@lang('service/instructions.safari.share')</li>
                            <li>@lang('service/instructions.safari.add_home')</li>
                            <li>@lang('service/instructions.safari.next_page')</li>
                        </ol>
                    </li>
                    <li>
                        <span class="shortcut">@lang('service/instructions.chrome.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.chrome.open')</li>
                            <li>@lang('service/instructions.chrome.select')</li>
                            <li>@lang('service/instructions.chrome.locale')</li>
                            <li>@lang('service/instructions.chrome.click')</li>
                        </ol>
                    </li>
                    <li>
                        <span class="shortcut">@lang('service/instructions.ipad.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.ipad.open')</li>
                            <li>@lang('service/instructions.ipad.navigate')<a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>.</li>
                            <li>@lang('service/instructions.ipad.tap')</li>
                            <li>@lang('service/instructions.ipad.home_screen')</li>
                            <li>@lang('service/instructions.ipad.option')</li>
                        </ol>
                    </li>
                    <li>
                        <span class="shortcut">@lang('service/instructions.android.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.android.launch')</li>
                            <li>@lang('service/instructions.android.navigate')<a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>.</li>
                            <li>@lang('service/instructions.android.tap')</li>
                            <li>@lang('service/instructions.android.enter_name')</li>
                        </ol>
                    </li>
                    <li>
                        <span class="shortcut">@lang('service/instructions.chromebook.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.chromebook.launch')</li>
                            <li>@lang('service/instructions.chromebook.navigate')<a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>.</li>
                            <li>@lang('service/instructions.chromebook.tap')</li>
                            <li>@lang('service/instructions.chromebook.go_to')</li>
                            <li>@lang('service/instructions.chromebook.click')</li>
                            <li>@lang('service/instructions.chromebook.name')</li>
                            <li>@lang('service/instructions.chromebook.create')</li>
                        </ol>
                    </li>
                    <li>
                        <span class="shortcut">@lang('service/instructions.windows_10.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.windows_10.open')</li>
                            <li>@lang('service/instructions.windows_10.navigate')<a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>.</li>
                            <li>@lang('service/instructions.windows_10.webpage')</li>
                            <li>@lang('service/instructions.windows_10.context')</li>
                            <li>@lang('service/instructions.windows_10.dialogue')</li>
                        </ol>
                    </li>
                    <li>
                        <span class="shortcut">@lang('service/instructions.windows_8.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.windows_8.open')</li>
                            <li>@lang('service/instructions.windows_8.navigate')<a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>.</li>
                            <li>@lang('service/instructions.windows_8.tap')</li>
                            <li>@lang('service/instructions.windows_8.more')</li>
                            <li>@lang('service/instructions.windows_8.click')</li>
                            <li>@lang('service/instructions.windows_8.name')</li>
                            <li>@lang('service/instructions.windows_8.create')</li>
                        </ol>
                    </li>
                    <li>
                        <span class="shortcut">@lang('service/instructions.windows_8_pc.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.windows_8_pc.right_click')</li>
                            <li>@lang('service/instructions.windows_8_pc.enter')"{{ env('APP_NAME') }}"</li>
                            <li>@lang('service/instructions.windows_8_pc.next')</li>
                            <li>@lang('service/instructions.windows_8_pc.name')</li>
                            <li>@lang('service/instructions.windows_8_pc.click')</li>
                        </ol>
                    </li>
                    <li>
                        <span class="shortcut">@lang('service/instructions.windows_7_pc.title')</span>
                        <ol style="display: none">
                            <li>@lang('service/instructions.windows_7_pc.open')</li>
                            <li>@lang('service/instructions.windows_7_pc.enter')<a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                            <li>@lang('service/instructions.windows_7_pc.tap')</li>
                            <li>@lang('service/instructions.windows_7_pc.go_to')</li>
                            <li>@lang('service/instructions.windows_7_pc.shortcut')</li>
                            <li>@lang('service/instructions.windows_7_pc.name')</li>
                            <li>@lang('service/instructions.windows_7_pc.click')</li>
                        </ol>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
