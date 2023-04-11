<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\grid\GridView; //  Install ---> composer require kartik-v/yii2-grid "*"

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\meeting\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'อุปกรณ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">
<div class="button">
    <p>
        <?= Html::a(
            '<i class="fas fa-angle-double-right"></i> เพิ่มข้อมูล',
            ['create'],
            ['class' => 'btn btn-danger']
        ) ?>
    </p>
</div> <!-- end div button-->



<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div> <!-- end div card-header-->

    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                [
                    'attribute' => 'photo',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::img('uploads/equipment/' . $model->photo, [
                            'class' => 'rounded mx-auto d-block',
                            'width' => '50px',
                        ]);
                    },
                ],

                'equipment',
                'description:ntext',
                //'photo',

                [
                    'class' => 'kartik\grid\ActionColumn',
                    'options' => ['style' => 'width: 120px;'],
                    'buttonOptions' => [
                        'class' => 'btn btn-outline-primary btn btn-sm',
                    ],
                    'template' =>
                        '<div type="button" class="btn-group"> {view} &nbsp {update} &nbsp {delete}</div>',
                ],
            ],
        ]) ?>
        </div>  <!-- end div card-body-->

    </div> <!-- end div card-info-->
</div><!-- end div meeting-index-->

