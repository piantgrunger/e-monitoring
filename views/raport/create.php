<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Raport */

$this->title = 'Raport Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Raport', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raport-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
