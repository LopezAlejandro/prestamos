<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AutorHasLibros', 
        'relID' => 'autor-has-libros', 
        'value' => \yii\helpers\Json::encode($model->autorHasLibros),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Prestamos', 
        'relID' => 'prestamos', 
        'value' => \yii\helpers\Json::encode($model->prestamos),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'libros_id')->textInput(['placeholder' => 'Libros']) ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'placeholder' => 'Titulo']) ?>

    <?= $form->field($model, 'editorial')->textInput(['maxlength' => true, 'placeholder' => 'Editorial']) ?>

    <?= $form->field($model, 'ano')->textInput(['placeholder' => 'Ano']) ?>

    <?= $form->field($model, 'edicion')->textInput(['placeholder' => 'Edicion']) ?>

    <?= $form->field($model, 'ejemplar')->textInput(['placeholder' => 'Ejemplar']) ?>

    <?= $form->field($model, 'nro_libro')->textInput(['placeholder' => 'Nro Libro']) ?>

    <?= $form->field($model, 'estado_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Estado::find()->orderBy('estado_id')->asArray()->all(), 'estado_id', 'estado_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Estado')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'deposito_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Deposito::find()->orderBy('deposito_id')->asArray()->all(), 'deposito_id', 'deposito_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Deposito')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tipo_libro_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\TipoLibro::find()->orderBy('tipo_libro_id')->asArray()->all(), 'tipo_libro_id', 'tipo_libro_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo libro')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'AutorHasLibros')),
            'content' => $this->render('_formAutorHasLibros', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->autorHasLibros),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Prestamos')),
            'content' => $this->render('_formPrestamos', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->prestamos),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
