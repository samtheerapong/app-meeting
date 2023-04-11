<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use backend\modules\meeting\models\Uses;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Meeting */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ตาราง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="meeting-view">

    <?= \yii2mod\alert\Alert::widget() ?>


    <div class="button">
        <p>
            <?= Html::a(
                '<i class="fas fa-cog"></i> แก้ไข',
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-primary']
            ) ?>
            <?= Html::a(
                '<i class="fas fa-trash"></i> ลบ',
                ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' =>
                        'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]
            ) ?>
        </p>
    </div>


    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div> <!-- end div card-header-->
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [

                    //'id',
                    [
                        'attribute' => 'status_id',
                        'format' => 'html',
                        'value' =>  function ($model) {
                            return '<h2><b><span class="badge" style="background-color:' .
                                $model->status->color .
                                ';">' .
                                $model->status->status .
                                '</span></b></h2>';
                        },
                    ],
                    'title',
                    'quantity',
                    'description:ntext',
                    'date_start',
                    'date_end',
                    'created_at',
                    'updated_at',
                    'room.name',
                    [
                        'attribute' => 'user_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->user->firstname .
                                ' ' .
                                $model->user->lastname;
                        },
                    ],

                ],
            ]) ?>
        </div><!-- end div card-body-->
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',  // ปิดการโชว์ summary
                'columns' => [
                    [
                        'attribute' => 'equipment_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->equipment->equipment;
                        },
                    ],
                ],


            ]) ?>

        </div>
    </div>
</div>