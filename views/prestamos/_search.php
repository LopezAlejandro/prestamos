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

    <?= $form->field($model, 'prestamos_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

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

    <?= $form->field($model, 'lectores_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Lectores::find()->orderBy('lectores_id')->asArray()->all(), 'lectores_id', 'lectores_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Lectores')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'activo')->checkbox() ?>

    <?php /* echo $form->field($model, 'nro_prestamo')->textInput(['placeholder' => 'Nro Prestamo']) */ ?>

    <?php /* echo $form->field($model, 'libros_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Libros::find()->orderBy('libros_id')->asArray()->all(), 'libros_id', 'libros_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Libros')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
