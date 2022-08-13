<?php
get_header();
?>
<div class="section__style px-0 m-0">
    <!-------------------------------- Slider Section -------------------------------->
    <section class="d-flex flex-column m-0 overflow-hidden slider__section">
        <?php
        $today = date('Y-m-d');
        $latestNewsEvents = new WP_Query(array(
            'posts_per_page' => 4,
            'meta_type'     => 'DATE',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        ));
        while ($latestNewsEvents->have_posts()) {
            $latestNewsEvents->the_post(); ?>
            <figure class="news__figure--cards d-flex m-0">
                <div class="caption">
                    <div class="rects">
                        <div class="rects--big">
                        </div>
                        <div class="rects--middle">
                        </div>
                        <div class="rects--small">
                        </div>
                    </div>
                    <div class="navigator">
                        <div class="right">
                            <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator.png') ?>" alt=""></a>
                        </div>
                        <div class="left">
                            <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator.png') ?>" alt=""></a>
                        </div>
                    </div>
                    <figcaption>
                        <h5 class="h5 fw-bolder"><a class="text-decoration-none" href="<?php the_permalink(); ?>" target="_blank">
                                <?php the_title(); ?>
                            </a>
                        </h5>
                        <p><?php if (has_excerpt()) {
                                echo get_the_excerpt();
                            } else {
                                echo wp_trim_words(get_the_content(), 10);
                            } ?>
                        </p>
                        <a class="register" href="#">ثبت نام در آکادمی</a>
                    </figcaption>
                </div>
                <?php if (get_the_post_thumbnail()) { ?>
                    <div class="thumbnail">
                        <img src="<?php echo the_post_thumbnail_url(); ?>" alt="sample74" />
                    </div>
                <?php } ?>
                <div class="markdown">

                </div>
            </figure>
        <?php
        }
        wp_reset_postdata();
        ?>
    </section>
    <!-------------------------------- Programs and Events Section -------------------------------->
    <section class="container px-5 my-9">
        <div class="row goals__programs">
            <div class="col position-relative justify-content-between ms-3 mr-10">
                <div class="row">
                    <div class="col-6">
                        <div class="block mt-8">
                            <img src="<?php echo get_theme_file_uri('Images/Vector3.svg') ?>" alt="">
                            <h6>ساخت فیلم</h6>
                        </div>
                        <div class="block mt-4">
                            <img src="<?php echo get_theme_file_uri('Images/Vector3.svg') ?>" alt="">
                            <h6>ساخت فیلم</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="block">
                            <img src="<?php echo get_theme_file_uri('Images/Vector3.svg') ?>" alt="">
                            <h6>ساخت فیلم</h6>
                        </div>
                        <div class="block mt-4">
                            <img src="<?php echo get_theme_file_uri('Images/Vector3.svg') ?>" alt="">
                            <h6>ساخت فیلم</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col me-3 ml-10">
                <h6 class="text__underline">شیراز گالری</h6>
                <p class="mt-3">ﺪﻧراد ار ﺎﻤﻨﯿﺳ یﺎﯿﻧد ﻪﺑ دورو یوزرآ ﻪﮐ ﺪﯾا‌هﺪﯾد نﺎﺘﻓاﺮﻃا رد ار یداﺮﻓا ﻢﻫ ﺎﻤﺷ ًﺎﻟﺎﻤﺘﺣا
                    ﻪﭼﺮﮔا ﻪﮐ ﺪﻨﺘﺴﻫ ﺰﯿﻧ یداﺮﻓا ،ﻦﯿﺑ ﻦﯾا رد ﺎﻣا ؛ﺪﻨﺳر‌ﯽﻤﻧ دﻮﺧ یوزرآ ﻦﯾا ﻪﺑ هﺎﮔ‌ﭻﯿﻫ ﺎﻣا
                    ‌ﺲﭘ رد ﮏﭼﻮﮐ یﺎﻫﺮﯿﺴﻣ ﺮﯿﯿﻐﺗ ﺎﺑ ﺎﻣا ﺪﻧﻮﺷ‌ﯽﻤﻧ زﺎﺳ‌لﻮﭘ ﺖﻌﻨﺻ ﻦﯾا رد رﻮﻀﺣ ﻪﺑ ﻖﻓﻮﻣ
                    .ﺪﻨﺳر‌ﯽﻣ ﺖﯿﻘﻓﻮﻣ ﻪﺑ و هدﺮﮐ ﺖﻓﺮﺸﯿﭘ ،ﻞﻏﺎﺸﻣ ﻦﯾا ی‌ﻪﻨﯿﻣز
                    ﺪﻧراد ار ﺎﻤﻨﯿﺳ یﺎﯿﻧد ﻪﺑ دورو یوزرآ ﻪﮐ ﺪﯾا‌هﺪﯾد نﺎﺘﻓاﺮﻃا رد ار یداﺮﻓا ﻢﻫ ﺎﻤﺷ ًﺎﻟﺎﻤﺘﺣا
                    ﻪﭼﺮﮔا ﻪﮐ ﺪﻨﺘﺴﻫ ﺰﯿﻧ یداﺮﻓا ،ﻦﯿﺑ ﻦﯾا رد ﺎﻣا ؛ﺪﻨﺳر‌ﯽﻤﻧ دﻮﺧ یوزرآ ﻦﯾا ﻪﺑ هﺎﮔ‌ﭻﯿﻫ ﺎﻣا
                    ‌ﺲﭘ رد ﮏﭼﻮﮐ یﺎﻫﺮﯿﺴﻣ ﺮﯿﯿﻐﺗ ﺎﺑ ﺎﻣا ﺪﻧﻮﺷ‌ﯽﻤﻧ زﺎﺳ‌لﻮﭘ ﺖﻌﻨﺻ ﻦﯾا رد رﻮﻀﺣ ﻪﺑ ﻖﻓﻮﻣ
                    .ﺪﻨﺳر‌ﯽﻣ ﺖﯿﻘﻓﻮﻣ ﻪﺑ و هدﺮﮐ ﺖﻓﺮﺸﯿﭘ ،ﻞﻏﺎﺸﻣ ﻦﯾا ی‌ﻪﻨﯿﻣز </p>
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
    <section class="container px-5 pt-5 mt-19 shiraz__talent--section">
        <div class="row">
            <div class="col mr-10 ms-3">
                <div class="bg__talent"></div>
            </div>
            <div class="col me-3 ml-10 position-relative">
                <h6 class="text__underline">test</h6>
                <p class="mt-4 mb-6">ﺪﻧراد ار ﺎﻤﻨﯿﺳ یﺎﯿﻧد ﻪﺑ دورو یوزرآ ﻪﮐ ﺪﯾا‌هﺪﯾد نﺎﺘﻓاﺮﻃا رد ار یداﺮﻓا ﻢﻫ ﺎﻤﺷ ًﺎﻟﺎﻤﺘﺣا
                    ﻪﭼﺮﮔا ﻪﮐ ﺪﻨﺘﺴﻫ ﺰﯿﻧ یداﺮﻓا ،ﻦﯿﺑ ﻦﯾا رد ﺎﻣا ؛ﺪﻨﺳر‌ﯽﻤﻧ دﻮﺧ یوزرآ ﻦﯾا ﻪﺑ هﺎﮔ‌ﭻﯿﻫ ﺎﻣا
                    ‌ﺲﭘ رد ﮏﭼﻮﮐ یﺎﻫﺮﯿﺴﻣ ﺮﯿﯿﻐﺗ ﺎﺑ ﺎﻣا ﺪﻧﻮﺷ‌ﯽﻤﻧ زﺎﺳ‌لﻮﭘ ﺖﻌﻨﺻ ﻦﯾا رد رﻮﻀﺣ ﻪﺑ ﻖﻓﻮﻣ
                    .ﺪﻨﺳر‌ﯽﻣ ﺖﯿﻘﻓﻮﻣ ﻪﺑ و هدﺮﮐ ﺖﻓﺮﺸﯿﭘ ،ﻞﻏﺎﺸﻣ ﻦﯾا ی‌ﻪﻨﯿﻣز
                    ﺪﻧراد ار ﺎﻤﻨﯿﺳ یﺎﯿﻧد ﻪﺑ دورو یوزرآ ﻪﮐ ﺪﯾا‌هﺪﯾد نﺎﺘﻓاﺮﻃا رد ار یداﺮﻓا ﻢﻫ ﺎﻤﺷ ًﺎﻟﺎﻤﺘﺣا
                    ﻪﭼﺮﮔا ﻪﮐ ﺪﻨﺘﺴﻫ ﺰﯿﻧ یداﺮﻓا ،ﻦﯿﺑ ﻦﯾا رد ﺎﻣا ؛ﺪﻨﺳر‌ﯽﻤﻧ دﻮﺧ یوزرآ ﻦﯾا ﻪﺑ هﺎﮔ‌ﭻﯿﻫ ﺎﻣا
                    ‌ﺲﭘ رد ﮏﭼﻮﮐ یﺎﻫﺮﯿﺴﻣ ﺮﯿﯿﻐﺗ ﺎﺑ ﺎﻣا ﺪﻧﻮﺷ‌ﯽﻤﻧ زﺎﺳ‌لﻮﭘ ﺖﻌﻨﺻ ﻦﯾا رد رﻮﻀﺣ ﻪﺑ ﻖﻓﻮﻣ
                    .ﺪﻨﺳر‌ﯽﻣ ﺖﯿﻘﻓﻮﻣ ﻪﺑ و هدﺮﮐ ﺖﻓﺮﺸﯿﭘ ،ﻞﻏﺎﺸﻣ ﻦﯾا ی‌ﻪﻨﯿﻣز </p>

                <a class="talent__button text-white text-decoration-none px-5 py-2" href="">مطالعه بیشتر</a>

            </div>
        </div>
    </section>
    <!-------------------------------- Past Courses Section -------------------------------->
    <section class="px-5 py-5 mt-10 pastCourse">
        <div class="row d-flex justify-content-center pastCourse__header align-items-center mb-5">
            <div class="col-2">

            </div>
            <div class="col-8 d-flex justify-content-between p-0">
                <h6 class="text__underline">test</h6>
                <a class="text-white text-decoration-none px-3 py-2" href="">مشاهده همه</a>
            </div>
            <div class="col-2">

            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="pastCourse__navigator--right">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
            <div class="col-8">
                <div class="row justify-content-between gx-5">
                    <div class="col-6">
                        <div class="row pastCourse__items">
                            <div class="col-5 p-0">
                                <div class="pastCourse__items--images">
                                    <img src="<?php echo get_theme_file_uri('Images/The Hybrid Work Model 3.jpg') ?>" alt="">
                                </div>
                            </div>
                            <div class="col-7 p-2">
                                <div class="pastCourse__items--title">
                                    <h6>title</h6>
                                </div>
                                <div class="pastCourse__items--text">
                                    <p>the code is correct and good
                                        you must debug it after complete it
                                    </p>
                                </div>
                                <div class="pastCourse__items--details">
                                    <i class=""></i>
                                    <p>salam</p>
                                    <i class=""></i>
                                    <p>salam</p>
                                </div>
                                <a class="pastCourse__items--button text-decoration-none px-3 py-2" href="">detalis</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row pastCourse__items">
                            <div class="col-5 p-0">
                                <div class="pastCourse__items--images">
                                    <img src="<?php echo get_theme_file_uri('Images/The Hybrid Work Model 3.jpg') ?>" alt="">
                                </div>
                            </div>
                            <div class="col-7 p-2">
                                <div class="pastCourse__items--title">
                                    <h6>title</h6>
                                </div>
                                <div class="pastCourse__items--text">
                                    <p>the code is correct and good
                                        you must debug it after complete it
                                    </p>
                                </div>
                                <div class="pastCourse__items--details">
                                    <i class=""></i>
                                    <p>salam</p>
                                    <i class=""></i>
                                    <p>salam</p>
                                </div>
                                <a class="pastCourse__items--button text-decoration-none px-3 py-2" href="">detalis</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="pastCourse__navigator--left">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5">
        <div class="incomingEvent__bg">
        </div>
    </section>
    <!-------------------------------- Upcoming Events Section -------------------------------->
    <section class="py-5 px-5 upcomingEvent">
        <div class="row d-flex justify-content-center upcomingEvent__header align-items-center mb-5">
            <div class="col-2">

            </div>
            <div class="col-8 d-flex justify-content-between p-0">
                <h6 class="text__underline">test</h6>
                <a class="text-white text-decoration-none px-3 py-2" href="">مشاهده همه</a>
            </div>
            <div class="col-2">

            </div>
        </div>
        <div class="row d-flex justify-content-between mt-5">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="upcomingEvent__navigator--right">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
            <div class="col-8 p-0">
                <div class="row justify-content-between gx-2">
                    <div class="col upcomingEvent__items mx-2">
                        <div class="upcomingEvent__items--container">
                            <div class="upcomingEvent__items--container--skew">
                                <div class="upcomingEvent__items--container--images">
                                    <img src="<?php echo get_theme_file_uri('Images/unsplash_cEbHMacdrBg.jpg') ?>" alt="">
                                </div>
                                <a href="">بزودی</a>
                            </div>
                        </div>
                        <div class="upcomingEvent__items--content">
                            <div class="upcomingEvent__items--content--title">
                                <h6>title</h6>
                            </div>
                            <div class="upcomingEvent__items--content--text">
                                <p>the code is correct and good
                                    you must debug it after complete it
                                </p>
                            </div>
                            <div class="upcomingEvent__items--content--details">
                                <i class=""></i>
                                <p>salam</p>
                                <i class=""></i>
                                <p>salam</p>
                            </div>
                        </div>
                        <a class="upcomingEvent__items--button text-decoration-none px-3 py-2" href="">detalis</a>
                    </div>
                    <div class="col upcomingEvent__items mx-2">
                        <div class="upcomingEvent__items--container">
                            <div class="upcomingEvent__items--container--skew">
                                <div class="upcomingEvent__items--container--images">
                                    <img src="<?php echo get_theme_file_uri('Images/unsplash_cEbHMacdrBg.jpg') ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="upcomingEvent__items--content">
                            <div class="upcomingEvent__items--title">
                                <h6>title</h6>
                            </div>
                            <div class="upcomingEvent__items--text">
                                <p>the code is correct and good
                                    you must debug it after complete it
                                </p>
                            </div>
                            <div class="upcomingEvent__items--details">
                                <i class=""></i>
                                <p>salam</p>
                                <i class=""></i>
                                <p>salam</p>
                            </div>
                        </div>
                        <a class="upcomingEvent__items--button text-decoration-none px-3 py-2" href="">detalis</a>
                    </div>
                    <div class="col upcomingEvent__items mx-2">
                        <div class="upcomingEvent__items--container">
                            <div class="upcomingEvent__items--container--skew">
                                <div class="upcomingEvent__items--container--images">
                                    <img src="<?php echo get_theme_file_uri('Images/unsplash_cEbHMacdrBg.jpg') ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="upcomingEvent__items--content">
                            <div class="upcomingEvent__items--title">
                                <h6>title</h6>
                            </div>
                            <div class="upcomingEvent__items--text">
                                <p>the code is correct and good
                                    you must debug it after complete it
                                </p>
                            </div>
                            <div class="upcomingEvent__items--details">
                                <i class=""></i>
                                <p>salam</p>
                                <i class=""></i>
                                <p>salam</p>
                            </div>
                        </div>
                        <a class="upcomingEvent__items--button text-decoration-none px-3 py-2" href="">detalis</a>
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="upcomingEvent__navigator--left">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <!-------------------------------- News & Article Section -------------------------------->
    <section class="py-5 px-5 news">
        <div class="row d-flex justify-content-center news__header align-items-center mb-5">
            <div class="col-2">

            </div>
            <div class="col-8 d-flex justify-content-between p-0">
                <h6 class="text__underline">test</h6>
                <a class="text-decoration-none px-3 py-2" href="">مشاهده همه</a>
            </div>
            <div class="col-2">

            </div>
        </div>
        <div class="row d-flex justify-content-between mt-5">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="news__navigator--right">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
            <div class="col-8 p-0">
                <div class="row justify-content-between gx-2">
                    <div class="col news__items mx-2">
                        <div class="news__items--container">
                            <div class="news__items--container--skew">
                                <div class="news__items--container--images">
                                    <img src="<?php echo get_theme_file_uri('Images/unsplash_cEbHMacdrBg.jpg') ?>" alt="">
                                </div>
                                <a href="">بزودی</a>
                            </div>
                        </div>
                        <div class="news__items--content">
                            <div class="news__items--content--title">
                                <h6>title</h6>
                            </div>
                            <div class="news__items--content--text">
                                <p>the code is correct and good
                                    you must debug it after complete it
                                </p>
                            </div>
                            <div class="news__items--content--details">
                                <i class=""></i>
                                <p>salam</p>
                                <i class=""></i>
                                <p>salam</p>
                            </div>
                        </div>
                        <a class="news__items--button text-decoration-none px-3 py-2" href="">detalis</a>
                    </div>
                    <div class="col news__items mx-2">
                        <div class="news__items--container">
                            <div class="news__items--container--skew">
                                <div class="news__items--container--images">
                                    <img src="<?php echo get_theme_file_uri('Images/unsplash_cEbHMacdrBg.jpg') ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="news__items--content">
                            <div class="news__items--title">
                                <h6>title</h6>
                            </div>
                            <div class="news__items--text">
                                <p>the code is correct and good
                                    you must debug it after complete it
                                </p>
                            </div>
                            <div class="news__items--details">
                                <i class=""></i>
                                <p>salam</p>
                                <i class=""></i>
                                <p>salam</p>
                            </div>
                        </div>
                        <a class="news__items--button text-decoration-none px-3 py-2" href="">detalis</a>
                    </div>
                    <div class="col news__items mx-2">
                        <div class="news__items--container">
                            <div class="news__items--container--skew">
                                <div class="news__items--container--images">
                                    <img src="<?php echo get_theme_file_uri('Images/unsplash_cEbHMacdrBg.jpg') ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="news__items--content">
                            <div class="news__items--title">
                                <h6>title</h6>
                            </div>
                            <div class="news__items--text">
                                <p>the code is correct and good
                                    you must debug it after complete it
                                </p>
                            </div>
                            <div class="news__items--details">
                                <i class=""></i>
                                <p>salam</p>
                                <i class=""></i>
                                <p>salam</p>
                            </div>
                        </div>
                        <a class="news__items--button text-decoration-none px-3 py-2" href="">detalis</a>
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="news__navigator--left">
                    <a href=""><img src="<?php echo get_theme_file_uri('./Images/navigator2.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <!-------------------------------- Footer Section -------------------------------->
    <section class="footer">
        <div class="row">
            <div class="col-5">
                <div class="footer__logo">
                    <img src="<?php echo get_theme_file_uri('./Images/shiraz-fainal02 5.png') ?>" alt="">
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="col-4">
                        <h5>Services</h5>
                        <p>test1</p>
                        <p>test1</p>
                        <p>test1</p>
                        <p>test1</p>
                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4">

                    </div>
                </div>
            </div>
        </div>
        <div class="footer__rectangle">
            <div class="footer__rectangle--small">
            </div>
            <div class="footer__rectangle--big">
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
?>