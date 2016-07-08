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
 * HelloWorlds View
 *
 * @since  0.0.1
 */
class HelloWorldViewHelloWorlds extends JViewLegacy
{
    /**
     * Display the Hello World view
     *
     * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  void
     */
    function display($tpl = null)
    {
        // Get application
        $app = JFactory::getApplication();
        $context = "helloworld.list.admin.helloworld";

        // Get data from the model
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        $this->filter_order = $app->getUserStateFromRequest($context . 'filter_order', 'filter_order', 'greeting', 'cmd');
        $this->filter_order_Dir = $app->getUserStateFromRequest($context . 'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');

        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }

        // Set the submenu
        HelloWorldHelper::addSubmenu('helloworlds');

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
        $title = JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS');

        if ($this->pagination->total)
        {
            $title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
        }

        JToolBarHelper::title($title, 'helloworld');
        JToolBarHelper::addNew('helloworld.add', 'JTOOLBAR_NEW');
        JToolBarHelper::editList('helloworld.edit', 'JTOOLBAR_EDIT');
        JToolBarHelper::deleteList('', 'helloworlds.delete', 'JTOOLBAR_DELETE');
        JToolBarHelper::divider();
        JToolBarHelper::preferences('com_helloworld');
    }

    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION'));
    }
}