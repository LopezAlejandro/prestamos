<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibrosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-libros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'libros_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'placeholder' => 'Titulo']) ?>

    <?= $form->field($model, 'editorial')->textInput(['maxlength' => true, 'placeholder' => 'Editorial']) ?>

    <?= $form->field($model, 'ano')->textInput(['placeholder' => 'Ano']) ?>

    <?= $form->field($model, 'edicion')->textInput(['placeholder' => 'Edicion']) ?>

    <?php /* echo $form->field($model, 'ejemplar')->textInput(['placeholder' => 'Ejemplar']) */ ?>

    <?php /* echo $form->field($model, 'nro_libro')->textInput(['placeholder' => 'Nro Libro']) */ ?>

    <?php /* echo $form->field($model, 'estado_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Estado::find()->orderBy('estado_id')->asArray()->all(), 'estado_id', 'estado_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Estado')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'deposito_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Deposito::find()->orderBy('deposito_id')->asArray()->all(), 'deposito_id', 'deposito_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Deposito')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'tipo_libro_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\TipoLibro::find()->orderBy('tipo_libro_id')->asArray()->all(), 'tipo_libro_id', 'tipo_libro_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo libro')],
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
