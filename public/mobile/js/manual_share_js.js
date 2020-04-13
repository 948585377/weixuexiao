/**
 * Created by Administrator on 15-1-9.  modernizr.custom.js
 */
/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-csstransforms3d-csstransitions-touch-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:w(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},q.csstransforms3d=function(){var a=!!F("perspective");return a&&"webkitPerspective"in g.style&&w("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},q.csstransitions=function(){return F("transition")};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,e.prefixed=function(a,b,c){return b?F(a,b,c):F(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};

/*
 * cond - v0.1 - 6/10/2009 jquery.ba-cond.min.js
 * http://benalman.com/projects/jquery-cond-plugin/
 *
 * Copyright (c) 2009 "Cowboy" Ben Alman
 * Licensed under the MIT license
 * http://benalman.com/about/license/
 *
 * Based on suggestions and sample code by Stephen Band and DBJDBJ in the
 * jquery-dev Google group: http://bit.ly/jqba1
 */
(function($){$.fn.cond=function(){var e,a=arguments,b=0,f,d,c;while(!f&&b<a.length){f=a[b++];d=a[b++];f=$.isFunction(f)?f.call(this):f;c=!d?f:f?d.call(this,f):e}return c!==e?c:this}})(jQuery);

/**
 * jquery.slitslider.js v1.1.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2012, Codrops
 * http://www.codrops.com
 */

;( function( $, window, undefined ) {

    'use strict';

    /*
     * debouncedresize: special jQuery event that happens once after a window resize
     *
     * latest version and complete README available on Github:
     * https://github.com/louisremi/jquery-smartresize/blob/master/jquery.debouncedresize.js
     *
     * Copyright 2011 @louis_remi
     * Licensed under the MIT license.
     */
    var $event = $.event,
        $special,
        resizeTimeout;

    $special = $event.special.debouncedresize = {
        setup: function() {
            $( this ).on( "resize", $special.handler );
        },
        teardown: function() {
            $( this ).off( "resize", $special.handler );
        },
        handler: function( event, execAsap ) {
            // Save the context
            var context = this,
                args = arguments,
                dispatch = function() {
                    // set correct event type
                    event.type = "debouncedresize";
                    $event.dispatch.apply( context, args );
                };

            if ( resizeTimeout ) {
                clearTimeout( resizeTimeout );
            }

            execAsap ?
                dispatch() :
                resizeTimeout = setTimeout( dispatch, $special.threshold );
        },
        threshold: 20
    };

    // global
    var $window = $( window ),
        $document = $( document ),
        Modernizr = window.Modernizr;

    $.Slitslider = function( options, element ) {

        this.$elWrapper = $( element );
        this._init( options );

    };

    $.Slitslider.defaults = {
        // transitions speed
        speed : 800,
        // if true the item's slices will also animate the opacity value
        optOpacity : false,
        // amount (%) to translate both slices - adjust as necessary
        translateFactor : 230,
        // maximum possible angle
        maxAngle : 25,
        // maximum possible scale
        maxScale : 2,
        // slideshow on / off
        autoplay : false,
        // keyboard navigation
        keyboard : true,
        // time between transitions
        interval : 4000,
        // callbacks
        onBeforeChange : function( slide, idx ) { return false; },
        onAfterChange : function( slide, idx ) { return false; }
    };

    $.Slitslider.prototype = {

        _init : function( options ) {

            // options
            this.options = $.extend( true, {}, $.Slitslider.defaults, options );

            // https://github.com/twitter/bootstrap/issues/2870
            this.transEndEventNames = {
                'WebkitTransition' : 'webkitTransitionEnd',
                'MozTransition' : 'transitionend',
                'OTransition' : 'oTransitionEnd',
                'msTransition' : 'MSTransitionEnd',
                'transition' : 'transitionend'
            };
            //this.transEndEventName = this.transEndEventNames[ Modernizr.prefixed( 'transition' ) ];
            var u = navigator.userAgent;
            if (! u.match(/AppleWebKit.*Mobile.*/i) && ! u.match(/Android.*/i)) {
                this.transEndEventName = 'transitionend';
            } else {
                this.transEndEventName = 'webkitTransitionEnd'
            }
            // suport for css 3d transforms and css transitions
            this.support = Modernizr.csstransitions && Modernizr.csstransforms3d;
            // the slider
            this.$el = this.$elWrapper.children( '.sl-slider' );
            // the slides
            this.$slides = this.$el.children( '.sl-slide' ).hide();
            // total slides
            this.slidesCount = this.$slides.length;
            // current slide
            this.current = 0;
            // control if it's animating
            this.isAnimating = false;
            // get container size
            this._getSize();
            // layout
            this._layout();
            // load some events
            this._loadEvents();
            // slideshow
            if( this.options.autoplay ) {

                this._startSlideshow();

            }

        },
        // gets the current container width & height
        _getSize : function() {

            this.size = {
                width : this.$elWrapper.outerWidth( true ),
                height : this.$elWrapper.outerHeight( true )
            };

        },
        _layout : function() {

            this.$slideWrapper = $( '<div class="sl-slides-wrapper" />' );

            // wrap the slides
            this.$slides.wrapAll( this.$slideWrapper ).each( function( i ) {

                var $slide = $( this ),
                // vertical || horizontal
                    orientation = $slide.data( 'orientation' );

                $slide.addClass( 'sl-slide-' + orientation )
                    .children()
                    .wrapAll( '<div class="sl-content-wrapper" />' )
                    .wrapAll( '<div class="sl-content" />' );

            } );

            // set the right size of the slider/slides for the current window size
            this._setSize();
            // show first slide
            this.$slides.eq( this.current ).show();

        },
        _navigate : function( dir, pos ) {

            if( this.isAnimating || this.slidesCount < 2 ) {

                return false;

            }

            this.isAnimating = true;

            var self = this,
                $currentSlide = this.$slides.eq( this.current );

            // if position is passed
            if( pos !== undefined ) {

                this.current = pos;

            }
            // if not check the boundaries
            else if( dir === 'next' ) {

                this.current = this.current < this.slidesCount - 1 ? ++this.current : 0;

            }
            else if( dir === 'prev' ) {

                this.current = this.current > 0 ? --this.current : this.slidesCount - 1;

            }

            this.options.onBeforeChange( $currentSlide, this.current );

            // next slide to be shown
            var $nextSlide = this.$slides.eq( this.current ),
            // the slide we want to cut and animate
                $movingSlide = ( dir === 'next' ) ? $currentSlide : $nextSlide,

            // the following are the data attrs set for each slide
                configData = $movingSlide.data(),
                config = {};

            config.orientation = configData.orientation || 'horizontal',
                config.slice1angle = configData.slice1Rotation || 0,
                config.slice1scale = configData.slice1Scale || 1,
                config.slice2angle = configData.slice2Rotation || 0,
                config.slice2scale = configData.slice2Scale || 1;

            this._validateValues( config );

            var cssStyle = config.orientation === 'horizontal' ? {
                    marginTop : -this.size.height / 2
                } : {
                    marginLeft : -this.size.width / 2
                },
            // default slide's slices style
                resetStyle = {
                    'transform' : 'translate(0%,0%) rotate(0deg) scale(1)',
                    opacity : 1
                },
            // slice1 style
                slice1Style	= config.orientation === 'horizontal' ? {
                    'transform' : 'translateY(-' + this.options.translateFactor + '%) rotate(' + config.slice1angle + 'deg) scale(' + config.slice1scale + ')'
                } : {
                    'transform' : 'translateX(-' + this.options.translateFactor + '%) rotate(' + config.slice1angle + 'deg) scale(' + config.slice1scale + ')'
                },
            // slice2 style
                slice2Style	= config.orientation === 'horizontal' ? {
                    'transform' : 'translateY(' + this.options.translateFactor + '%) rotate(' + config.slice2angle + 'deg) scale(' + config.slice2scale + ')'
                } : {
                    'transform' : 'translateX(' + this.options.translateFactor + '%) rotate(' + config.slice2angle + 'deg) scale(' + config.slice2scale + ')'
                };

            if( this.options.optOpacity ) {

                slice1Style.opacity = 0;
                slice2Style.opacity = 0;

            }

            // we are adding the classes sl-trans-elems and sl-trans-back-elems to the slide that is either coming "next"
            // or going "prev" according to the direction.
            // the idea is to make it more interesting by giving some animations to the respective slide's elements
            //( dir === 'next' ) ? $nextSlide.addClass( 'sl-trans-elems' ) : $currentSlide.addClass( 'sl-trans-back-elems' );

            $currentSlide.removeClass( 'sl-trans-elems' );

            var transitionProp = {
                'transition' : 'all ' + this.options.speed + 'ms ease-in-out'
            };

            // add the 2 slices and animate them
            $movingSlide.css( 'z-index', this.slidesCount )
                .find( 'div.sl-content-wrapper' )
                .wrap( $( '<div class="sl-content-slice" />' ).css( transitionProp ) )
                .parent()
                .cond(
                dir === 'prev',
                function() {

                    var slice = this;
                    this.css( slice1Style );
                    setTimeout( function() {

                        slice.css( resetStyle );

                    }, 50 );

                },
                function() {

                    var slice = this;
                    setTimeout( function() {

                        slice.css( slice1Style );

                    }, 50 );

                }
            )
                .clone()
                .appendTo( $movingSlide )
                .cond(
                dir === 'prev',
                function() {

                    var slice = this;
                    this.css( slice2Style );
                    setTimeout( function() {

                        $currentSlide.addClass( 'sl-trans-back-elems' );

                        if( self.support ) {

                            slice.css( resetStyle ).on( self.transEndEventName, function() {

                                self._onEndNavigate( slice, $currentSlide, dir );

                            } );

                        }
                        else {

                            self._onEndNavigate( slice, $currentSlide, dir );

                        }

                    }, 50 );

                },
                function() {

                    var slice = this;
                    setTimeout( function() {

                        $nextSlide.addClass( 'sl-trans-elems' );

                        if( self.support ) {

                            slice.css( slice2Style ).on( self.transEndEventName, function() {

                                self._onEndNavigate( slice, $currentSlide, dir );

                            } );

                        }
                        else {

                            self._onEndNavigate( slice, $currentSlide, dir );

                        }

                    }, 50 );

                }
            )
                .find( 'div.sl-content-wrapper' )
                .css( cssStyle );

            $nextSlide.show();

        },
        _validateValues : function( config ) {

            // OK, so we are restricting the angles and scale values here.
            // This is to avoid the slices wrong sides to be shown.
            // you can adjust these values as you wish but make sure you also ajust the
            // paddings of the slides and also the options.translateFactor value and scale data attrs
            if( config.slice1angle > this.options.maxAngle || config.slice1angle < -this.options.maxAngle ) {

                config.slice1angle = this.options.maxAngle;

            }
            if( config.slice2angle > this.options.maxAngle  || config.slice2angle < -this.options.maxAngle ) {

                config.slice2angle = this.options.maxAngle;

            }
            if( config.slice1scale > this.options.maxScale || config.slice1scale <= 0 ) {

                config.slice1scale = this.options.maxScale;

            }
            if( config.slice2scale > this.options.maxScale || config.slice2scale <= 0 ) {

                config.slice2scale = this.options.maxScale;

            }
            if( config.orientation !== 'vertical' && config.orientation !== 'horizontal' ) {

                config.orientation = 'horizontal'

            }

        },
        _onEndNavigate : function( $slice, $oldSlide, dir ) {

            // reset previous slide's style after next slide is shown
            var $slide = $slice.parent(),
                removeClasses = 'sl-trans-elems sl-trans-back-elems';

            // remove second slide's slice
            $slice.remove();
            // unwrap..
            $slide.css( 'z-index', 1 )
                .find( 'div.sl-content-wrapper' )
                .unwrap();

            // hide previous current slide
            $oldSlide.hide().removeClass( removeClasses );
            $slide.removeClass( removeClasses );
            // now we can navigate again..
            this.isAnimating = false;
            this.options.onAfterChange( $slide, this.current );

        },
        _setSize : function() {

            // the slider and content wrappers will have the window's width and height
            var cssStyle = {
                width : this.size.width,
                height : this.size.height
            };

            this.$el.css( cssStyle ).find( 'div.sl-content-wrapper' ).css( cssStyle );

        },
        _loadEvents : function() {

            var self = this;

            $window.on( 'debouncedresize.slitslider', function( event ) {

                // update size values
                self._getSize();
                // set the sizes again
                self._setSize();

            } );

            if ( this.options.keyboard ) {

                $document.on( 'keydown.slitslider', function(e) {

                    var keyCode = e.keyCode || e.which,
                        arrow = {
                            left: 37,
                            up: 38,
                            right: 39,
                            down: 40
                        };

                    switch (keyCode) {

                        case arrow.left :

                            self._stopSlideshow();
                            self._navigate( 'prev' );
                            break;

                        case arrow.right :

                            self._stopSlideshow();
                            self._navigate( 'next' );
                            break;

                    }

                } );

            }

        },
        _startSlideshow: function() {

            var self = this;

            this.slideshow = setTimeout( function() {

                self._navigate( 'next' );

                if ( self.options.autoplay ) {

                    self._startSlideshow();

                }

            }, this.options.interval );

        },
        _stopSlideshow: function() {

            if ( this.options.autoplay ) {

                clearTimeout( this.slideshow );
                this.isPlaying = false;
                this.options.autoplay = false;

            }

        },
        _destroy : function( callback ) {

            this.$el.off( '.slitslider' ).removeData( 'slitslider' );
            $window.off( '.slitslider' );
            $document.off( '.slitslider' );
            this.$slides.each( function( i ) {

                var $slide = $( this ),
                    $content = $slide.find( 'div.sl-content' ).children();

                $content.appendTo( $slide );
                $slide.children( 'div.sl-content-wrapper' ).remove();

            } );
            this.$slides.unwrap( this.$slideWrapper ).hide();
            this.$slides.eq( 0 ).show();
            if( callback ) {

                callback.call();

            }

        },
        // public methos: adds more slides to the slider
        add : function( $slides, callback ) {

            this.$slides = this.$slides.add( $slides );

            var self = this;


            $slides.each( function( i ) {

                var $slide = $( this ),
                // vertical || horizontal
                    orientation = $slide.data( 'orientation' );

                $slide.hide().addClass( 'sl-slide-' + orientation )
                    .children()
                    .wrapAll( '<div class="sl-content-wrapper" />' )
                    .wrapAll( '<div class="sl-content" />' )
                    .end()
                    .appendTo( self.$el.find( 'div.sl-slides-wrapper' ) );

            } );

            this._setSize();

            this.slidesCount = this.$slides.length;
            if ( callback ) {

                callback.call( $items );

            }

        },
        // public method: shows next slide
        next : function() {

            this._stopSlideshow();
            this._navigate( 'next' );

        },
        // public method: shows previous slide
        previous : function() {

            this._stopSlideshow();
            this._navigate( 'prev' );

        },
        // public method: goes to a specific slide
        jump : function( pos ) {

            pos -= 1;

            //if( pos === this.current || pos >= this.slidesCount || pos < 0 ) {
            if( pos === this.current || pos >= this.slidesCount || pos < 0 ) {

                return false;

            }

            this._stopSlideshow();
            this._navigate( pos > this.current ? 'next' : 'prev', pos );

        },
        // public method: starts the slideshow
        // any call to next(), previous() or jump() will stop the slideshow
        play : function() {

            if( !this.isPlaying ) {

                this.isPlaying = true;

                this._navigate( 'next' );
                this.options.autoplay = true;
                this._startSlideshow();

            }

        },
        // public method: pauses the slideshow
        pause : function() {

            if( this.isPlaying ) {

                this._stopSlideshow();

            }

        },
        // public method: check if isAnimating is true
        isActive : function() {

            return this.isAnimating;

        },
        // publicc methos: destroys the slicebox instance
        destroy : function( callback ) {

            this._destroy( callback );

        }

    };

    var logError = function( message ) {

        if ( window.console ) {

            window.console.error( message );

        }

    };

    $.fn.slitslider = function( options ) {

        var self = $.data( this, 'slitslider' );

        if ( typeof options === 'string' ) {

            var args = Array.prototype.slice.call( arguments, 1 );

            this.each(function() {

                if ( !self ) {

                    logError( "cannot call methods on slitslider prior to initialization; " +
                        "attempted to call method '" + options + "'" );
                    return;

                }

                if ( !$.isFunction( self[options] ) || options.charAt(0) === "_" ) {

                    logError( "no such method '" + options + "' for slitslider self" );
                    return;

                }

                self[ options ].apply( self, args );

            });

        }
        else {

            this.each(function() {

                if ( self ) {

                    self._init();

                }
                else {

                    self = $.data( this, 'slitslider', new $.Slitslider( options, this ) );

                }

            });

        }

        return self;

    };

} )( jQuery, window );

/*  jquery.touchSwipe.min.js*/

(function(a){if(typeof define==="function"&&define.amd&&define.amd.jQuery){define(["jquery"],a)}else{a(jQuery)}}(function(e){var o="left",n="right",d="up",v="down",c="in",w="out",l="none",r="auto",k="swipe",s="pinch",x="tap",i="doubletap",b="longtap",A="horizontal",t="vertical",h="all",q=10,f="start",j="move",g="end",p="cancel",a="ontouchstart" in window,y="TouchSwipe";var m={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,triggerOnTouchEnd:true,triggerOnTouchLeave:false,allowPageScroll:"auto",fallbackToMouseEvents:true,excludedElements:"label, button, input, select, textarea, a, .noSwipe"};e.fn.swipe=function(D){var C=e(this),B=C.data(y);if(B&&typeof D==="string"){if(B[D]){return B[D].apply(this,Array.prototype.slice.call(arguments,1))}else{e.error("Method "+D+" does not exist on jQuery.swipe")}}else{if(!B&&(typeof D==="object"||!D)){return u.apply(this,arguments)}}return C};e.fn.swipe.defaults=m;e.fn.swipe.phases={PHASE_START:f,PHASE_MOVE:j,PHASE_END:g,PHASE_CANCEL:p};e.fn.swipe.directions={LEFT:o,RIGHT:n,UP:d,DOWN:v,IN:c,OUT:w};e.fn.swipe.pageScroll={NONE:l,HORIZONTAL:A,VERTICAL:t,AUTO:r};e.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,ALL:h};function u(B){if(B&&(B.allowPageScroll===undefined&&(B.swipe!==undefined||B.swipeStatus!==undefined))){B.allowPageScroll=l}if(B.click!==undefined&&B.tap===undefined){B.tap=B.click}if(!B){B={}}B=e.extend({},e.fn.swipe.defaults,B);return this.each(function(){var D=e(this);var C=D.data(y);if(!C){C=new z(this,B);D.data(y,C)}})}function z(a0,aq){var av=(a||!aq.fallbackToMouseEvents),G=av?"touchstart":"mousedown",au=av?"touchmove":"mousemove",R=av?"touchend":"mouseup",P=av?null:"mouseleave",az="touchcancel";var ac=0,aL=null,Y=0,aX=0,aV=0,D=1,am=0,aF=0,J=null;var aN=e(a0);var W="start";var T=0;var aM=null;var Q=0,aY=0,a1=0,aa=0,K=0;var aS=null;try{aN.bind(G,aJ);aN.bind(az,a5)}catch(ag){e.error("events not supported "+G+","+az+" on jQuery.swipe")}this.enable=function(){aN.bind(G,aJ);aN.bind(az,a5);return aN};this.disable=function(){aG();return aN};this.destroy=function(){aG();aN.data(y,null);return aN};this.option=function(a8,a7){if(aq[a8]!==undefined){if(a7===undefined){return aq[a8]}else{aq[a8]=a7}}else{e.error("Option "+a8+" does not exist on jQuery.swipe.options")}return null};function aJ(a9){if(ax()){return}if(e(a9.target).closest(aq.excludedElements,aN).length>0){return}var ba=a9.originalEvent?a9.originalEvent:a9;var a8,a7=a?ba.touches[0]:ba;W=f;if(a){T=ba.touches.length}else{a9.preventDefault()}ac=0;aL=null;aF=null;Y=0;aX=0;aV=0;D=1;am=0;aM=af();J=X();O();if(!a||(T===aq.fingers||aq.fingers===h)||aT()){ae(0,a7);Q=ao();if(T==2){ae(1,ba.touches[1]);aX=aV=ap(aM[0].start,aM[1].start)}if(aq.swipeStatus||aq.pinchStatus){a8=L(ba,W)}}else{a8=false}if(a8===false){W=p;L(ba,W);return a8}else{ak(true)}return null}function aZ(ba){var bd=ba.originalEvent?ba.originalEvent:ba;if(W===g||W===p||ai()){return}var a9,a8=a?bd.touches[0]:bd;var bb=aD(a8);aY=ao();if(a){T=bd.touches.length}W=j;if(T==2){if(aX==0){ae(1,bd.touches[1]);aX=aV=ap(aM[0].start,aM[1].start)}else{aD(bd.touches[1]);aV=ap(aM[0].end,aM[1].end);aF=an(aM[0].end,aM[1].end)}D=a3(aX,aV);am=Math.abs(aX-aV)}if((T===aq.fingers||aq.fingers===h)||!a||aT()){aL=aH(bb.start,bb.end);ah(ba,aL);ac=aO(bb.start,bb.end);Y=aI();aE(aL,ac);if(aq.swipeStatus||aq.pinchStatus){a9=L(bd,W)}if(!aq.triggerOnTouchEnd||aq.triggerOnTouchLeave){var a7=true;if(aq.triggerOnTouchLeave){var bc=aU(this);a7=B(bb.end,bc)}if(!aq.triggerOnTouchEnd&&a7){W=ay(j)}else{if(aq.triggerOnTouchLeave&&!a7){W=ay(g)}}if(W==p||W==g){L(bd,W)}}}else{W=p;L(bd,W)}if(a9===false){W=p;L(bd,W)}}function I(a7){var a8=a7.originalEvent;if(a){if(a8.touches.length>0){C();return true}}if(ai()){T=aa}a7.preventDefault();aY=ao();Y=aI();if(a6()){W=p;L(a8,W)}else{if(aq.triggerOnTouchEnd||(aq.triggerOnTouchEnd==false&&W===j)){W=g;L(a8,W)}else{if(!aq.triggerOnTouchEnd&&a2()){W=g;aB(a8,W,x)}else{if(W===j){W=p;L(a8,W)}}}}ak(false);return null}function a5(){T=0;aY=0;Q=0;aX=0;aV=0;D=1;O();ak(false)}function H(a7){var a8=a7.originalEvent;if(aq.triggerOnTouchLeave){W=ay(g);L(a8,W)}}function aG(){aN.unbind(G,aJ);aN.unbind(az,a5);aN.unbind(au,aZ);aN.unbind(R,I);if(P){aN.unbind(P,H)}ak(false)}function ay(bb){var ba=bb;var a9=aw();var a8=aj();var a7=a6();if(!a9||a7){ba=p}else{if(a8&&bb==j&&(!aq.triggerOnTouchEnd||aq.triggerOnTouchLeave)){ba=g}else{if(!a8&&bb==g&&aq.triggerOnTouchLeave){ba=p}}}return ba}function L(a9,a7){var a8=undefined;if(F()||S()){a8=aB(a9,a7,k)}else{if((M()||aT())&&a8!==false){a8=aB(a9,a7,s)}}if(aC()&&a8!==false){a8=aB(a9,a7,i)}else{if(al()&&a8!==false){a8=aB(a9,a7,b)}else{if(ad()&&a8!==false){a8=aB(a9,a7,x)}}}if(a7===p){a5(a9)}if(a7===g){if(a){if(a9.touches.length==0){a5(a9)}}else{a5(a9)}}return a8}function aB(ba,a7,a9){var a8=undefined;if(a9==k){aN.trigger("swipeStatus",[a7,aL||null,ac||0,Y||0,T]);if(aq.swipeStatus){a8=aq.swipeStatus.call(aN,ba,a7,aL||null,ac||0,Y||0,T);if(a8===false){return false}}if(a7==g&&aR()){aN.trigger("swipe",[aL,ac,Y,T]);if(aq.swipe){a8=aq.swipe.call(aN,ba,aL,ac,Y,T);if(a8===false){return false}}switch(aL){case o:aN.trigger("swipeLeft",[aL,ac,Y,T]);if(aq.swipeLeft){a8=aq.swipeLeft.call(aN,ba,aL,ac,Y,T)}break;case n:aN.trigger("swipeRight",[aL,ac,Y,T]);if(aq.swipeRight){a8=aq.swipeRight.call(aN,ba,aL,ac,Y,T)}break;case d:aN.trigger("swipeUp",[aL,ac,Y,T]);if(aq.swipeUp){a8=aq.swipeUp.call(aN,ba,aL,ac,Y,T)}break;case v:aN.trigger("swipeDown",[aL,ac,Y,T]);if(aq.swipeDown){a8=aq.swipeDown.call(aN,ba,aL,ac,Y,T)}break}}}if(a9==s){aN.trigger("pinchStatus",[a7,aF||null,am||0,Y||0,T,D]);if(aq.pinchStatus){a8=aq.pinchStatus.call(aN,ba,a7,aF||null,am||0,Y||0,T,D);if(a8===false){return false}}if(a7==g&&a4()){switch(aF){case c:aN.trigger("pinchIn",[aF||null,am||0,Y||0,T,D]);if(aq.pinchIn){a8=aq.pinchIn.call(aN,ba,aF||null,am||0,Y||0,T,D)}break;case w:aN.trigger("pinchOut",[aF||null,am||0,Y||0,T,D]);if(aq.pinchOut){a8=aq.pinchOut.call(aN,ba,aF||null,am||0,Y||0,T,D)}break}}}if(a9==x){if(a7===p||a7===g){clearTimeout(aS);if(V()&&!E()){K=ao();aS=setTimeout(e.proxy(function(){K=null;aN.trigger("tap",[ba.target]);if(aq.tap){a8=aq.tap.call(aN,ba,ba.target)}},this),aq.doubleTapThreshold)}else{K=null;aN.trigger("tap",[ba.target]);if(aq.tap){a8=aq.tap.call(aN,ba,ba.target)}}}}else{if(a9==i){if(a7===p||a7===g){clearTimeout(aS);K=null;aN.trigger("doubletap",[ba.target]);if(aq.doubleTap){a8=aq.doubleTap.call(aN,ba,ba.target)}}}else{if(a9==b){if(a7===p||a7===g){clearTimeout(aS);K=null;aN.trigger("longtap",[ba.target]);if(aq.longTap){a8=aq.longTap.call(aN,ba,ba.target)}}}}}return a8}function aj(){var a7=true;if(aq.threshold!==null){a7=ac>=aq.threshold}return a7}function a6(){var a7=false;if(aq.cancelThreshold!==null&&aL!==null){a7=(aP(aL)-ac)>=aq.cancelThreshold}return a7}function ab(){if(aq.pinchThreshold!==null){return am>=aq.pinchThreshold}return true}function aw(){var a7;if(aq.maxTimeThreshold){if(Y>=aq.maxTimeThreshold){a7=false}else{a7=true}}else{a7=true}return a7}function ah(a7,a8){if(aq.allowPageScroll===l||aT()){a7.preventDefault()}else{var a9=aq.allowPageScroll===r;switch(a8){case o:if((aq.swipeLeft&&a9)||(!a9&&aq.allowPageScroll!=A)){a7.preventDefault()}break;case n:if((aq.swipeRight&&a9)||(!a9&&aq.allowPageScroll!=A)){a7.preventDefault()}break;case d:if((aq.swipeUp&&a9)||(!a9&&aq.allowPageScroll!=t)){a7.preventDefault()}break;case v:if((aq.swipeDown&&a9)||(!a9&&aq.allowPageScroll!=t)){a7.preventDefault()}break}}}function a4(){var a8=aK();var a7=U();var a9=ab();return a8&&a7&&a9}function aT(){return !!(aq.pinchStatus||aq.pinchIn||aq.pinchOut)}function M(){return !!(a4()&&aT())}function aR(){var ba=aw();var bc=aj();var a9=aK();var a7=U();var a8=a6();var bb=!a8&&a7&&a9&&bc&&ba;return bb}function S(){return !!(aq.swipe||aq.swipeStatus||aq.swipeLeft||aq.swipeRight||aq.swipeUp||aq.swipeDown)}function F(){return !!(aR()&&S())}function aK(){return((T===aq.fingers||aq.fingers===h)||!a)}function U(){return aM[0].end.x!==0}function a2(){return !!(aq.tap)}function V(){return !!(aq.doubleTap)}function aQ(){return !!(aq.longTap)}function N(){if(K==null){return false}var a7=ao();return(V()&&((a7-K)<=aq.doubleTapThreshold))}function E(){return N()}function at(){return((T===1||!a)&&(isNaN(ac)||ac===0))}function aW(){return((Y>aq.longTapThreshold)&&(ac<q))}function ad(){return !!(at()&&a2())}function aC(){return !!(N()&&V())}function al(){return !!(aW()&&aQ())}function C(){a1=ao();aa=event.touches.length+1}function O(){a1=0;aa=0}function ai(){var a7=false;if(a1){var a8=ao()-a1;if(a8<=aq.fingerReleaseThreshold){a7=true}}return a7}function ax(){return !!(aN.data(y+"_intouch")===true)}function ak(a7){if(a7===true){aN.bind(au,aZ);aN.bind(R,I);if(P){aN.bind(P,H)}}else{aN.unbind(au,aZ,false);aN.unbind(R,I,false);if(P){aN.unbind(P,H,false)}}aN.data(y+"_intouch",a7===true)}function ae(a8,a7){var a9=a7.identifier!==undefined?a7.identifier:0;aM[a8].identifier=a9;aM[a8].start.x=aM[a8].end.x=a7.pageX||a7.clientX;aM[a8].start.y=aM[a8].end.y=a7.pageY||a7.clientY;return aM[a8]}function aD(a7){var a9=a7.identifier!==undefined?a7.identifier:0;var a8=Z(a9);a8.end.x=a7.pageX||a7.clientX;a8.end.y=a7.pageY||a7.clientY;return a8}function Z(a8){for(var a7=0;a7<aM.length;a7++){if(aM[a7].identifier==a8){return aM[a7]}}}function af(){var a7=[];for(var a8=0;a8<=5;a8++){a7.push({start:{x:0,y:0},end:{x:0,y:0},identifier:0})}return a7}function aE(a7,a8){a8=Math.max(a8,aP(a7));J[a7].distance=a8}function aP(a7){if(J[a7]){return J[a7].distance}return undefined}function X(){var a7={};a7[o]=ar(o);a7[n]=ar(n);a7[d]=ar(d);a7[v]=ar(v);return a7}function ar(a7){return{direction:a7,distance:0}}function aI(){return aY-Q}function ap(ba,a9){var a8=Math.abs(ba.x-a9.x);var a7=Math.abs(ba.y-a9.y);return Math.round(Math.sqrt(a8*a8+a7*a7))}function a3(a7,a8){var a9=(a8/a7)*1;return a9.toFixed(2)}function an(){if(D<1){return w}else{return c}}function aO(a8,a7){return Math.round(Math.sqrt(Math.pow(a7.x-a8.x,2)+Math.pow(a7.y-a8.y,2)))}function aA(ba,a8){var a7=ba.x-a8.x;var bc=a8.y-ba.y;var a9=Math.atan2(bc,a7);var bb=Math.round(a9*180/Math.PI);if(bb<0){bb=360-Math.abs(bb)}return bb}function aH(a8,a7){var a9=aA(a8,a7);if((a9<=45)&&(a9>=0)){return o}else{if((a9<=360)&&(a9>=315)){return o}else{if((a9>=135)&&(a9<=225)){return n}else{if((a9>45)&&(a9<135)){return v}else{return d}}}}}function ao(){var a7=new Date();return a7.getTime()}function aU(a7){a7=e(a7);var a9=a7.offset();var a8={left:a9.left,right:a9.left+a7.outerWidth(),top:a9.top,bottom:a9.top+a7.outerHeight()};return a8}function B(a7,a8){return(a7.x>a8.left&&a7.x<a8.right&&a7.y>a8.top&&a7.y<a8.bottom)}}}));
