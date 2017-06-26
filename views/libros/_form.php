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
        'class' => 'PrestamosHasLibros', 
        'relID' => 'prestamos-has-libros', 
        'value' => \yii\helpers\Json::encode($model->prestamosHasLibros),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'libros_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nro_libro')->textInput(['placeholder' => 'Nro Libro']) ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'placeholder' => 'Titulo']) ?>
    
    <?= $form->field($model, 'ejemplar')->textInput(['placeholder' => 'Ejemplar']) ?>
    
    <?= $form->field($model, 'tipo_libro_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\TipoLibro::find()->orderBy('tipo_libro_id')->asArray()->all(), 'tipo_libro_id', 'descripcion'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo libro')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    
    <?= $form->field($model, 'estado_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Estado::find()->orderBy('estado_id')->asArray()->all(), 'estado_id', 'descripcion'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Estado')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    
    <?= $form->field($model, 'deposito_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Deposito::find()->orderBy('deposito_id')->asArray()->all(), 'deposito_id', 'descripcion'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Deposito')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    

    <?= $form->field($model, 'editorial')->textInput(['maxlength' => true, 'placeholder' => 'Editorial']) ?>
    
    <?= $form->field($model, 'edicion')->textInput(['placeholder' => 'Edicion']) ?>

    <?= $form->field($model, 'ano')->textInput(['placeholder' => 'Ano']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Autor(es)')),
            'content' => $this->render('_formAutorHasLibros', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->autorHasLibros),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Historial de Prestamos')),
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
		   <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?> 
		       <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		   <?php endif; ?> 
		   <?php if(Yii::$app->controller->action->id != 'create'): ?> 
		       <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?> 
		   <?php endif; ?> 
		       <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
		
		
	</div>

   <?php ActiveForm::end(); ?>

</div>
