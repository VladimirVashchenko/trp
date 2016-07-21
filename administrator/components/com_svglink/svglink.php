<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 17:56
 */
defined('_JEXEC') or die;

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