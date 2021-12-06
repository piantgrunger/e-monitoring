<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Report */

$this->title = Yii::t('app', 'Report Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Report'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
