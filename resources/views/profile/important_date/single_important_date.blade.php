<div class="profile-single-important-date">
    <div class="profile-single-important-date-info">
        <div class="profile-single-important-date-name">
            <span class="important-date-dull">@lang('service/profile.important_date.name'): </span>
            <span class="important-date-bold">{!! $importantDate->name !!}</span>
        </div>
        <div class="profile-single-important-date-type">
            <span class="important-date-dull">@lang('service/profile.important_date.type'): </span><span>{!! $importantDate->type->title !!}</span>
        </div>
        <div class="profile-single-important-date-date">
            <span class="important-date-dull">@lang('service/profile.important_date.date'): </span><span class="important-date-dull">{!! $importantDate->important_date !!}</span>
        </div>
    </div>
{{--    <div>--}}
    <input type="checkbox"
           class="custom-checkbox checkImportantDate"
           name="confirm_term_of_conditions"
           id="checkImportantDate-{{$importantDate->id}}"
           value="{{ $importantDate->id }}"
           required>
        <label for="checkImportantDate-{{$importantDate->id}}">
        </label>
{{--    </div>--}}
{{--    <div>--}}
{{--        <input type="checkbox"--}}
{{--               class="custom-checkbox-item"--}}
{{--               id="positive-1"--}}
{{--               name="characteristics[]"--}}
{{--               value="{{ 1 }}"--}}
{{--            {{ $checkedCharacteristics->contains($characteristic->id) ? 'checked' : '' }}--}}
{{--        >--}}
{{--    </div>--}}
</div>
