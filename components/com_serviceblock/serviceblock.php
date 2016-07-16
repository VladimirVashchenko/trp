<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 17:56
 */
defined('_JEXEC') or die;

//Get an instance of the controller prefixed by Serviceblock
$controller = JControllerLegacy::getInstance('Serviceblock');

//perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

//redirect if set by the controller
$controller->redirect();