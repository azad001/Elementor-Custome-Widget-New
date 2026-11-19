<?php
$out = '';
foreach ($settings['tabs'] as $a) {
    $title = $a['title'] ? '<div class="tab">'.$a['title'].'</div>' : '';
    $out .= '
        <div class="trainBox">
            <span class="trainIcon">'.$a['svg'].'</span>
            <div class="icon-content">
                <strong>'.$a['title'].'</strong>
                <p>'.$a['desc'].'</p>
            </div>
        </div>    
    ';
}
?>
<div class="trainMid">
    <?php echo $out;?>
</div>  