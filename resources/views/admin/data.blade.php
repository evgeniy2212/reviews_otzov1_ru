@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            <div class="adminFilterItem">
                <div>
                    {{ __('service/index.select_item', ['item' => __('service/index.year')]) }}
                </div>
                <div>
                    <select class="select admin-data-filter-select"
                            id="filter-year"
                            name="year">
                        @foreach(\App\Services\DataService::getDataYearsFilter() as $year)
                            <option value="{!! $year !!}"
                                    {{ (array_key_exists('year', $currentFilter) && $currentFilter['year'] == $year)
                                        ? 'selected'
                                        : ''}}
                            >
                                {!! $year !!}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div style="height: 100%" class="overflow-auto  d-md-flex justify-content-md-center align-items-md-stretch">
            <table class="data-table" border="1">
                <tr>
                    <th>{{ $currentFilter['year'] }}</th>
                    <th colspan="2">@lang('service/admin.users')</th>
                    <th colspan="2">@lang('service/admin.persons')</th>
                    <th colspan="2">@lang('service/admin.companies')</th>
                    <th colspan="2">@lang('service/admin.goods')</th>
                    <th colspan="2">@lang('service/admin.vacations')</th>
                    <th colspan="2">@lang('service/admin.congratulations')</th>
                </tr>
                <tr>
                    <td>@lang('service/index.month')</td>
                    <td>@lang('service/admin.quantity')</td><td>%</td>
                    <td>@lang('service/admin.quantity')</td><td>%</td>
                    <td>@lang('service/admin.quantity')</td><td>%</td>
                    <td>@lang('service/admin.quantity')</td><td>%</td>
                    <td>@lang('service/admin.quantity')</td><td>%</td>
                    <td>@lang('service/admin.quantity')</td><td>%</td>
                </tr>
                @for($i=1;$i<=12;$i++)
                    <tr>
                        <td>{{ \Carbon\Carbon::create()->month($i)->format('M') }}</td>
                        <td>+{{ $data['users'][$i]['count'] }}</td><td>+{{ $data['users'][$i]['percent'] }}</td>
                        <td>+{{ $data['persons'][$i]['count'] }}</td><td>+{{ $data['persons'][$i]['percent'] }}</td>
                        <td>+{{ $data['companies'][$i]['count'] }}</td><td>+{{ $data['companies'][$i]['percent'] }}</td>
                        <td>+{{ $data['goods'][$i]['count'] }}</td><td>+{{ $data['goods'][$i]['percent'] }}</td>
                        <td>+{{ $data['vacations'][$i]['count'] }}</td><td>+{{ $data['vacations'][$i]['percent'] }}</td>
                        <td>+{{ $data['congratulations'][$i]['count'] }}</td><td>+{{ $data['congratulations'][$i]['percent'] }}</td>
                    </tr>
                @endfor
                <tr>
                    <td>Total</td>
                    <td>{{ $data['users']['total']['total_count'] }}</td><td>+{{ $data['users']['total']['total_percent'] }}</td>
                    <td>{{ $data['persons']['total']['total_count'] }}</td><td>+{{ $data['persons']['total']['total_percent'] }}</td>
                    <td>{{ $data['companies']['total']['total_count'] }}</td><td>+{{ $data['companies']['total']['total_percent'] }}</td>
                    <td>{{ $data['goods']['total']['total_count'] }}</td><td>+{{ $data['goods']['total']['total_percent'] }}</td>
                    <td>{{ $data['vacations']['total']['total_count'] }}</td><td>+{{ $data['vacations']['total']['total_percent'] }}</td>
                    <td>{{ $data['congratulations']['total']['total_count'] }}</td><td>+{{ $data['congratulations']['total']['total_percent'] }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
