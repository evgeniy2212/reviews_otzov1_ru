@extends('profile.index')

@section('admin_content')
    <form class="form-horizontal" method="POST" novalidate="" id="infoPageForm" action="{{ route('admin.save_info_page') }}">
        @csrf
        <textarea name="{{ $slug }}"
                  class="form-control"
                  type="text"
                  disabled
                  required>{!! $content !!}</textarea>
        <div class="form-group d-flex justify-content-center align-items-center">
            <div class="col-md-3">
                <button type="submit" class="otherButton">
                    @lang('service/admin.save')
                </button>
            </div>
            <div class="col-md-3">
                <a role="button" class="otherButton" id="enableInputsButton" data-form="infoPageForm">
                    @lang('service/admin.edit')
                </a>
            </div>
            <div class="col-md-3">
                <a role="button" href="{{ route('admin.info_page', $slug) }}" id="cancelButton">
                    @lang('service/admin.cancel')
                </a>
            </div>
        </div>
    </form>
@endsection
