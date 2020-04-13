//create by jsc
//     Zepto.js
//     (c) 2010-2014 Thomas Fuchs
//     Zepto.js may be freely distributed under the MIT license.

//./core

function mimeToDataType(mime){
    if (mime)
        mime = mime.split(';', 2)[0]
    return mime &&
        (mime == htmlType ? 'html' : mime == jsonType ? 'json' : scriptTypeRE.test(mime) ? 'script' : xmlTypeRE.test(mime) && 'xml') ||
        'text'
}

function appendQuery(url, query) {
    return(url + '&' + query).replace(/[&?]{1,2}/, '?')
}

function serializeData(options) {
    if (options.processData && options.data && $.type(options.data) != "string")
        options.data = $.param(options.data, options.traditional)
    if (options.data && (!options.type || options.type.toUpperCase() == 'GET'))
        options.url = appendQuery(options.url, options.data)
}

function triggerAndReturn(context, eventName, data) {
    var event = $.Event(eventName)
    $(context).trigger(event, data)
    return!event.defaultPrevented
}

function triggerGlobal(settings, context, eventName, data) {
    if (settings.global)
        return triggerAndReturn(context || document, eventName, data)
}
$.active = 0
function ajaxStart(settings) {
    if (settings.global && $.active++ === 0)
        triggerGlobal(settings, null, 'ajaxStart')
}

function ajaxStop(settings) {
    if (settings.global && !(--$.active))
        triggerGlobal(settings, null, 'ajaxStop')
}

function ajaxBeforeSend(xhr, settings) {
    var context = settings.context
    if (settings.beforeSend.call(context, xhr, settings) === false || triggerGlobal(settings, context, 'ajaxBeforeSend', [xhr, settings]) === false)
        return false
    triggerGlobal(settings, context, 'ajaxSend', [xhr, settings])
}

function ajaxSuccess(data, xhr, settings) {
    var context = settings.context, status = 'success'
    settings.success.call(context, data, status, xhr)
    triggerGlobal(settings, context, 'ajaxSuccess', [xhr, settings, data])
    ajaxComplete(status, xhr, settings)
}

function ajaxError(error, type, xhr, settings) {
    var context = settings.context
    settings.error.call(context, xhr, type, error)
    triggerGlobal(settings, context, 'ajaxError', [xhr, settings, error])
    ajaxComplete(type, xhr, settings)
}

function ajaxComplete(status, xhr, settings) {
    var context = settings.context
    settings.complete.call(context, xhr, status)
    triggerGlobal(settings, context, 'ajaxComplete', [xhr, settings])
    ajaxStop(settings)
}

function empty() {
}

$.ajaxJSONP = function (options) {
    for (key in $.ajaxSettings)
        if (options[key] === undefined)
            options[key] = $.ajaxSettings[key]
    if (!('type'in options))
        return $.ajax(options)
    var callbackName = options.jsonpCallback || 'jsonp' + (++jsonpID), script = document.createElement('script'), cleanup = function () {
        clearTimeout(abortTimeout)
        $(script).remove()
        delete window[callbackName]
    }, abort = function (type) {
        cleanup()
        if (!type || type == 'timeout')
            window[callbackName] = empty
        ajaxError(null, type || 'abort', xhr, options)
    }, xhr = {abort: abort}, abortTimeout
    if (ajaxBeforeSend(xhr, options) === false) {
        abort('abort')
        return false
    }
    window[callbackName] = function (data) {
        cleanup()
        ajaxSuccess(data, xhr, options)
    }
    script.onerror = function () {
        abort('error')
    }
    script.src = options.url.replace(/=\?/, '=' + callbackName);
    if (options.scriptCharset) {
        script.charset = options.scriptCharset;
    }
    $('head').append(script)
    if (options.timeout > 0)
        abortTimeout = setTimeout(function () {
            abort('timeout')
        }, options.timeout)
    return xhr
}
var jsonpID = 0, document = window.document, key, name, rscript = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi, scriptTypeRE = /^(?:text|application)\/javascript/i, xmlTypeRE = /^(?:text|application)\/xml/i, jsonType = 'application/json', htmlType = 'text/html', blankRE = /^\s*$/;
$.ajaxSettings = {type: 'GET', beforeSend: empty, success: empty, error: empty, complete: empty, context: null, global: true, xhr: function () {
    return new window.XMLHttpRequest()
}, accepts: {script: 'text/javascript, application/javascript', json: jsonType, xml: 'application/xml, text/xml', html: htmlType, text: 'text/plain'}, crossDomain: false, timeout: 0, processData: true, cache: true}

