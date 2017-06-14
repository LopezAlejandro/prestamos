<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LectoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-lectores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lectores_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true, 'placeholder' => 'Documento']) ?>

    <?= $form->field($model, 'tipo_lector_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\TipoLector::find()->orderBy('tipo_lector_id')->asArray()->all(), 'tipo_lector_id', 'tipo_lector_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo lector')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tipo_documento_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\TipoDocumento::find()->orderBy('tipo_documento_id')->asArray()->all(), 'tipo_documento_id', 'tipo_documento_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo documento')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php /* echo $form->field($model, 'direccion')->textInput(['maxlength' => true, 'placeholder' => 'Direccion']) */ ?>

    <?php /* echo $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'Telefono']) */ ?>

    <?php /* echo $form->field($model, 'mail')->textInput(['maxlength' => true, 'placeholder' => 'Mail']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
