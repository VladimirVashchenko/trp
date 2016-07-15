<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 23:13
 *
 * When a menu item of this component is created/updated, Joomla stores the identifier of the message.
 * The HelloWorldModelHelloWorld model has now to compute the message according to this identifier and the data stored
 * in the database.
 */
defined('_JEXEC') or die;

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class HelloWorldModelHelloCategory extends JModelList
{
    /**
     * @var object item
     */
    protected $item;


    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id',               'h.id',
                'greeting',         'h.greeting',
                'catid',            'h.catid',
                'svgpath',          'h.svgpath',
                'viewportwidth',    'h.viewportwidth',
                'viewportheight',   'h.viewportheight',
                'viewboxwidth',     'h.viewboxwidth',
                'viewboxheight',    'h.viewboxheight',
                'blockmessage',     'h.blockmessage',
                'menuitem_id',      'h.menuitem_id',
                'state',            'h.state',
                'publish_up',       'h.publish_up',
                'publish_down',     'h.publish_down',
                'title',            'c.title',
                'link',             'm.link'
            );
        }
        parent::__construct($config);
    }

    protected function getListQuery()
    {
        $id = JFactory::getApplication()->input->getCmd('id');

        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select(
            $this->getState(
                'list.select',
                'h.greeting, '.
                'h.catid, '.
                'h.svgpath, '.
                'h.viewportwidth, '.
                'h.viewportheight, '.
                'h.viewboxwidth, '.
                'h.viewboxheight, '.
                'h.blockmessage, '.
                'h.menuitem_id, '.
                'h.state, '.
                'm.link'
            )
        );

        $query->from($db->quoteName('#__helloworld').' AS h');

        $query->join('LEFT', $db->quoteName('#__menu'). ' AS m ON h.menuitem_id = m.id');

        $query->where('(h.state IN (0, 1))');
        $query->where('h.catid=' . (int)$id);

        return $query;
    }




    /**
     * Get the message
     * @return object The message to be displayed to the user
     */
    /*public function getItem()
    {
        if (!isset($this->item))
        {
            $id    = $this->getState('message.id');
            $db    = JFactory::getDbo();
//            $query = $db->getQuery(true)
//                ->select('greeting, params')
//                ->from('#__helloworld')
//                ->where('#__helloworld.catid=' . (int)$id);
//            $db->setQuery((string)$query);

            $query = $db->getQuery(true)
                ->select('COUNT(greeting)')
                ->from('#__helloworld')
                ->where('#__helloworld.catid=' . (int)$id);
            $db->setQuery((string)$query);

            print_r($db->loadResult());

            if ($this->item = $db->loadObject())
            {
                // Load the JSON string
                $params = new JRegistry;
//                $params->loadString($this->item->params, 'JSON');
                print_r($this->item);
                $this->item->params = $params;

                // Merge global params with item params
//                $params = clone $this->getState('params');
                $params->merge($this->item->params);
                $this->item->params = $params;
            }

        }

        return $this->item;
    }*/
}