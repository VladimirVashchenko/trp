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
        <td width="40%">
            <form
                action="<?php echo JRoute::_('index.php?option=com_svglink&layout=edit&id=' . (int)$this->item->id); ?>"
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
                <input type="hidden" name="task" value="svglink.edit"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>
        </td>
        <td style="vertical-align: top; padding-top: 10%">
            <footer id="footer">
                 <div id="footer-link">
                      <a href="">
                          <div>
                          <svg id="svg_preview" xmlns="http://www.w3.org/2000/svg"
                               width="<?php echo $this->item->viewportwidth ?>"
                               height="<?php echo $this->item->viewportheight ?>"
                               viewBox="0 0 <?php echo $this->item->viewboxwidth ?> <?php echo $this->item->viewboxheight ?>"
                               style="border: 1px dashed">
                                <?php
                                echo $this->item->svgpath;
                                ?>
                            </svg>
                            <p id="link-title"><?php echo $this->item->linktitle; ?></p>
                          </div>
                        </a>
                    </div>
            </footer>
        </td>
    </tr>
    </tbody>
</table>
<?php
$css = "
        #footer {
            display: inline-flex;
            overflow: hidden;
            height: 80px;
            width:1000px;
            background-color: #eee;
        }
            #footer-link a {
                vertical-align: middle;
                text-decoration: none;
                color: var(--font-color-with-background);
            }
                #footer p {
                    color: var(--font-color-with-background);
                }
                #footer-link svg {
                    margin:5px 0;
                }
            #footer-link {
                margin:auto;
                text-align: center;
                display: inline-block;
                background-color: var(--theme-color);
                -webkit-transition: 0.02s linear;
                -moz-transition: 0.02s linear;
                -o-transition: 0.02s linear;
                transition: 0.02s linear;
                vertical-align: middle;
            }
            #footer-link:hover {
                transform: scale(1.05);
            }
";
JFactory::getDocument()->addStyleDeclaration($css); ?>
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

    headinng_size.onchange = function () {
        blocktitle.style.fontSize = this.value + "pt"
    };
    widthnumber.onchange = function () {
        svg.setAttribute('width', this.value)
    };
    heigthnumber.onchange = function () {
        svg.setAttribute('height', this.value)
    };
    boxwidth.onchange = function () {
        box.width = this.value
    };
    boxheight.onchange = function () {
        box.height = this.value
    };
</script>