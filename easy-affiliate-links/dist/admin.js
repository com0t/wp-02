var EasyAffiliateLinks="object"==typeof EasyAffiliateLinks?EasyAffiliateLinks:{};EasyAffiliateLinks.admin=function(t){var e={};function n(o){if(e[o])return e[o].exports;var i=e[o]={i:o,l:!1,exports:{}};return t[o].call(i.exports,i,i.exports,n),i.l=!0,i.exports}return n.m=t,n.c=e,n.d=function(t,e,o){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:o})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)n.d(o,i,function(e){return t[e]}.bind(null,i));return o},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=411)}({163:function(t,e){t.exports=window.jQuery},411:function(t,e,n){"use strict";n.r(e);n(412),n(413),n(414),n(415),n(416),n(418)},412:function(t,e){},413:function(t,e){},414:function(t,e){},415:function(t,e){},416:function(t,e,n){"use strict";(function(t){n(417);var e=!1,o={},i=[],r=0;function a(){var n={action:"eafl_"+e,security:eafl_admin.nonce,items:JSON.stringify(i),args:o};t.post(eafl_admin.ajax_url,n,function(e){var n;e.success?(i=e.data.items_left,n=100*(1-i.length/r),t("#eafl-tools-progress-bar").css("width",n+"%"),i.length>0?a():t("#eafl-tools-finished").show()):window.location=e.data.redirect},"json")}t(document).ready(function(n){void 0!==window.eafl_tools&&(e=eafl_tools.action,o=eafl_tools.args,i=eafl_tools.items,r=eafl_tools.items.length,a()),t("#eafl_tools_reset_settings").on("click",function(e){if(e.preventDefault(),confirm("Are you sure you want to reset all settings?")){var n={action:"eafl_reset_settings",security:eafl_admin.nonce};t.post(eafl_admin.ajax_url,n,function(t){t.success?window.location=t.data.redirect:alert("Something went wrong.")},"json")}})})}).call(this,n(163))},417:function(t,e){},418:function(t,e,n){(function(t){t(document).ready(function(e){t(".eafl-statistics-cleanup #remove_all").on("click",function(){t(this).is(":checked")&&alert("Warning: this will remove ALL our click data")})})}).call(this,n(163))}});