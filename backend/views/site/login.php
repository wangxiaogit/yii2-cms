<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'class'=>'inline']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'captcha',['labelOptions'=>['class'=>'control-label', 'style'=>'display:block']])->widget(yii\captcha\Captcha::className(),[
                    'name'=>'captcha-img',
                    'captchaAction'=>'site/captcha',
                    'options'=>['class'=>'form-control', 'style'=>'width:50%;display:inline-block'],
                    'imageOptions'=>['id'=>'captcha-img', 'title'=>'换一个', 'style'=>'cursor:pointer;margin-left:2px;display:inline-block;'],
                    'template'=>'{input}{image}'
                ]) ?>
                <div style="clear:both"></div>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton(\Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
