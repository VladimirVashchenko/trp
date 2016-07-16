<?php
/** интерфейс настроек компонента (верхний уровень).
 * Вызывает tmpl/default.php
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 13:19
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * ServiceBlocks View
 *
 * @since  0.0.1
 */
class ServiceBlockViewServiceBlocks extends JViewLegacy
{
    protected $items;
    protected $state;


    /**
     * Display the Hello World view
     *
     * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  void
     */
    function display($tpl = null)
    {
        // Get data from the model
        $this->items = $this->get('Items');
        $this->state = $this->get('State');
        $this->pagination = $this->get('Pagination');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');


        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }

        // Set the submenu
        ServiceBlockHelper::addSubmenu('serviceblocks');

        // Set the toolbar and number of found items
        $this->addToolBar();
        $this->sidebar = JHtmlSidebar::render();

        // Display the template
        parent::display($tpl);
        // Set the document
        $this->setDocument();

    }

    /**
     * Add the page title and toolbar.
     *
     * @return  void
     *
     * @since   1.6
     */
    protected function addToolBar()
    {
        $canDo = ServiceBlockHelper::getActions();
        $title = JText::_('COM_SERVICEBLOCK_MANAGER_SERVICEBLOCKS');

        if ($this->pagination->total) {
            $title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
        }

        JToolBarHelper::title($title, 'serviceblock');
        JToolBarHelper::addNew('serviceblock.add', 'JTOOLBAR_NEW');

        if ($canDo->get('core.edit'))
        {
            JToolbarHelper::editList('serviceblock.edit');
        }

        if ($canDo->get('core.edit.state')) {
            JToolbarHelper::publish('serviceblocks.publish', 'JTOOLBAR_PUBLISH', true);
            JToolbarHelper::unpublish('serviceblocks.unpublish', 'JTOOLBAR_UNPUBLISH', true);
            JToolbarHelper::archiveList('serviceblocks.archive');
            JToolbarHelper::checkin('serviceblocks.checkin');
        }

        $state = $this->get('State');
        if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
        {
            JToolbarHelper::deleteList('', 'serviceblocks.delete', 'JTOOLBAR_EMPTY_TRASH');
        } elseif ($canDo->get('core.edit.state'))
        {
            JToolbarHelper::trash('serviceblocks.trash');
        }

        JToolBarHelper::divider();

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_serviceblock');
        }
    }

    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_SERVICEBLOCK_ADMINISTRATION'));
    }
}