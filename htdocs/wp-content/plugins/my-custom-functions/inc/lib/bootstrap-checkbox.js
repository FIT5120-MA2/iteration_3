/*!
 * Bootstrap-checkbox v1.4.0 (https://vsn4ik.github.io/bootstrap-checkbox/)
 * Copyright 2013-2016 Vasily A. (https://github.com/vsn4ik)
 * Licensed under the MIT license
 */

"use strict";!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){function b(b,c){this.element=b,this.$element=a(b);var d=this.$element.data();return""===d.reverse&&(d.reverse=!0),""===d.switchAlways&&(d.switchAlways=!0),""===d.html&&(d.html=!0),this.options=a.extend({},a.fn.checkboxpicker.defaults,c,d),this.$element.closest("label").length?void console.warn(this.options.warningMessage):(this.$group=a.create("div"),this.$buttons=a.create("a","a"),this.$off=this.$buttons.eq(this.options.reverse?1:0),this.$on=this.$buttons.eq(this.options.reverse?0:1),void this.init())}a.create=function(){return a(a.map(arguments,a.proxy(document,"createElement")))},b.prototype={init:function(){var b=this.options.html?"html":"text";this.$element.addClass("hidden"),this.$group.addClass(this.options.baseGroupCls).addClass(this.options.groupCls),this.$buttons.addClass(this.options.baseCls).addClass(this.options.cls),this.options.offLabel&&this.$off[b](this.options.offLabel),this.options.onLabel&&this.$on[b](this.options.onLabel),this.options.offIconCls&&(this.options.offLabel&&this.$off.prepend("&nbsp;"),a.create("span").addClass(this.options.iconCls).addClass(this.options.offIconCls).prependTo(this.$off)),this.options.onIconCls&&(this.options.onLabel&&this.$on.prepend("&nbsp;"),a.create("span").addClass(this.options.iconCls).addClass(this.options.onIconCls).prependTo(this.$on)),this.element.checked?(this.$on.addClass("active"),this.$on.addClass(this.options.onActiveCls),this.$off.addClass(this.options.offCls)):(this.$off.addClass("active"),this.$off.addClass(this.options.offActiveCls),this.$on.addClass(this.options.onCls)),this.element.title?this.$group.attr("title",this.element.title):(this.options.offTitle&&this.$off.attr("title",this.options.offTitle),this.options.onTitle&&this.$on.attr("title",this.options.onTitle)),this.$group.on("keydown",a.proxy(this,"keydown")),this.$buttons.on("click",a.proxy(this,"click")),this.$element.on("change",a.proxy(this,"toggleChecked")),a(this.element.labels).on("click",a.proxy(this,"focus")),a(this.element.form).on("reset",a.proxy(this,"reset")),this.$group.append(this.$buttons).insertAfter(this.element),this.element.disabled?(this.$buttons.addClass("disabled"),this.options.disabledCursor&&this.$group.css("cursor",this.options.disabledCursor)):(this.$group.attr("tabindex",this.element.tabIndex),this.element.autofocus&&this.focus())},toggleChecked:function(){this.$buttons.toggleClass("active"),this.$off.toggleClass(this.options.offCls),this.$off.toggleClass(this.options.offActiveCls),this.$on.toggleClass(this.options.onCls),this.$on.toggleClass(this.options.onActiveCls)},toggleDisabled:function(){this.$buttons.toggleClass("disabled"),this.element.disabled?(this.$group.attr("tabindex",this.element.tabIndex),this.$group.css("cursor","")):(this.$group.removeAttr("tabindex"),this.options.disabledCursor&&this.$group.css("cursor",this.options.disabledCursor))},focus:function(){this.$group.trigger("focus")},click:function(b){var c=a(b.currentTarget);c.hasClass("active")&&!this.options.switchAlways||this.change()},change:function(){this.set(!this.element.checked)},set:function(a){this.element.checked=a,this.$element.trigger("change")},keydown:function(b){-1!=a.inArray(b.keyCode,this.options.toggleKeyCodes)?(b.preventDefault(),this.change()):13==b.keyCode&&a(this.element.form).trigger("submit")},reset:function(){(this.element.defaultChecked&&this.$off.hasClass("active")||!this.element.defaultChecked&&this.$on.hasClass("active"))&&this.set(this.element.defaultChecked)}};var c=a.extend({},a.propHooks);a.extend(a.propHooks,{checked:{set:function(b,d){var e=a.data(b,"bs.checkbox");e&&b.checked!=d&&e.change(d),c.checked&&c.checked.set&&c.checked.set(b,d)}},disabled:{set:function(b,d){var e=a.data(b,"bs.checkbox");e&&b.disabled!=d&&e.toggleDisabled(),c.disabled&&c.disabled.set&&c.disabled.set(b,d)}}});var d=a.fn.checkboxpicker;return a.fn.checkboxpicker=function(c,d){var e;return e=this instanceof a?this:a("string"==typeof c?c:d),e.each(function(){var d=a.data(this,"bs.checkbox");d||(d=new b(this,c),a.data(this,"bs.checkbox",d))})},a.fn.checkboxpicker.defaults={baseGroupCls:"btn-group",baseCls:"btn",groupCls:null,cls:null,offCls:"btn-default",onCls:"btn-default",offActiveCls:"btn-danger",onActiveCls:"btn-success",offLabel:"No",onLabel:"Yes",offTitle:!1,onTitle:!1,iconCls:"glyphicon",disabledCursor:"not-allowed",toggleKeyCodes:[13,32],warningMessage:"Please do not use Bootstrap-checkbox element in label element."},a.fn.checkboxpicker.Constructor=b,a.fn.checkboxpicker.noConflict=function(){return a.fn.checkboxpicker=d,this},a.fn.checkboxpicker});