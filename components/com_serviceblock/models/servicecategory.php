<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 23:13
 *
 * When a menu item of this component is created/updated, Joomla stores the identifier of the message.
 * The ServiceBlockModelServiceBlock model has now to compute the message according to this identifier and the data stored
 * in the database.
 */
defined('_JEXEC') or die;

/**
 * ServiceBlock Model
 *
 * @since  0.0.1
 */
class ServiceBlockModelServiceCategory extends JModelList
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
                'id',                's.id',
                'menuitem_id',       's.menuitem_id',
                'blocktitle',        's.blocktitle',
                'blocktitle_size',   's.blocktitle_size',
                'blocktitle_height', 's.blocktitle_height',
                'catid',             's.catid',
                'svgpath',           's.svgpath',
                'viewportwidth',     's.viewportwidth',
                'viewportheight',    's.viewportheight',
                'viewboxwidth',      's.viewboxwidth',
                'viewboxheight',     's.viewboxheight',
                'blockmessage',      's.blockmessage',
                'menuitem_id',       's.menuitem_id',
                'state',             's.state',
                'publish_up',        's.publish_up',
                'publish_down',      's.publish_down',
                'title',             'c.title',
                'link, ',            'm.link, ',
                'type, ',            'm.type, ',
                'params',            'm.params'
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
                's.menuitem_id, '.
                's.blocktitle, '.
                's.blocktitle_size, '.
                's.blocktitle_height, '.
                's.catid, '.
                's.svgpath, '.
                's.viewportwidth, '.
                's.viewportheight, '.
                's.viewboxwidth, '.
                's.viewboxheight, '.
                's.blockmessage, '.
                's.menuitem_id, '.
                's.state, '.
                'm.link, '.
                'm.type, '.
                'm.params'
            )
        );

        $query->from($db->quoteName('#__serviceblock').' AS s');

        $query->join('LEFT', $db->quoteName('#__menu'). ' AS m ON s.menuitem_id = m.id');

        $query->where('(s.state IN (0, 1))');
        $query->where('s.catid=' . (int)$id);

        return $query;
    }
}