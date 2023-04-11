<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div> <!-- end div card-header-->
            <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form
                        ->field($model, 'department')
                        ->textInput(['maxlength' => true]) ?>
                    </div>
            <div class="card-footer">
                    <?= Html::submitButton(
                        '<i class="fas fa-save"></i> บันทึก',
                        [
                            'class' => 'btn btn-success',
                        ]
                    ) ?>
            </div><!-- end div card-footer -->           
        <?php ActiveForm::end(); ?>
    </div> <!-- end div card card-info -->
</div>
