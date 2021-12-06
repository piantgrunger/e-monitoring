<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Update Laporan: ' . $model->id_laporan;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Laporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_laporan, 'url' => ['view', 'id' => $model->id_laporan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laporan-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
