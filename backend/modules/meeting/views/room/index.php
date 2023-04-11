<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView; //  Install ---> composer require kartik-v/yii2-grid "*"
use yii\helpers\ArrayHelper;
use backend\modules\meeting\models\Room;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\meeting\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ห้องประชุม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">
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
                    'name',
                    //'description:ntext',
                    //'photo',
                    [
                        'attribute' => 'photo',
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::img('uploads/room/' . $model->photo, [
                                'class' => 'thumbnail',
                                'width' => '50px',
                            ]);
                        },
                    ],

                    //'color',
                    [
                        'attribute' => 'color',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' .
                                $model->color .
                                ';"><b>' .
                                $model->color .
                                '</b></span>';
                            //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                        },
                        'filter' => Html::activeDropDownList(
                            $searchModel,
                            'id',
                            ArrayHelper::map(
                                Room::find()->all(),
                                'id',
                                'color'
                            ),
                            [
                                'class' => 'form-control',
                                'prompt' => 'ทั้งหมด...',
                            ]
                        ),
                    ],

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
