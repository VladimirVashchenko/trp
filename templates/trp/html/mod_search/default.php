<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
//
//below is from index.php
//
//$app = JFactory::getApplication();
//$templateparams = $app->getTemplate(true)->params;
//$this->addStyleDeclaration("
//
//        :root{
//            --main-background-color: " . $templateparams->get('main_background') . ";
//            --header-color: " . $templateparams->get('header_background') . ";
//            --theme-color: " . $templateparams->get('theme') . ";
//            --line-color:" . $templateparams->get('lines') . ";
//            --font-color: " . $templateparams->get('font_color') . ";
//            --font-color-with-background: " . $templateparams->get('font_color_with_background') . ";
//            --accent-color: " . $templateparams->get('accent') . ";
//            --highlight-color: " . $templateparams->get('highlight') . ";
//        }");

JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);

if ($width)
{
	$moduleclass_sfx .= ' ' . 'mod_search' . $module->id;
	$css = 'div.mod_search' . $module->id . ' input[type="search"]{ width:auto; }';
	JFactory::getDocument()->addStyleDeclaration($css);
	$width = ' size="' . $width . '"';
}
else
{
	$width = '';
}
?>
<div class="search-div">
	<form action="<?php echo JRoute::_('index.php');?>" method="post" class="form-inline">
		<?php
			$output = '<label for="mod-search-searchword" class="element-invisible">' . $label . '</label> ';
			$output .= '<input name="searchword" id="search-box" maxlength="' . $maxlength . '"  class="inputbox search-query" type="search"' . $width;
			$output .= ' placeholder="' . $text . '" />';
			
			if ($button) :
				if ($imagebutton) :
					$btn_output = ' <label><input type="submit" style="display: none;" onclick="this.form.searchword.focus();"/><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20"><style type="text/css"> .search-icon{fill:#000000; fill:var(--font-color);} </style><path class="search-icon" d="M20 18.3c-0.6 0.6-1.2 1.1-1.7 1.7 -2.5-2.6-5-5.1-7.5-7.7 -0.4 0.3-1.1 0.7-2 1 0 0-1 0.3-2 0.3C3 13.6 0 10.5 0 6.8S3 0 6.8 0s6.8 3 6.8 6.8c0 1-0.3 2-0.3 2 -0.3 0.9-0.6 1.5-0.9 2C14.9 13.3 17.4 15.8 20 18.3zM6.8 1.9c-2.7 0-4.9 2.2-4.9 4.9s2.2 4.9 4.9 4.9 4.9-2.2 4.9-4.9S9.5 1.9 6.8 1.9z"/></svg></label>';
				else :
					$btn_output = ' <button class="button btn btn-primary" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
				endif;
				
				switch ($button_pos) :
					case 'top' :
						$output = $btn_output . '<br />' . $output;
						break;

					case 'bottom' :
						$output .= '<br />' . $btn_output;
						break;

					case 'right' :
						$output .= $btn_output;
						break;

					case 'left' :
					default :
						$output = $btn_output . $output;
						break;
				endswitch;

			endif;

			echo $output;
		?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	</form>
</div>