$.ajax = function (options) {
    var settings = $.extend({}, options || {})
    for (key in $.ajaxSettings)
        if (settings[key] === undefined)
            settings[key] = $.ajaxSettings[key]
    ajaxStart(settings)
    if (!settings.crossDomain)
        settings.crossDomain = /^([\w-]+:)?\/\/([^\/]+)/.test(settings.url) && RegExp.$2 != window.location.host
    if (!settings.url)
        settings.url = window.location.toString()
    serializeData(settings)
    if (settings.cache === false)
        settings.url = appendQuery(settings.url, '_=' + Date.now())
    var dataType = settings.dataType, hasPlaceholder = /=\?/.test(settings.url)
    if (dataType == 'jsonp' || hasPlaceholder) {
        if (!hasPlaceholder)
            settings.url = appendQuery(settings.url, 'callback=?')
        return $.ajaxJSONP(settings)
    }
    var mime = settings.accepts[dataType], baseHeaders = {}, protocol = /^([\w-]+:)\/\//.test(settings.url) ? RegExp.$1 : window.location.protocol, xhr = settings.xhr(), abortTimeout
    if (!settings.crossDomain)
        baseHeaders['X-Requested-With'] = 'XMLHttpRequest'
    if (mime) {
        baseHeaders['Accept'] = mime
        if (mime.indexOf(',') > -1)
            mime = mime.split(',', 2)[0]
        xhr.overrideMimeType && xhr.overrideMimeType(mime)
    }
    if (settings.contentType || (settings.contentType !== false && settings.data && settings.type.toUpperCase() != 'GET'))
        baseHeaders['Content-Type'] = (settings.contentType || 'application/x-www-form-urlencoded')
    settings.headers = $.extend(baseHeaders, settings.headers || {})
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            xhr.onreadystatechange = empty;
            clearTimeout(abortTimeout)
            var result, error = false
            if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304 || (xhr.status == 0 && protocol == 'file:')) {
                dataType = dataType || mimeToDataType(xhr.getResponseHeader('content-type'))
                result = xhr.responseText
                try {
                    if (dataType == 'script')
                        (1, eval)(result)
                    else if (dataType == 'xml')
                        result = xhr.responseXML
                    else if (dataType == 'json')
                        result = blankRE.test(result) ? null : $.parseJSON(result)
                }
                catch (e) {
                    error = e
                }
                if (error)
                    ajaxError(error, 'parsererror', xhr, settings)
                else
                    ajaxSuccess(result, xhr, settings)
            }
            else {
                ajaxError(null, xhr.status ? 'error' : 'abort', xhr, settings)
            }
        }
    }
    var async = 'async'in settings ? settings.async : true
    xhr.open(settings.type, settings.url, async)
    for (name in settings.headers)
        xhr.setRequestHeader(name, settings.headers[name])
    if (ajaxBeforeSend(xhr, settings) === false) {
        xhr.abort()
        return false
    }
    if (settings.timeout > 0)
        abortTimeout = setTimeout(function () {
            xhr.onreadystatechange = empty
            xhr.abort()
            ajaxError(null, 'timeout', xhr, settings)
        }, settings.timeout)
    xhr.send(settings.data ? settings.data : null)
    return xhr
}

/////////

   var qsa = function(element, selector){
		var found
		return (isDocument(element) && idSelectorRE.test(selector)) ? ((found = element.getElementById(RegExp.$1)) ? [found] : []) : (element.nodeType !== 1 && element.nodeType !== 9) ? [] : slice.call(classSelectorRE.test(selector) ? element.getElementsByClassName(RegExp.$1) : tagSelectorRE.test(selector) ? element.getElementsByTagName(selector) : element.querySelectorAll(selector))
	}
   var matches = function(element, selector){
		if (!element || element.nodeType !== 1)
			return false
		var matchesSelector = element.webkitMatchesSelector || element.mozMatchesSelector ||
		element.oMatchesSelector ||
		element.matchesSelector
		if (matchesSelector)
			return matchesSelector.call(element, selector)
		// fall back to performing a selector:
		var match, parent = element.parentNode, temp = !parent
		if (temp)
			(parent = tempParent).appendChild(element)
		match = ~ qsa(parent, selector).indexOf(element)
		temp && tempParent.removeChild(element)
		return match
	}
	

function isFunction(value){
		return type(value) == "function"
	}
$.fn.bind = function(event, callback){
		return this.each(function(){
			add(this, event, callback)
		})
	}
var returnTrue = function(){
		return true
	}, returnFalse = function(){
		return false
	}, ignoreProperties = /^([A-Z]|layer[XY]$)/, eventMethods = {
		preventDefault: 'isDefaultPrevented',
		stopImmediatePropagation: 'isImmediatePropagationStopped',
		stopPropagation: 'isPropagationStopped'
	}
	function createProxy(event){
		var key, proxy = {
			originalEvent: event
		}
		for (key in event)
			if (!ignoreProperties.test(key) && event[key] !== undefined)
				proxy[key] = event[key]

		$.each(eventMethods, function(name, predicate){
			if(!event[name]) return;
			proxy[name] = function(){
				this[predicate] = returnTrue
				return event[name].apply(event, arguments)
			}
			proxy[predicate] = returnFalse
		})
		return proxy
	}
	
