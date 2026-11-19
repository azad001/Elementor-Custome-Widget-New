<?php
$out = '';
foreach ($settings['tabs'] as $a) {
    $out .= '
    <div class="thumbnailItem splide__slide">
<div class="storieBox">

                            <svg class="quotaIcon" viewBox="0 0 67 48" fill="none" aria-hidden="true" focusable="false" role="img">
                                <title>Logo</title>
                                <path d="M28.0336 0V28.0336L20.1681 48H4.84034L12.7059 28.0336H0V0H28.0336Z" fill="#EE7001"></path>
                                <path d="M66.3529 0V28.0336L58.4874 48H43.1597L51.2269 28.0336H38.3193V0H66.3529Z" fill="#EE7001"></path>
                            </svg>
                       
    <p>'.$a['quote'].'</p>
    <div class="designation">
        <div class="desigText">
            <strong>'.$a['name'].'</strong> <span>'.$a['pos'].'</span> </div>
    </div>
</div></div>   
    ';
}
?>
<div id="testimonial-carousel" class="testimonialInn splide">
    <div class="splide__track">
        <div class="splide__list">
            <?php echo $out;?>
        </div>
    </div>
</div>
<style>

</style>    