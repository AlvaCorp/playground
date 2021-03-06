<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\modules\sakila\models\Store $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="store-form">

    <?php $form = ActiveForm::begin([
                        'id'     => 'Store',
                        'layout' => 'horizontal',
                        'enableClientValidation' => false,
                    ]
                );
    ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'manager_staff_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\modules\sakila\models\Staff::find()->all(),'staff_id','label'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'address_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\modules\sakila\models\Address::find()->all(),'address_id','address_id'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Store',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord
                            ? Yii::t('app', 'Create') : Yii::t('app', 'Save')),
                [
                    'id'    => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
            );
        ?>


        <?php ActiveForm::end(); ?>

    </div>

</div>
