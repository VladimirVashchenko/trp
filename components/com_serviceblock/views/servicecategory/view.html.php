<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04.07.2016
 * Time: 18:26
 */
defined('_JEXEC') or die;

/**
 * HTML View class for the ServiceBlock Component
 * вывод на сайт
 * вызывает models/servicecategory.php.ServiceBlockModelServiceCategory
 */
class ServiceBlockViewServiceCategory extends JViewLegacy
{
    protected $items;
    
    /**
     * Display the Service Block view
     *
     * @param string $tpl The name of the template file to parse;
     * automatically searches through the template paths.
     *
     * @return void
     */
    function display($tpl = null){
        //Assign data to the view
        $this->items = $this->get('Items');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

            return false;
        }

        // Display the view
        parent::display($tpl);
    }
}