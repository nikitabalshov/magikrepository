<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
Yii::$app->language='ru_RU';
$this->title = Yii::t('app','About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php echo Yii::t('app','This is the About page. You may modify the following file to customize its content:')?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
