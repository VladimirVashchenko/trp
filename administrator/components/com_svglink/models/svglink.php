<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 23:29
 */
defined('_JEXEC') or die;

/**
 * SvgLink Model
 *
 * @since  0.0.1
 */
class SvgLinkModelSvgLink extends JModelAdmin
{
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
    public function getTable($type = 'SvgLink', $prefix = 'SvgLinkTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to get the record form.
     *
     * @param   array    $data      Data for the form.
     * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
     *
     * @return  mixed    A JForm object on success, false on failure
     *
     * @since   1.6
     */
    public function getForm($data = array(), $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm(
            'com_svglink.svglink',
            'svglink',
            array(
                'control' => 'jform',
                'load_data' => $loadData
            )
        );

        if (empty($form))
        {
            return false;
        }

        return $form;
    }
    
    /**
     * Method to get the script that have to be included on the form
     *
     * @return string	Script files
     */
    public function getScript()
    {
        return 'administrator/components/com_svglink/models/forms/svglink.js';
    }

    /**
     * Method to get the data that should be injected in the form.
     *
     * @return  mixed  The data for the form.
     *
     * @since   1.6
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
            'com_svglink.edit.svglink.data',
            array()
        );

        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    /**
     * Method to check if it's OK to delete a message. Overwrites JModelAdmin::canDelete
     */
    protected function canDelete($record)
    {
        if( !empty( $record->id ) )
        {
            return JFactory::getUser()->authorise( "core.delete", "com_svglink.message." . $record->id );
        }
    }


    protected function prepareTable($table)
    {
        $regex = '/d="\s*([^\/\>]+)"/';
        preg_match_all($regex, $table->svgpath, $out);
        $temp = '';
        foreach ($out[1] as $key => $path):
            $temp .= '<path d="' . $path . '"/>';
        endforeach;

        $table->svgpath = $temp;
    }


    public function save($data){
        return parent::save($data);
    }
}

