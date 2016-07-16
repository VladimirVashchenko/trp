<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 03:31
 */
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('list');

/**
 * ServiceCategory Form Field class for the ServiceBlock component
 *
 * добавляет поле типа список в настройки компонента
 * @since  0.0.1
 */
class JFormFieldServiceCategory extends JFormFieldList
{
    /**
     * The field type.
     *
     * @var         string
     */
    protected $type = 'ServiceBlock';

    /**
     * Method to get a list of options for a list input.
     *
     * @return  array  An array of JHtml options.
     *
     *
     * Modifying the menu type
     * The ServiceCategory menu type displays a drop down list of all serviceblock categories.
     */
    protected function getOptions()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('#__categories.id, #__categories.title');
        $query->from('#__categories');
        // Retrieve only published items
        $query->where('#__categories.extension = \'com_serviceblock\'');
        $db->setQuery((string)$query);
        $categories = $db->loadObjectList();
//        print_r($messages);
        $options = array();

        if ($categories) {
            foreach ($categories as $category) {
                $options[] = JHtml::_('select.option', $category->id, $category->title);
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}