<?php
$out = '';
foreach ($settings['tabs'] as $a) {
	$cssClass = $a['class'] ? : '';
	$img = $a['url'] ? '<a rel="nofollow noopener" href="'.$a['url'].'">'.wp_get_attachment_image($a['img']['id'],'full').$a['txt'].'</a>' : wp_get_attachment_image($a['img']['id'],'full');
    $out .= '<li class="'.$cssClass.'">'.$img.'</li>';
}

?>

<ul class="bannerBrand">
    <?php echo $out;?>
</ul>

<style>

</style>    