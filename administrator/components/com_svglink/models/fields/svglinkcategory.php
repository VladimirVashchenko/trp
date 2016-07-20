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
 * SvgLinkCategory Form Field class for the SvgLink component
 *
 * добавляет поле типа список в настройки компонента
 * @since  0.0.1
 */
class JFormFieldSvgLinkCategory extends JFormFieldList
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
     * The SvgLinkCategory menu type displays a drop down list of all svglink categories.
     */
    protected function getOptions()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('c.id, c.title');
        $query->from($db->quoteName('#__categories'). ' AS c');
        // Retrieve only published items
        $query->where('c.extension = \'com_svglink\'');
        $db->setQuery((string)$query);
        $categories = $db->loadObjectList();
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