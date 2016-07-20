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
 * SvgLink Form Field class for the SvgLink component
 *
 * добавляет поле типа список в настройки компонента
 * @since  0.0.1
 */
class JFormFieldSvgLink extends JFormFieldList
{
    /**
     * The field type.
     *
     * @var         string
     */
    protected $type = 'SvgLink';

    /**
     * Method to get a list of options for a list input.
     *
     * @return  array  An array of JHtml options.
     *
     *
     * Modifying the menu type
     * The SvgLink menu type displays a drop down list of all messages.
     * If the message is categorized, we have to add the category in this display.
     */
    protected function getOptions()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('s.id as id, s.linktitle');
        $query->from($db->quotename('#__svglink'). ' AS s');
        $query->leftJoin($db->quoteName('#__categories'). ' AS c' . ' on s.catid=c.id');
        //Retrieve only published items
        $query->where('s.state = 1');
        $db->setQuery((string)$query);
        $messages = $db->loadObjectList();
        $options = array();

        if ($messages) {
            foreach ($messages as $message) {
                $options[] = JHtml::_('select.option', $message->id, $message->title);
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}