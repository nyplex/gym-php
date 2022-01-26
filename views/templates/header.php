<div class="header w-container">
    <img src="svg/header/logo.svg" loading="lazy" alt="" class="image-4">
    <img src="svg/header/nav-bar-background.svg" loading="lazy" alt="" class="image-5">
    <img id="menu-mobile-icon" src="svg/header/mobile-menu-icon.svg" loading="lazy" data-w-id="cd54708e-6d2f-d5b0-c22b-baca3ac22b1e" alt="" class="image-6">
    <ul id="nav-bar-mobile" role="list" class="mobile-menu">
        <li><a class="<?= $activeLinkHome ?? "" ?>" href="<?= $router->url('home') ?>">HOME</a></li>
        <li><a class="<?= $activeLinkTraining ?? "" ?>" href="<?= $router->url('training') ?>">TRAINING</a></li>
        <li><a class="<?= $activeLinkBlog ?? "" ?>" href="<?= $router->url('blog') ?>">BLOG</a></li>
        <li><a class="<?= $activeLinkBookings ?? "" ?>" href="<?= $router->url('bookings') ?>">BOOKINGS</a></li>
        <li><a class="<?= $activeLinkAccount ?? "" ?>" href="<?= $router->url('account') ?>">ACCOUNT</a></li>
        <li><a class="<?= $activeLinkLogin ?? "" ?>" href="<?= $router->url('login') ?>">LOGIN</a></li>
    </ul>
    <ul role=list class="list-desktop">
        <li><a class="<?= $activeLinkHome ?? "" ?>" href="<?= $router->url('home') ?>">HOME</a></li>
        <li><img class="nav-bar-icon" src="svg/header/nav-bar-icon.svg" alt=""></li>
        <li><a class="<?= $activeLinkTraining ?? "" ?>" href="<?= $router->url('training') ?>">TRAINING</a></li>
        <li><img class="nav-bar-icon" src="svg/header/nav-bar-icon.svg" alt=""></li>
        <li><a class="<?= $activeLinkBlog ?? "" ?>" href="<?= $router->url('blog') ?>">BLOG</a></li>
        <li><img class="nav-bar-icon" src="svg/header/nav-bar-icon.svg" alt=""></li>
        <li><a class="<?= $activeLinkBookings ?? "" ?>" href="<?= $router->url('bookings') ?>">BOOKINGS</a></li>
        <li><img class="nav-bar-icon" src="svg/header/nav-bar-icon.svg" alt=""></li>
        <li><a class="<?= $activeLinkAccount ?? "" ?>" href="<?= $router->url('account') ?>">ACCOUNT</a></li>
        <li><img class="nav-bar-icon" src="svg/header/nav-bar-icon.svg" alt=""></li>
        <li><a class="<?= $activeLinkLogin ?? "" ?>" href="<?= $router->url('login') ?>">LOGIN</a></li>
    </ul>
</div> 
<div class="container-3 w-container">
    <img src="svg/header/logo.svg" alt="LOGO" loading="lazy" class="header-desktop-logo">
    <img src="svg/header/header-image-1.png" loading="lazy" width="960"  alt="Header Image" class="header-background">
</div>
<div class="container-4 w-container">
    <img src="svg/header/header-divider.svg" loading="lazy" alt="Header Divider Image" class="header-divider">
    <h1 class="divider-heading">
        <?= $PageTitleDivider ?? "WELCOME," ?>
    </h1>
</div>