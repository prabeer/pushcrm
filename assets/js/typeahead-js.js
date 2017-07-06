!function(t){var e="0.9.3",i={isMsie:function(){var t=/(msie) ([\w.]+)/i.exec(navigator.userAgent);return t?parseInt(t[2],10):!1},isBlankString:function(t){return!t||/^\s*$/.test(t)},escapeRegExChars:function(t){return t.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&")},isString:function(t){return"string"==typeof t},isNumber:function(t){return"number"==typeof t},isArray:t.isArray,isFunction:t.isFunction,isObject:t.isPlainObject,isUndefined:function(t){return"undefined"==typeof t},bind:t.proxy,bindAll:function(e){var i;for(var n in e)t.isFunction(i=e[n])&&(e[n]=t.proxy(i,e))},indexOf:function(t,e){for(var i=0;i<t.length;i++)if(t[i]===e)return i;return-1},each:t.each,map:t.map,filter:t.grep,every:function(e,i){var n=!0;return e?(t.each(e,function(t,s){return(n=i.call(null,s,t,e))?void 0:!1}),!!n):n},some:function(e,i){var n=!1;return e?(t.each(e,function(t,s){return(n=i.call(null,s,t,e))?!1:void 0}),!!n):n},mixin:t.extend,getUniqueId:function(){var t=0;return function(){return t++}}(),defer:function(t){setTimeout(t,0)},debounce:function(t,e,i){var n,s;return function(){var r,o,u=this,a=arguments;return r=function(){n=null,i||(s=t.apply(u,a))},o=i&&!n,clearTimeout(n),n=setTimeout(r,e),o&&(s=t.apply(u,a)),s}},throttle:function(t,e){var i,n,s,r,o,u;return o=0,u=function(){o=new Date,s=null,r=t.apply(i,n)},function(){var a=new Date,c=e-(a-o);return i=this,n=arguments,0>=c?(clearTimeout(s),s=null,o=a,r=t.apply(i,n)):s||(s=setTimeout(u,c)),r}},tokenizeQuery:function(e){return t.trim(e).toLowerCase().split(/[\s]+/)},tokenizeText:function(e){return t.trim(e).toLowerCase().split(/[\s\-_]+/)},getProtocol:function(){return location.protocol},noop:function(){}},n=function(){var t=/\s+/;return{on:function(e,i){var n;if(!i)return this;for(this._callbacks=this._callbacks||{},e=e.split(t);n=e.shift();)this._callbacks[n]=this._callbacks[n]||[],this._callbacks[n].push(i);return this},trigger:function(e,i){var n,s;if(!this._callbacks)return this;for(e=e.split(t);n=e.shift();)if(s=this._callbacks[n])for(var r=0;r<s.length;r+=1)s[r].call(this,{type:n,data:i});return this}}}(),s=function(){function e(e){e&&e.el||t.error("EventBus initialized without el"),this.$el=t(e.el)}var n="typeahead:";return i.mixin(e.prototype,{trigger:function(t){var e=[].slice.call(arguments,1);this.$el.trigger(n+t,e)}}),e}(),r=function(){function t(t){this.prefix=["__",t,"__"].join(""),this.ttlKey="__ttl__",this.keyMatcher=new RegExp("^"+this.prefix)}function e(){return(new Date).getTime()}function n(t){return JSON.stringify(i.isUndefined(t)?null:t)}function s(t){return JSON.parse(t)}var r,o;try{r=window.localStorage,r.setItem("~~~","!"),r.removeItem("~~~")}catch(u){r=null}return o=r&&window.JSON?{_prefix:function(t){return this.prefix+t},_ttlKey:function(t){return this._prefix(t)+this.ttlKey},get:function(t){return this.isExpired(t)&&this.remove(t),s(r.getItem(this._prefix(t)))},set:function(t,s,o){return i.isNumber(o)?r.setItem(this._ttlKey(t),n(e()+o)):r.removeItem(this._ttlKey(t)),r.setItem(this._prefix(t),n(s))},remove:function(t){return r.removeItem(this._ttlKey(t)),r.removeItem(this._prefix(t)),this},clear:function(){var t,e,i=[],n=r.length;for(t=0;n>t;t++)(e=r.key(t)).match(this.keyMatcher)&&i.push(e.replace(this.keyMatcher,""));for(t=i.length;t--;)this.remove(i[t]);return this},isExpired:function(t){var n=s(r.getItem(this._ttlKey(t)));return i.isNumber(n)&&e()>n?!0:!1}}:{get:i.noop,set:i.noop,remove:i.noop,clear:i.noop,isExpired:i.noop},i.mixin(t.prototype,o),t}(),o=function(){function t(t){i.bindAll(this),t=t||{},this.sizeLimit=t.sizeLimit||10,this.cache={},this.cachedKeysByAge=[]}return i.mixin(t.prototype,{get:function(t){return this.cache[t]},set:function(t,e){var i;this.cachedKeysByAge.length===this.sizeLimit&&(i=this.cachedKeysByAge.shift(),delete this.cache[i]),this.cache[t]=e,this.cachedKeysByAge.push(t)}}),t}(),u=function(){function e(t){i.bindAll(this),t=i.isString(t)?{url:t}:t,a=a||new o,u=i.isNumber(t.maxParallelRequests)?t.maxParallelRequests:u||6,this.url=t.url,this.wildcard=t.wildcard||"%QUERY",this.filter=t.filter,this.replace=t.replace,this.ajaxSettings={type:"get",cache:t.cache,timeout:t.timeout,dataType:t.dataType||"json",beforeSend:t.beforeSend},this._get=(/^throttle$/i.test(t.rateLimitFn)?i.throttle:i.debounce)(this._get,t.rateLimitWait||300)}function n(){c++}function s(){c--}function r(){return u>c}var u,a,c=0,h={};return i.mixin(e.prototype,{_get:function(t,e){function i(i){var s=n.filter?n.filter(i):i;e&&e(s),a.set(t,i)}var n=this;r()?this._sendRequest(t).done(i):this.onDeckRequestArgs=[].slice.call(arguments,0)},_sendRequest:function(e){function i(){s(),h[e]=null,r.onDeckRequestArgs&&(r._get.apply(r,r.onDeckRequestArgs),r.onDeckRequestArgs=null)}var r=this,o=h[e];return o||(n(),o=h[e]=t.ajax(e,this.ajaxSettings).always(i)),o},get:function(t,e){var n,s,r=this,o=encodeURIComponent(t||"");return e=e||i.noop,n=this.replace?this.replace(this.url,o):this.url.replace(this.wildcard,o),(s=a.get(n))?i.defer(function(){e(r.filter?r.filter(s):s)}):this._get(n,e),!!s}}),e}(),a=function(){function n(e){i.bindAll(this),i.isString(e.template)&&!e.engine&&t.error("no template engine specified"),e.local||e.prefetch||e.remote||t.error("one of local, prefetch, or remote is required"),this.name=e.name||i.getUniqueId(),this.limit=e.limit||5,this.minLength=e.minLength||1,this.header=e.header,this.footer=e.footer,this.valueKey=e.valueKey||"value",this.template=s(e.template,e.engine,this.valueKey),this.local=e.local,this.prefetch=e.prefetch,this.remote=e.remote,this.itemHash={},this.adjacencyList={},this.storage=e.name?new r(e.name):null}function s(t,e,n){var s,r;return i.isFunction(t)?s=t:i.isString(t)?(r=e.compile(t),s=i.bind(r.render,r)):s=function(t){return"<p>"+t[n]+"</p>"},s}var o={thumbprint:"thumbprint",protocol:"protocol",itemHash:"itemHash",adjacencyList:"adjacencyList"};return i.mixin(n.prototype,{_processLocalData:function(t){this._mergeProcessedData(this._processData(t))},_loadPrefetchData:function(n){function s(t){var e=n.filter?n.filter(t):t,s=d._processData(e),r=s.itemHash,u=s.adjacencyList;d.storage&&(d.storage.set(o.itemHash,r,n.ttl),d.storage.set(o.adjacencyList,u,n.ttl),d.storage.set(o.thumbprint,p,n.ttl),d.storage.set(o.protocol,i.getProtocol(),n.ttl)),d._mergeProcessedData(s)}var r,u,a,c,h,l,d=this,p=e+(n.thumbprint||"");return this.storage&&(r=this.storage.get(o.thumbprint),u=this.storage.get(o.protocol),a=this.storage.get(o.itemHash),c=this.storage.get(o.adjacencyList)),h=r!==p||u!==i.getProtocol(),n=i.isString(n)?{url:n}:n,n.ttl=i.isNumber(n.ttl)?n.ttl:864e5,a&&c&&!h?(this._mergeProcessedData({itemHash:a,adjacencyList:c}),l=t.Deferred().resolve()):l=t.getJSON(n.url).done(s),l},_transformDatum:function(t){var e=i.isString(t)?t:t[this.valueKey],n=t.tokens||i.tokenizeText(e),s={value:e,tokens:n};return i.isString(t)?(s.datum={},s.datum[this.valueKey]=t):s.datum=t,s.tokens=i.filter(s.tokens,function(t){return!i.isBlankString(t)}),s.tokens=i.map(s.tokens,function(t){return t.toLowerCase()}),s},_processData:function(t){var e=this,n={},s={};return i.each(t,function(t,r){var o=e._transformDatum(r),u=i.getUniqueId(o.value);n[u]=o,i.each(o.tokens,function(t,e){var n=e.charAt(0),r=s[n]||(s[n]=[u]);!~i.indexOf(r,u)&&r.push(u)})}),{itemHash:n,adjacencyList:s}},_mergeProcessedData:function(t){var e=this;i.mixin(this.itemHash,t.itemHash),i.each(t.adjacencyList,function(t,i){var n=e.adjacencyList[t];e.adjacencyList[t]=n?n.concat(i):i})},_getLocalSuggestions:function(t){var e,n=this,s=[],r=[],o=[];return i.each(t,function(t,e){var n=e.charAt(0);!~i.indexOf(s,n)&&s.push(n)}),i.each(s,function(t,i){var s=n.adjacencyList[i];return s?(r.push(s),void((!e||s.length<e.length)&&(e=s))):!1}),r.length<s.length?[]:(i.each(e,function(e,s){var u,a,c=n.itemHash[s];u=i.every(r,function(t){return~i.indexOf(t,s)}),a=u&&i.every(t,function(t){return i.some(c.tokens,function(e){return 0===e.indexOf(t)})}),a&&o.push(c)}),o)},initialize:function(){var e;return this.local&&this._processLocalData(this.local),this.transport=this.remote?new u(this.remote):null,e=this.prefetch?this._loadPrefetchData(this.prefetch):t.Deferred().resolve(),this.local=this.prefetch=this.remote=null,this.initialize=function(){return e},e},getSuggestions:function(t,e){function n(t){r=r.slice(0),i.each(t,function(t,e){var n,s=o._transformDatum(e);return n=i.some(r,function(t){return s.value===t.value}),!n&&r.push(s),r.length<o.limit}),e&&e(r)}var s,r,o=this,u=!1;t.length<this.minLength||(s=i.tokenizeQuery(t),r=this._getLocalSuggestions(s).slice(0,this.limit),r.length<this.limit&&this.transport&&(u=this.transport.get(t,n)),!u&&e&&e(r))}}),n}(),c=function(){function e(e){var n=this;i.bindAll(this),this.specialKeyCodeMap={9:"tab",27:"esc",37:"left",39:"right",13:"enter",38:"up",40:"down"},this.$hint=t(e.hint),this.$input=t(e.input).on("blur.tt",this._handleBlur).on("focus.tt",this._handleFocus).on("keydown.tt",this._handleSpecialKeyEvent),i.isMsie()?this.$input.on("keydown.tt keypress.tt cut.tt paste.tt",function(t){n.specialKeyCodeMap[t.which||t.keyCode]||i.defer(n._compareQueryToInputValue)}):this.$input.on("input.tt",this._compareQueryToInputValue),this.query=this.$input.val(),this.$overflowHelper=s(this.$input)}function s(e){return t("<span></span>").css({position:"absolute",left:"-9999px",visibility:"hidden",whiteSpace:"nowrap",fontFamily:e.css("font-family"),fontSize:e.css("font-size"),fontStyle:e.css("font-style"),fontVariant:e.css("font-variant"),fontWeight:e.css("font-weight"),wordSpacing:e.css("word-spacing"),letterSpacing:e.css("letter-spacing"),textIndent:e.css("text-indent"),textRendering:e.css("text-rendering"),textTransform:e.css("text-transform")}).insertAfter(e)}function r(t,e){return t=(t||"").replace(/^\s*/g,"").replace(/\s{2,}/g," "),e=(e||"").replace(/^\s*/g,"").replace(/\s{2,}/g," "),t===e}return i.mixin(e.prototype,n,{_handleFocus:function(){this.trigger("focused")},_handleBlur:function(){this.trigger("blured")},_handleSpecialKeyEvent:function(t){var e=this.specialKeyCodeMap[t.which||t.keyCode];e&&this.trigger(e+"Keyed",t)},_compareQueryToInputValue:function(){var t=this.getInputValue(),e=r(this.query,t),i=e?this.query.length!==t.length:!1;i?this.trigger("whitespaceChanged",{value:this.query}):e||this.trigger("queryChanged",{value:this.query=t})},destroy:function(){this.$hint.off(".tt"),this.$input.off(".tt"),this.$hint=this.$input=this.$overflowHelper=null},focus:function(){this.$input.focus()},blur:function(){this.$input.blur()},getQuery:function(){return this.query},setQuery:function(t){this.query=t},getInputValue:function(){return this.$input.val()},setInputValue:function(t,e){this.$input.val(t),!e&&this._compareQueryToInputValue()},getHintValue:function(){return this.$hint.val()},setHintValue:function(t){this.$hint.val(t)},getLanguageDirection:function(){return(this.$input.css("direction")||"ltr").toLowerCase()},isOverflow:function(){return this.$overflowHelper.text(this.getInputValue()),this.$overflowHelper.width()>this.$input.width()},isCursorAtEnd:function(){var t,e=this.$input.val().length,n=this.$input[0].selectionStart;return i.isNumber(n)?n===e:document.selection?(t=document.selection.createRange(),t.moveStart("character",-e),e===t.text.length):!0}}),e}(),h=function(){function e(e){i.bindAll(this),this.isOpen=!1,this.isEmpty=!0,this.isMouseOverDropdown=!1,this.$menu=t(e.menu).on("mouseenter.tt",this._handleMouseenter).on("mouseleave.tt",this._handleMouseleave).on("click.tt",".tt-suggestion",this._handleSelection).on("mouseover.tt",".tt-suggestion",this._handleMouseover)}function s(t){return t.data("suggestion")}var r={suggestionsList:'<span class="tt-suggestions"></span>'},o={suggestionsList:{display:"block"},suggestion:{whiteSpace:"nowrap",cursor:"pointer"},suggestionChild:{whiteSpace:"normal"}};return i.mixin(e.prototype,n,{_handleMouseenter:function(){this.isMouseOverDropdown=!0},_handleMouseleave:function(){this.isMouseOverDropdown=!1},_handleMouseover:function(e){var i=t(e.currentTarget);this._getSuggestions().removeClass("tt-is-under-cursor"),i.addClass("tt-is-under-cursor")},_handleSelection:function(e){var i=t(e.currentTarget);this.trigger("suggestionSelected",s(i))},_show:function(){this.$menu.css("display","block")},_hide:function(){this.$menu.hide()},_moveCursor:function(t){var e,i,n,r;if(this.isVisible()){if(e=this._getSuggestions(),i=e.filter(".tt-is-under-cursor"),i.removeClass("tt-is-under-cursor"),n=e.index(i)+t,n=(n+1)%(e.length+1)-1,-1===n)return void this.trigger("cursorRemoved");-1>n&&(n=e.length-1),r=e.eq(n).addClass("tt-is-under-cursor"),this._ensureVisibility(r),this.trigger("cursorMoved",s(r))}},_getSuggestions:function(){return this.$menu.find(".tt-suggestions > .tt-suggestion")},_ensureVisibility:function(t){var e=this.$menu.height()+parseInt(this.$menu.css("paddingTop"),10)+parseInt(this.$menu.css("paddingBottom"),10),i=this.$menu.scrollTop(),n=t.position().top,s=n+t.outerHeight(!0);0>n?this.$menu.scrollTop(i+n):s>e&&this.$menu.scrollTop(i+(s-e))},destroy:function(){this.$menu.off(".tt"),this.$menu=null},isVisible:function(){return this.isOpen&&!this.isEmpty},closeUnlessMouseIsOverDropdown:function(){this.isMouseOverDropdown||this.close()},close:function(){this.isOpen&&(this.isOpen=!1,this.isMouseOverDropdown=!1,this._hide(),this.$menu.find(".tt-suggestions > .tt-suggestion").removeClass("tt-is-under-cursor"),this.trigger("closed"))},open:function(){this.isOpen||(this.isOpen=!0,!this.isEmpty&&this._show(),this.trigger("opened"))},setLanguageDirection:function(t){var e={left:"0",right:"auto"},i={left:"auto",right:" 0"};"ltr"===t?this.$menu.css(e):this.$menu.css(i)},moveCursorUp:function(){this._moveCursor(-1)},moveCursorDown:function(){this._moveCursor(1)},getSuggestionUnderCursor:function(){var t=this._getSuggestions().filter(".tt-is-under-cursor").first();return t.length>0?s(t):null},getFirstSuggestion:function(){var t=this._getSuggestions().first();return t.length>0?s(t):null},renderSuggestions:function(e,n){var s,u,a,c,h,l="tt-dataset-"+e.name,d='<div class="tt-suggestion">%body</div>',p=this.$menu.find("."+l);0===p.length&&(u=t(r.suggestionsList).css(o.suggestionsList),p=t("<div></div>").addClass(l).append(e.header).append(u).append(e.footer).appendTo(this.$menu)),n.length>0?(this.isEmpty=!1,this.isOpen&&this._show(),a=document.createElement("div"),c=document.createDocumentFragment(),i.each(n,function(i,n){n.dataset=e.name,s=e.template(n.datum),a.innerHTML=d.replace("%body",s),h=t(a.firstChild).css(o.suggestion).data("suggestion",n),h.children().each(function(){t(this).css(o.suggestionChild)}),c.appendChild(h[0])}),p.show().find(".tt-suggestions").html(c)):this.clearSuggestions(e.name),this.trigger("suggestionsRendered")},clearSuggestions:function(t){var e=t?this.$menu.find(".tt-dataset-"+t):this.$menu.find('[class^="tt-dataset-"]'),i=e.find(".tt-suggestions");e.hide(),i.empty(),0===this._getSuggestions().length&&(this.isEmpty=!0,this._hide())}}),e}(),l=function(){function e(t){var e,n,r;i.bindAll(this),this.$node=s(t.input),this.datasets=t.datasets,this.dir=null,this.eventBus=t.eventBus,e=this.$node.find(".tt-dropdown-menu"),n=this.$node.find(".tt-query"),r=this.$node.find(".tt-hint"),this.dropdownView=new h({menu:e}).on("suggestionSelected",this._handleSelection).on("cursorMoved",this._clearHint).on("cursorMoved",this._setInputValueToSuggestionUnderCursor).on("cursorRemoved",this._setInputValueToQuery).on("cursorRemoved",this._updateHint).on("suggestionsRendered",this._updateHint).on("opened",this._updateHint).on("closed",this._clearHint).on("opened closed",this._propagateEvent),this.inputView=new c({input:n,hint:r}).on("focused",this._openDropdown).on("blured",this._closeDropdown).on("blured",this._setInputValueToQuery).on("enterKeyed tabKeyed",this._handleSelection).on("queryChanged",this._clearHint).on("queryChanged",this._clearSuggestions).on("queryChanged",this._getSuggestions).on("whitespaceChanged",this._updateHint).on("queryChanged whitespaceChanged",this._openDropdown).on("queryChanged whitespaceChanged",this._setLanguageDirection).on("escKeyed",this._closeDropdown).on("escKeyed",this._setInputValueToQuery).on("tabKeyed upKeyed downKeyed",this._managePreventDefault).on("upKeyed downKeyed",this._moveDropdownCursor).on("upKeyed downKeyed",this._openDropdown).on("tabKeyed leftKeyed rightKeyed",this._autocomplete)}function s(e){var i=t(o.wrapper),n=t(o.dropdown),s=t(e),r=t(o.hint);i=i.css(u.wrapper),n=n.css(u.dropdown),r.css(u.hint).css({backgroundAttachment:s.css("background-attachment"),backgroundClip:s.css("background-clip"),backgroundColor:s.css("background-color"),backgroundImage:s.css("background-image"),backgroundOrigin:s.css("background-origin"),backgroundPosition:s.css("background-position"),backgroundRepeat:s.css("background-repeat"),backgroundSize:s.css("background-size")}),s.data("ttAttrs",{dir:s.attr("dir"),autocomplete:s.attr("autocomplete"),spellcheck:s.attr("spellcheck"),style:s.attr("style")}),s.addClass("tt-query").attr({autocomplete:"off",spellcheck:!1}).css(u.query);try{!s.attr("dir")&&s.attr("dir","auto")}catch(a){}return s.wrap(i).parent().prepend(r).append(n)}function r(t){var e=t.find(".tt-query");i.each(e.data("ttAttrs"),function(t,n){i.isUndefined(n)?e.removeAttr(t):e.attr(t,n)}),e.detach().removeData("ttAttrs").removeClass("tt-query").insertAfter(t),t.remove()}var o={wrapper:'<span class="twitter-typeahead"></span>',hint:'<input class="tt-hint" type="text" autocomplete="off" spellcheck="off" disabled>',dropdown:'<span class="tt-dropdown-menu"></span>'},u={wrapper:{position:"relative",display:"inline-block"},hint:{position:"absolute",top:"0",left:"0",borderColor:"transparent",boxShadow:"none"},query:{position:"relative",verticalAlign:"top",backgroundColor:"transparent"},dropdown:{position:"absolute",top:"100%",left:"0",zIndex:"100",display:"none"}};return i.isMsie()&&i.mixin(u.query,{backgroundImage:"url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"}),i.isMsie()&&i.isMsie()<=7&&(i.mixin(u.wrapper,{display:"inline",zoom:"1"}),i.mixin(u.query,{marginTop:"-1px"})),i.mixin(e.prototype,n,{_managePreventDefault:function(t){var e,i,n=t.data,s=!1;switch(t.type){case"tabKeyed":e=this.inputView.getHintValue(),i=this.inputView.getInputValue(),s=e&&e!==i;break;case"upKeyed":case"downKeyed":s=!n.shiftKey&&!n.ctrlKey&&!n.metaKey}s&&n.preventDefault()},_setLanguageDirection:function(){var t=this.inputView.getLanguageDirection();t!==this.dir&&(this.dir=t,this.$node.css("direction",t),this.dropdownView.setLanguageDirection(t))},_updateHint:function(){var t,e,n,s,r,o=this.dropdownView.getFirstSuggestion(),u=o?o.value:null,a=this.dropdownView.isVisible(),c=this.inputView.isOverflow();u&&a&&!c&&(t=this.inputView.getInputValue(),e=t.replace(/\s{2,}/g," ").replace(/^\s+/g,""),n=i.escapeRegExChars(e),s=new RegExp("^(?:"+n+")(.*$)","i"),r=s.exec(u),this.inputView.setHintValue(t+(r?r[1]:"")))},_clearHint:function(){this.inputView.setHintValue("")},_clearSuggestions:function(){this.dropdownView.clearSuggestions()},_setInputValueToQuery:function(){this.inputView.setInputValue(this.inputView.getQuery())},_setInputValueToSuggestionUnderCursor:function(t){var e=t.data;this.inputView.setInputValue(e.value,!0)},_openDropdown:function(){this.dropdownView.open()},_closeDropdown:function(t){this.dropdownView["blured"===t.type?"closeUnlessMouseIsOverDropdown":"close"]()},_moveDropdownCursor:function(t){var e=t.data;e.shiftKey||e.ctrlKey||e.metaKey||this.dropdownView["upKeyed"===t.type?"moveCursorUp":"moveCursorDown"]()},_handleSelection:function(t){var e="suggestionSelected"===t.type,n=e?t.data:this.dropdownView.getSuggestionUnderCursor();n&&(this.inputView.setInputValue(n.value),e?this.inputView.focus():t.data.preventDefault(),e&&i.isMsie()?i.defer(this.dropdownView.close):this.dropdownView.close(),this.eventBus.trigger("selected",n.datum,n.dataset))},_getSuggestions:function(){var t=this,e=this.inputView.getQuery();i.isBlankString(e)||i.each(this.datasets,function(i,n){n.getSuggestions(e,function(i){e===t.inputView.getQuery()&&t.dropdownView.renderSuggestions(n,i)})})},_autocomplete:function(t){var e,i,n,s,r;("rightKeyed"!==t.type&&"leftKeyed"!==t.type||(e=this.inputView.isCursorAtEnd(),i="ltr"===this.inputView.getLanguageDirection()?"leftKeyed"===t.type:"rightKeyed"===t.type,e&&!i))&&(n=this.inputView.getQuery(),s=this.inputView.getHintValue(),""!==s&&n!==s&&(r=this.dropdownView.getFirstSuggestion(),this.inputView.setInputValue(r.value),this.eventBus.trigger("autocompleted",r.datum,r.dataset)))},_propagateEvent:function(t){this.eventBus.trigger(t.type)},destroy:function(){this.inputView.destroy(),this.dropdownView.destroy(),r(this.$node),this.$node=null},setQuery:function(t){this.inputView.setQuery(t),this.inputView.setInputValue(t),this._clearHint(),this._clearSuggestions(),this._getSuggestions()}}),e}();!function(){var e,n={},r="ttView";e={initialize:function(e){function o(){var e,n=t(this),o=new s({el:n});e=i.map(u,function(t){return t.initialize()}),n.data(r,new l({input:n,eventBus:o=new s({el:n}),datasets:u})),t.when.apply(t,e).always(function(){i.defer(function(){o.trigger("initialized")})})}var u;return e=i.isArray(e)?e:[e],0===e.length&&t.error("no datasets provided"),u=i.map(e,function(t){var e=n[t.name]?n[t.name]:new a(t);return t.name&&(n[t.name]=e),e}),this.each(o)},destroy:function(){function e(){var e=t(this),i=e.data(r);i&&(i.destroy(),e.removeData(r))}return this.each(e)},setQuery:function(e){function i(){var i=t(this).data(r);i&&i.setQuery(e)}return this.each(i)}},jQuery.fn.typeahead=function(t){return e[t]?e[t].apply(this,[].slice.call(arguments,1)):e.initialize.apply(this,arguments)}}()}(window.jQuery);