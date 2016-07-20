<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_redirect
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

JFormHelper::loadFieldClass('list');

/**
 * A drop down containing all valid HTTP 1.1 response codes.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_redirect
 * @since       3.4
 */
class JFormFieldLinkList extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  3.4
	 */
	protected $type = 'LinkList';

	

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string	The field input markup.
	 *
	 * @since   3.4
	 */
	protected function getOptions()
	{
		$options = array();

		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		$query->select('l.id, l.linktitle');
		$query->from($db->quoteName('#__svglink'). ' AS l');
		$query->where('l.state = 1');

		$db->setQuery((string)$query);
		$links = $db->loadObjectList();

		if ($links) {
			foreach ($links as $link) {
				$options[] = JHtml::_('select.option', $link->id, $link->linktitle);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
