<?php
/** разметка для настроек компонента (верхний уровень)
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 13:21
 */

defined('_JEXEC') or die;

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
?>

<form action="<?php echo JRoute::_('index.php?option=com_helloworld&view=helloworlds');?>" method="post" id="adminForm" name="adminForm">
    <?php if (!empty( $this->sidebar)) : ?>
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
        <?php else : ?>
        <div id="j-main-container">
            <?php endif;?>
    <div class="row-fluid">
        <div class="span6">
            <?php echo JText::_('COM_HELLOWORLD_HELLOWORLDS_FILTER'); ?>
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
            <th width="1%"><?php echo JText::_('COM_HELLOWORLD_NUM'); ?></th>
            <th width="1%">
                <?php echo JHtml::_('grid.checkall'); ?>
            </th><th width="1%">
                <?php echo JHtml::_('grid.sort', 'COM_HELLOWORLD_PUBLISHED', 'published', $listDirn, $listOrder); ?>
            </th>

            <th width="60%">
                <?php echo JHtml::_('grid.sort', 'COM_HELLOWORLD_HELLOWORLDS_NAME', 'greeting', $listDirn, $listOrder); ?>
            </th>
            <th width="25%">
                <?php echo JHtml::_('grid.sort', 'COM_HELLOWORLD_HELLOWORLD_FIELD_CATID_LABEL', 'title', $listDirn, $listOrder); ?>
            </th>
            <th width="1%">
                <?php echo JHtml::_('grid.sort', 'COM_HELLOWORLD_ID', 'id', $listDirn, $listOrder); ?>
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
            <?php foreach ($this->items as $i => $row) :
                $link = JRoute::_('index.php?option=com_helloworld&task=helloworld.edit&id=' . $row->id);?>
                <tr>
                    <td>
                        <?php echo $this->pagination->getRowOffset($i); ?>
                    </td>
                    <td>
                        <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                    </td>
                    <td style="text-align: center">
                        <?php echo JHtml::_('jgrid.published', $row->published, $i, 'helloworlds.', true, 'cb'); ?>
                    </td>
                    <td>
                        <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_HELLOWORLD_EDIT_HELLOWORLD'); ?>">
                        <?php echo $row->greeting; ?>
                    </td>
                    <td>
                        <?php echo $row->title; ?>
                    </td>
                    <td>
                        <?php echo $row->id; ?>
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