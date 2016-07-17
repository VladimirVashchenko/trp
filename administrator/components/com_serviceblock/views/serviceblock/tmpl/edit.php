<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.07.2016
 * Time: 23:09
 */

defined('_JEXEC') or die;
JHtml::_('behavior.formvalidation');
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
            <div class="block-group">
                <ul style="list-style: none;">
                    <li class="block">
                        <div class="block-title-container">
                            <h1 id="block-title"><?php echo $this->item->blocktitle; ?></h1>
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
                        <div class="block-message-wrap">
                            <?php echo $this->item->blockmessage ?>
                        </div>
                    </li>
                </ul>
        </td>
    </tr>
    </tbody>
</table>
<?php
$css = "
.block-group {
    margin-top: 10%;
}
.block{
    width: 220px;
    text-align: center;
    line-height:1;
    background-color: #f5f5f5;
}
.block-title-container {
    display:flex;
    align-items: center;
    justify-content: center;
    padding: 5px 5px;
    min-height: ". $this->item->blocktitle_height ."px;
}
#block-title {
    line-height:1;
    font-family: Arial;
    font-size: ". $this->item->blocktitle_size ."pt;
    display: inline-block;
    font-weight: 100;
    margin: auto;
    vertical-align: middle;
}
.block hr {
    width: 193px;
    margin: 0 12px 0 12px;
    height: 2px;
    border: 0;
    background-color: #bababa;
}
.block-message-wrap {
    padding: 10px 5px 10px 5px;
}
.block-message-wrap p {
    margin: 0;
}

.block svg {
    margin: 5px 0 5px 0;
}
";
JFactory::getDocument()->addStyleDeclaration($css);?>
<script>
    var blocktitle = document.getElementById("block-title");
    var titlecontainer = document.getElementsByClassName("block-title-container")[0];
    var svg = document.getElementById("svg_preview");
    var box = svg.viewBox.baseVal;

    var headinng_size = document.getElementById("jform_blocktitle_size");
    var headinng_height = document.getElementById("jform_blocktitle_height");
    var widthnumber = document.getElementById("jform_viewportwidth");
    var heigthnumber = document.getElementById("jform_viewportheight");
    var boxwidth = document.getElementById("jform_viewboxwidth");
    var boxheight = document.getElementById("jform_viewboxheight");

    headinng_size.onchange = function(){blocktitle.style.fontSize=this.value+"pt"};
    headinng_height.onchange = function(){titlecontainer.style.minHeight=this.value+"px"};
    widthnumber.onchange = function(){svg.setAttribute('width', this.value)};
    heigthnumber.onchange = function(){svg.setAttribute('height', this.value)};
    boxwidth.onchange = function(){box.width=this.value};
    boxheight.onchange = function(){box.height=this.value};
</script>