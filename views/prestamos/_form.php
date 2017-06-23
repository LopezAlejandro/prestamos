<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    <?= $form->field($model, 'prestamos_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <?= $form->field($model, 'nro_prestamo')->textInput(['placeholder' => 'Nro Prestamo']) ?>
<!--
    <?= $form->field($model, 'extension')->checkbox() ?>
-->
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
        'disabled'=>true, 
    ]); ?>

    <?= $form->field($model, 'lectores_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Lectores::find()->orderBy('lectores_id')->asArray()->all(), 'lectores_id', 'nombre'),
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
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Libros')),
            'content' => $this->render('_formPrestamosHasLibros', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->prestamosHasLibros),
            ]),
        ],
        
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Multas')),
            'content' => $this->render('_formMultasHasPrestamos', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->multasHasPrestamos),
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
