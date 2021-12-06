<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Report',
]) . $model->id_report;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Report'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_report, 'url' => ['view', 'id' => $model->id_report]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="report-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