var delegateEvent = {};
	$.fn.delegate = function(selector, events, callback){
		var self = this;
		eachEvent(events, callback, function(event, callback){
			event = wechatFix(event);
			if(!delegateEvent[event]){
				delegateEvent[event] = [];
				add(document.body, event, callback, selector, function(){
					return function(e){
						var evt = createProxy(e),
							match,
							node = e.target,
							dels = delegateEvent[e.type].slice(),
							result;

						hasDelegate : while (true){
							for(var i = 0, data; data = dels[i]; i++){
								if($.contains(data.element, node)){
									match = matches(node, data.selector) ? node : null;
									if(match){
										data.match = match;
										evt = $.extend(evt, {
											currentTarget: match,
											liveFired: data.element
										});
										result = data.callback.apply(data.match, [evt].concat([].slice.call(arguments, 1)))
										if(result === false || evt.returnValue === false){
											break hasDelegate;
										}
										//事件触发后从堆栈中溢出 保证不重复触发
										dels.splice(i, 1);
										i--;
									}
								}else{
									//如果节点不在delegate子节点或等于根节点 则不匹配代理从堆栈从移除
									dels.splice(i, 1);
									i--;
								}
							}

							if(!dels.length || node != null && node.nodeType == node.DOCUMENT_NODE){
								break;
							}
							if(!node) return null; //在某些时序下可能发生node==null的情况，下面一行报错
							node = node.parentNode;
						}

						return result;
					}
				})
			}

			self.each(function(i, element){
				delegateEvent[event].push({
					element : element,
					selector : selector,
					event : event,
					callback : callback
				});
			})
		});
		return this;
	}
$.fn.on = function(event, selector, callback){
		return !selector || $.isFunction(selector) ? this.bind(event, selector || callback) : this.delegate(selector, event, callback)
	}	
 //./detect
	function detect(ua){
		var os = this.os = {},
            browser = this.browser = {},
            webkit = ua.match(/WebKit\/([\d.]+)/),
            android = ua.match(/(Android)\s+([\d.]+)/),
            ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
            iphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
            webos = ua.match(/(webOS|hpwOS)[\s\/]([\d.]+)/),
            touchpad = webos && ua.match(/TouchPad/),
            kindle = ua.match(/Kindle\/([\d.]+)/),
            silk = ua.match(/Silk\/([\d._]+)/),
            blackberry = ua.match(/(BlackBerry).*Version\/([\d.]+)/),
            bb10 = ua.match(/(BB10).*Version\/([\d.]+)/),
            rimtabletos = ua.match(/(RIM\sTablet\sOS)\s([\d.]+)/),
            playbook = ua.match(/PlayBook/),
            chrome = ua.match(/Chrome\/([\d.]+)/) || ua.match(/CriOS\/([\d.]+)/),
            firefox = ua.match(/Firefox\/([\d.]+)/),
            wechat = ua.match(/MicroMessenger\/([\d\.]+)/),
            safariLike = ua.match(/Safari\/([\d.]+)/),
            uc = ua.match(/\s?UC|JUC|UCWEB/),  //版本号无规律
            qq = ua.match(/MQQBrowser/)

		// Todo: clean this up with a better OS/browser seperation:
		// - discern (more) between multiple browsers on android
		// - decide if kindle fire in silk mode is android or not
		// - Firefox on Android doesn't specify the Android version
		// - possibly devide in os, device and browser hashes

		if (browser.webkit = !!webkit)
			browser.version = webkit[1]

		if (android)
			os.android = true, os.version = android[2]
		if (iphone)
			os.ios = os.iphone = true, os.version = iphone[2].replace(/_/g, '.')
		if (ipad)
			os.ios = os.ipad = true, os.version = ipad[2].replace(/_/g, '.')
		if (webos)
			os.webos = true, os.version = webos[2]
		if (touchpad)
			os.touchpad = true
		if (blackberry)
			os.blackberry = true, os.version = blackberry[2]
		if (bb10)
			os.bb10 = true, os.version = bb10[2]
		if (rimtabletos)
			os.rimtabletos = true, os.version = rimtabletos[2]
		if (playbook)
			browser.playbook = true
		if (kindle)
			os.kindle = true, os.version = kindle[1]
		if (silk)
			browser.silk = true, browser.version = silk[1]
		if (!silk && os.android && ua.match(/Kindle Fire/))
			browser.silk = true
		if (chrome)
			browser.chrome = true, browser.version = chrome[1]
		if (firefox)
			browser.firefox = true, browser.version = firefox[1]
        if(wechat)
            browser.wechat = true, browser.version = wechat[1]
        if(uc) {
			browser.uc = true, browser.version = '8.6';
			// 8.4 是个坑爹的版本，要标注下
			var webkitVersion = 0;
			var sua = navigator.userAgent;
			var t = sua.match(/AppleWebKit\/([\w\._]+)/);
			if (t) {
				webkitVersion = t[1];
			}
			if(['530','530+'].indexOf(webkitVersion) >= 0) {
				browser.version = '8.4';
			}
		}
        if(qq)
            browser.qq = true, browser.version = '4.2'
        if(safariLike && !qq && !uc && !wechat && !chrome)
            browser.safari = true

		os.tablet = !!(ipad || playbook || (android && !ua.match(/Mobile/)) || (firefox && ua.match(/Tablet/)))
		os.phone = !!(!os.tablet &&
		(android || iphone || webos || blackberry || bb10 ||
		(chrome && ua.match(/Android/)) ||
		(chrome && ua.match(/CriOS\/([\d.]+)/)) ||
		(firefox && ua.match(/Mobile/))))
	}

	detect.call($, navigator.userAgent)
	// make available to unit tests
	$.__detect = detect
