<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use dosamigos\gallery\Gallery;
use dosamigos\gallery\Carousel;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Equipment */

$this->title = $model->equipment;
$this->params['breadcrumbs'][] = ['label' => 'ตาราง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-view">
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
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>
    </div> 
    <!-- end div class="button"-->


    <div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div> <!-- end div card-header-->
        <div class="card-body">
           <div class="gallery">

                        <?php $items = [
                        [
                            'url' => 'uploads/equipment/' . $model->photo,
                            'src' => 'uploads/equipment/' . $model->photo,
                            'options' => [
                                //'title' => $this->title,
                                //'class' => 'thumbnail',
                                //'width'=> "120",
                            ],
                        ],
                    ]; ?>
            </div> 




            <?= DetailView::widget([
                'model' => $model,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'attributes' => [
                    //'id',
                    'equipment',
                    'description:ntext',
                    //'photo',
                    // [
                    //     'attribute' => 'photo',
                    //     'format' => 'html',
                    //     'value' => function ($model) {
                    //         return Html::img(
                    //             'uploads/equipment/' . $model->photo,
                    //             ['class' => 'thumbnail', 'width' => '250px']
                    //         );
                    //     },
                    // ],

                    // [
                    //     'attribute' => 'photo',
                    //     'format' => 'raw',
                    //     //'inputContainer' => ['class'=>'col-sm-3'],
                    //     'value' => Gallery::widget([
                    //         'items' => $items,                        
                    //         ])
                    // ],

                    [
                        'attribute' => 'photo',
                        'format' => ['image',['width'=>'auto','height'=>'350']],                        
                        'value' => ('uploads/equipment/'. $model->photo),
                        
                    ],

                   


                ],
            ]) ?>
    </div>  <!-- end div card-body-->
    </div><!-- end div card card-success-->
</div>