<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 06.07.2016
 * Time: 03:55
 */
defined('_JEXEC') or die;

/**
 * Form Rule class for the Joomla Framework.
 */
class JFormRuleGreeting extends JFormRule
{
    /**
     * The regular expression.
     *
     * @access	protected
     * @var		string
     * @since	2.5
     */
    protected $regex = '^[^0-9]+$';
}