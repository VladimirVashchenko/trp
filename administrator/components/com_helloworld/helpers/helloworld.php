<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 06.07.2016
 * Time: 12:15
 */
defined('_JEXEC') or die;

/**
 * HelloWorld component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class HelloWorldHelper
{
    /**
     * Configure the Linkbar.
     *
     * @return Bool
     */

    public static function addSubmenu($submenu)
    {
        JHtmlSidebar::addEntry(
            JText::_('COM_HELLOWORLD_SUBMENU_MESSAGES'),
            'index.php?option=com_helloworld',
            $submenu == 'helloworlds'
        );

        JHtmlSidebar::addEntry(
            JText::_('COM_HELLOWORLD_SUBMENU_CATEGORIES'),
            'index.php?option=com_categories&view=categories&extension=com_helloworld',
            $submenu == 'categories'
        );

        // Set some global property
        $document = JFactory::getDocument();
        if ($submenu == 'categories')
        {
            $document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION_CATEGORIES'));
        }
    }

    /**
     * Get the actions
     */
    public static function getActions($messageId = 0)
    {
        $user = JFactory::getUser();
        $result = new JObject;
        if (empty($categoryId))
        {
            $assetName = 'com_helloworld';
            $level = 'component';
        }
        else
        {
            $assetName = 'com_helloworld.category.'.(int) $categoryId;
            $level = 'category';
        }
        $actions = JAccess::getActions('com_helloworld', $level);
        foreach ($actions as $action)
        {
            $result->set($action->name, $user->authorise($action->name, $assetName));
        }
        return $result;
    }
}