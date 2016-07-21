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
 * The model now asks the TableSvgLink to get the message.
 * Service Table class
 *
 * @since  0.0.1
 */
class SvgLinkTableSvgLink extends JTable
{
    /**
     * Constructor
     *
     * @param   JDatabaseDriver &$db A database connector object
     */
    function __construct(&$db)
    {
        parent::__construct('#__svglink', 'id', $db);
    }

    public function store($updateNulls = false)
    {
        return parent::store($updateNulls);
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
        return 'com_svglink.message.' . (int)$this->$k;
    }

    /**
     * Method to return the title to use for the asset table.
     *
     * @return    string
     * @since    2.5
     */
    protected function _getAssetTitle()
    {
        return $this->title;
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

            // The item has the component as asset-parent
            $assetParent->loadByName('com_svglink');


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