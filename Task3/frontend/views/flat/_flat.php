<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="post">
  <h2><?= Html::encode($model->title) ?></h2>

  <p>
      <?= Html::img($model->getUploadedFile(), [
          'alt'=>'image',
          'style' => 'width:300px;'
      ])?>
  </p>

  <p>Price: <?= HtmlPurifier::process($model->price) ?></p>

  <p>Address: <?= HtmlPurifier::process($model->address) ?></p>

  <p>Description: <?= HtmlPurifier::process($model->description) ?></p>


  <?= Html::a('Read more', ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
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
</div>