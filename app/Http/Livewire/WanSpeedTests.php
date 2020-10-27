<?php

namespace App\Http\Livewire;

use App\Charts\WanSpeedTestsChart;
use App\Models\WanSpeedTest;
use App\Support\Livewire\ChartComponent;
use App\Support\Livewire\ChartComponentData;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class WanSpeedTests
 *
 * @package App\Http\Livewire
 */
class WanSpeedTests extends ChartComponent
{

    /**
     * @return string
     */
    protected function view(): string
    {
        return 'livewire.wan-speed-tests';
    }

    /**
     * @return string
     */
    protected function chartClass(): string
    {
        return WanSpeedTestsChart::class;
    }

    /**
     * @return \App\Support\Livewire\ChartComponentData
     */
    protected function chartData(): ChartComponentData
    {

        $wan_speed_tests = collect([
            (object) [
                'id' => 1,
                'created_at' => now(),
                'speed_down_mbps' => 8,
                'speed_up_mbps' => 10,
                'pings_ms' => 100
            ],
            (object) [
                'id' => 1,
                'created_at' => now()->subDays(4),
                'speed_down_mbps' => 1,
                'speed_up_mbps' => 4,
                'pings_ms' => 300
            ],
            (object) [
                'id' => 1,
                'created_at' => now()->subDays(6),
                'speed_down_mbps' => 9,
                'speed_up_mbps' => 11,
                'pings_ms' => 500
            ],
            (object) [
                'id' => 1,
                'created_at' => now()->subDays(8),
                'speed_down_mbps' => 20,
                'speed_up_mbps' => 25,
                'pings_ms' => 600
            ],
            (object) [
                'id' => 1,
                'created_at' => now()->subDays(11),
                'speed_down_mbps' => 30,
                'speed_up_mbps' => 35,
                'pings_ms' => 600
            ],
            (object) [
                'id' => 1,
                'created_at' => now()->subDays(13),
                'speed_down_mbps' => 20,
                'speed_up_mbps' => 15,
                'pings_ms' => 600
            ],

        ]);

        $labels = $wan_speed_tests->map(function ($wan_speed_test, $key) {
            return $wan_speed_test->created_at->format('Y-m-d H:i:s');
        });

        $datasets = new Collection([
            $wan_speed_tests->map(function ($wan_speed_test) {
                return number_format($wan_speed_test->speed_up_mbps, 2, '.', '');
            }),
            $wan_speed_tests->map(function ($wan_speed_test) {
                return number_format($wan_speed_test->speed_down_mbps, 2, '.', '');
            })
        ]);

        return (new ChartComponentData($labels, $datasets));
    }
}
