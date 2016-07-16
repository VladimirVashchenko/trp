<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 23:09
 */

defined('_JEXEC') or die;
JHtml::_('behavior.formvalidation');

$css = "
.services {
    margin-top: 10%;
}
.service{
    width: 220px;
    text-align: center;
    line-height:1;
    background-color: #f5f5f5;
}
.block_title_container {
    display:flex;
    align-items: center;
    justify-content: center;
    min-height: 80px;
}
.service h1 {
    line-height:1.4;
    font-family: Arial;
    font-size: ". $this->item->heading_size ."pt;
    display: inline-block;
    font-weight: 100;
    margin: auto;
    vertical-align: middle;
}
.service hr {
    width: 193px;
    margin: 0 12px 0 12px;
    height: 2px;
    border: 0;
    background-color: #bababa;
}
.service p {
    padding:  0 10px 10px 10px;
}
.service svg {
    margin: 5px 0 5px 0;
}
";
JFactory::getDocument()->addStyleDeclaration($css);
?>


<table>
    <tbody>
    <tr>
        <td width="50%">
            <form
                action="<?php echo JRoute::_('index.php?option=com_serviceblock&layout=edit&id=' . (int)$this->item->id); ?>"
                method="post" name="adminForm" id="adminForm" class="form-validate">
                <div class="form-horizontal">
                    <?php foreach ($this->form->getFieldsets() as $name => $fieldset): ?>
                        <fieldset class="adminform">
                            <legend><?php echo JText::_($fieldset->label); ?></legend>
                            <div class="row-fluid">
                                <div>
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
                <input type="hidden" name="task" value="serviceblock.edit"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>
        </td>
        <td style="vertical-align: top">
            <div class="services">
                <ul style="list-style: none;">
                    <li class="service">
                        <div class="block_title_container">
                            <h1 id="title"><?php echo $this->item->greeting; ?></h1>
                        </div>
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
    var heading = document.getElementById("title");
    var svg = document.getElementById("svg_preview");
    var box = svg.viewBox.baseVal;

    var headinng_size = document.getElementById("jform_heading_size");
    var widthnumber = document.getElementById("jform_viewportwidth");
    var heigthnumber = document.getElementById("jform_viewportheight");
    var boxwidth = document.getElementById("jform_viewboxwidth");
    var boxheight = document.getElementById("jform_viewboxheight");

    headinng_size.onchange = function(){heading.style.fontSize=this.value+"pt"};
    widthnumber.onchange = function(){svg.setAttribute('width', this.value)};
    heigthnumber.onchange = function(){svg.setAttribute('height', this.value)};
    boxwidth.onchange = function(){box.width=this.value};
    boxheight.onchange = function(){box.height=this.value};
</script>