<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\FilmCategory $model
*/

$this->title = 'Film Category ' . $model->film_id;
$this->params['breadcrumbs'][] = ['label' => 'Film Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->film_id, 'url' => ['view', 'film_id' => $model->film_id, 'category_id' => $model->category_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="film-category-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'film_id' => $model->film_id, 'category_id' => $model->category_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . '
        Film Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>


    
    <h3>
        <?= $model->film_id ?>    </h3>


    <?php $this->beginBlock('app\modules\sakila\models\FilmCategory'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    // generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'film_id',
    'value' => ($model->getFilm()->one() ? Html::a($model->getFilm()->one()->title, ['film/view', 'film_id' => $model->getFilm()->one()->film_id,]) : '<span class="label label-warning">?</span>'),
],
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'category_id',
    'value' => ($model->getCategory()->one() ? Html::a($model->getCategory()->one()->name, ['category/view', 'category_id' => $model->getCategory()->one()->category_id,]) : '<span class="label label-warning">?</span>'),
],
			'last_update',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'film_id' => $model->film_id, 'category_id' => $model->category_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> FilmCategory',
    'content' => $this->blocks['app\modules\sakila\models\FilmCategory'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>