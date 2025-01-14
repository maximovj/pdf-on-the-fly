<?php

namespace App\Http\Controllers\Admin\Charts\Dashboard;

use App\Models\GeneratePDF;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Backpack\CRUD\app\Http\Controllers\ChartController;

/**
 * Class CountGeneratesChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CountGeneratesChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels([
            'Archivo 1',
            'Archivo 2',
            'Archivo 3',
        ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/dashboard/count-generates'));

        // OPTIONAL
        $this->chart->minimalist(false);
        $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    public function data()
    {
        $file1 = GeneratePDF::countGenerates(1);
        $file2 = GeneratePDF::countGenerates(2);
        $file3 = GeneratePDF::countGenerates(3);

        // doughnut, pie, bar, line
        $this->chart->dataset('Archivos generados', 'pie', [
                    $file1,
                    $file2,
                    $file3,
                ])
            ->color(['rgba(205, 32, 31, 1)', 'rgba(83, 205, 31, 0.64)', 'rgba(31, 191, 205, 0.64)'])
            ->backgroundColor(['rgba(205, 32, 31, 0.4)', 'rgb(191, 205, 31)', 'rgba(31, 167, 205, 0.64)']);
    }
}
