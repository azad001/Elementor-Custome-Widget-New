<?php
    $tag = $settings['tag'];
    $class = $settings['cls'] ? 'class="uts-title '. $settings['cls'].' '.$settings['center'].'"' : '';
    echo '<' . $tag . ' ' . $class . '>' . $settings['txt'] . '</' . $tag . '>';
?>
  