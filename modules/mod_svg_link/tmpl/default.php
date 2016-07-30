<?php

//defined('_JEXEC') or die('Restricted area');
?>
<?php
$regex = '/d=\s*([^\/\>]+)/';
preg_match_all($regex, $svgpath, $out);
?>
<a href="<?php echo $link;?>" target="<?php echo $target;?>">
    <div>
        <?php if ($svgpath): ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="<?php echo $viewportwidth ?>"
                 height="<?php echo $viewportheight ?>"
                 viewBox="0 0 <?php echo $viewboxwidth ?> <?php echo $viewboxheight ?>">
                <?php foreach ($out[1] as $key => $path): ?>
                    <path class="path-<?php echo $key ?>" style="fill: <?php echo $svgcolor?>" d=<?php echo "$path" ?>/>
                <?php endforeach; ?>
            </svg>
        <?php endif; ?>


        <?php if ($show_title && $show_title == 1): ?>
            <p style="font-size: <?php echo $linktitle_size ?>pt; color: <?php echo $svgcolor?>">
                <?php echo $linktitle ?>
            </p>
        <?php endif; ?>
    </div>
</a>
