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
 * HelloWorld Form Field class for the HelloWorld component
 *
 * добавляет поле типа список в настройки компонента
 * @since  0.0.1
 */
class JFormFieldHelloWorld extends JFormFieldList
{
    /**
     * The field type.
     *
     * @var         string
     */
    protected $type = 'HelloWorld';

    /**
     * Method to get a list of options for a list input.
     *
     * @return  array  An array of JHtml options.
     *
     *
     * Modifying the menu type
     * The HelloWorld menu type displays a drop down list of all messages.
     * If the message is categorized, we have to add the category in this display.
     */
    protected function getOptions()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('#__helloworld.id as id, #__helloworld.greeting, #__helloworld.catid');
        $query->from('#__helloworld');
        $query->leftJoin('#__categories on #__helloworld.catid=#__categories.id');
        // Retrieve only published items
//        $query->where('#__helloworld.published = 1');
        $db->setQuery((string)$query);
        $messages = $db->loadObjectList();
        $options = array();

        if ($messages) {
            foreach ($messages as $message) {
                $options[] = JHtml::_('select.option', $message->id, $message->greeting);
            }
        }

        $options = array_merge(parent::getOptions(), $options);
//        print_r($options);

        return $options;
    }
}