<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Room */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ตาราง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="room-view">
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
                    'confirm' => 'คุณแน่ใจหรือว่าต้องการลบรายการนี้หรือไม่?',
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
                    'name',
                    // [
                    //     'attribute' => 'name',
                    //     'format' => 'html',
                    //     'value' => function ($model) {
                    //         return '<h2><span class="badge" style="background-color:' .
                    //             $model->color .
                    //             ';"><b>' .
                    //             $model->name .
                    //             '</b></span></h2>';
                    //     },
                        
                    // ],


                    'description:ntext',
                    //'photo',
                    [
                        'attribute' => 'photo',
                        //'format' => ['image',['width'=>'350','height'=>'auto']],
                        'format' => ['image',['width'=>'auto','height'=>'350']],
                        //'format' => 'raw',
                        'inputContainer' => ['class'=>'col-sm-3'],
                        'value' => function ($model) {
                            return $model->photo;
                        },
                    ],
                    //'color',
                    [
                        'attribute' => 'color',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<h2><b><span class="badge" style="background-color:' .
                                $model->color .
                                ';">' .
                                'Hex code  : '.$model->color .
                                '</span></b></h2>';
                        },
                        
                    ],
                    
                ],
                
            ]) ?>

</div>
</div>
</div>
