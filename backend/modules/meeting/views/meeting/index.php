<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\grid\GridView; //  Install ---> composer require kartik-v/yii2-grid "*"
use yii\helpers\ArrayHelper;
use backend\modules\meeting\models\Room;
use backend\modules\meeting\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\meeting\models\MeetingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตารางการจองห้องประชุม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-index">
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
            'options' => [
                'class' => 'table-responsive'],
            'responsive' => true,
            'hover' => true,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'room_id',
                    'format' => 'html',
                    'value' => function ($model) {
                        return $model->room->name;
                    },
                    'filter' => Html::activeDropDownList(
                        $searchModel,
                        'room_id',
                        ArrayHelper::map(Room::find()->all(), 'id', 'name'),
                        ['class' => 'form-control', 'prompt' => 'ทั้งหมด...']
                    ),
                ],
                'title',
                'date_start',
                'date_end',
                [
                    'attribute' => 'user_id',
                    'format' => 'html',
                    'value' => function ($model) {
                        return $model->user->firstname .
                            ' ' .
                            $model->user->lastname;
                    },
                ],
                'quantity',
                [
                    'attribute' => 'status_id',
                    'format' => 'html',
                    'value' => function ($model) {
                        return '<span class="badge" style="background-color:' .
                            $model->status->color .
                            ';"><b>' .
                            $model->status->status .
                            '</b></span>';
                    },
                    'filter' => Html::activeDropDownList(
                        $searchModel,
                        'status_id',
                        ArrayHelper::map(Status::find()->all(), 'id', 'status'),
                        ['class' => 'form-control', 'prompt' => 'ทั้งหมด...']
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
