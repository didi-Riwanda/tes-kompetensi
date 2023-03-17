<?php

    $nm_obat = [];
    foreach($obat as $obt){
        $nm_obat[]= $obt->nama_obat;
    }

    

    $stok_obat = [];
    foreach($stok as $stk){
        $stok_obat[] = $stk['stok'];
    }
    
?>

<?= 
\dosamigos\highcharts\HighCharts::widget([
    'clientOptions' => [
        'chart' => [
            'type' => 'bar'
        ],
        'title' => [
            'text' => 'Laporan Data Stok Obat'
        ],
        'xAxis' => [
            'categories' => $nm_obat             
        ],
        'yAxis' => [
            'text' => [
                'Jadwal Kunjungan'
            ]
        ],
        'series' => [
              ['name' => 'Jumlah Kunjungan', 'data' => $stok_obat],         
        ]
    ]
    ]);
?>