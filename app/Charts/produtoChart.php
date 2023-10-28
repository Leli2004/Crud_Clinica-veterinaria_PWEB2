<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class produtoChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        return $this->chart->radialChart()
            ->setTitle('Produtos da Clínica')
            ->setSubtitle('Estoque disponível')
            ->addData([75, 60])
            ->setLabels(['Barcelona city', 'Madrid sports'])
            ->setColors(['#D32F2F', '#03A9F4']);
    }
}
