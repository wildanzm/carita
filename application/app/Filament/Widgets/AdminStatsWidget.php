<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\CulturalChunk;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::role('user')->count()),
            Stat::make('Total Cultural Chunks', CulturalChunk::count()),
        ];
    }

    protected function getColumns(): int
    {
        return 2;
    }
}