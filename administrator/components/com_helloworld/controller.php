<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 12:59
 */
defined('_JEXEC') or die;

/**
 * General Controller of HelloWorld component
 * контроллер для настроек компонента
 *
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 * @since       0.0.7
 */

class HelloWorldController extends JControllerLegacy
{
    /**
     * The default view for the display method.
     *
     * @var string
     * @since 12.2
     */
    protected $default_view = 'helloworlds';
}