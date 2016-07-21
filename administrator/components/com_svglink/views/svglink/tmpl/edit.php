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
                            <?php if ($this->item->svgpath && isset($this->item->svgpath)):
                                $regex = '/d=\s*([^\/\>]+)/';
                                preg_match_all($regex, $this->item->svgpath, $out);
                                ?>
                                <svg id="svg_preview" xmlns="http://www.w3.org/2000/svg"
                                     width="<?php echo $this->item->viewportwidth ?>"
                                     height="<?php echo $this->item->viewportheight ?>"
                                     viewBox="0 0 <?php echo $this->item->viewboxwidth ?> <?php echo $this->item->viewboxheight ?>"
                                >
                                    <?php foreach ($out[1] as $key => $path): ?>
                                        <path class="path path-<?php echo $key ?>"
                                              style="fill: <?php echo $this->item->svgcolor ?>"
                                              d=<?php echo "$path" ?>/>
                                    <?php endforeach; ?>
                                </svg>
                            <?php endif; ?>
                            <p id="link-title" style="display:
                            <?php if ($this->item->show_title == 1):
                                echo "block";
                            else:
                                echo "none";
                            endif; ?>
                                ">
                                <?php echo $this->item->linktitle; ?>
                            </p>
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
                    color: " . $this->item->svgcolor . ";
                    font-size: " . $this->item->linktitle_size . "pt;
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
            #svg_preview {
                border: 1px dashed;
            }
";
JFactory::getDocument()->addStyleDeclaration($css); ?>
<script>
    var linktitle = document.getElementById("link-title");
    var linktitle_size = document.getElementById("jform_linktitle_size");

    var svg = document.getElementById("svg_preview");
    var box = svg.viewBox.baseVal;
    var portwidth = document.getElementById("jform_viewportwidth");
    var portheigth = document.getElementById("jform_viewportheight");
    var boxwidth = document.getElementById("jform_viewboxwidth");
    var boxheight = document.getElementById("jform_viewboxheight");

    var jform_show_title0 = document.getElementById("jform_show_title0");
    var jform_show_title1 = document.getElementById("jform_show_title1");

    linktitle_size.onchange = function () {
        linktitle.style.fontSize = this.value + "pt"
    };

    portwidth.onchange = function () {
        svg.setAttribute('width', this.value)
    };
    portheigth.onchange = function () {
        svg.setAttribute('height', this.value)
    };
    boxwidth.onchange = function () {
        box.width = this.value
    };
    boxheight.onchange = function () {
        box.height = this.value
    };

    jform_show_title0.onclick = function () {
        console.log(this.value);
        linktitle.style.display = "block";
    };
    jform_show_title1.onclick = function () {
        console.log(this.value)
        linktitle.style.display = "none";
    };
</script>