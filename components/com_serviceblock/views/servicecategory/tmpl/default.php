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
            $link = $item->link;
            $type = $item->type;
            $linkParams = json_decode($item->params, true);

            $target = '_self';

            if ($type == 'alias') {
                $link = JFilterOutput::ampReplace(htmlspecialchars($link, ENT_COMPAT, 'UTF-8')) . $linkParams['aliasoptions'];
            } else if ($type == 'url') {
                $link = JFilterOutput::ampReplace(htmlspecialchars($link, ENT_COMPAT, 'UTF-8'));
                $target = '_blank';
            } else {
                $link = 'index.php?Itemid=' . $item->menuitem_id;
            }

            if (strcasecmp(substr($link, 0, 4), 'http') && (strpos($link, 'index.php?') !== false)) {
                $link = JRoute::_($link, true, 0);
            } else {
                $link = JRoute::_($link);
            }

            $link = JFilterOutput::ampReplace(htmlspecialchars($link, ENT_COMPAT, 'UTF-8'));

            $regex = '/d="\s*([^\/\>]+)"/';
            preg_match_all($regex, $item->svgpath, $out);
    ?>  <li class="block">
            <a href="<?php echo $link;?>" target="<?php echo $target;?>">
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
