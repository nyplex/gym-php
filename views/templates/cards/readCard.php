<div class="card-container">
    <div class="card-top-container">
        <div class="logo-container">
            <div class="card-logo">
                <img width="80px" src="svg/card-logo.svg" alt="">
            </div>
            <div class="card-logo-shadow"></div>
            <div class="card-logo-shadow-2"></div>
        </div>
        <div class="card-bottom-container">
            <div class="card-content-container">
                <div class="card-content">
                    <h6 class="card-date"><?= $article->getPosted_date() ?></h6>
                    <h4><?= $article->getShortTitle() ?></h4>
                    <p>
                    <?= $article->getShortContent() ?>
                    </p>
                    <a href="<?= $router->url('single-article', ['slug' => $article->getSlug(), 'id' => $article->getId()]) ?>"><button class="card-button">READ</button></a>
                </div>
                <div class="card-content-shadow"></div>
                <div class="card-content-shadow-2"></div>
            </div>
        </div>
    </div>
</div>


