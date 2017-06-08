<?php

use app\models\Flat;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Flats';
$this->params['breadcrumbs'][] = $this->title;

$dataProvider = new ActiveDataProvider([
    'query' => Flat::find()->orderBy('id ASC'),
    'pagination' => [
        'pageSize' => 5,
    ],
]);

?>
<div class="flat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Flat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_flat',
            'options' => [
                'tag' => 'div',
                'class' => 'flat-list',
                'id' => 'flat-list',
            ],
    ]); ?>
</div>
