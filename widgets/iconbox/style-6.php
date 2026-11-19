<?php
$out = '';
foreach ($settings['tabs'] as $a) {
    $title = $a['title'] ? '<div class="tab">'.$a['title'].'</div>' : '';
    $out .= '
    <div>
    <span class="trainIcon">'.$a['svg'].'</span>
    <div class="icon-content">
        <strong>'.$a['title'].'</strong>
        <p>'.$a['desc'].'</p>
    </div>
</div>  
    ';
}
?>
<div class="iconbox-left style-6">
    <?php echo $out;?>
</div>  
 <style>
.iconbox-left .trainIcon {
    background: transparent;
    width: 80px;
    height: auto;
    margin-right: 30px;
    float: left;
}
.iconbox-left.style-6{
  color:#000;
}
.iconbox-left .icon-content {
    overflow: hidden;
    text-align: left;
}
.iconbox-left p {
    margin: 13px 0px;
}
.iconbox-left.style-6 .icon-content strong{
    color: #025a8c;    
}
 </style>   