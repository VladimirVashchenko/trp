<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 03:49
 */
use Joomla\Utilities\ArrayHelper;

defined('_JEXEC') or die;

/**
 * The model now asks the TableServiceBlock to get the message.
 * Service Table class
 *
 * @since  0.0.1
 */
class ServiceBlockTableServiceBlock extends JTable
{
    /**
     * Constructor
     *
     * @param   JDatabaseDriver &$db A database connector object
     */
    function __construct(&$db)
    {
        parent::__construct('#__serviceblock', 'id', $db);
    }

    /**
     * Overloaded bind function
     *
     * @param       array           named array
     * @return      null|string     null is operation was satisfactory, otherwise returns an error
     * @see JTable:bind
     * @since 1.5
     */
    public function bind($array, $ignore = '')
    {
        if (isset($array['params']) && is_array($array['params'])) {
            // Convert the params field to a string.
            $parameter = new JRegistry;
            $parameter->loadArray($array['params']);
            $array['params'] = (string)$parameter;
        }

        // Bind the rules.
        if (isset($array['rules']) && is_array($array['rules'])) {
            $rules = new JAccessRules($array['rules']);
            $this->setRules($rules);
        }

        return parent::bind($array, $ignore);
    }


    public function store($updateNulls = false)
    {
        return parent::store($updateNulls);
    }


    /**
     * Overloaded load function
     *
     * @param       int $pk primary key
     * @param       boolean $reset reset data
     * @return      boolean
     * @see JTable:load
     */
    public function load($pk = null, $reset = true)
    {
        if (parent::load($pk, $reset)) {
            // Convert the params field to a registry.
            $params = new JRegistry;
            $params->loadString($this->params, 'JSON');

            $this->params = $params;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method to compute the default name of the asset.
     * The default name is in the form `table_name.id`
     * where id is the value of the primary key of the table.
     *
     * @return    string
     * @since    2.5
     */
    protected function _getAssetName()
    {
        $k = $this->_tbl_key;
        return 'com_serviceblock.message.' . (int)$this->$k;
    }

    /**
     * Method to return the title to use for the asset table.
     *
     * @return    string
     * @since    2.5
     */
    protected function _getAssetTitle()
    {
        return $this->greeting;
    }

    /**
     * Method to get the asset-parent-id of the item
     *
     * @return    int
     */
    protected function _getAssetParentId(JTable $table = NULL, $id = NULL)
    {
        // We will retrieve the parent-asset from the Asset-table
        $assetParent = JTable::getInstance('Asset');
        // Default: if no asset-parent can be found we take the global asset
        $assetParentId = $assetParent->getRootId();

        // Find the parent-asset
        if (($this->catid) && !empty($this->catid)) {
            // The item has a category as asset-parent
            $assetParent->loadByName('com_serviceblock.category.' . (int)$this->catid);
        } else {
            // The item has the component as asset-parent
            $assetParent->loadByName('com_serviceblock');
        }

        // Return the found asset-parent-id
        if ($assetParent->id) {
            $assetParentId = $assetParent->id;
        }
        return $assetParentId;
    }

    public function publish($pks = null, $state = 1, $userId = 0)
    {
        $k = $this->_tbl_key;
//        JArrayHelper::toInteger($pks);
        $pks = ArrayHelper::toInteger($pks);
        $state = (int)$state;
        if (empty($pks)) {
            if ($this->$k) {
                $pks = array($this->$k);
            } else {
                $this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
                return false;
            }
        }
        $where = $k . '=' . implode(' OR ' . $k . '=', $pks);
        $query = $this->_db->getQuery(true)
            ->update($this->_db->quoteName($this->_tbl))
            ->set($this->_db->quoteName('state') . ' = ' . (int)$state)
            ->where($where);
        $this->_db->setQuery($query);
        try {
            $this->_db->execute();
        } catch (RuntimeException $e) {
            throw new Exception($e->getMessage(), 404);
            $code = $e->getCode();
            JError::raiseError($code ? $code : 500, $e->getMessage());
            return false;
        }
        if (in_array($this->$k, $pks)) {
            $this->state = $state;
        }
        return true;
    }
}