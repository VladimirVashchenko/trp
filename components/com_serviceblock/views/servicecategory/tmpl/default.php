<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 18:40
 *
 * вывод содержимого элемента serviceblock на сайт
 */
defined('_JEXEC') or die;
?>

<div class="block-group">
    <ul><?php foreach ($this->items as $item) :
        $regex = '/d="\s*([^\/\>]+)"/';
        preg_match_all($regex, $item->svgpath, $out);
        ?><li class="block">
                <a href="<?php echo $item->link?>">
                    <div class="block-title-container" style="min-height: <?php echo $item->blocktitle_height ?>px">
                        <div class="block-title" style="font-size: <?php echo $item->blocktitle_size?>pt"><?php echo $item->blocktitle; ?></div>
                    </div>
                    <hr>

                    <svg xmlns="http://www.w3.org/2000/svg" width="<?php echo $item->viewportwidth ?>"
                         height="<?php echo $item->viewportheight ?>"
                         viewBox="0 0 <?php echo $item->viewboxwidth ?> <?php echo $item->viewboxheight ?>">
                        <?php foreach ($out[1] as $key => $path): ?>
                            <path class="path-<?php echo $key ?>" d="<?php echo "$path" ?>"/>
                        <?php endforeach; ?>
                    </svg>
                </a>
            </li><?php endforeach; ?></ul>
</div>
