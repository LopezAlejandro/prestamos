<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>


<?php
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Step 1',
            'icon' => 'glyphicon glyphicon-cloud-download',
            'content' => '<h3>Step 1</h3>This is step 1',
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'disabled'
                    ],
                 ],
             ],
        ],
        2 => [
            'title' => 'Step 2',
            'icon' => 'glyphicon glyphicon-cloud-upload',
            'content' => '<h3>Step 2</h3>This is step 2',
            'skippable' => true,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => [
                        'class' => 'enabled'
                    ],
                 ],
             ],
        ],
        3 => [
            'title' => 'Step 3',
            'icon' => 'glyphicon glyphicon-transfer',
            'content' => '<h3>Step 3</h3>This is step 3',
        ],
    ],
    'complete_content' => "You are done!", // Optional final screen
    'start_step' => 2, // Optional, start with a specific step
];
?>

<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>
