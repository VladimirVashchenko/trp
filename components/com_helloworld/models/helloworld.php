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

class HelloWorldModelHelloWorld extends JModelItem {

    /**
     * @var string message
     */
    protected $messages;

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
    public function getTable($type = 'HelloWorld', $prefix = 'HelloWorldTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Get the message
     *
     * @return string The message to be displayed to the user
     */
    public function getMsg(){
        if (!is_array($this->messages))
        {
            $this->messages = array();
        }

        if(!isset($this->message)){
            $jinput = JFactory::getApplication()->input;
            $id     = $jinput->get('id', 1, 'INT');

            // Get a TableHelloWorld instance
            $table = $this->getTable();

            // Load the message
            $table->load($id);

            // Assign the message
            $this->messages[$id] = $table->greeting;
        }
        return $this->messages[$id];
    }
}