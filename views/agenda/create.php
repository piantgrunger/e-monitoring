<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Agenda */

$this->title = Yii::t('app', 'Agenda Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Agenda'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
