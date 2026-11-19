<div id="course-carousel" class="courseMid splide">
<div class="splide__track">
<div class="splide__list">
<?php
$out = '';
$acc_q = new WP_Query(array(
    'post_type' => 'course',
    'posts_per_page' => 9,
)); 
if ( $acc_q->have_posts() ) {
    while ( $acc_q->have_posts() ) {
        global $post;
        $link = '/course/'.$post->post_name;

        $acc_q->the_post();
        $crse_lessons = get_field( "crse_lessons", get_the_ID() );
        $crse_type = get_field( "crse_type", get_the_ID() );
        $crse_short_description = get_field( "crse_short_description", get_the_ID() );
        $crse_price = get_field( "crse_price", get_the_ID() );?>

            <div class="courseBox splide__slide">
                <a class="course-card" href="<?php echo $link; ?>">
                	<header><?php the_post_thumbnail( 'full' );?></header>
                    <div class="course-card__body">
                        <span class="course-card__price"><?php echo !empty($crse_price) ? $crse_price : '$0'; ?></span>
                        <strong><?php echo the_title(); ?></strong>
                        <?php echo $crse_short_description; ?>
                    </div>
                    <footer>
                        <strong><?php echo $crse_lessons; ?></strong> <?php echo $crse_type; ?>
                    </footer>
                </a>
            </div>
    <?php }
}

?>
</div></div></div>
<style>
#course-carousel .course-card{
 background:white; 
}    
</style>
