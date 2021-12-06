<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Raport */

$this->title = 'Update Raport: ' . $model->id_raport;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Raport', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_raport, 'url' => ['view', 'id' => $model->id_raport]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="raport-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
