<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Libros',
]). ' ' . $model->libros_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->libros_id, 'url' => ['view', 'id' => $model->libros_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="libros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
