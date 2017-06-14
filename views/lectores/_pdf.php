<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Lectores */

$this->title = $model->lectores_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lectores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectores-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Lectores').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'lectores_id', 'visible' => false],
        'nombre',
        'documento',
        [
                'attribute' => 'tipoLector.tipo_lector_id',
                'label' => Yii::t('app', 'Tipo Lector')
            ],
        [
                'attribute' => 'tipoDocumento.tipo_documento_id',
                'label' => Yii::t('app', 'Tipo Documento')
            ],
        'direccion',
        'telefono',
        'mail',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerPrestamos->totalCount){
    $gridColumnPrestamos = [
        ['class' => 'yii\grid\SerialColumn'],
        'prestamos_id',
        'extension',
        'fecha_devolucion',
        ['attribute' => 'lectores_id', 'visible' => false],
        [
                'attribute' => 'libros.libros_id',
                'label' => Yii::t('app', 'Libros')
            ],
        'activo',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPrestamos,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Prestamos')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPrestamos
    ]);
}
?>
    </div>
</div>
