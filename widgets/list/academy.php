<?php
$out = '';
foreach ($settings['tabs'] as $a) {
    $out .= '<li>'.$a['title'].'</li>';
}
$icon = plugin_dir_url( __FILE__ ) . 'direction.svg';
?>
<div class="<?php echo $settings['tmpl'];?>">
<ul>
    <?php echo $out;?>
</ul>
</div>
<style>
.academy li{
	padding-left:100px;
	background:url(<?php echo $icon;?>) no-repeat left top;
	background-size:91px 27px;
	font-size:1.167em;/*28px*/
	line-height:1;/*28px*/
	color:#000;
}
</style>    