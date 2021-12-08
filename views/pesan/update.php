<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pesan */

$this->title = 'Update Pesan: ' . $model->id_pesan;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pesan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pesan, 'url' => ['view', 'id' => $model->id_pesan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pesan-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
