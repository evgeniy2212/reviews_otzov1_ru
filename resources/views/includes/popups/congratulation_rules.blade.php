<div id="congratulation-rules">
    <span>
        <img src="{{ App\Services\CongratsService::getCongratulationSrcByCount(0) }}" height="35px" width="30px">
        <span>@lang('service/index.congratulation.default_rating')</span>
    </span>
    <span>
        <img src="{{ App\Services\CongratsService::getCongratulationSrcByCount(\App\Models\Congratulation::FIRST_CONGRATULATION) }}" height="35px" width="30px">
        <span>@lang(trans('service/index.congratulation.need_rating', ['count' => \App\Models\Congratulation::FIRST_CONGRATULATION]))</span>
    </span>
    <span>
        <img src="{{ App\Services\CongratsService::getCongratulationSrcByCount(\App\Models\Congratulation::SECOND_CONGRATULATION) }}" height="35px" width="30px">
        <span>@lang(trans('service/index.congratulation.need_rating', ['count' => \App\Models\Congratulation::SECOND_CONGRATULATION]))</span>
    </span>
    <span>
        <img src="{{ App\Services\CongratsService::getCongratulationSrcByCount(\App\Models\Congratulation::THIRD_CONGRATULATION) }}" height="35px" width="30px">
        <span>@lang(trans('service/index.congratulation.need_rating', ['count' => \App\Models\Congratulation::THIRD_CONGRATULATION]))</span>
    </span>
    <span>
        <img src="{{ App\Services\CongratsService::getCongratulationSrcByCount(\App\Models\Congratulation::FOURTH_CONGRATULATION) }}" height="35px" width="30px">
        <span>@lang(trans('service/index.congratulation.need_rating', ['count' => \App\Models\Congratulation::FOURTH_CONGRATULATION]))</span>
    </span>
    <span>
        <img src="{{ App\Services\CongratsService::getCongratulationSrcByCount(\App\Models\Congratulation::FIFTH_CONGRATULATION) }}" height="35px" width="30px">
        <span>@lang(trans('service/index.congratulation.need_rating', ['count' => \App\Models\Congratulation::FIFTH_CONGRATULATION]))</span>
    </span>
</div>
