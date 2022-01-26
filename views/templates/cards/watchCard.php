<div class="card-container">
    <div class="card-top-container">
        <div class="logo-container">
            <div class="card-logo">
                <img src="svg/card-logo.svg" alt="card-logo" loading="lazy" width="100%" height="100%">
            </div>
            <div class="card-logo-shadow"></div>
            <div class="card-logo-shadow-2"></div>
        </div>
        <div class="card-bottom-container">
            <div class="card-content-container">
                <div class="card-content">
                    <h6 class="card-date"><?= $training->getPosted_date() ?></h6>
                    <h4><?= $training->getShortTitle() ?></h4>
                    <p>
                    <?= $training->getShortDescription() ?>
                    </p>
                    <div class="card-data">
                        <h6>
                            <span><?= $training->getLevel() ?></span><i class="fas fa-circle fa-xs"></i><span><?= round($training->getLength()) . "min" ?></span>
                        </h6>
                    </div>
                    <a href="<?= $router->url('single-training', ['slug' => $training->getSlug(), 'id' => $training->getId()]) ?>"><button class="card-button">WATCH</button></a>
                </div>
                <div class="card-content-shadow"></div>
                <div class="card-content-shadow-2"></div>
            </div>
        </div>
    </div>
</div>





