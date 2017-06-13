<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lectores */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="lectores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
<!--
    <?= $form->field($model, 'lectores_id')->textInput(['placeholder' => 'Lectores']) ?>
-->
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre y Apellido']) ?>
	 
	 <?= $form->field($model, 'tipo_documento_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\TipoDocumento::find()->orderBy('tipo_documento_id')->asArray()->all(), 'tipo_documento_id', 'descripcion'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo documento')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true, 'placeholder' => 'Nro de Documento']) ?>

    <?= $form->field($model, 'tipo_lector_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\TipoLector::find()->orderBy('tipo_lector_id')->asArray()->all(), 'tipo_lector_id', 'descripcion'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo lector')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true, 'placeholder' => 'Direccion']) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'Telefono']) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true, 'placeholder' => 'Mail']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
