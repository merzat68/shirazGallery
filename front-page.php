<?php
get_header();
?>
<div class="container-fluid section__style px-0 m-0">
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
    <section class="container-fluid px-5 my-9">
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
    </section>
    <!-------------------------------- Shiraz Talent Section -------------------------------->
    <section class="container-fluid px-5 pt-5 mt-19 shiraz__talent--section">
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
    <section class="container-fluid px-5 py-5 mt-19 pastCourse__section">
        <div class="mx-10 d-flex justify-content-between">
            <h6 class="text__underline">test</h6>
            <a class="pastCourse__button text-white text-decoration-none px-3 py-2" href="">مشاهده همه</a>
        </div>
        <div class="row d-flex justify-content-between mx-10 mt-5">
            <div class="col px-0">
                <div class="row pastCourse__content">
                    <div class="col-4 p-0">
                        <div class="pastCourse__image">
                            <img src="<?php echo get_theme_file_uri('Images/The Hybrid Work Model 3.jpg') ?>" alt="">
                        </div>

                    </div>
                    <div class="col-8">
                        asdasd
                    </div>
                </div>
            </div>
            <div class="col px-0 me-5">
                <div class="row pastCourse__content">
                    <div class="col-4 p-0">
                        <div class="pastCourse__image">
                            <img src="<?php echo get_theme_file_uri('Images/The Hybrid Work Model 3.jpg') ?>" alt="">
                        </div>

                    </div>
                    <div class="col-8">
                        asdasd
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="background__rectangle">
    <div class="background__rectangle--small">
    </div>
    <div class="background__rectangle--big">
    </div>
</div>

<?php
get_footer();
?>