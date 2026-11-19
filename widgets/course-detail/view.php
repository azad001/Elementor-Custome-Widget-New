<?php 

    global $post;
    $coursid = (isset($settings['crsdtlspgid']) && !empty($settings['crsdtlspgid'])) ? $settings['crsdtlspgid'] : $post->ID;

    $crse_teacher = get_field( "crse_teacher", $coursid);
    $crse_teacher_image = get_field( "crse_teacher_image", $coursid);
    $course_cat = get_the_terms($coursid, 'course_cat');
    $crse_students = get_field( "crse_students", $coursid);
    $crse_review = get_field( "crse_review", $coursid);
    
    $courseImg = get_the_post_thumbnail_url($coursid);
    $crse_price = get_field( "crse_price", $coursid);
    $crse_lessons = get_field( "crse_lessons", $coursid);
    $crse_type = get_field( "crse_type", $coursid);
    $crse_hours = get_field( "crse_hours", $coursid);
    
    $crse_details = get_field( "crse_details", $coursid);

    $star = '<img src="'.plugin_dir_url( __FILE__ ) . 'stars.svg'.'">';
?>

<div class="criclmTop">
    <div class="criclmTopIn">
        <div class="teacher">
            <div class="teacherPic">
                <img width="60" height="60" src="<?php echo $crse_teacher_image['sizes']['thumbnail']; ?>" alt="<?php echo $crse_teacher; ?>"></img>
            </div>
            <div class="teacherTxt">
                <span>Teacher</span>
                <strong><?php echo $crse_teacher; ?></strong>
            </div>
        </div>
    </div>
    <div class="criclmTopIn">
        <span>Category</span>
        <?php if(!empty($course_cat)) : ?><strong><?php echo $course_cat[0]->name; ?></strong><?php endif; ?>
    </div>
    <div class="criclmTopIn">
        <span>Students</span>
        <strong><?php echo $crse_students; ?></strong>
    </div>
    <div class="criclmTopIn">
        <span>Review</span>
        <strong class="stars">
            <?php echo $star;?>
        </strong>
    </div>
</div>

