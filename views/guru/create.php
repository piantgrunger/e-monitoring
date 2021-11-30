<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Guru */

$this->title = 'Guru Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
