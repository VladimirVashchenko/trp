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
                'id', 'a.id',
                'title', 'a.title',
                'state', 'a.state',
                'company', 'a.company',
                'image', 'a.image',
                'url', 'a.url',
                'phone', 'a.phone',
                'description', 'a.description',
                'ordering', 'a.ordering'
            );
        }
        parent::__construct($config);
    }

    protected function getListQuery()
    {
        $id    = $this->getState('message.id');
        $db = $this->getDbo();
        $query = $db->getQuery(true)
                ->select('greeting, params')
                ->from('#__helloworld')
                ->where('#__helloworld.catid=' . (int)$id);

        $query->select($this->getState());





        return $query;
    }




    /**
     * Get the message
     * @return object The message to be displayed to the user
     */
    public function getItem()
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
                $params->loadString($this->item->params, 'JSON');
                print_r($this->item);
                $this->item->params = $params;

                // Merge global params with item params
                $params = clone $this->getState('params');
                $params->merge($this->item->params);
                $this->item->params = $params;
            }

        }

        return $this->item;
    }
}