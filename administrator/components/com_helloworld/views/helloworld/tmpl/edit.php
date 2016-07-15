<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 23:09
 */

defined('_JEXEC') or die;
JHtml::_('behavior.formvalidation');

$css = <<<ENDCSS

.services {
    margin-top: 20%;
}
.service{
    width: 220px;
    text-align: center;
    line-height:1.4;
    background-color: #f5f5f5;
}
.service h1 {
    font-family: Arial;
    font-size: 32px;
    display: inline-block;
    font-weight: 100;
}
.service hr {
    width: 193px;
    margin: 0 12px 0 12px;
    height: 2px;
    border: 0;
    background-color: #bababa;
}
.service p {
    font-size: 16px;
    padding:  0 10px 10px 10px;
}
.service svg {
    margin: 5px 0 5px 0;
}
ENDCSS;
JFactory::getDocument()->addStyleDeclaration($css);
?>


<table>
    <tbody>
    <tr>
        <td width="70%">
            <form
                action="<?php echo JRoute::_('index.php?option=com_helloworld&layout=edit&id=' . (int)$this->item->id); ?>"
                method="post" name="adminForm" id="adminForm" class="form-validate">
                <div class="form-horizontal">
                    <?php foreach ($this->form->getFieldsets() as $name => $fieldset): ?>
                        <fieldset class="adminform">
                            <legend><?php echo JText::_($fieldset->label); ?></legend>
                            <div class="row-fluid">
                                <div class="span6">
                                    <?php foreach ($this->form->getFieldset($name) as $field): ?>
                                        <div class="control-group">
                                            <div class="control-label"><?php echo $field->label; ?></div>
                                            <div class="controls"><?php echo $field->input; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </fieldset>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="task" value="helloworld.edit"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>
        </td>
        <td style="vertical-align: top">
            <div class="services">
                <ul style="list-style: none;">
                    <li class="service">
                        <h1><?php echo $this->item->greeting; ?></h1>
                        <hr>

                        <svg id="svg_preview" xmlns="http://www.w3.org/2000/svg"
                             width="<?php echo $this->item->viewportwidth?>"
                             height="<?php echo $this->item->viewportheight ?>"
                             viewBox="0 0 <?php echo $this->item->viewboxwidth?> <?php echo $this->item->viewboxheight ?>"
                        style="border: 1px dashed">
                            <?php
                            echo $this->item->svgpath;
                            ?>
                        </svg>

                        <?php echo $this->item->blockmessage ?>
                    </li>
                </ul>
        </td>
    </tr>
    </tbody>
</table>
<script>
    var svg = document.getElementById("svg_preview");
    var box = svg.viewBox.baseVal;

    var widthnumber = document.getElementById("jform_viewportwidth");
    var heigthnumber = document.getElementById("jform_viewportheight");
    var boxwidth = document.getElementById("jform_viewboxwidth");
    var boxheight = document.getElementById("jform_viewboxheight");

    widthnumber.onchange = function(){svg.setAttribute('width', this.value)};
    heigthnumber.onchange = function(){svg.setAttribute('height', this.value)};
    boxwidth.onchange = function(){box.width=this.value};
    boxheight.onchange = function(){box.height=this.value};
</script>