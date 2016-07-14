<?php
/** Модель для настроек компонента.
 * Вызывается из admin\views\helloworlds\view.html.php
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 13:38
 */

defined('_JEXEC') or die;

class HelloWorldModelHelloWorlds extends JModelList
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
                'id', 'h.id',
                'greeting', 'h.greeting',
                'published', 'h.published',
                'catid', 'h.catid',
                'title', 'c.title',
                'svgpath', 'h.svgpath',
                'blockmessage', 'h.blockmessage',
                'menuitem_id', 'h.menuitem_id',
                'state', 'h.state',
                'publish_up', 'h.publish_up',
                'publish_down', 'h.publish_down',
                'link', 'm.link'
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

        parent::populateState('h.greeting', 'asc');
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
                'list.select', 'h.id, h.greeting, h.published, h.catid, c.title, h.svgpath, h.blockmessage, h.menuitem_id, state, h.state, h.publish_up, h.publish_down, m.link'
            )
        );
        $query->from($db->quoteName('#__helloworld') . ' AS h');
        $query->join('LEFT', $db->quoteName('#__categories') . ' AS c ON h.catid = c.id');
        $query->join('LEFT', $db->quoteName('#__menu'). ' AS m ON h.menuitem_id = m.id');

        $published = $this->getState('filter.state');
        if (is_numeric($published))
        {
            $query->where('h.state = '.(int) $published);
        } elseif ($published === '')
        {
            $query->where('(h.state IN (0, 1))');
        }

        $search = $this->getState('filter.search');
        if (!empty($search))
        {
            if (stripos($search, 'id:') === 0)
            {
                $query->where('h.id = '.(int) substr($search, 3));
            } else {
                $search = $db->Quote('%'.$db->escape($search, true).'%');
                $query->where('(h.greeting LIKE '.$search.')');
            }
        }

        $orderCol = $this->state->get('list.ordering', 'greeting');
        $orderDirn = $this->state->get('list.direction', 'asc');
        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
        return $query;
    }
}