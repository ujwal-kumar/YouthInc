<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrgStatus */

$this->title = Yii::t('app', 'Create Org Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Org Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
