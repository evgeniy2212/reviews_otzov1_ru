<div class="col-12">
    <div class="profile-congratulation-user-inputs">
        <div>
            <span class="create-congratulation-label">
                @lang('service/profile.congratulation.create.category')
            </span>
        </div>
        <div class="col-12 col-md-6">
            <select class="select"
                    id="selectCategoryCongrats"
                    name="congratulation_category_id"
                    data-country="{{ old('congratulation_category_id') }}"
                    required>
                <option disabled {{ empty($congratulation) ? 'selected' : '' }}
                        value="">{{ trans('service/index.select_item', ['item' => __('service/index.category')]) }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (!empty($congratulation) && ($congratulation->congratulation_category_id == $category->id)) ? 'selected' : '' }}>{!! $category->title !!}</option>
                @endforeach
            </select>
        </div>
        <div>
            <span class="create-congratulation-label">
                @lang('service/profile.congratulation.create.status')
            </span>
        </div>
        <div class="col-12 col-md-6">
            <select class="select"
                    id="selectCongratulationStatus"
                    name="is_private"
                    data-base-url="{{ url('') }}"
                    data-country="{{ old('is_private') }}"
                    required>
                <option disabled {{ empty($congratulation) ? 'selected' : '' }}
                        value="">{{ trans('service/index.select_item', ['item' => __('service/index.status')]) }}</option>
                @foreach(\App\Models\UserCongratulation::TYPE_OF_CONGRATULATIONS as $type)
                    <option value="{{ $type['value'] }}" {{ (!empty($congratulation) && ($congratulation->is_private == $type['value'])) ? 'selected' : '' }}>{!! $type['type_name'] !!}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
