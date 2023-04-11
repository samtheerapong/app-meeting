<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div> <!-- end div card-header-->

            <div class="card-body">
                <?php $form = ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data'],
                ]); ?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <?= $form
                            ->field($model, 'equipment')
                            ->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <?= $form
                            ->field($model, 'description')
                            ->textarea(['rows' => 6]) ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                    <?= $form
                    ->field($model, 'equipment_img')
                    ->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                            //'multiple' => true
                        ],
                        'pluginOptions' => [
                            'initialPreview' => [
                                Html::img('uploads/equipment/' . $model->photo, [
                                    'class' => 'rounded mx-auto d-block',
                            'width' => '200px',
                                ])
                            ],                      
                            'language' => 'th',
                            'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                            'showPreview' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                        ],
                    ]) ?>



                    </div>
                </div>

                <div class="form-row">
                    <div class="form-footer">
                        <?= Html::submitButton('Save', [
                            'class' => 'btn btn-success',
                        ]) ?>
                    </div>
                </div>              

                <?php ActiveForm::end(); ?>
        </div> 
    </div>
</div>
