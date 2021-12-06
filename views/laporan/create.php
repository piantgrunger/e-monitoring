<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Laporan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Laporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
