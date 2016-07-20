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
//$document->addStyleDeclaration('.icon-svglink {background-image: url(../media/com_svglink/images/Tux-16x16.png);}');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_svglink'))
{
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Require helper file
JLoader::register('SvgLinkHelper', JPATH_COMPONENT . '/helpers/svglink.php');

// Get an instance of the controller prefixed by SvgLink
$controller = JControllerLegacy::getInstance('SvgLink');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();