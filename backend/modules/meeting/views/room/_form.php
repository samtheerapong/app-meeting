<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;

use kartik\widgets\FileInput;

//ต้องไปเพิ่มที่ 'params' => ['bsVersion' => '5.x',]

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">
<?= \yii2mod\alert\Alert::widget() ?>
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div> <!-- end div card-header-->
    <div class="card-body">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

       
        <?= $form->field($model, 'room_img')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                //'multiple' => true
            ],
            'pluginOptions' => [
                
                'language' => 'th',
                'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                'showPreview' => true,
                'showRemove' => true,
                'showUpload' => false,
            ],
        ]) ?>
    

        <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
            'options' => ['placeholder' => 'Select color ...'],
        ]) ?>
    </div>

    <div class="card-footer">
        <div class="form-group col-md-12">
            <?= Html::submitButton('<i class="fas fa-save"></i>&nbsp บันทึก', [
                'class' => 'btn btn-success',
            ]) ?>
        </div><!-- end div form-group col-md-12-->
    </div><!-- end div card-footer -->  

    <?php ActiveForm::end(); ?>
    </div>
</div>
