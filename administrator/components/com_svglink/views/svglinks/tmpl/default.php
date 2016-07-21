<?php
/** разметка для настроек компонента (верхний уровень)
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 13:21
 */

defined('_JEXEC') or die;

JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo JRoute::_('index.php?option=com_svglink&view=svglinks'); ?>" method="post" id="adminForm"
      name="adminForm">
    <?php if (!empty($this->sidebar)) : ?>
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
        <?php else : ?>
        <div id="j-main-container">
            <?php endif; ?>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo JText::_('COM_SVGLINKS_FILTER'); ?>
                    <?php
                    echo JLayoutHelper::render(
                        'joomla.searchtools.default',
                        array('view' => $this)
                    );
                    ?>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th width="1%">
                        <?php echo JText::_('COM_SVGLINK_NUM'); ?>
                    </th>
                    <th width="1%">
                        <?php echo JHtml::_('grid.checkall'); ?>
                    </th>
                    <th width="1%" style="min-width:55px" class="nowrap center">
                        <?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
                    </th>
                    <th width="60%">
                        <?php echo JHtml::_('grid.sort', 'COM_SVGLINKS_NAME', 'blocktitle', $listDirn, $listOrder); ?>
                    </th>
                    <th width="1%">
                        <?php echo JHtml::_('grid.sort', 'COM_SVGLINK_ID', 'id', $listDirn, $listOrder); ?>
                    </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="5">
                        <?php echo $this->pagination->getListFooter(); ?>
                    </td>
                </tr>
                </tfoot>
                <tbody>
                <?php if (!empty($this->items)) : ?>
                    <?php foreach ($this->items as $i => $item) :
                        $canCheckin = $user->authorise('core.manage', 'com_checkin') || $item->checked_out == $user->get('id') || $item->checked_out == 0;
                        $canChange = $user->authorise('core.edit.state', 'com_svglink') && $canCheckin;

                        $link = JRoute::_('index.php?option=com_svglink&task=svglink.edit&id=' . $item->id); ?>
                        <tr>
                            <td>
                                <?php echo $this->pagination->getRowOffset($i); ?>
                            </td>
                            <td>
                                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                            <td style="text-align: center">
                                <?php echo JHtml::_('jgrid.published', $item->state, $i, 'svglinks.', $canChange, 'cb', $item->publish_up, $item->publish_down); ?>
                            </td>
                            <td>
                                <a href="<?php echo $link; ?>"
                                   title="<?php echo JText::_('COM_SVGLINK_EDIT_SVGLINK'); ?>">
                                    <?php echo $item->linktitle; ?>
                            </td>
                            <td>
                                <?php echo $item->id; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="boxchecked" value="0"/>
            <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
            <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
            <?php echo JHtml::_('form.token'); ?>
</form>