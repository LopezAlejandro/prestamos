<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrestamosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-prestamos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prestamos_id')->textInput(['placeholder' => 'Prestamos']) ?>

    <?= $form->field($model, 'extension')->checkbox() ?>

    <?= $form->field($model, 'fecha_devolucion')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Fecha Devolucion'),
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'lectores_id')->textInput(['placeholder' => 'Lectores']) ?>

    <?= $form->field($model, 'libros_id')->textInput(['placeholder' => 'Libros']) ?>

    <?php /* echo $form->field($model, 'activo')->checkbox() */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
