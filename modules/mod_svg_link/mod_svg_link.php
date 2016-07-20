<?php
/**
* @package     A main package name
* @subpackage  mod_svgLinks
*
* @copyright   A copyright
* @license     A "Slug" license name e.g. GPL2
*/

defined('_JEXEC') or die('Restricted area');

$doc = JFactory::getDocument();

require_once __DIR__ . '/helper.php';

$list = ModSvgLinkHelper::getList($params);

$linktitle = $list->linktitle;
$linktitle_size = $list->linktitle_size;
$svgpath = $list->svgpath;
$viewportwidth = $list->viewportwidth;
$viewportheight = $list->viewportheight;
$viewboxwidth = $list->viewboxwidth;
$viewboxheight = $list->viewboxheight;
$show_title = $list->show_title;
$link = $list->link;


// loading template
require JModuleHelper::getLayoutPath('mod_svg_link', $params->get('layout','default'));

?>