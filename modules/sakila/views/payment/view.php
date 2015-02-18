<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\Payment $model
*/

$this->title = 'Payment ' . $model->payment_id;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->payment_id, 'url' => ['view', 'payment_id' => $model->payment_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="payment-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'payment_id' => $model->payment_id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . '
        Payment', ['create'], ['class' => 'btn btn-success']) ?>
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
        <?= $model->payment_id ?>    </h3>


    <?php $this->beginBlock('app\modules\sakila\models\Payment'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'payment_id',
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'customer_id',
    'value' => ($model->getCustomer()->one() ? Html::a($model->getCustomer()->one()->label, ['customer/view', 'customer_id' => $model->getCustomer()->one()->customer_id,]) : '<span class="label label-warning">?</span>'),
],
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'staff_id',
    'value' => ($model->getStaff()->one() ? Html::a($model->getStaff()->one()->label, ['staff/view', 'staff_id' => $model->getStaff()->one()->staff_id,]) : '<span class="label label-warning">?</span>'),
],
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'rental_id',
    'value' => ($model->getRental()->one() ? Html::a($model->getRental()->one()->rental_id, ['rental/view', 'rental_id' => $model->getRental()->one()->rental_id,]) : '<span class="label label-warning">?</span>'),
],
			'amount',
			'payment_date',
			'last_update',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'payment_id' => $model->payment_id],
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
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Payment',
    'content' => $this->blocks['app\modules\sakila\models\Payment'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>