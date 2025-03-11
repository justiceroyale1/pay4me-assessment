<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ProductStatusOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Draft', Product::where('status', 'draft')->count())
                ->icon('heroicon-o-x-circle'),
            Stat::make('Published', Product::where('status', 'published')->count())
                ->icon('heroicon-o-check-circle'),
        ];
    }
}