//./event
	var handlers = {}, _zid = 1, specialEvents = {}, hover = {
		mouseenter: 'mouseover',
		mouseleave: 'mouseout'
	};
	
	specialEvents.click = specialEvents.mousedown = specialEvents.mouseup = specialEvents.mousemove = 'MouseEvents'

	//修正weixin 4.2-4.5自定义tap事件问题
	function wechatFix(type){
		if ($.browser.wechat) {
			var version = parseFloat($.browser.version);
			if (version >= 4.2 && version <= 4.5) {
				type = type.toLowerCase();
				if ((type.indexOf('tap') >= 0 || type.indexOf('swipe') >= 0) && type.indexOf('weixin-') == -1 ) {
					type = 'weixin-' + type;
				}
			}
		}
		return type;
	}

	function zid(element){
		return element._zid || (element._zid = _zid++)
	}
	function findHandlers(element, event, fn, selector){
		event = parse(event)
		if (event.ns)
			var matcher = matcherFor(event.ns)
		return (handlers[zid(element)] || []).filter(function(handler){
			return handler &&
				(!event.e || handler.e == event.e) &&
				(!event.ns || matcher.test(handler.ns)) &&
				(!fn || zid(handler.fn) === zid(fn)) &&
				(!selector || handler.sel == selector)
		})
	}
	function parse(event){
		var parts = ('' + event).split('.')
		return {
			e: parts[0],
			ns: parts.slice(1).sort().join(' ')
		}
	}
	function matcherFor(ns){
		return new RegExp('(?:^| )' + ns.replace(' ', ' .* ?') + '(?: |$)')
	}

	function eachEvent(events, fn, iterator){
		if ($.type(events) != "string")
			$.each(events, iterator)
		else
			events.split(/\s/).forEach(function(type){
				iterator(type, fn)
			})
	}

	function eventCapture(handler, captureSetting){
		return handler.del &&
			(handler.e == 'focus' || handler.e == 'blur') ||
			!!captureSetting
	}

	function realEvent(type){
		return wechatFix(hover[type] || type)
	}

	function add(element, events, fn, selector, getDelegate, capture){
		var id = zid(element), set = (handlers[id] || (handlers[id] = []))
		eachEvent(events, fn, function(event, fn){
			var handler = parse(event)
			handler.fn = fn
			handler.sel = selector
			// emulate mouseenter, mouseleave
			if (handler.e in hover)
				fn = function(e){
					var related = e.relatedTarget
					if (!related || (related !== this && !$.contains(this, related)))
						return handler.fn.apply(this, arguments)
				}
			handler.del = getDelegate && getDelegate(fn, event)
			var callback = handler.del || fn
			handler.proxy = function(e){
				var result = callback.apply(element, [e].concat(e.data))
				if (result === false)
					e.preventDefault(), e.stopPropagation()
				return result
			}
			handler.i = set.length
			set.push(handler)
			element.addEventListener(realEvent(handler.e), handler.proxy, eventCapture(handler, capture))
		})
	}
	function remove(element, events, fn, selector, capture){
		var id = zid(element)
		eachEvent(events || '', fn, function(event, fn){
			findHandlers(element, event, fn, selector).forEach(function(handler){
				delete handlers[id][handler.i]
				element.removeEventListener(realEvent(handler.e), handler.proxy, eventCapture(handler, capture))
			})
		})
	}

	$.event = {
		add: add,
		remove: remove
	}

	$.proxy = function(fn, context){
		if ($.isFunction(fn)) {
			var proxyFn = function(){
				return fn.apply(context, arguments)
			}
			proxyFn._zid = zid(fn)
			return proxyFn
		}
		else if (typeof context == 'string') {
			return $.proxy(fn[context], fn)
		}
		else {
			throw new TypeError("expected function")
		}
	}

	$.fn.bind = function(event, callback){
		return this.each(function(){
			add(this, event, callback)
		})
	}
	$.fn.unbind = function(event, callback){
		return this.each(function(){
			remove(this, event, callback)
		})
	}
	$.fn.one = function(event, callback){
		return this.each(function(i, element){
			add(this, event, callback, null, function(fn, type){
				return function(){
					var result = fn.apply(element, arguments)
					remove(element, type, fn)
					return result
				}
			})
		})
	}

	var returnTrue = function(){
		return true
	}, returnFalse = function(){
		return false
	}, ignoreProperties = /^([A-Z]|layer[XY]$)/, eventMethods = {
		preventDefault: 'isDefaultPrevented',
		stopImmediatePropagation: 'isImmediatePropagationStopped',
		stopPropagation: 'isPropagationStopped'
	}
	function createProxy(event){
		var key, proxy = {
			originalEvent: event
		}
		for (key in event)
			if (!ignoreProperties.test(key) && event[key] !== undefined)
				proxy[key] = event[key]

		$.each(eventMethods, function(name, predicate){
			if(!event[name]) return;
			proxy[name] = function(){
				this[predicate] = returnTrue
				return event[name].apply(event, arguments)
			}
			proxy[predicate] = returnFalse
		})
		return proxy
	}

	// emulates the 'defaultPrevented' property for browsers that have none
	function fix(event){
		if (!('defaultPrevented' in event)) {
			event.defaultPrevented = false
			var prevent = event.preventDefault
			event.preventDefault = function(){
				this.defaultPrevented = true
				prevent.call(this)
			}
		}
	}
	var delegateEvent = {};
	$.fn.delegate = function(selector, events, callback){
		var self = this;
		eachEvent(events, callback, function(event, callback){
			event = wechatFix(event);
			if(!delegateEvent[event]){
				delegateEvent[event] = [];
				add(document.body, event, callback, selector, function(){
					return function(e){
						var evt = createProxy(e),
							match,
							node = e.target,
							dels = delegateEvent[e.type].slice(),
							result;

						hasDelegate : while (true){
							for(var i = 0, data; data = dels[i]; i++){
								if($.contains(data.element, node)){
									match = matches(node, data.selector) ? node : null;
									if(match){
										data.match = match;
										evt = $.extend(evt, {
											currentTarget: match,
											liveFired: data.element
										});
										result = data.callback.apply(data.match, [evt].concat([].slice.call(arguments, 1)))
										if(result === false || evt.returnValue === false){
											break hasDelegate;
										}
										//事件触发后从堆栈中溢出 保证不重复触发
										dels.splice(i, 1);
										i--;
									}
								}else{
									//如果节点不在delegate子节点或等于根节点 则不匹配代理从堆栈从移除
									dels.splice(i, 1);
									i--;
								}
							}

							if(!dels.length || node != null && node.nodeType == node.DOCUMENT_NODE){
								break;
							}
							if(!node) return null; //在某些时序下可能发生node==null的情况，下面一行报错
							node = node.parentNode;
						}

						return result;
					}
				})
			}

			self.each(function(i, element){
				delegateEvent[event].push({
					element : element,
					selector : selector,
					event : event,
					callback : callback
				});
			})
		});
		return this;
	}
	$.fn.undelegate = function(selector, event, callback){
		return this.each(function(i, element){
			delegateEvent[event] = (delegateEvent[event] || []).filter(function(data){
				return !(
					data.element == element &&
						(!selector || data.selector == selector) &&
						(!callback || data.callback == callback)
					)
			})
		})
	}

	$.fn.live = function(event, callback){
		$(document.body).delegate(this.selector, event, callback)
		return this
	}
	$.fn.die = function(event, callback){
		$(document.body).undelegate(this.selector, event, callback)
		return this
	}

	$.fn.on = function(event, selector, callback){
		return !selector || $.isFunction(selector) ? this.bind(event, selector || callback) : this.delegate(selector, event, callback)
	}
	$.fn.off = function(event, selector, callback){
		return !selector || $.isFunction(selector) ? this.unbind(event, selector || callback) : this.undelegate(selector, event, callback)
	}

	$.fn.trigger = function(event, data){
		if (typeof event == 'string' || $.isPlainObject(event))
			event = $.Event(event)
		fix(event)
		event.data = data
		return this.each(function(){
			// items in the collection might not be DOM elements
			// (todo: possibly support events on plain old objects)
			if ('dispatchEvent' in this)
				this.dispatchEvent(event)
		})
	}

	// triggers event handlers on current element just as if an event occurred,
	// doesn't trigger an actual event, doesn't bubble
	$.fn.triggerHandler = function(event, data){
		var e, result
		this.each(function(i, element){
			e = createProxy(typeof event == 'string' ? $.Event(event) : event)
			e.data = data
			e.target = element
			$.each(findHandlers(element, event.type || event), function(i, handler){
				result = handler.proxy(e)
				if (e.isImmediatePropagationStopped())
					return false
			})
		})
		return result
	}	// shortcut methods for `.bind(event, fn)` for each event type
	;
	('focusin focusout load resize scroll unload click dblclick ' +
		'mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave ' +
		'change select keydown keypress keyup error').split(' ').forEach(function(event){
			$.fn[event] = function(callback){
				return callback ? this.bind(event, callback) : this.trigger(event)
			}
		});
	['focus', 'blur'].forEach(function(name){
		$.fn[name] = function(callback){
			if (callback)
				this.bind(name, callback)
			else
				this.each(function(){
					try {
						this[name]()
					}
					catch (e) {
					}
				})
			return this
		}
	})

	$.Event = function(type, props){
		if (typeof type != 'string')
			props = type, type = props.type
		type = wechatFix(type);
		var event = document.createEvent(specialEvents[type] || 'Events'), bubbles = true
		if (props)
			for (var name in props)
				(name == 'bubbles') ? (bubbles = !!props[name]) : (event[name] = props[name])
		event.initEvent(type, bubbles, true, null, null, null, null, null, null, null, null, null, null, null, null)
		event.isDefaultPrevented = function(){
			return this.defaultPrevented
		}
		return event
	}

	$.cancelBubble = function(event){
		event.returnValue = false;
		if(event.stopPropagation){
			event.stopPropagation()
		}
		if(event.stopImmediatePropagation){
			event.stopImmediatePropagation()
		}
		return false
	}
