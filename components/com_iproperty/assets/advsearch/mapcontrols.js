/**
 * @version 3.1.3 2013-08-30
 * @package Joomla
 * @subpackage Intellectual Property
 * @copyright (C) 2013 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

var ipMapFunctions = (function(app) {
    // set to true after inputs are built the first time
    app.hasInputs = false;

    app.createInputGroups = function(mapOptions, tabGroups, amenGroups){
        // var debug = true;
        // build option tabs and divs
        jQuery.each(tabGroups, function(index, el){
            // create tab
            var li = jQuery('<li />');
            if (el.active) li.addClass('active');
            var a = jQuery('<a href="#'+index+'" data-toggle="tab" class="ip-tab">'+el.title+'</a>');
            jQuery(li).append(a);
            jQuery('#ipMapnav').append(li);

            // create div
            var div = jQuery('<div class="tab-pane" id="'+index+'"></div>');
            if (el.active) div.addClass('active');

            jQuery('#ipMapnavData').append(div);
        });

        // build containers for the amenities
        if (amenGroups.length){
            var amenContainer = jQuery('<div class="row-fluid" />');
            jQuery.each(amenGroups, function(index, el){
                var row = jQuery('<div class="span4 ip-adv-amencontainer" id="amenities'+index+'"><p><strong>'+el+'</strong></p></div>');
                jQuery(amenContainer).append(row);
            });
            jQuery('#amenities').append(amenContainer);
        }
    
        // add save button if settings 
        if (mapOptions.savesearch){
            var saveButton 	= jQuery('<button class="btn btn-success" type="button" />');
            saveButton.html(langOptions.savesearch); // add lang string
            // add content
            saveButton.click(function(){
                jQuery('#ipMapSavePanel').toggle('fast');
                jQuery.cookie.json = true;
				var cookiedata = jQuery.cookie('ipadvsearch'+mapOptions.itemid); 
                var cookievals = JSON.stringify(cookiedata);                
                jQuery('#ipsavesearchstring').val(cookievals);
            });
        }
    
        var clearButton	= jQuery('<button class="btn" type="button" />');
        clearButton.html(langOptions.clearsearch); // add lang string
        
        // attach click events
        clearButton.click(function(){
			// clear selected options and rerun search
			ipMapFunctions.clearSliders();
            ipMapFunctions.clearSelectedOptions();	
		});
    
        jQuery('#ipMapSaveControls').append(saveButton).append(clearButton);

        // make call to grab all input values on change (blur?)
        jQuery(document).on('change', '.ip-adv-input', function() {
            ipMapFunctions.getSelectedOptions();
        });
    }

    /**********************************************
    // FUNCTIONS BELOW
    **********************************************/

    // build inputs
    app.buildInputs = function()
    {
		var locations = {};
		var dofilter = false;
		var inc = 0;
        jQuery.each(inputData, function(i, e) {
            var callback;
            switch (e.type) {
                case 'select':
                    callback = buildSelect;
                    break;
                case 'checkbox':
                    callback = buildCheckbox;
                    break;
                case 'text':
                    callback = buildTextbox;
                    break;
            }
            if (jQuery.isArray(e.value) == false && e.lookup == true){
                if (e.tab == 'location' && e.filter) {
					e.index = inc;
                    locations[i] = e;
					dofilter = true;
					inc++;
                } else {
                    ipMapFunctions.getInputData(i, e, callback);
                }
            } else {
                callback(e);
            }
        });
		if (dofilter) ipMapFunctions.createCascade(locations);
    }

    function buildCheckbox(input)
    {
        if (input.value){
            var tempinput = input;
            jQuery.each(input.value, function(i, e){
                tempinput.value = e;
                buildGroupCheckbox(tempinput);
            });
        } else {
            buildSimpleCheckbox(input);
        }
    }

    function buildSimpleCheckbox(input)
    {
        var checkboxContainer = jQuery('<div class="span4 ip-adv-checkbox-container" />');
        var label       = jQuery('<label class="checkbox">'+input.title+'</label>');
        var checkbox    = jQuery('<input type="checkbox" data-group="'+input.datagroup+'" class="ipadv-checkbox ip-adv-input" id="'+input.datagroup+'-'+ input.param+'" value="'+input.param+'" />');

        if (input.checked) jQuery(checkbox).attr('checked', 'checked');
        jQuery(label).append(checkbox);
        jQuery(checkboxContainer).append(label);
        jQuery("#" + input.tab).append(checkboxContainer);
    }

    function buildGroupCheckbox(input)
    {
        var div     = false;
        var subcat  = false;
        if( input.param == 'categories'){
            if(input.value[2] == 0){
                div = jQuery('<div id="'+input.tab+input.value[0]+'" class="span4 ip-adv-catgroupcontainer" />');
            } else {
                subcat = true;
            }
        }
        var value       = String(input.value[0]);
        var label       = jQuery('<label class="checkbox">'+input.value[1]+'</label>');
        var checkbox    = jQuery('<input type="checkbox" data-group="'+input.datagroup+'" class="ipadv-checkbox ip-adv-input" id="'+input.datagroup+'-'+ input.value[1]+'" value="'+input.value[0]+'" />');
        if (jQuery.inArray(value, mapOptions.currentvals[input.datagroup]) !== -1) jQuery(checkbox).attr('checked', 'checked');
        jQuery(label).append(checkbox);
        if (div) {
            jQuery(div).append(label);
            jQuery("#" + input.tab).append(div);
        } else if (subcat) {
            jQuery(label).addClass('ip-adv-subcat');
            jQuery("#"+input.tab+input.value[2]).append(label);
        } else {
            jQuery("#" + input.tab+input.value[2]).append(label);
        }
    }

    function buildSelect(input)
    {
        var options     = false;
        var selected    = false;
        var container   = jQuery('<div class="span4" />');
        var selector    = jQuery('<select id="'+input.datagroup+'-'+ input.param + '" class="ip-adv-select ip-adv-input" data-group="'+input.datagroup+'" />');
        var placeholder = jQuery('<option value>'+input.title+'</option>').appendTo(selector);
        if (input.multiple) jQuery(selector).attr('multiple', 'multiple');
        jQuery.each(input.value, function(index, e) {
            if(e){
                options = true;
                var option = jQuery('<option value="'+index+'">'+e+'</option>');
                jQuery(selector).append(option);
                var value;
                switch (input.param){
                    case 'stype':
                        value = parseInt(index);
                        break;
                    default:
                        value = index;
                        break;
                }
                if (jQuery.inArray(value, mapOptions.currentvals[input.datagroup][input.param])){
                    jQuery(option).attr('selected', 'selected');
                }
            }
        });
        if (!selected) jQuery(placeholder).attr('selected', 'selected');
        jQuery(container).append(selector);
        if (options) jQuery("#" + input.tab).append(container);
    }

    function buildTextbox(input)
    {
        var value       = (input.selected) ? input.selected : input.title;
        var container   = jQuery('<div class="span4" />');
        var textbox     = jQuery('<input type="text" data-group="'+input.datagroup+'" id="'+input.group+'-'+input.param+'" placeholder="'+value+'" class="ipadv-text ip-adv-input">');

        jQuery(container).append(textbox);
        jQuery("#" + newtext.tab).append(container);
    }

    // helper to grab all the input data
    app.getInputData = function(input, options, callback)
    {
        var data = {
                    'task': 'ajax.ajaxGetInputs',
                    'input': input,
                    'options': JSON.stringify(options),
                    'currentvals': JSON.stringify(mapOptions.currentvals.location)
                    };

        jQuery.ajax({
              url: mapOptions.ipbaseurl+'index.php?option=com_iproperty&'+mapOptions.token+'=1&format=raw',
              data: data,
              type: 'POST',
              cache: false,
              error: function(request, status, error_message){
                console.log(status+' - '+error_message);
                console.dir(request);
                var returndata = { 'status': 'error', 'message': 'Ajax request error: '+error_message };
              },
              success: function(returndata) {
                var inputdata = jQuery.parseJSON(returndata);
                options.value = inputdata.data;
                callback(options);
              }
        });
    }

    return app;
})(ipMapFunctions || {});
