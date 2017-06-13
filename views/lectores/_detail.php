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
        'lectores_id',
        'nombre',
        'documento',
        [
            'attribute' => 'tipoLector.tipo_lector_id',
            'label' => Yii::t('app', 'Tipo Lector'),
        ],
        [
            'attribute' => 'tipoDocumento.tipo_documento_id',
            'label' => Yii::t('app', 'Tipo Documento'),
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
</div>