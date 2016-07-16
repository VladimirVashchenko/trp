<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 17:56
 */
defined('_JEXEC') or die;

// Set some global property
//$document = JFactory::getDocument();
//$document->addStyleDeclaration('.icon-serviceblock {background-image: url(../media/com_serviceblock/images/Tux-16x16.png);}');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_serviceblock'))
{
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Require helper file
JLoader::register('ServiceBlockHelper', JPATH_COMPONENT . '/helpers/serviceblock.php');

// Get an instance of the controller prefixed by ServiceBlock
$controller = JControllerLegacy::getInstance('ServiceBlock');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();