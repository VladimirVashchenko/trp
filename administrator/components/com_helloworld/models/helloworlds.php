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
        parent::populateState('h.greeting', 'asc');
    }


    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
//    protected function getListQuery()
//    {
//        // Initialize variables.
//        $db    = JFactory::getDbo();
//        $query = $db->getQuery(true);
//
//        // Create the base select statement.
//        $query->select('*')
//            ->from($db->quoteName('#__helloworld'));
//// Filter: like / search
//        $search = $this->getState('filter.search');
//
//        if (!empty($search))
//        {
//            $like = $db->quote('%' . $search . '%');
//            $query->where('greeting LIKE ' . $like);
//        }
//
//        // Filter by published state
//        $published = $this->getState('filter.published');
//
//        if (is_numeric($published))
//        {
//            $query->where('published = ' . (int) $published);
//        }
//        elseif ($published === '')
//        {
//            $query->where('(published IN (0, 1))');
//        }
//
//        // Add the list ordering clause.
//        $orderCol	= $this->state->get('list.ordering', 'greeting');
//        $orderDirn 	= $this->state->get('list.direction', 'asc');
//
//        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
//
//        return $query;
//    }

//'id', 'h.id',
//'greeting', 'h.greeting',
//'published', 'h.published',
//'catid', 'h.catid',
//'title', 'c.title',
//'svgpath', 'h.svgpath',
//'blockmessage', 'h.blockmessage',
//'menuitem_id', 'h.menuitem_id',
//'link', 'm.link'


    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select(
            $this->getState(
                'list.select', 'h.id, h.greeting, h.published, h.catid, c.title, h.svgpath, h.blockmessage, h.menuitem_id, m.link'
            )
        );
        $query->from($db->quoteName('#__helloworld') . ' AS h');
        $query->join('LEFT', $db->quoteName('#__categories') . ' AS c ON h.catid = c.id');
        $query->join('LEFT', $db->quoteName('#__menu'). ' AS m ON h.menuitem_id = m.id');

        $published = $this->getState('filter.state');
        if (is_numeric($published))
        {
            $query->where('h.published = '.(int) $published);
        } elseif ($published === '')
        {
            $query->where('(h.published IN (0, 1))');
        }

        $orderCol = $this->state->get('list.ordering', 'greeting');
        $orderDirn = $this->state->get('list.direction', 'asc');
        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
        return $query;
    }
}