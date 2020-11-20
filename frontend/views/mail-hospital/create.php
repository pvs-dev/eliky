<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MailHospital */

$this->title = 'Добавить Mail Hospital';
$this->params['breadcrumbs'][] = ['label' => 'Mail Hospitals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mail-hospital-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
