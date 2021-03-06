<?php
/** Модель для настроек компонента.
 * Вызывается из admin\views\svglinks\view.html.php
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 13:38
 */

defined('_JEXEC') or die;

class SvgLinkModelSvgLinks extends JModelList
{
    /**
     * Constructor.
     *
     * @param   array $config An optional associative array of configuration settings.
     *
     * @see     JController
     * @since   1.6
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',               's.id',
                'linktitle',        's.linktitle',
                'svgpath',          's.svgpath',
                'viewportwidth',    's.viewportwidth',
                'viewportheight',   's.viewportheight',
                'viewboxwidth',     's.viewboxwidth',
                'viewboxheight',    's.viewboxheight',
                'menuitem_id',      's.menuitem_id',
                'state',            's.state',
                'publish_up',       's.publish_up',
                'publish_down',     's.publish_down',
                'link',             'm.link'
            );
        }

        parent::__construct($config);
    }


    protected function populateState($ordering = null, $direction =
    null)
    {
        $published = $this->getUserStateFromRequest($this->context . '.filter.state', 'filter_state', '', 'string');
        $this->setState('filter.state', $published);

        $search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        parent::populateState('s.id', 'asc');
    }


    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select(
            $this->getState(
                'list.select',
                's.id, '.
                's.linktitle, '.
                's.linktitle_size, '.
                's.state, '.
                's.svgpath, '.
                's.svgcolor, '.
                's.viewportwidth, '.
                's.viewportheight, '.
                's.viewboxwidth, '.
                's.viewboxheight, '.
                's.show_title, '.
                's.menuitem_id, '.
                's.publish_up, '.
                's.publish_down, '.
                'm.link'
            )
        );
        $query->from($db->quoteName('#__svglink') . ' AS s');
        $query->join('LEFT', $db->quoteName('#__menu'). ' AS m ON s.menuitem_id = m.id');

        $published = $this->getState('filter.state');
        if (is_numeric($published))
        {
            $query->where('s.state = '.(int) $published);
        } elseif ($published === '')
        {
            $query->where('(s.state IN (0, 1))');
        }

        $search = $this->getState('filter.search');
        if (!empty($search))
        {
            if (stripos($search, 'id:') === 0)
            {
                $query->where('s.id = '.(int) substr($search, 3));
            } else {
                $search = $db->Quote('%'.$db->escape($search, true).'%');
                $query->where('(s.linktitle LIKE '.$search.')');
            }
        }

        $orderCol = $this->state->get('list.ordering', 'id');
        $orderDirn = $this->state->get('list.direction', 'asc');
        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
        return $query;
    }
}