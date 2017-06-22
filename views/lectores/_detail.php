<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Lectores */

?>
<div class="lectores-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->lectores_id) ?></h2>
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
</div>