<div class="criclmMid">
    <div id="accordion" class="criclmLft">
        <?php if(!empty($crse_details)) : ?>
            <!--<amp-accordion>-->
                <?php for($i=0; $i<count($crse_details); $i++) : ?>
                
                    <section class="accorBox" expanded>
                        <strong><?php echo '<img class="accorsign" src="'.plugin_dir_url( __FILE__ ) . 'arrow.svg'.'">'.$crse_details[$i]['crse_title']; ?></strong>
                        <div class="accorContent">
                            <?php if(!empty($crse_details[$i]['crse_content'])) : ?>
                                <ul>
                                    <?php for($c=0; $c<count($crse_details[$i]['crse_content']); $c++) : ?>
                                        <?php if($crse_details[$i]['crse_content'][$c]['crse_vdo_type'] == 'crseytube') : ?>
                                            <li class="vdoList">
                                                <?php echo '<img src="'.plugin_dir_url( __FILE__ ) . 'video.svg'.'">'.$crse_details[$i]['crse_content'][$c]['crse_content_title']; ?>
                                                <!--<button class="crseBtn" aria-label="Justify" on="tap:crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>"><?php echo $crse_details[$i]['crse_content'][$c]['crse_content_title']; ?></button>-->
                                                <!--<amp-lightbox id="crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>" layout="nodisplay">-->
                                                <!--    <div class="lightbox">-->
                                                <!--        <amp-youtube width="480" height="270" layout="responsive" data-param-modestbranding="1" data-param-rel="1" data-videoid="<?php echo $crse_details[$i]['crse_content'][$c]['crse_video_id']; ?>"></amp-youtube>-->
                                                <!--        <button aria-label="Justify" class="popClose" on="tap:crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>.close">✖</button>-->
                                                <!--    </div>-->
                                                <!--</amp-lightbox>-->
                                            </li>
                                        <?php elseif($crse_details[$i]['crse_content'][$c]['crse_vdo_type'] == 'crsevimeo') : ?>
                                            <li class="vdoList">
                                                <?php echo '<img src="'.plugin_dir_url( __FILE__ ) . 'video.svg'.'">'.$crse_details[$i]['crse_content'][$c]['crse_content_title']; ?>
                                                <!--<button class="crseBtn" aria-label="Justify" on="tap:crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>"><?php echo $crse_details[$i]['crse_content'][$c]['crse_content_title']; ?></button>-->
                                                <!--<amp-lightbox id="crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>" layout="nodisplay">-->
                                                <!--    <div class="lightbox">-->
                                                <!--        <amp-vimeo data-videoid="<?php echo $crse_details[$i]['crse_content'][$c]['crse_video_id']; ?>" layout="responsive" width="480" height="270"></amp-vimeo>-->
                                                <!--        <button aria-label="Justify" class="popClose" on="tap:crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>.close">✖</button>-->
                                                <!--    </div>-->
                                                <!--</amp-lightbox>-->
                                            </li>
                                        <?php elseif($crse_details[$i]['crse_content'][$c]['crse_vdo_type'] == 'crsefile') : ?>
                                            <li class="vdoList">
                                                <?php echo '<img src="'.plugin_dir_url( __FILE__ ) . 'video.svg'.'">'.$crse_details[$i]['crse_content'][$c]['crse_content_title']; ?>
                                                <!--<button class="crseBtn" aria-label="Justify" on="tap:crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>"><?php echo $crse_details[$i]['crse_content'][$c]['crse_content_title']; ?></button>-->
                                                <!--<amp-lightbox id="crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>" layout="nodisplay">-->
                                                <!--    <div class="lightbox">-->
                                                <!--        <amp-video width="720" height="305" layout="responsive" src="<?php echo $crse_details[$i]['crse_content'][$c]['crse_video_file']; ?>" poster="<?php echo $crse_details[$i]['crse_content'][$c]['crse_video_file']['url']; ?>" title="<?php echo $crse_details[$i]['crse_content'][$c]['crse_content_title']; ?>"></amp-video>-->
                                                <!--        <button aria-label="Justify" class="popClose" on="tap:crspopup-pr<?php echo $i; ?>ch<?php echo $c; ?>.close">✖</button>-->
                                                <!--    </div>-->
                                                <!--</amp-lightbox>-->
                                            </li>
                                        <?php elseif($crse_details[$i]['crse_content'][$c]['crse_vdo_type'] == 'crsetxt') : ?>
                                            <li class="assignList">
                                                <a href="<?php echo $crse_details[$i]['crse_content'][$c]['crse_video_file']; ?>" target="_blank"><?php echo $crse_details[$i]['crse_content'][$c]['crse_content_title']; ?></a>
                                            </li>

                                        <?php elseif($crse_details[$i]['crse_content'][$c]['crse_vdo_type'] == 'crseassignment') : ?> 

                                            <li class="assignList">
                                            <?php echo $crse_details[$i]['crse_content'][$c]['assignment']; ?>
                                            </li>

                                        <?php endif; ?>

                                    <?php endfor; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </section>
                
                <?php endfor; ?>
            <!--</amp-accordion>-->
            <?php if(count($crse_details) > 1) : ?><button class="showMore" type="button">Show more</button><?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="criclmRgt">
            <div class="criclmBanner">
                <img width="432" height="241" src="<?php echo $courseImg; ?>" alt="<?php echo $post->post_title; ?>"></img>
            </div>
            <div class="criclmRgtIn">
                <strong>About this course</strong>
                <ul>
                    <li class="dollar"><?php echo '<img src="'.plugin_dir_url( __FILE__ ) . 'dollar.svg'.'">'.$crse_price; ?></li>
                    <li class="lessons"><?php echo '<img src="'.plugin_dir_url( __FILE__ ) . 'lessons.svg'.'">'.$crse_lessons; ?> <?php echo $crse_type; ?></li>
                    <li class="hoursof"><?php echo '<img src="'.plugin_dir_url( __FILE__ ) . 'hoursof.svg'.'">'.$crse_hours; ?> of video content</li>
                </ul>
            </div>
        </div>
</div>

<style>
.criclmMid .accorsign{
    transform: rotate(180deg);
    padding-left: 14px;   
}
</style>    