//./fx
 var prefix = '', eventPrefix, endEventName, endAnimationName, vendors = {
        Webkit: 'webkit',
        Moz: '',
        O: 'o',
        ms: 'MS'
    }, document = window.document, testEl = document.createElement('div'), supportedTransforms = /^((translate|rotate|scale)(X|Y|Z|3d)?|matrix(3d)?|perspective|skew(X|Y)?)$/i, transform, transitionProperty, transitionDuration, transitionTiming, animationName, animationDuration, animationTiming, cssReset = {}

    function dasherize(str){
        return downcase(str.replace(/([a-z])([A-Z])/, '$1-$2'))
    }
    function downcase(str){
        return str.toLowerCase()
    }
    function normalizeEvent(name){
        return eventPrefix ? eventPrefix + name : downcase(name)
    }

    $.each(vendors, function(vendor, event){
        if (testEl.style[vendor + 'TransitionProperty'] !== undefined) {
            prefix = '-' + downcase(vendor) + '-'
            eventPrefix = event
            return false
        }
    })

    transform = prefix + 'transform'
    cssReset[transitionProperty = prefix + 'transition-property'] = cssReset[transitionDuration = prefix + 'transition-duration'] = cssReset[transitionTiming = prefix + 'transition-timing-function'] = cssReset[animationName = prefix + 'animation-name'] = cssReset[animationDuration = prefix + 'animation-duration'] = cssReset[animationTiming = prefix + 'animation-timing-function'] = ''

    $.fx = {
        off: (eventPrefix === undefined && testEl.style.transitionProperty === undefined),
        speeds: {
            _default: 400,
            fast: 200,
            slow: 600
        },
        cssPrefix: prefix,
        transitionEnd: normalizeEvent('TransitionEnd'),
        animationEnd: normalizeEvent('AnimationEnd')
    }

    $.fn.animate = function(properties, duration, ease, callback){
        if ($.isPlainObject(duration))
            ease = duration.easing, callback = duration.complete, duration = duration.duration
        if (duration)
            duration = (typeof duration == 'number' ? duration : ($.fx.speeds[duration] || $.fx.speeds._default)) /
                1000
        return this.anim(properties, duration, ease, callback)
    }

    $.fn.anim = function(properties, duration, ease, callback){
        var key, cssValues = {}, cssProperties, transforms = '', that = this, wrappedCallback, endEvent = $.fx.transitionEnd

        if (duration === undefined)
            duration = 0.4
        if ($.fx.off)
            duration = 0

        if (typeof properties == 'string') {
            // keyframe animation
            cssValues[animationName] = properties
            cssValues[animationDuration] = duration + 's'
            cssValues[animationTiming] = (ease || 'linear')
            endEvent = $.fx.animationEnd
        }
        else {
            cssProperties = []
            // CSS transitions
            for (key in properties)
                if (supportedTransforms.test(key))
                    transforms += key + '(' + properties[key] + ') '
                else
                    cssValues[key] = properties[key], cssProperties.push(dasherize(key))

            if (transforms)
                cssValues[transform] = transforms, cssProperties.push(transform)
            if (duration > 0 && typeof properties === 'object') {
                cssValues[transitionProperty] = cssProperties.join(', ')
                cssValues[transitionDuration] = duration + 's'
                cssValues[transitionTiming] = (ease || 'linear')
            }
        }

        var fired = false
        wrappedCallback = function(event){
            if (typeof event !== 'undefined') {
                if (event.target !== event.currentTarget)
                    return // makes sure the event didn't bubble from "below"
                $(event.target).unbind(endEvent, wrappedCallback)
            }
            fired = true
            $(this).css(cssReset)
            callback && callback.call(this)
        }

        if (duration > 0){
            this.bind(endEvent, wrappedCallback)
            //transitionEnd not always fired on some android phones
            setTimeout(function(){
                if(fired)
                    return
                that.each(function(){
                    wrappedCallback.call(this);
                })
            },duration * 1000)
        }
        // trigger page reflow so new elements can animate
        this.size() && this.get(0).clientLeft

        this.css(cssValues)

        if (duration <= 0)
            setTimeout(function(){
                that.each(function(){
                    wrappedCallback.call(this)
                })
            }, 0)

        return this
    }

    testEl = null
