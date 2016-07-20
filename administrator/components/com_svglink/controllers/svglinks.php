<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 22:37
 */
defined('_JEXEC') or die;

/**
 * SvgLinks Controller
 *
 * @since  0.0.1
 */
class SvgLinkControllerSvgLinks extends JControllerAdmin
{
    /**
     * Proxy for getModel.
     *
     * @param   string  $name    The model name. Optional.
     * @param   string  $prefix  The class prefix. Optional.
     * @param   array   $config  Configuration array for model. Optional.
     *
     * @return  object  The model.
     *
     * @since   1.6
     */
    public function getModel($name = 'SvgLink', $prefix = 'SvgLinkModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);

        return $model;
    }
}