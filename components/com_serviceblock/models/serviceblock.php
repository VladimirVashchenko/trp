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
class ServiceBlockModelServiceBlock extends JModelItem
{
    /**
     * @var object item
     */
    protected $item;

    /**
     * Method to auto-populate the model state.
     *
     * This method should only be called once per instantiation and is designed
     * to be called on the first call to the getState() method unless the model
     * configuration flag to ignore the request is set.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @return	void
     * @since	2.5
     */
    protected function populateState()
    {
        // Get the message id
        $jinput = JFactory::getApplication()->input;
        $id     = $jinput->get('id', 1, 'INT');
        $this->setState('message.id', $id);

        // Load the parameters.
        $this->setState('params', JFactory::getApplication()->getParams());
        parent::populateState();
    }

    /**
     * Method to get a table object, load it if necessary.
     *
     * @param   string  $type    The table name. Optional.
     * @param   string  $prefix  The class prefix. Optional.
     * @param   array   $config  Configuration array for model. Optional.
     *
     * @return  JTable  A JTable object
     *
     * @since   1.6
     */
    public function getTable($type = 'ServiceBlock', $prefix = 'ServiceBlockTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
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
            $query = $db->getQuery(true);
            $query->select('s.title, s.params, c.title as category')
                ->from($db->quoteName('#__serviceblock') . ' as s')
                ->join('LEFT', $db->quoteName('#__categories') . ' as c ON s.catid=c.id')
                ->where('s.id=' . (int)$id);
            $db->setQuery((string)$query);

            if ($this->item = $db->loadObject())
            {
                // Load the JSON string
                $params = new JRegistry;
                $params->loadString($this->item->params, 'JSON');
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