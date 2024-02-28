<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html as HtmlHelper;
use yii\bootstrap4\ButtonDropdown;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use cetver\LanguageSelector\items\DropDownLanguageItem;

//Yii::$app->language='ru_RU';
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php

    NavBar::begin([
        'brandLabel' => Yii::t('app','My Application'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
            ['label' => Yii::t('app','About'), 'url' => ['/site/about']],
            ['label' => Yii::t('app','Contact'), 'url' => ['/site/contact']],
            Yii::$app->user->isGuest
                ? ['label' => Yii::t('app','Login'), 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    Yii::$app->language = 'en';
    $languageItem = new DropDownLanguageItem([
        'languages' => [
            'en' => '<span class="flag-icon flag-icon-us"></span> English',
            'ru' => '<span class="flag-icon flag-icon-ru"></span> Russian',
            'kz' => '<span class="flag-icon flag-icon-kz"></span> Kazakh',
        ],
        'options' => ['encode' => false],
    ]);
    $languageItem = $languageItem->toArray();
    $languageDropdownItems = ArrayHelper::remove($languageItem, 'items');
    echo ButtonDropdown::widget([
        'label' => $languageItem['label'],
        'encodeLabel' => false,
        'options' => ['class' => 'btn-default'],
        'dropdown' => [
            'items' => $languageDropdownItems
        ]
    ]);





    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
