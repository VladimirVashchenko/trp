<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 18:40
 *
 * вывод содержимого элемента serviceblock на сайт
 */
defined('_JEXEC') or die; ?>
<h1><?php echo $this->item->greeting.(($this->item->category and $this->item->params->get('show_category'))
            ? (' ('.$this->item->category.')') : ''); ?>
</h1>
