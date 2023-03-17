<?php

$nm_pasien = [];
foreach ($tb as $jml){
    $nm_pasien[] = $jml['total'];
}

$nm = [];
foreach ($pasien as $psn){
    $nm[] = $psn->pasien->nama_pasien;
}


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
            'categories' => $nm             
        ],
        'yAxis' => [
            'text' => [
                'Jadwal Kunjungan'
            ]
        ],
        'series' => [
              ['name' => 'Jumlah Kunjungan', 'data' => $nm_pasien],
            //['name' => 'Total Bayar', 'data' => [20000, 30000, 50000]]
           
        ]
    ]
    ]);
?>

