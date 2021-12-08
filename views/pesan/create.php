<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pesan */

$this->title = 'Pesan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pesan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
