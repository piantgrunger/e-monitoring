<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisKelas */

$this->title = 'Jenis Kelas Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Jenis Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-kelas-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
