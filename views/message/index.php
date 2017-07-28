<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Send sms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Your message has been successfully sent
        </div>

    <?php endif; ?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'sms-form']); ?>

                <?= $form->field($model, 'text')->textInput(['rows' => 6, 'autofocus' => true]) ?>

                <?= $form->field($model, 'receiver') ?>



                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>


</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Text</th>
        <th>UserId</th>
        <th>Receiver</th>
        <th>Status</th>
        <th>DateSent</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($data as $key => $val) {?>
        <tr>
            <td><?= $val['id'] ?></td>
            <td><?= $val['text'] ?></td>
            <td><?= $val['userId'] ?></td>
            <td><?= $val['receiver'] ?></td>
            <td><?= $val['status'] ?></td>
            <td><?= $val['dateSent'] ?></td>
        </tr>
        <h1><?= $v ?></h1>
    <?}?>

    </tbody>
</table>
