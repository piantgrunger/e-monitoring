<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Agenda */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Agenda'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tanggal',
            'agenda:ntext',
            'file',
        ],
    ]) ?>

</div>
