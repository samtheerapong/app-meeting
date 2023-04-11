<?php

use miloschuman\highcharts\Highcharts;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;

$this->title = 'รายงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">กราฟสรุปการจองห้องประชุม ปี 2565</h3>
        </div> <!-- end div card-header-->
        <div class="card-body">
            <?= Highcharts::widget([
                'options' => [
                    
                    'title' => ['text' => 'สรุปการจองห้องประชุม ปี 2565'],
                    'xAxis' => [
                        'gridLineWidth' => 1,
                        'categories' => [
                            'มกราคม',
                            'กุมภาพันธ์',
                            'มีนาคม',
                            'เมษายน',
                            'พฤษภาคม',
                            'มิถุนายน',
                            'กรกฎาคม',
                            'สิงหาคม',
                            'กันยายน',
                            'ตุลาคม',
                            'พฤศจิกายน',
                            'ธันวาคม',
                        ],
                    ],
                
                    'yAxis' => [
                        'title' => ['text' => 'จำนวนครั้ง'],
                    ],

                    'series' => $graph,
                ],
            ]) ?>
        </div>
    </div>
<br>

<div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">ตารางสรุปการจองห้องประชุม ปี 2565</h3>
        </div> <!-- end div card-header-->
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'summary' =>'',
                'options' => [
                    'class' => 'table-responsive'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'mid',
                    [
                        'attribute' => 'name',
                        'label' => 'ห้องประชุม',
                    ],

                    [
                        'attribute' => 'm1',
                        'label' => 'ม.ค.',
                    ],
                    [
                        'attribute' => 'm2',
                        'label' => 'ก.พ.',
                    ],
                    [
                        'attribute' => 'm3',
                        'label' => 'มี.ค.',
                    ],
                    [
                        'attribute' => 'm4',
                        'label' => 'ม.ย.',
                    ],
                    [
                        'attribute' => 'm5',
                        'label' => 'พ.ค.',
                    ],
                    [
                        'attribute' => 'm6',
                        'label' => 'มิ.ย.',
                    ],
                    [
                        'attribute' => 'm7',
                        'label' => 'ก.ค.',
                    ],
                    [
                        'attribute' => 'm8',
                        'label' => 'ส.ค.',
                    ],
                    [
                        'attribute' => 'm9',
                        'label' => 'ก.ย.',
                    ],
                    [
                        'attribute' => 'm10',
                        'label' => 'ต.ค.',
                    ],
                    [
                        'attribute' => 'm11',
                        'label' => 'พ.ย.',
                    ],
                    [
                        'attribute' => 'm12',
                        'label' => 'ธ.ค.',
                    ],
                ],
            ]) ?>
        </div>
    </div>