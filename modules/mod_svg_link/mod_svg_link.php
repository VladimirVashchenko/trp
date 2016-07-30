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

$link = $list->link;
$type = $list->type;
$linkParams = json_decode($list->params, true);

$linktitle = $list->linktitle;
$linktitle_size = $list->linktitle_size;
$svgpath = $list->svgpath;
$svgcolor = $list->svgcolor;
$viewportwidth = $list->viewportwidth;
$viewportheight = $list->viewportheight;
$viewboxwidth = $list->viewboxwidth;
$viewboxheight = $list->viewboxheight;
$show_title = $list->show_title;

$target = '_self';

if ($type == 'alias') {
    $link = JFilterOutput::ampReplace(htmlspecialchars($link, ENT_COMPAT, 'UTF-8')) . $linkParams['aliasoptions'];
} else if ($type == 'url') {
    $link = JFilterOutput::ampReplace(htmlspecialchars($link, ENT_COMPAT, 'UTF-8'));
    $target = '_blank';
} else {
    $link = 'index.php?Itemid=' . $list->menuitem_id;
}

if (strcasecmp(substr($link, 0, 4), 'http') && (strpos($link, 'index.php?') !== false)) {
    $link = JRoute::_($link, true, 0);
} else {
    $link = JRoute::_($link);
}


$link = JFilterOutput::ampReplace(htmlspecialchars($link, ENT_COMPAT, 'UTF-8'));


// loading template
require JModuleHelper::getLayoutPath('mod_svg_link', $params->get('layout', 'default'));

?>