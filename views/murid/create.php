<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Murid */

$this->title = 'Murid Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Murid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
