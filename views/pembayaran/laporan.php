
<?php

$nm_pasien = [];
foreach ($ts as $laporan){
    $nm_pasien[] = $laporan['nama_pasien'];
}

// $total = [];
// foreach ($ts as $tl){
//     $total[] = $tl['total_bayar'];
// }


?>

<?=
\dosamigos\highcharts\HighCharts::widget([
    'clientOptions' => [
        'chart' => [
            'type' => 'bar'
        ],
        'title' => [
            'text' => 'Laporan Pengunjung Pasien'
        ],
        'xAxis' => [
            'categories' => $nm_pasien
        ],
        'yAxis' => [
            'text' => [
                'Stok Obat'
            ]
        ],
        'series' => [
            ['name' => 'Masuk', 'data' => [1, 2, 4]],
            ['name' => 'Total Bayar', 'data' => [20000, 30000, 50000, 25000, 35000]]
        ]
    ]
    ]);
