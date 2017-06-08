<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Flat */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Flats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flat-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            [
                'attribute'=>'photo',
                'value'=>$model->getUploadedFile(),
                'format' => ['image',['width'=>'300','height'=>'auto']],
            ],
            'price',
            'address',
            'description:ntext',
        ],
    ]) ?>

</div>
