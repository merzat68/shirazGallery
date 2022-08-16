<?php
get_header();
?>
<div class="section__style px-0 m-0 overflow-hidden">

    <!-------------------------------- Slider Section -------------------------------->
    <section class="position-relative">
        <?php
        $today = date('Y-m-d');
        $sliderPosttype = new WP_Query(array(
            "post_type" => 'slider',
            'meta_type'     => 'DATE',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        ));
        ?>
        <div class="row justify-content-between">
            <div class="col-5 p-0">
                <div class="postSlider__caption">
                    <div class="postSlider__caption--container">
                        <div class="swiper-wrapper">
                            <?php
                            while ($sliderPosttype->have_posts()) {
                                $sliderPosttype->the_post(); ?>
                                <div class="swiper-slide">
                                    <div class="postSlider__caption--text">
                                        <h1 class="fw-bolder"><a class="text-decoration-none" href="<?php the_permalink(); ?>" target="_blank">
                                                <?php the_title(); ?>
                                            </a>
                                            </h5>
                                            <p><?php if (has_excerpt()) {
                                                    echo get_the_excerpt();
                                                } else {
                                                    echo wp_trim_words(get_the_content(), 10);
                                                } ?>
                                            </p>
                                    </div>
                                    <?php if (get_field('slider_button_text')) : ?>
                                        <a class="postSlider__caption--button" href="<?php echo get_field('slider_button_link'); ?>"><?php echo get_field('slider_button_text'); ?></a>
                                    <?php else :
                                        echo '';
                                    endif; ?>
                                </div>
                            <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                        <div class="postSlider__navigator">
                            <div class="postSlider__navigator--right">
                                <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator.png') ?>" alt=""></a>
                            </div>
                            <div class="postSlider__navigator--left">
                                <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator.png') ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="postSlider__rects">
                            <div class="postSlider__rects--big">
                            </div>
                            <div class="postSlider__rects--middle">
                            </div>
                            <div class="postSlider__rects--small">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="postSlider__markdown d-flex">
                            <div class="postSlider__markdown--container d-inline">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7 p-0">
                <div class="postSlider__thumbnail">
                    <div class="postSlider__thumbnail--frame">
                        <div class="postSlider__thumbnail--container">
                            <div class="swiper-wrapper">
                                <?php while ($sliderPosttype->have_posts()) {
                                    $sliderPosttype->the_post();
                                ?>
                                    <div class="swiper-slide">
                                        <div class="postSlider__thumbnail--image">
                                            <img class='thumbnail' src="<?php echo get_field('slider_image') ?>" alt="sample74" />
                                        </div>
                                    </div>
                                <?php
                                }
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------------- Programs and Events Section -------------------------------->
    <section class="px-5 my-9 programGoals">
        <div class="row goals__programs justify-content-center">
            <div class="col-8">
                <div class="row">
                    <div class="col-3">
                        <div class="block mt-8">
                            <img src="<?php echo wp_get_attachment_image_src(esc_attr(shiraz_get_option('shiraz_gallery_image-ru')), 'PG-icon')[0] ?>" alt="">
                            <h6>ساخت فیلم</h6>
                        </div>
                        <div class="block mt-4">
                            <img src="<?php echo wp_get_attachment_image_src(esc_attr(shiraz_get_option('shiraz_gallery_image-rd')), 'PG-icon')[0] ?>" alt="">
                            <h6>ساخت فیلم</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="block">
                            <img src="<?php echo wp_get_attachment_image_src(esc_attr(shiraz_get_option('shiraz_gallery_image-lu')), 'PG-icon')[0] ?>" alt="">
                            <h6>ساخت فیلم</h6>
                        </div>
                        <div class="block mt-4">
                            <img src="<?php echo wp_get_attachment_image_src(esc_attr(shiraz_get_option('shiraz_gallery_image-ld')), 'PG-icon')[0] ?>" alt="">
                            <h6>ساخت فیلم</h6>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="text__underline"><?php echo esc_attr(shiraz_get_option('shiraz_gallery_title')) ?></h6>
                        <p class="mt-3"><?php echo esc_attr(shiraz_get_option('shiraz_gallery_caption')) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="background__rectangle">
            <div class="background__rectangle--small">
            </div>
            <div class="background__rectangle--big">
            </div>
        </div>
    </section>

    <!-------------------------------- Shiraz Talent Section -------------------------------->
    <section class="px-5 pt-5 mt-19 shiraz__talent--section">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row">
                    <div class="col-6">
                        <div class="bg__talent">
                            <img src="<?php echo wp_get_attachment_image_src(esc_attr(shiraz_get_option('shiraz_talent_image')), 'medium')[0] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-6 position-relative pe-5">
                        <h6 class="text__underline"><?php echo esc_attr(shiraz_get_option('shiraz_talent_title')) ?></h6>
                        <p class="mt-4 mb-6"><?php echo esc_attr(shiraz_get_option('shiraz_talent_caption')) ?></p>

                        <a class="talent__button text-white text-decoration-none px-5 py-2" href="">مطالعه بیشتر</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------------- Past Courses Section -------------------------------->
    <section class="px-5 pt-5 mt-10 pastCourse">
        <div class="row d-flex justify-content-center align-items-center mb-5">
            <div class="col-8 d-flex justify-content-between p-0 pastCourse__header">
                <h6 class="text__underline">test</h6>
                <a class="text-white text-decoration-none px-3 py-2" href="">مشاهده همه</a>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="pastCourse__navigator--right">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
            <?php
            $today = date('Y-m-d');
            $coursePosttype = new WP_Query(array(
                "post_type" => 'slider',
                'meta_type'     => 'DATE',
                'orderby' => 'meta_value',
                'order' => 'ASC'
            ));
            ?>
            <div class="col-8 p-0">
                <div class="pastCourse__slider">
                    <div class="swiper-wrapper justify-content-between">
                        <?php
                        $today = date('Y-m-d');
                        $coursePosttype = new WP_Query(array(
                            "post_type" => 'course',
                            'meta_type'     => 'DATE',
                            'orderby' => 'meta_value',
                            'order' => 'ASC'
                        ));
                        ?>
                        <?php
                        while ($coursePosttype->have_posts()) {
                            $coursePosttype->the_post(); ?>
                            <div class="swiper-slide pastCourse__slider--container d-flex">
                                <div class="pastCourse__slider--images">
                                    <img src="<?php echo get_field('course_image') ?>" alt="">
                                </div>
                                <div class="pastCourse__slider--caption">
                                    <h5 class="fw-bolder"><a class="text-decoration-none" href="<?php the_permalink(); ?>" target="_blank">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
                                    <p><?php if (has_excerpt()) {
                                            echo get_the_excerpt();
                                        } else {
                                            echo wp_trim_words(get_the_content(), 10);
                                        } ?>
                                    </p>
                                    <h6><?php echo get_field('course_date') ?></h6>
                                    <h6><?php echo get_field('course_location') ?></h6>
                                </div>
                                <a class="pastCourse__slider--button" href="">جزییات</a>
                            </div>
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="pastCourse__navigator--left">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
        <div class="pastCourse__markdown d-flex justify-content-center mt-5">

        </div>
        <!-- Generator: Adobe Illustrator 26.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
        <svg class="seperator" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 48.2" style="enable-background:new 0 0 1440 48.2;" xml:space="preserve">
            <style type="text/css">
                .st0 {
                    fill: #EFEFEF;
                }
            </style>
            <path class="st0" d="M726,33.6C445,33,0,0.4,0,0.4v48.2h1440V0.4C1440,0.4,1012.4,34.2,726,33.6z" />
        </svg>
    </section>

    <!-------------------------------- Upcoming Events Section -------------------------------->
    <section class="pt-5 px-5 upcomingEvent">
        <div class="row d-flex justify-content-center upcomingEvent__header align-items-center mb-5">
            <div class="col-8 d-flex justify-content-between p-0">
                <h6 class="text__underline">test</h6>
                <a class="text-decoration-none px-3 py-2" href="">مشاهده همه</a>
            </div>
        </div>
        <div class="row d-flex justify-content-between mt-5">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="upcomingEvent__navigator--right">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
            <div class="col-8 p-0">
                <div class="upcomingEvent__slider">
                    <div class="swiper-wrapper justify-content-between">
                        <?php $eventItems = new WP_Query(array(
                            "post_type" => 'event',
                            'meta_type'     => 'DATE',
                            'orderby' => 'meta_value',
                            'order' => 'ASC'
                        ));
                        while ($eventItems->have_posts()) {
                            $eventItems->the_post();
                        ?>
                            <div class="swiper-slide upcomingEvent__slider--container d-flex flex-column">
                                <div class="upcomingEvent__slider--frame">
                                    <div class="upcomingEvent__slider--frame--container">
                                        <div class="upcomingEvent__slider--frame--image">
                                            <img src="<?php echo get_field('event_image') ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="upcomingEvent__slider--caption">
                                    <h4><?php the_title(); ?></h4>
                                    <div>
                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.17254 0.666626C3.74859 0.666626 0.149414 4.40496 0.149414 8.99996C0.149414 13.595 3.74859 17.3333 8.17254 17.3333C12.5965 17.3333 16.1957 13.595 16.1957 8.99996C16.1957 4.40496 12.5965 0.666626 8.17254 0.666626ZM10.0022 11.7337C9.88467 11.8558 9.73063 11.9166 9.57658 11.9166C9.42254 11.9166 9.2685 11.8558 9.15096 11.7337L7.14518 9.65038C7.03245 9.53288 6.96907 9.37413 6.96907 9.20829V4.62496C6.96907 4.27954 7.23825 3.99996 7.5708 3.99996C7.90336 3.99996 8.17254 4.27954 8.17254 4.62496V8.94954L10.0022 10.85C10.2369 11.0937 10.2369 11.4895 10.0022 11.7337Z" fill="#413C7E" />
                                        </svg>
                                        <h6 class="d-inline"><?php echo get_field('event_date') ?></h6>
                                    </div>
                                    <div>
                                        <svg width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.1725 0.400024C2.77571 0.400024 0.0107422 3.2719 0.0107422 6.80002C0.0107422 12.4453 5.64448 19.1781 5.88367 19.4625C5.95738 19.55 6.06118 19.6 6.1725 19.6C6.29134 19.5922 6.38762 19.55 6.46133 19.4625C6.70052 19.1735 12.3343 12.325 12.3343 6.80002C12.3343 3.2719 9.56929 0.400024 6.1725 0.400024ZM6.1725 4.80002C7.44818 4.80002 8.48316 5.87502 8.48316 7.20002C8.48316 8.52502 7.44818 9.60002 6.1725 9.60002C4.89683 9.60002 3.86184 8.52502 3.86184 7.20002C3.86184 5.87502 4.89683 4.80002 6.1725 4.80002Z" fill="#413C7E" />
                                        </svg>
                                        <h6 class="d-inline"><?php echo get_field('event_location') ?></h6>
                                    </div>
                                    <a class="upcomingEvent__slider--button" href="<?php echo get_field('event_link') ?>"><?php echo get_field('event_link_text') ?></a>
                                </div>
                            </div>
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="upcomingEvent__navigator--left">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
        <div class="upcomingEvent__markdown d-flex justify-content-center mt-5">

        </div>
    </section>

    <!-------------------------------- News & Article Section -------------------------------->
    <section class="pt-5 px-5 news">
        <div class="row d-flex justify-content-center news__header align-items-center mb-5">
            <div class="col-8 d-flex justify-content-between p-0">
                <h6 class="text__underline">test</h6>
                <a class="text-decoration-none px-3 py-2" href="">مشاهده همه</a>
            </div>
        </div>
        <div class="row d-flex justify-content-between mt-5">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="news__navigator--right">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
            <div class="col-8 p-0">
                <div class="news__slider">
                    <div class="swiper-wrapper justify-content-between">
                        <?php $newsItems = new WP_Query(array(
                            'meta_type'     => 'DATE',
                            'orderby' => 'meta_value',
                            'order' => 'ASC'
                        ));
                        while ($newsItems->have_posts()) {
                            $newsItems->the_post();
                        ?>
                            <div class="swiper-slide news__slider--container d-flex flex-column">
                                <div class="news__slider--frame">
                                    <div class="news__slider--frame--container">
                                        <div class="news__slider--frame--image">
                                            <img src="<?php echo get_field('news_image') ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="news__slider--caption">
                                    <h4 class="mb-2"><?php the_title(); ?></h4>
                                    <div>
                                        <p><?php if (has_excerpt()) {
                                                echo get_the_excerpt();
                                            } else {
                                                echo wp_trim_words(get_the_content(), 10);
                                            } ?>
                                        </p>
                                    </div>
                                    <div class="news__slider--button d-flex align-items-center">
                                        <a href="<?php the_permalink() ?>">بیشتر</a>
                                        <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.8312 4.5625C17.8312 4.24375 17.5875 4 17.2687 4H2.1L4.89375 1.20625C5.11875 0.98125 5.11875 0.625 4.89375 0.41875C4.66875 0.19375 4.3125 0.19375 4.10625 0.41875L0.35625 4.16875C0.13125 4.39375 0.13125 4.75 0.35625 4.95625L4.10625 8.70625C4.21875 8.81875 4.36875 8.875 4.5 8.875C4.63125 8.875 4.78125 8.81875 4.89375 8.70625C5.11875 8.48125 5.11875 8.125 4.89375 7.91875L2.1 5.125H17.25C17.5688 5.125 17.8312 4.88125 17.8312 4.5625Z" fill="#413C7E" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="news__navigator--left">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
        <div class="news__markdown d-flex justify-content-center mt-5">

        </div>
        <svg class="seperator" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 48.2" style="enable-background:new 0 0 1440 48.2;" xml:space="preserve">
            <style type="text/css">
                .st0 {
                    fill: #EFEFEF;
                }
            </style>
            <path class="st0" d="M726,33.6C445,33,0,0.4,0,0.4v48.2h1440V0.4C1440,0.4,1012.4,34.2,726,33.6z" />
        </svg>
    </section>


</div>
<?php
get_footer();
?>