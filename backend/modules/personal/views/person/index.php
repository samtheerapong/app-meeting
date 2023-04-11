<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use common\models\Department;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView; //  Install ---> composer require kartik-v/yii2-grid "*"
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\personal\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">
<div class="button">
    <p>
        <?= Html::a(
            '<i class="fas fa-angle-double-right"></i> เพิ่มข้อมูล',
            ['create'],
            ['class' => 'btn btn-danger']
        ) ?>
    </p>
</div> <!-- end div button-->

  
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div> <!-- end div card-header-->

    <div class="card-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'user_id',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img('uploads/person/' . $model->photo, [
                        'class' => 'thumbnail',
                        'width' => '50px',
                    ]);
                },
            ],

            // [
            //     'attribute' => 'username',
            //     'format' => 'html',
            //     'value' => function ($model) {
            //         return $model->user->username;
            //     },
            //     'filter' => Html::activeDropDownList(
            //         $searchModel,
            //         'user_id',
            //         ArrayHelper::map(User::find()->all(), 'id', 'username'),
            //         ['class' => 'form-control', 'prompt' => 'ทั้งหมด...']
            //     ),
            // ],

            //'user.username',
            //'user.password_hash',
            //'user.email',
            'firstname',
            'lastname',
            //'photo',

            //'address:ntext',
            'tel',
            //'department_id',

            [
                'attribute' => 'department_id',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->department->department;
                    //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'department_id',
                    ArrayHelper::map(
                        Department::find()->all(),
                        'id',
                        'department'
                    ),
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
                'urlCreator' => function (
                    $action,
                    $model,
                    $key,
                    $index,
                    $column
                ) {
                    return Url::toRoute([
                        $action,
                        'user_id' => $model->user_id,
                    ]);
                },
            ],

           
        ],
    ]) ?>
        </div>  <!-- end div card-body-->

</div> <!-- end div card-info-->
</div><!-- end div meeting-index-->
