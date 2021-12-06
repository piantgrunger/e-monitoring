<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Murid */

$this->title = $model->id_murid;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Murid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a('Ubah', ['update', 'id' => $model->id_murid], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a('Hapus', ['delete', 'id' => $model->id_murid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus item ini??',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama_murid',
            'nama_walimurid',
            'alamat:ntext',
            'no_hp',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
            'username',
            'password',
        ],
    ]) ?>

</div>
