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

<div class="services">
    <ul>
    <?php foreach ($this->items as $item) :
        $regex = '/d="\s*([^\/\>]+)"/';
        preg_match_all($regex, $item->svgpath, $out);
        ?>

            <li class="service">
                <a href="<?php echo $item->link?>">
                    <div class="block_title_container">
                        <h1 class="block_title" style="font-size: <?php echo $item->blocktitle_size?>pt"><?php echo $item->blocktitle; ?></h1>
                    </div>
                    <hr>

                    <svg xmlns="http://www.w3.org/2000/svg" width="<?php echo $item->viewportwidth ?>"
                         height="<?php echo $item->viewportheight ?>"
                         viewBox="0 0 <?php echo $item->viewboxwidth ?> <?php echo $item->viewboxheight ?>">
                        <?php foreach ($out[1] as $key => $path): ?>
                            <path class="path-<?php echo $key ?>" d="<?php echo "$path" ?>"/>
                        <?php endforeach; ?>
                    </svg>
                    <div class="service-message-wrap">
                        <?php echo $item->blockmessage ?>
                    </div>
                </a>
            </li>

    <?php endforeach; ?>
    </ul>
</div>
