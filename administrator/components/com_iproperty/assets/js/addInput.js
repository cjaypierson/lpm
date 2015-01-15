/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

var arrInput        = new Array(0);
var arrInputValue   = new Array(0);
var arrCatValue     = new Array(0);

function addInput() 
{
    arrInput.push(arrInput.length);
    arrInputValue.push("");
    arrCatValue.push("");
    display();
}

function display() 
{
    document.getElementById('parah').innerHTML = "";
    for (intI = 0; intI < arrInput.length; intI++) {
        document.getElementById('parah').innerHTML+= createInput(arrInput[intI], arrInputValue[intI], arrCatValue[intI]);
    }
}

function saveValue(intId, strValue) 
{
    arrInputValue[intId] = strValue;
}

function saveCatValue(intId, strValue)
{
    arrCatValue[intId] = strValue;
}

function createInput(id, value, catValue) 
{
    var GenAmen = (catValue == 0) ? ' selected="selected"' : '';
    var IntAmen = (catValue == 1) ? ' selected="selected"' : '';
    var ExtAmen = (catValue == 2) ? ' selected="selected"' : '';

    var inputs = '<div class="clearfix"></div><div class="span12 nowrap"><div class="control-group">\n\
                    <div class="control-label">\n\
                        <input type="text" name="title[]" class="inputbox" id="amenity '+id+'" onChange="javascript:saveValue('+id+',this.value)" value="'+value+'" />\n\
                    </div>\n\
                    <div class="controls">\n\
                        <select name="cat[]" class="inputbox" id="catamenity '+id+'" onChange="javascript:saveCatValue('+id+',this.selectedIndex)">\n\
                            <option value="0"'+GenAmen+'>'+window.AmenLocale.general+'</option>\n\
                            <option value="1"'+IntAmen+'>'+window.AmenLocale.interior+'</option>\n\
                            <option value="2"'+ExtAmen+'>'+window.AmenLocale.exterior+'</option>\n\
                        </select>\n\
                    </div>\n\
                </div></div><div class="clearfix"></div>';
    return inputs;
}

function deleteInput() 
{
    if (arrInput.length > 0) {
        arrInput.pop();
        arrInputValue.pop();
        arrCatValue.pop();
    }
    display();
}