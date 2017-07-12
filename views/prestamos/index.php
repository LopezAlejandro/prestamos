<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrestamosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Prestamos');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="prestamos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Prestamos'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
-->
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        [
         'attribute' => 'prestamos_id',
         'contentOptions' => ['style' => 'width:50px;'],
        ],  
        ['attribute' => 'extension', 'visible' => false],
        
        [
                'attribute' => 'lectores_id',
               
                'label' => Yii::t('app', 'Lectores'),
                'value' => function($model){                   
                    return $model->lectores->nombre;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Lectores::find()->asArray()->all(), 'lectores_id', 'nombre'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Lectores', 'id' => 'grid-prestamos-search-lectores_id']
        ],
        [
                'attribute' => 'lectores_id',
                'label' => Yii::t('app', 'Documento'),
                'value' => function($model){                   
                    return $model->lectores->documento;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Lectores::find()->asArray()->all(), 'lectores_id', 'documento'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Documento', 'id' => 'grid-prestamos-search-documento']
        ],
        ['attribute' => 'fecha_devolucion',
         'contentOptions' => ['style' => 'width:200px;'],
         ],
        [
		               'class'=>'kartik\grid\BooleanColumn',
		               'label' => Yii::t('app','Status'),
		               'attribute'=>'activo',
		               'vAlign'=>'middle'
		  ], 
    	  [
    			'class' => 'yii\grid\ActionColumn',
    			'header' => 'Acciones',
    			'template' => '{devolucion} {view}',
    			'urlCreator' => function($action, $model, $key, $index) { 
            							return Url::to([$action,'id'=>$key]);
    								 },
    			'buttons' => [
        				'devolucion' => function ($url, $model, $key) {
            								return Html::a('<span class="glyphicon glyphicon-copy"></span>', 
            								['devolucion', 'id'=>$model->lectores_id],
            								['title'=>'Devolucion']);
        								  },
                				[
                    				'title' => 'Devolucion',
                    				'data-pjax' => '0',
                				]
    					],
		],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prestamos']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', 
                	['create'], 
                	['class' => 'btn btn-success',
                		'title'=>Yii::t('app', 'Nuevo Préstamo') 
                	]
                ).' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', 
                	['index'], 
                	['data-pjax'=>0, 
                		'class'=>'btn btn-default', 
                		'title'=>Yii::t('kvgrid', 'Reset Grid')
                	]
                )
            ],
           '{toggleData}',
           '{export}',
        ],
    ]); ?>

</div>
