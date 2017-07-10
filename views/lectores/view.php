<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Lectores */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lectores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectores-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Lectores').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->lectores_id],
                [
                    'class' => 'btn btn-danger btn-xs',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->lectores_id], ['class' => 'btn btn-primary btn-xs']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->lectores_id], [
                'class' => 'btn btn-danger btn-xs',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'lectores_id', 'visible' => false],
        'nombre',
        [
            'attribute' => 'tipoDocumento.descripcion',
            'label' => Yii::t('app', 'Tipo Documento'),
        ],
        'documento',
        [
            'attribute' => 'tipoLector.descripcion',
            'label' => Yii::t('app', 'Tipo Lector'),
        ],
        
        'direccion',
        'telefono',
        'mail',
        [
            'attribute' => 'estado0.descripcion',
            'label' => Yii::t('app', 'Estado'),
        ],
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
//            'extension',
            'fecha_devolucion',
            ['attribute' => 'lectores_id', 'visible' => false],
            [
		               'class'=>'kartik\grid\BooleanColumn',
		               'attribute'=>'activo',
		               'vAlign'=>'middle'
		      ], 
//            'nro_prestamo',
//            [
//                'attribute' => 'librosLibros.titulo',
//                'label' => Yii::t('app', 'Libros')
//            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPrestamos,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prestamos']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Prestamos')),
        ],
        'columns' => $gridColumnPrestamos
    ]);
}
?>
    </div>
</div>
