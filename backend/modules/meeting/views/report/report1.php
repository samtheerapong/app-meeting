<?php

use miloschuman\highcharts\Highcharts;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'รายงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">กราฟสรุปการจองห้องประชุม</h3>
        </div> <!-- end div card-header-->
        <div class="card-body">
        <?= Highcharts::widget([
            'options' => [
                'title' => [
                    'text' => 'สรุปการจองห้องประชุม แบ่งตามห้อง',
                    'style' => [
                        'fontFamily' => 'kanit',
                    ],
                ],

                'xAxis' => [
                    'categories' => ['จำนวน(ครั้ง)'],
                ],
                'yAxis' => [
                    'title' => [
                        'text' => 'จำนวนครั้ง',
                        'style' => [
                            'fontFamily' => 'kanit',
                        ],
                    ],
                ],
                'series' => $graph,
            ],
        ]) ?>
        </div>
    </div>

    <br>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">ตารางสรุปการจองห้องประชุม</h3>
        </div> <!-- end div card-header-->
        <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'summary' => '',
            'options' => [
                'class' => 'table-responsive',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'mid',
                [
                    'attribute' => 'name',
                    'label' => 'ห้องประชุม',
                ],

                [
                    'attribute' => 'mid',
                    'label' => 'จำนวน (ครั้ง)',
                ],
            ],
        ]) ?>
        </div>
    </div>