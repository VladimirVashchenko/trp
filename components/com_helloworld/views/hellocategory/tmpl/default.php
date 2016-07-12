<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 18:40
 *
 * вывод содержимого элемента helloworld на сайт
 */
defined('_JEXEC') or die; ?>
<h1><?php
    /*echo $this->item->greeting.(($this->item->category and $this->item->params->get('show_category')) ? (' ('.$this->item->category.')') : '')*/;
//    echo $this->item->params;
?>
</h1>

<?php
//var_dump($this->item);
?>

<div class="mypreview">
    <?php foreach ($this->items as $item) : ?>
        <div class="myfolio">
            <div class="folio_title">
                <?php echo $item->title; ?>
            </div>
            <div class="folio_element">
                <a href="<?php echo $item->url; ?>" target="_blank"><img
                        src="<?php echo $item->image; ?>" width="150"></a>
            </div>
            <div class="folio_element">
                <strong><?php echo JText::_('COM_FOLIO_COMPANY');?></
                strong><?php echo $item->company; ?>
            </div>
            <div class="folio_element">
                <strong><?php echo JText::_('COM_FOLIO_PHONE');?></
                strong><?php echo $item->phone; ?>
            </div>
            <div class="folio_element">
                <?php echo $item->description; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
