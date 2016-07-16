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
 * ServiceBlock Form Field class for the ServiceBlock component
 *
 * добавляет поле типа список в настройки компонента
 * @since  0.0.1
 */
class JFormFieldServiceBlock extends JFormFieldList
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
     * The ServiceBlock menu type displays a drop down list of all messages.
     * If the message is categorized, we have to add the category in this display.
     */
    protected function getOptions()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('#__serviceblock.id as id, #__serviceblock.greeting, #__serviceblock.catid');
        $query->from('#__serviceblock');
        $query->leftJoin('#__categories on #__serviceblock.catid=#__categories.id');
        // Retrieve only published items
//        $query->where('#__serviceblock.published = 1');
        $db->setQuery((string)$query);
        $messages = $db->loadObjectList();
        $options = array();

        if ($messages) {
            foreach ($messages as $message) {
                $options[] = JHtml::_('select.option', $message->id, $message->greeting);
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}