<?php
get_header();
?>
<div class="container-fluid section__style px-0 m-0">
    <!-------------------------------- Slider Section -------------------------------->
    <section class="d-flex flex-column m-0">
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
                <div class="rects">
                    <div class="rectangle">
                    </div>
                    <div class="rectangle-middle">
                    </div>
                    <div class="rectangle-small">
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
                <div class="caption">
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
                    </figcaption>
                    <div class="register">
                        <a href="#">ثبت نام در آکادمی</a>
                    </div>
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
    <section class="container-fluid my-5 px-0">
        <div class="row goals__programs">
            <div class="col mx-5 position-relative">
                <div class="block">
                </div>
                <div class="block__down">
                </div>
            </div>
            <div class="col mx-5">
                <h6>test</h6>
                <div class="underline"></div>
                <p class="mt-4">ﺪﻧراد ار ﺎﻤﻨﯿﺳ یﺎﯿﻧد ﻪﺑ دورو یوزرآ ﻪﮐ ﺪﯾا‌هﺪﯾد نﺎﺘﻓاﺮﻃا رد ار یداﺮﻓا ﻢﻫ ﺎﻤﺷ ًﺎﻟﺎﻤﺘﺣا
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
    <section class="container-fluid my-5 px-0">

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