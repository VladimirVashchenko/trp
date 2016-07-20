<?php
defined('_JEXEC') or die('Restricted area');
require_once JPATH_SITE . '/components/com_content/helpers/route.php';

class ModSvgLinkHelper
{
    public static function getList($params)
    {
        $link_to_display = (int)$params->get('link_to_display');
        
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('l.linktitle, l.linktitle_size, l.svgpath, l.viewportwidth, l.viewportheight, l.viewboxwidth, l.viewboxheight, l.show_title, m.link');
        $query->from($db->quoteName('#__svglink', 'l'));
        $query->join('LEFT', $db->quoteName('#__menu', 'm'). ' ON '. $db->quoteName('l.menuitem_id') . ' = '. $db->quoteName('m.id'));
        $query->where($db->quoteName('l.id').' = '. $link_to_display);
        $db->setQuery((string)$query);

        $db->setQuery($query);
        $results = $db->loadObjectList();

        return $results[0];
    }

}

