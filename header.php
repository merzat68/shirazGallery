<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no" />
    <?php wp_head(); ?>
</head>

<?php if (!is_page(46)) { ?>

    <body class="main__style--all">
    <?php } else { ?>

        <body class="main__style--profile">
        <?php } ?>
        <!------------------------------ Navbar ------------------------------>
        <nav class="navbar navbar-expand-lg header__main--style">
            <div class="container">
                <a href="#"><img class="nav__logo" src="<?php echo get_theme_file_uri('/Images/logo2.png'); ?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse p-4" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('/') ?>">خانه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">دوره ها</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                گالری
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php esc_url(site_url('/about')) ?>">درباره ما</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php esc_url(site_url('/about')) ?>">رویداد ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php esc_url(site_url('/about')) ?>">اخبار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php esc_url(site_url('/about')) ?>">زبان</a>
                        </li>
                    </ul>


                    <?php if (is_user_logged_in()) { ?>
                        <a class="nav-link px-0 ms-4" href="<?php echo wp_logout_url(); ?>">
                            <span><?php echo get_avatar(get_current_user_id(), 30); ?></span>
                            <span>خروج</span>
                        </a>
                    <?php
                    } else { ?>
                        <div class=" position-relative">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ورود یا ثبت نام
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo wp_login_url(); ?>">ورود</a></li>
                                <li><a class="dropdown-item" href="<?php echo wp_registration_url(); ?>">ثبت نام</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </nav>