<?php

namespace Panelis\Location\Panel\Resources\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Panelis\Location\Models\Country;
use Panelis\Location\Models\District;
use Panelis\Location\Models\Region;

class LocationStatsOverview extends BaseWidget
{
    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            BaseWidget\Stat::make(__('location::location.country.label'), Country::query()->count())
                ->description(__('location::location.inactive', [
                    'count' => Country::query()->whereIsActive(false)->count(),
                ])),

            BaseWidget\Stat::make(__('location::location.region.label'), Region::query()->count())
                ->description(__('location::location.inactive', [
                    'count' => Region::query()->whereIsActive(false)->count(),
                ])),

            BaseWidget\Stat::make(__('location::location.district.label'), District::query()->count())
                ->description(__('location::location.inactive', [
                    'count' => District::query()->whereIsActive(false)->count(),
                ])),
        ];
    }
}
