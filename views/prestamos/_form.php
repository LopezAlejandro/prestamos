<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'MultasHasPrestamos', 
        'relID' => 'multas-has-prestamos', 
        'value' => \yii\helpers\Json::encode($model->multasHasPrestamos),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PrestamosHasLibros', 
        'relID' => 'prestamos-has-libros', 
        'value' => \yii\helpers\Json::encode($model->prestamosHasLibros),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="prestamos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
<!--
    <?= $form->field($model, 'prestamos_id')->textInput(['placeholder' => 'Prestamos']) ?>
-->
    <?= $form->field($model, 'extension', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'fecha_devolucion')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'disabled'=>true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Fecha Devolucion'),
                'autoclose' => true,
            ],
            
        ],
    ]); ?>

    <?= $form->field($model, 'lectores_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Lectores::find()->orderBy('lectores_id')->asArray()->all(), 'lectores_id', 'documento'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Lectores')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

<!--
    <?= $form->field($model, 'activo')->checkbox() ?>
-->
    <?php
    $forms = [
//        [
//            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'MultasHasPrestamos')),
//            'content' => $this->render('_formMultasHasPrestamos', [
//                'row' => \yii\helpers\ArrayHelper::toArray($model->multasHasPrestamos),
//           ]),
//        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Libros')),
            'content' => $this->render('_formPrestamosHasLibros', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->prestamosHasLibros),
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
