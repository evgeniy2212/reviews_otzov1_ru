<form method="POST" class="important-date-form" action="{{ route('profile-important-date.store') }}" enctype="multipart/form-data" novalidate="" id="importantDateForm">
    @csrf
    <div class="importantDateTitle">
        <span>@lang('service/profile.important_date.create.title')</span>
    </div>
    <div class="importantDateInfo">
        <input id="name"
               type="text"
               class="form-control input"
               name="name"
               minlength="3"
               value="{{ empty($importantDate) ? old('name') : $importantDate->name }}"
               placeholder="@lang('service/profile.important_date.create.person_name')"
               required
               autocomplete="name">
        <select class="select"
                id="importantDateType"
                name="important_date_type_id"
                required>
            <option disabled selected value="">@lang(trans('service/index.select_item', ['item' => __('service/index.category')]))</option>
            @foreach($importantDateTypes as $importantDateType)
                <option value="{{ $importantDateType->id }}">{!! $importantDateType->name !!}</option>
            @endforeach
        </select>
        <input type="text"
               class="form-control input datepicker"
               name="important_date_date"
               required
               placeholder="{{ __('service/index.datepicker_placeholder') }}"
               autocomplete="off">
        <span class="create-review-label">
            @lang('service/profile.important_date.create.remind_me')
        </span>
        <div class="multiselect">
            <div class="selectBox" id="selectBox">
                <select id="remindSelector">
                    <option>@lang(trans('service/index.select_item', ['item' => '']))</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div id="checkboxes">
                @foreach(\App\Models\UserImportantDate::REMIND_PERIODS as $key => $period)
                    @if($period == 0)
                        <input type="checkbox"
                               class="custom-checkbox checkImportantDate"
                               name="important_date_reminds[{{ $key }}]"
                               id="{{$key}}"
                               value="{{ $period }}">
                        <label for="{{ $key }}">
                            @lang('service/profile.important_date.create.same_day')
                        </label>
                    @elseif(($period%7) == 0)
                        <input type="checkbox"
                               class="custom-checkbox checkImportantDate"
                               name="important_date_reminds[{{ $key }}]"
                               id="{{$key}}"
                               value="{{ $period }}">
                        <label for="{{ $key }}">
                            {{ $period/7 }} @lang(trans_choice('service/profile.important_date.create.period_weeks', (($period/7) < 20 ? ($period/7) : ($period/7) % 10)))
                        </label>
                    @else
                        <input type="checkbox"
                               class="custom-checkbox checkImportantDate"
                               name="important_date_reminds[{{ $key }}]"
                               id="{{$key}}"
                               value="{{ $period }}">
                        <label for="{{ $key }}">
                            {{ $period }} @lang(trans_choice('service/profile.important_date.create.period_days', ($period < 20 ? $period : $period % 10)))
                        </label>
                    @endif
                @endforeach
                <div id="importantDateRemindsButton">
                    <button class="otherButton">
                        @lang('service/index.done')
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex w-100 align-items-center justify-content-center">
        <div class="col-12">
            <button type="submit"
                    id="importantDateButton"
                    class="otherButton submitImportantDateButton">
                @lang('service/index.save')
            </button>
        </div>
    </div>
</form>
