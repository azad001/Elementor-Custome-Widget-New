<?php
$out = '';
foreach ($settings['tabs'] as $a) {
    $out .= '
    <div class="academyIn">
    <span class="acadIcon">'.$a['svg'].'</span>
    <strong>'.$a['title'].'</strong>
</div>   
    ';
}
?>
<div class="academyMid">
    <?php echo $out;?>
</div>  