<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 06.07.2016
 * Time: 12:15
 */
defined('_JEXEC') or die;

/**
 * SvgLink component helper.
 *
 * @param   string $submenu The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class SvgLinkHelper
{
    /**
     * Configure the Linkbar.
     *
     * @return Bool
     */

    public static function addSubmenu($submenu)
    {
        JHtmlSidebar::addEntry(
            JText::_('COM_SVGLINK_SUBMENU_MESSAGES'),
            'index.php?option=com_svglink',
            $submenu == 'svglinks'
        );

    }

    /**
     * Get the actions
     */
    public static function getActions($messageId = 0)
    {
        $user = JFactory::getUser();
        $result = new JObject;
        $assetName = 'com_svglink';
        $level = 'component';
        $actions = JAccess::getActions('com_svglink', $level);
        foreach ($actions as $action) {
            $result->set($action->name, $user->authorise($action->name, $assetName));
        }
        return $result;
    }
}