//./polyfill
var undefined;

	if (String.prototype.trim === undefined) // fix for iOS 3.2
		String.prototype.trim = function(){
			return this.replace(/^\s+|\s+$/g, '')
		}

	// For iOS 3.x
	// from https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Array/reduce
	if (Array.prototype.reduce === undefined)
		Array.prototype.reduce = function(fun){
			if (this === void 0 || this === null)
				throw new TypeError()
			var t = Object(this), len = t.length >>> 0, k = 0, accumulator
			if (typeof fun != 'function')
				throw new TypeError()
			if (len == 0 && arguments.length == 1)
				throw new TypeError()

			if (arguments.length >= 2)
				accumulator = arguments[1]
			else
				do {
					if (k in t) {
						accumulator = t[k++]
						break
					}
					if (++k >= len)
						throw new TypeError()
				}
				while (true)

			while (k < len) {
				if (k in t)
					accumulator = fun.call(undefined, accumulator, t[k], k, t)
				k++
			}
			return accumulator
		}
	
//./touch
	var ghostClick = {
		_coordinates: [],
		/*搞不定这两货，没focus，但是输入法会出来*/
		_failOnPrevent: ['textarea', 'input'],
		mark: function (x, y, el) {
			this._coordinates.push({x: x, y: y, el: el});
			window.setTimeout(function () {
				ghostClick.unmark();
				// 这1000ms是经验值
			}, 1000);
		},
		unmark: function () {
			return this._coordinates.shift();
		},
		onMouseDown: function (event) {
			ghostClick._coordinates.forEach(function (coordinate) {
				var x = coordinate.x;
				var y = coordinate.y;
				var el = coordinate.el;
				// 坐标一样，target却不一样，你妹还不是穿透了？
				var canPrevent = ghostClick._failOnPrevent.indexOf(event.target.nodeName.toLocaleLowerCase()) < 0;
				if (canPrevent && el != event.target && Math.abs(event.clientX - x) < 25 && Math.abs(event.clientY - y) < 25) {
					event.stopPropagation();
					event.preventDefault();
				}
			});
		}
	};
	// mousedown->focus->mouseup->click
	// 如果不想focus，那就mousedown吧
	document.addEventListener('mousedown', ghostClick.onMouseDown, true);

	var touch = {}, touchTimeout, tapTimeout, swipeTimeout, longTapDelay = 750, longTapTimeout

	function parentIfText(node) {
		return 'tagName' in node ? node : node.parentNode
	}

	function swipeDirection(x1, x2, y1, y2) {
		var xDelta = Math.abs(x1 - x2), yDelta = Math.abs(y1 - y2)
		return xDelta >= yDelta ? (x1 - x2 > 0 ? 'Left' : 'Right') : (y1 - y2 > 0 ? 'Up' : 'Down')
	}

	function longTap() {
		longTapTimeout = null
		if (touch.last && touch.el) {
			touch.el.trigger('longTap')
			touch = {}
		}
	}

	function cancelLongTap() {
		if (longTapTimeout)
			clearTimeout(longTapTimeout)
		longTapTimeout = null
	}

	function cancelAll() {
		if (touchTimeout)
			clearTimeout(touchTimeout)
		if (tapTimeout)
			clearTimeout(tapTimeout)
		if (swipeTimeout)
			clearTimeout(swipeTimeout)
		if (longTapTimeout)
			clearTimeout(longTapTimeout)
		touchTimeout = tapTimeout = swipeTimeout = longTapTimeout = null
		touch = {}
	}

	function hackIosClick(event) {
		// 如果onclick触发了，把自己干掉，减少EventListener

		// 关于这里要不要清掉onclick，
		// 如果不清掉，每次click都执行一个空函数，但这个页面的eventListener会多
		// 如果清掉，每次click都执行一个清掉自己的函数，但这个页面的eventListener会少点
		// 从效率上考虑，还真不知道那个更好
		// 但从代码整洁度来说，清掉好点
		if (event && event.target) {
			event.target.onclick = null;
		}
	}

	if (!window.__hasInitEvent) {
		$(document).ready(function () {
			var now, delta
			$(document.body).bind('touchstart',function (e) {
				console.log('touch start zepto');
				now = Date.now()
				delta = now - (touch.last || now)
				touch.el = $(parentIfText(e.touches[0].target))
				touchTimeout && clearTimeout(touchTimeout)
				touch.x1 = e.touches[0].pageX
				touch.y1 = e.touches[0].pageY
				if (delta > 0 && delta <= 250)
					touch.isDoubleTap = true
				touch.last = now
				touch.isMove = false;
				longTapTimeout = setTimeout(longTap, longTapDelay)
				/** notice */
				/** fix bug, some android device can't trigger touchend event */
				touch.x2 = touch.y2 = null;
			}).bind('touchmove',function (e) {
					cancelLongTap();
					touch.isMove = true;
					touch.x2 = e.touches[0].pageX
					touch.y2 = e.touches[0].pageY
					// 原值是10，发现安卓滚不动，换回30好多了
					if (Math.abs(touch.x1 - touch.x2) > 30)
						e.preventDefault()
				}).bind('touchend',function (e) {
					cancelLongTap();
					if (!touch.el) {
						return;
					}
					/** 干掉ghostClick**/
					ghostClick.mark(touch.x1, touch.y1, touch.el.get(0));
					/** notice */
					/** when move less than 5px, treat move event as tap */
					var littleMove = false;
					if (touch.isMove && (touch.x2 && Math.abs(touch.x1 - touch.x2) < 5) && (touch.y2 && Math.abs(touch.y1 - touch.y2) < 5)) {
						littleMove = true;
					}

					// swipe
					if ((touch.x2 && Math.abs(touch.x1 - touch.x2) > 30) ||
						(touch.y2 && Math.abs(touch.y1 - touch.y2) > 30))

						swipeTimeout = setTimeout(function () {
							if (touch.el) {
								touch.el.trigger('swipe')
								touch.el.trigger('swipe' + (swipeDirection(touch.x1, touch.x2, touch.y1, touch.y2)))
								touch = {}
							}
						}, 0)

					// normal tap
					else if ('last' in touch && (!touch.isMove || littleMove))

					// delay by one tick so we can cancel the 'tap' event if 'scroll' fires
					// ('tap' fires before 'scroll')
						tapTimeout = setTimeout(function () {

							// trigger universal 'tap' with the option to cancelTouch()
							// (cancelTouch cancels processing of single vs double taps for faster 'tap' response)
							var event = $.Event('tap')
							event.cancelTouch = cancelAll

							if (touch.el) {
								touch.el.trigger(event);
								if ($.os.iphone) {
									// fix ios click bug
									// ios 如果点击的那个元素不是clickable的，body不会有冒泡上去
									// 在click前，也就是tap的时候把元素变成clickable的即可
									if (touch.el.size() && touch.el.get(0).onclick == null) {
										touch.el.get(0).onclick = hackIosClick;
									}
								}

							}
							// trigger double tap immediately
							if (touch.isDoubleTap && touch.el) {
								touch.el.trigger('doubleTap')
								touch = {}
							}

							// trigger single tap after 250ms of inactivity
							else {
								touchTimeout = setTimeout(function () {
									touchTimeout = null;
									if (touch.el) {
										touch.el.trigger('singleTap')
										touch = {}
									}
								}, 250)
							}

						}, 0)

				}).bind('touchcancel', cancelAll)

			$(window).bind('scroll', cancelAll)

		});
		window.__hasInitEvent = true;
	}


	['swipe', 'swipeLeft', 'swipeRight', 'swipeUp', 'swipeDown', 'doubleTap', 'tap', 'singleTap', 'longTap'].forEach(function (m) {
		$.fn[m] = function (callback) {
			return this.bind(m, callback)
		}
	});

