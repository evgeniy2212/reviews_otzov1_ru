<div class="col-12 col-lg-5 mb-2 mb-lg-0">
    <div class="d-flex align-items-center flex-grow-1 flex-wrap reviews-heading flex-lg-nowrap">
        <div style="white-space:nowrap">
            <span class="create-review-label text-center">
                @lang('service/index.review_company_name_label')
            </span>
        </div>
        <div class="mb-2 mb-sm-0">
            <input id="name"
                   type="text"
                   class="form-control input"
                   name="name"
                   minlength="3"
                   value="{{ empty($review) ? old('name') : $review->name }}"
                   placeholder="@lang('service/index.review_name_placeholder')"
                   required
                   autocomplete="name">
        </div>
        <div style="white-space:nowrap">
            <span class="create-review-label text-center">
                @lang('register.e-mail')
            </span>
        </div>
        <div>
            <input id="email"
                   type="email"
                   class="form-control input"
                   name="email"
                   value="{{ empty($review) ? old('email') : $review->email }}"
                   placeholder="@lang('service/index.review_default_placeholder')"
                   autocomplete="email">
        </div>
    </div>
</div>
<div class="col-12 col-lg-7">
    <div class="d-flex align-items-center flex-grow-1 flex-wrap flex-lg-nowrap">
        <div>
            <span class="create-review-label">
                @lang('register.country')
            </span>
        </div>
        <div class="col-md-3 mb-2 mb-md-0">
            <select class="select"
                    id="selectCountry"
                    name="country"
                    data-country="{{ old('country') }}"
                    required>
                <option disabled {{ empty($review) ? 'selected' : '' }} value="">@lang(trans('service/index.select_item', ['item' => __('service/index.country')]))</option>
                @foreach($countries as $id => $country)
                    <option value="{{ $id }}" {{ (!empty($review) && ($review->region->country_id == $id)) ? 'selected' : '' }}>{!! $country !!}</option>
                @endforeach
            </select>
        </div>
        <div>
            <span class="create-review-label" id="registerLabel">
                @lang('register.state')
            </span>
        </div>
        <div class="col-md-3 mb-2 mb-md-0">
            <select class="select required"
                    id="selectRegion"
                    name="region_id"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->region->id }}">{{ empty($review) ? trans('service/index.select_item', ['item' => __('service/index.region')]) : $review->region->region }}</option>
                <option value="1">@lang('service/index.person')</option>
                <option value="2">@lang('service/index.company')</option>
                <option value="3">@lang('service/index.goods')</option>
                <option value="3">@lang('service/index.vacations')</option>
            </select>
        </div>
        <div class="col-md-3">
            <input id="city"
                   type="text"
                   class="form-control input"
                   name="city"
                   minlength="3"
                   value="{{ empty($review) ? old('city') : $review->city }}"
                   required
                   placeholder="@lang('register.city_town')"
                   autocomplete="city">
        </div>
    </div>
</div>
