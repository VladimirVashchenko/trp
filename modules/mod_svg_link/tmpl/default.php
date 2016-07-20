<?php

//defined('_JEXEC') or die('Restricted area');
?>
<?php
$regex = '/d=\s*([^\/\>]+)/';
preg_match_all($regex, $svgpath, $out);
?>
<a href="#">
    <div>
    <svg xmlns="http://www.w3.org/2000/svg" width="<?php echo $viewportwidth ?>" height="<?php echo $viewportheight ?>"
         viewBox="0 0 <?php echo $viewboxwidth ?> <?php echo $viewboxheight ?>">
        <?php foreach ($out[1] as $key => $path): ?>
            <path class="path-<?php echo $key ?>" d=<?php echo "$path" ?>/>
        <?php endforeach; ?>
    </svg>
    <?php if($show_title && $show_title == 1): ?>
    <p style="font-size: <?php echo $linktitle_size?>pt">
        <?php echo $linktitle ?>
    </p>
    <?php endif; ?>
    </div>
</a>
