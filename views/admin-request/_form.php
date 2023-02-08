<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'img_after')->fileInput()?>


    <?= $form->field($model, 'status')->dropDownList(['Решена' => 'Решена', 'Отклонена' => 'Отклонена', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
