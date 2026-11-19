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
<div class="trainMid style-4">
    <?php echo $out;?>
</div>  

<style>
.trainMid.style-4 .trainBox{
    width: 18%;
}
@media (max-width:767px) {
    .trainMid.style-4 .trainBox{
    width: 100%;  
}    
}
</style>    