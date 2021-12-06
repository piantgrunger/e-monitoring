<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Absensi */

$this->title = 'Absensi Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
