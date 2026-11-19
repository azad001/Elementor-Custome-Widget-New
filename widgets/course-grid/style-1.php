<div class="courseMid">
<?php
$out = '';
$acc_q = new WP_Query(array(
    'post_type' => 'course',
    'post_status' => 'publish',
    'order' => 'ASC',
    'post__not_in' => array($settings['exclude']),
    //'posts_per_page' => $settings['posts']['size'],
)); 
$count = $acc_q->post_count;
$i = 0;
if ( $acc_q->have_posts() ) {
    while ( $acc_q->have_posts() ) {
        $acc_q->the_post();
        $i++;
        global $post;
        //$link = NEXTSITE.'course/'.$post->post_name;
		$link = '/course/'.$post->post_name;
        $crse_lessons = get_field( "crse_lessons", get_the_ID() );
        $crse_type = get_field( "crse_type", get_the_ID() );
        $crse_short_description = get_field( "crse_short_description", get_the_ID() );
        $crse_price = get_field( "crse_price", get_the_ID() );?>

            <div class="courseBox <?php if($i>=$settings['posts']['size']){
                echo 'crsbndnone';
            } ?>">
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
</div>
<?php if($settings['show_more']){?>
<div class="uts-btn center-txt">
    <a class="combtn show-more-course style-1" href="#">View more courses</a>
</div>
<style>
.elementor-widget-lio-c-grid .uts-btn{
    margin-top:40px;
}
.courseMid.show .courseBox{
    display: block;
}
.courseMid.show ~ .uts-btn{
  display:none;
}
</style>    
<?php } ?>
