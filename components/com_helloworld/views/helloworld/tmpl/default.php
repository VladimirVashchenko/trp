<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 18:40
 */
defined('_JEXEC') or die; ?>

<li class="service">
    <a href="#">
        <h1><?php echo $this->_name ?></h1>
        <hr>
        <img src="<?php echo JUri::base(TRUE)."/templates/".JFactory::getDocument()->template;?>/images/Medal-icon.png" alt=""/>
        <p><?php echo $this->msg; ?></p>
    </a>
</li>
