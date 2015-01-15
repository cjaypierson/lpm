(function(){var e=function(e){var t=this;e.require().library("lookup","ui/core","ui/position").template("suggest/contextmenu","suggest/contextmenu.item").done(function(){e.Controller("Foundry.Suggest",{defaults:{lookup:{inside:[],within:[],exclude:[]},keyword:{separator:" ",includeAsSuggestion:!1,clearAfterSelection:!0},contextMenu:{display:{format:"<@= title @>",after:500,whenFocused:!0,withoutKeyword:!0,persist:!1,hideAfterSelection:!0,position:{my:"left top",at:"left bottom",collision:"none"},css:{}},onRenderItem:function(e,t){return undefined},onSelectItem:function(e,t){},"@menu":"suggest/contextmenu","@menuItem":"suggest/contextmenu.item","{menu}":".suggest-contextmenu","{menuItemGroup}":".suggest-contextmenu-itemgroup","{menuItem}":".suggest-contextmenu-item"}}},function(t){return{init:function(){t.textField=t.element,t.dataset(t.options.lookup.inside);var n=e(e.View(t.options.contextMenu["@menu"],{}));n.appendTo("body").implement("Foundry.Suggest.ContextMenu",e.extend(t.options.contextMenu,{parent:t}),function(){t.contextMenu=this})},dataset:function(n){if(n==undefined)return t.options.lookup.inside;if(!e.isArray(n))return;t.datamap={},e.map(n,function(e){t.attachMeta(e)}),t.options.lookup.inside=n},attachMeta:function(n,r){var i=e.uid("suggestId_");return t.datamap[i]=e.extend(!0,n,{".suggestId":i,".suggestType":"data",".suggestBuffer":t.buffer(n)},r)},buffer:function(n){var r="",i=function(t){if(typeof t=="string"||e.isNumeric(t))r+=t+" "},s=t.options.lookup.within;return s.length>0?e.each(s,function(e,t){i(n[t])}):e.each(n,function(e,t){e.match(".suggest")||i(t)}),e.trim(r)},search:function(n){return n==undefined&&(n=""),e.lookup(e.extend({},t.options.lookup,{using:n,within:[".suggestBuffer"]}))},populate:function(n){n=e.trimSeparators(n||t.textField.val(),t.options.keyword.separator);if(n==""&&(!t.contextMenu.options.display.withoutKeyword||t.dataset().length<1)){t.contextMenu.hide();return}var r=t.search(n);if(n!=""&&t.options.keyword.includeAsSuggestion){var i=t.attachMeta({title:n},{".suggestType":"user"});r.push(i)}if(r.length<1){t.contextMenu.hide(!0);return}t.contextMenu.show(r)},exclude:function(e){t.options.lookup.exclude.push({".suggestId":e})},include:function(n){t.options.lookup.exclude=e.grep(t.options.lookup.exclude,function(e){return e[".suggestId"]==n},!0)},focusin:function(e,n){t.contextMenu.options.display.whenFocused&&t.populate()},focusout:function(e,t){},keydown:function(n,r){t.realEnterKey=r.keyCode==e.ui.keyCode.ENTER,t.contextMenu.keyboardLock=!0;switch(r.keyCode){case e.ui.keyCode.UP:t.contextMenu.activate("previousItem");break;case e.ui.keyCode.DOWN:t.contextMenu.activate("nextItem")}},keypress:function(n,r){t.realEnterKey=t.realEnterKey&&r.keyCode==e.ui.keyCode.ENTER},keyup:function(n,r){switch(r.keyCode){case e.ui.keyCode.ESCAPE:t.contextMenu.hide();break;case e.ui.keyCode.ENTER:t.realEnterKey?t.contextMenu.select():t.populate();break;default:t.populate()}}}}),e.Controller("Foundry.Suggest.ContextMenu",{defaults:{}},function(t){return{init:function(){t.parent=t.options.parent,t.contextMenu=t.element,t.options.display.position.of==undefined&&(t.options.display.position.of=t.parent.textField),t.options.display.css.width==undefined&&(t.options.display.css.width=e(t.options.display.position.of).outerWidth())},show:function(e){t.render(e),t.contextMenu.show(0,function(){t.contextMenu.css(t.options.display.css).position(t.options.display.position)})},hide:function(e){t.menuItem().removeClass("active"),t.parent.restoreTextFieldFocus&&t.parent.textField.focus(),(!t.options.persist||e)&&t.element.hide()},render:function(n){var r=t.menuItemGroup();r.empty(),e.each(n,function(n,i){var s=i[".suggestId"],o=i[".suggestType"],u=e(t.options.onRenderItem(i,o)||e.View(t.options["@menuItem"],{data:i,title:i.title}));u.addClass(s).addClass("suggestType_"+o).data("suggestId",s).appendTo(r)});var i=e(t.menuItem("."+t.lastActivatedItem)[0]||t.menuItem(".suggestType_user")[0]||t.menuItem(":first"));i.addClass("active"),t.lastActivatedItem=i.data("suggestId")},lastActivatedItem:"null",activate:function(n){var r,i=t.menuItem(),s=i.filter(".active"),o=i.index(s);switch(n){case"nextItem":r=i.eq(e.Number.rotate(o,0,i.length-1,1));break;case"previousItem":r=i.eq(e.Number.rotate(o,0,i.length-1,-1));break;default:r=t.menuItem("."+n)}if(r.length<1)return;i.removeClass("active"),r.addClass("active"),t.lastActivatedItem=r.data("suggestId");if(t.keyboardLock){var u=t.contextMenu.scrollTop(),a=t.contextMenu.height()+u,f=r.position().top+u,l=f+r.outerHeight(!0);(f<=u||l>=a)&&r[0].scrollIntoView()}},select:function(){var e=t.menuItem(".active");if(e.length<1)return;var n=t.parent.datamap[e.data("suggestId")];t.options.onSelectItem(n,n[".suggestType"]),t.parent.options.keyword.clearAfterSelection&&t.parent.textField.val(""),t.parent.restoreTextFieldFocus=!0,t.options.display.hideAfterSelection&&t.hide(!0)},mouseover:function(){t.options.persist=!0},mouseout:function(){t.options.persist=!1},mousemove:function(){t.keyboardLock=!1},"{menuItem} mouseover":function(e){t.keyboardLock==0&&t.activate(e.data("suggestId"))},"{menuItem} click":function(e,n){t.menuItem().removeClass("active"),e.addClass("active"),t.select()}}}),t.resolve()})};dispatch("suggest").containing(e).to("Foundry/2.1 Modules")})();