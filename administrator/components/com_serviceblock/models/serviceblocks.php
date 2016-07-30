<?php
/** Модель для настроек компонента.
 * Вызывается из admin\views\serviceblocks\view.html.php
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 13:38
 */

defined('_JEXEC') or die;

class ServiceBlockModelServiceBlocks extends JModelList
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
                'blocktitle',       's.blocktitle',
                'svgpath',          's.svgpath',
                'viewportwidth',    's.viewportwidth',
                'viewportheight',   's.viewportheight',
                'viewboxwidth',     's.viewboxwidth',
                'viewboxheight',    's.viewboxheight',
                'state',            's.state',
                'publish_up',       's.publish_up',
                'publish_down',     's.publish_down',
                'title',            'c.title'
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
                's.blocktitle, '.
                's.state, '.
                's.svgpath, '.
                's.viewportwidth, '.
                's.viewportheight, '.
                's.viewboxwidth, '.
                's.viewboxheight, '.
                's.publish_up, '.
                's.publish_down, '.
                'c.title'
            )
        );
        $query->from($db->quoteName('#__serviceblock') . ' AS s');
        $query->join('LEFT', $db->quoteName('#__categories') . ' AS c ON s.catid = c.id');
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
                $query->where('(s.blocktitle LIKE '.$search.')');
            }
        }

        $orderCol = $this->state->get('list.ordering', 'id');
        $orderDirn = $this->state->get('list.direction', 'asc');
        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
        return $query;
    }
}