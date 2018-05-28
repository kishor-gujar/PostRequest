!function(e){function t(e){var t=document.createElement("input"),e="on"+e,i=e in t;return i||(t.setAttribute(e,"return;"),i="function"==typeof t[e]),t=null,i}function i(t,a,n){var s=n.aliases[t];return!!s&&(s.alias&&i(s.alias,void 0,n),e.extend(!0,n,s),e.extend(!0,n,a),!0)}function a(t){function i(i){t.numericInput&&(i=i.split("").reverse().join(""));var a=!1,n=0,s=t.greedy,r=t.repeat;"*"==r&&(s=!1),1==i.length&&0==s&&0!=r&&(t.placeholder="");for(var o=e.map(i.split(""),function(e,i){var s=[];if(e==t.escapeChar)a=!0;else if(e!=t.optionalmarker.start&&e!=t.optionalmarker.end||a){var r=t.definitions[e];if(r&&!a)for(var o=0;o<r.cardinality;o++)s.push(t.placeholder.charAt((n+o)%t.placeholder.length));else s.push(e),a=!1;return n+=s.length,s}}),u=o.slice(),l=1;l<r&&s;l++)u=u.concat(o.slice());return{mask:u,repeat:r,greedy:s}}function a(i){t.numericInput&&(i=i.split("").reverse().join(""));var a=!1,n=!1,s=!1;return e.map(i.split(""),function(e,i){var r=[];if(e==t.escapeChar)n=!0;else if(e!=t.optionalmarker.start||n){if(e!=t.optionalmarker.end||n){var o=t.definitions[e];if(o&&!n){for(var u=o.prevalidator,l=u?u.length:0,c=1;c<o.cardinality;c++){var d=l>=c?u[c-1]:[],f=d.validator,p=d.cardinality;r.push({fn:f?"string"==typeof f?new RegExp(f):new function(){this.test=f}:new RegExp("."),cardinality:p||1,optionality:a,newBlockMarker:1==a&&s,offset:0,casing:o.casing,def:o.definitionSymbol||e}),1==a&&(s=!1)}r.push({fn:o.validator?"string"==typeof o.validator?new RegExp(o.validator):new function(){this.test=o.validator}:new RegExp("."),cardinality:o.cardinality,optionality:a,newBlockMarker:s,offset:0,casing:o.casing,def:o.definitionSymbol||e})}else r.push({fn:null,cardinality:0,optionality:a,newBlockMarker:s,offset:0,casing:null,def:e}),n=!1;return s=!1,r}a=!1,s=!0}else a=!0,s=!0})}function n(e){return t.optionalmarker.start+e+t.optionalmarker.end}function s(e){for(var i=0,a=0,n=e.length,s=0;s<n&&(e.charAt(s)==t.optionalmarker.start&&i++,e.charAt(s)==t.optionalmarker.end&&a++,!(i>0&&i==a));s++);var r=[e.substring(0,s)];return s<n&&r.push(e.substring(s+1,n)),r}function r(e){for(var i=e.length,a=0;a<i&&e.charAt(a)!=t.optionalmarker.start;a++);var n=[e.substring(0,a)];return a<i&&n.push(e.substring(a+1,i)),n}function o(t,c,d){var f,p,v=s(c),k=r(v[0]);k.length>1?(f=t+k[0]+n(k[1])+(v.length>1?v[1]:""),-1==e.inArray(f,l)&&""!=f&&(l.push(f),p=i(f),u.push({mask:f,_buffer:p.mask,buffer:p.mask.slice(),tests:a(f),lastValidPosition:-1,greedy:p.greedy,repeat:p.repeat,metadata:d})),f=t+k[0]+(v.length>1?v[1]:""),-1==e.inArray(f,l)&&""!=f&&(l.push(f),p=i(f),u.push({mask:f,_buffer:p.mask,buffer:p.mask.slice(),tests:a(f),lastValidPosition:-1,greedy:p.greedy,repeat:p.repeat,metadata:d})),r(k[1]).length>1&&o(t+k[0],k[1]+v[1],d),v.length>1&&r(v[1]).length>1&&(o(t+k[0]+n(k[1]),v[1],d),o(t+k[0],v[1],d))):(f=t+v,-1==e.inArray(f,l)&&""!=f&&(l.push(f),p=i(f),u.push({mask:f,_buffer:p.mask,buffer:p.mask.slice(),tests:a(f),lastValidPosition:-1,greedy:p.greedy,repeat:p.repeat,metadata:d})))}var u=[],l=[];return e.isFunction(t.mask)&&(t.mask=t.mask.call(this,t)),e.isArray(t.mask)?e.each(t.mask,function(e,t){void 0!=t.mask?o("",t.mask.toString(),t):o("",t.toString())}):o("",t.mask.toString()),t.greedy?u:u.sort(function(e,t){return e.mask.length-t.mask.length})}function n(t,i,a,n){function c(){return t[i]}function d(){return c().tests}function f(){return c()._buffer}function p(){return c().buffer}function v(n,s,r){function o(e,t,i,n){for(var s=m(e),r=i?1:0,o="",u=t.buffer,l=t.tests[s].cardinality;l>r;l--)o+=P(u,s-(l-1));return i&&(o+=i),null!=t.tests[s].fn?t.tests[s].fn.test(o,u,e,n,a):(i==P(t._buffer,e,!0)||i==a.skipOptionalPartCharacter)&&{refresh:!0,c:P(t._buffer,e,!0),pos:e}}if(r=!0===r){var u=o(n,c(),s,r);return!0===u&&(u={pos:n}),u}var l=[],u=!1,d=i,f=p().slice(),v=c().lastValidPosition,k=(y(n),[]);return e.each(t,function(e,t){if("object"==typeof t){i=e;var a,m=n,y=c().lastValidPosition;if(y==v){if(m-v>1)for(var P=-1==y?0:y;P<m&&!1!==(a=o(P,c(),f[P],!0));P++){b(p(),P,f[P],!0),!0===a&&(a={pos:P});var x=a.pos||P;c().lastValidPosition<x&&(c().lastValidPosition=x)}if(!h(m)&&!o(m,c(),s,r)){for(var C=_(m)-m,M=0;M<C&&!1===o(++m,c(),s,r);M++);k.push(i)}}if((c().lastValidPosition>=v||i==d)&&m>=0&&m<g()){if(!1!==(u=o(m,c(),s,r))){!0===u&&(u={pos:m});var x=u.pos||m;c().lastValidPosition<x&&(c().lastValidPosition=x)}l.push({activeMasksetIndex:e,result:u})}}}),i=d,function(i,a){var r=!1;if(e.each(a,function(t,a){if(r=-1==e.inArray(a.activeMasksetIndex,i)&&!1!==a.result)return!1}),r)a=e.map(a,function(a,n){if(-1==e.inArray(a.activeMasksetIndex,i))return a;t[a.activeMasksetIndex].lastValidPosition=v});else{var u,l=-1,c=-1;e.each(a,function(t,a){-1!=e.inArray(a.activeMasksetIndex,i)&&!1!==a.result&(-1==l||l>a.result.pos)&&(l=a.result.pos,c=a.activeMasksetIndex)}),a=e.map(a,function(a,r){if(-1!=e.inArray(a.activeMasksetIndex,i)){if(a.result.pos==l)return a;if(!1!==a.result){for(var d=n;d<l;d++){if(!1===(u=o(d,t[a.activeMasksetIndex],t[c].buffer[d],!0))){t[a.activeMasksetIndex].lastValidPosition=l-1;break}b(t[a.activeMasksetIndex].buffer,d,t[c].buffer[d],!0),t[a.activeMasksetIndex].lastValidPosition=d}return u=o(l,t[a.activeMasksetIndex],s,!0),!1!==u&&(b(t[a.activeMasksetIndex].buffer,l,s,!0),t[a.activeMasksetIndex].lastValidPosition=l),a}}})}return a}(k,l)}function k(){var a=i,n={activeMasksetIndex:0,lastValidPosition:-1,next:-1};e.each(t,function(e,t){"object"==typeof t&&(i=e,c().lastValidPosition>n.lastValidPosition?(n.activeMasksetIndex=e,n.lastValidPosition=c().lastValidPosition,n.next=_(c().lastValidPosition)):c().lastValidPosition==n.lastValidPosition&&(-1==n.next||n.next>_(c().lastValidPosition))&&(n.activeMasksetIndex=e,n.lastValidPosition=c().lastValidPosition,n.next=_(c().lastValidPosition)))}),i=-1!=n.lastValidPosition&&t[a].lastValidPosition==n.lastValidPosition?a:n.activeMasksetIndex,a!=i&&(M(p(),_(n.lastValidPosition),g()),c().writeOutBuffer=!0),W.data("_inputmask").activeMasksetIndex=i}function h(e){var t=m(e),i=d()[t];return void 0!=i&&i.fn}function m(e){return e%d().length}function g(){return a.getMaskLength(f(),c().greedy,c().repeat,p(),a)}function _(e){var t=g();if(e>=t)return t;for(var i=e;++i<t&&!h(i););return i}function y(e){var t=e;if(t<=0)return 0;for(;--t>0&&!h(t););return t}function b(e,t,i,a){a&&(t=x(e,t));var n=d()[m(t)],s=i;if(void 0!=s&&void 0!=n)switch(n.casing){case"upper":s=i.toUpperCase();break;case"lower":s=i.toLowerCase()}e[t]=s}function P(e,t,i){return i&&(t=x(e,t)),e[t]}function x(e,t){for(var i;void 0==e[t]&&e.length<g();)for(i=0;void 0!==f()[i];)e.push(f()[i++]);return t}function C(e,t,i){e._valueSet(t.join("")),void 0!=i&&O(e,i)}function M(e,t,i,a){for(var n=t,s=g();n<i&&n<s;n++)!0===a?h(n)||b(e,n,""):b(e,n,P(f().slice(),n,!0))}function A(e,t){var i=m(t);b(e,t,P(f(),i))}function E(e){return a.placeholder.charAt(e%a.placeholder.length)}function j(a,n,s,r,o){var u=void 0!=r?r.slice():V(a._valueGet()).split("");e.each(t,function(e,t){"object"==typeof t&&(t.buffer=t._buffer.slice(),t.lastValidPosition=-1,t.p=-1)}),!0!==s&&(i=0),n&&a._valueSet("");g();e.each(u,function(t,i){if(!0===o){var r=c().p,u=-1==r?r:y(r),l=-1==u?t:_(u);-1==e.inArray(i,f().slice(u+1,l))&&U.call(a,void 0,!0,i.charCodeAt(0),n,s,t)}else U.call(a,void 0,!0,i.charCodeAt(0),n,s,t)}),!0===s&&-1!=c().p&&(c().lastValidPosition=y(c().p))}function I(t){return e.inputmask.escapeRegex.call(this,t)}function V(e){return e.replace(new RegExp("("+I(f().join(""))+")*$"),"")}function S(e){for(var t,i,a=p(),n=a.slice(),i=n.length-1;i>=0;i--){var t=m(i);if(!d()[t].optionality)break;if(h(i)&&v(i,a[i],!0))break;n.pop()}C(e,n)}function w(e){if(q&&"number"==typeof e&&(!a.greedy||""!=a.placeholder)){e=p().length-e}return e}function O(t,i,n){var s,r=t.jquery&&t.length>0?t[0]:t;if("number"!=typeof i)return e(t).is(":visible")?(r.setSelectionRange?(i=r.selectionStart,n=r.selectionEnd):document.selection&&document.selection.createRange&&(s=document.selection.createRange(),i=0-s.duplicate().moveStart("character",-1e5),n=i+s.text.length),i=w(i),n=w(n),{begin:i,end:n}):{begin:0,end:0};i=w(i),n=w(n),e(t).is(":visible")&&(n="number"==typeof n?n:i,r.scrollLeft=r.scrollWidth,0==a.insertMode&&i==n&&n++,r.setSelectionRange?(r.selectionStart=i,r.selectionEnd=o?i:n):r.createTextRange&&(s=r.createTextRange(),s.collapse(!0),s.moveEnd("character",n),s.moveStart("character",i),s.select()))}function D(n){if("*"!=a.repeat){var s=!1,r=0,o=i;return e.each(t,function(e,t){if("object"==typeof t){i=e;var a=y(g());if(t.lastValidPosition>=r&&t.lastValidPosition==a){for(var o=!0,u=0;u<=a;u++){var l=h(u),c=m(u);if(l&&(void 0==n[u]||n[u]==E(u))||!l&&n[u]!=f()[c]){o=!1;break}}if(s=s||o)return!1}r=t.lastValidPosition}}),i=o,s}}function G(e,t){return q?e-t>1||e-t==1&&a.insertMode:t-e>1||t-e==1&&a.insertMode}function T(t){var i=e._data(t).events;e.each(i,function(t,i){e.each(i,function(e,t){if("inputmask"==t.namespace&&"setvalue"!=t.type){var i=t.handler;t.handler=function(e){if(!this.readOnly&&!this.disabled)return i.apply(this,arguments);e.preventDefault}}})})}function R(t){var i;if(Object.getOwnPropertyDescriptor&&(i=Object.getOwnPropertyDescriptor(t,"value")),i&&i.get){if(!t._valueGet){var a=i.get,n=i.set;t._valueGet=function(){return q?a.call(this).split("").reverse().join(""):a.call(this)},t._valueSet=function(e){n.call(this,q?e.split("").reverse().join(""):e)},Object.defineProperty(t,"value",{get:function(){var t=e(this),i=e(this).data("_inputmask"),n=i.masksets,s=i.activeMasksetIndex;return i&&i.opts.autoUnmask?t.inputmask("unmaskedvalue"):a.call(this)!=n[s]._buffer.join("")?a.call(this):""},set:function(t){n.call(this,t),e(this).triggerHandler("setvalue.inputmask")}})}}else if(document.__lookupGetter__&&t.__lookupGetter__("value")){if(!t._valueGet){var a=t.__lookupGetter__("value"),n=t.__lookupSetter__("value");t._valueGet=function(){return q?a.call(this).split("").reverse().join(""):a.call(this)},t._valueSet=function(e){n.call(this,q?e.split("").reverse().join(""):e)},t.__defineGetter__("value",function(){var t=e(this),i=e(this).data("_inputmask"),n=i.masksets,s=i.activeMasksetIndex;return i&&i.opts.autoUnmask?t.inputmask("unmaskedvalue"):a.call(this)!=n[s]._buffer.join("")?a.call(this):""}),t.__defineSetter__("value",function(t){n.call(this,t),e(this).triggerHandler("setvalue.inputmask")})}}else if(t._valueGet||(t._valueGet=function(){return q?this.value.split("").reverse().join(""):this.value},t._valueSet=function(e){this.value=q?e.split("").reverse().join(""):e}),void 0==e.valHooks.text||1!=e.valHooks.text.inputmaskpatch){var a=e.valHooks.text&&e.valHooks.text.get?e.valHooks.text.get:function(e){return e.value},n=e.valHooks.text&&e.valHooks.text.set?e.valHooks.text.set:function(e,t){return e.value=t,e};jQuery.extend(e.valHooks,{text:{get:function(t){var i=e(t);if(i.data("_inputmask")){if(i.data("_inputmask").opts.autoUnmask)return i.inputmask("unmaskedvalue");var n=a(t),s=i.data("_inputmask");return n!=s.masksets[s.activeMasksetIndex]._buffer.join("")?n:""}return a(t)},set:function(t,i){var a=e(t),s=n(t,i);return a.data("_inputmask")&&a.triggerHandler("setvalue.inputmask"),s},inputmaskpatch:!0}})}}function K(e,t,i,a){var n=p();if(!1!==a)for(;!h(e)&&e-1>=0;)e--;for(var s=e;s<t&&s<g();s++)if(h(s)){A(n,s);var r=_(s),o=P(n,r);if(o!=E(r))if(r<g()&&!1!==v(s,o,!0)&&d()[m(s)].def==d()[m(r)].def)b(n,s,o,!0);else if(h(s))break}else A(n,s);if(void 0!=i&&b(n,y(t),i),0==c().greedy){var u=V(n.join("")).split("");n.length=u.length;for(var s=0,l=n.length;s<l;s++)n[s]=u[s];0==n.length&&(c().buffer=f().slice())}return e}function N(e,t,i){var a=p();if(P(a,e,!0)!=E(e))for(var n=y(t);n>e&&n>=0;n--)if(h(n)){var s=y(n),r=P(a,s);r!=E(s)&&!1!==v(s,r,!0)&&d()[m(n)].def==d()[m(s)].def&&(b(a,n,r,!0),A(a,s))}else A(a,n);void 0!=i&&P(a,e)==E(e)&&b(a,e,i);var o=a.length;if(0==c().greedy){var u=V(a.join("")).split("");a.length=u.length;for(var n=0,l=a.length;n<l;n++)a[n]=u[n];0==a.length&&(c().buffer=f().slice())}return t-(o-a.length)}function L(e,i,n){if(a.numericInput||q){switch(i){case a.keyCode.BACKSPACE:i=a.keyCode.DELETE;break;case a.keyCode.DELETE:i=a.keyCode.BACKSPACE}if(q){var s=n.end;n.end=n.begin,n.begin=s}}var r=!0;if(n.begin==n.end){var o=i==a.keyCode.BACKSPACE?n.begin-1:n.begin;a.isNumeric&&""!=a.radixPoint&&p()[o]==a.radixPoint&&(n.begin=p().length-1==o?n.begin:i==a.keyCode.BACKSPACE?o:_(o),n.end=n.begin),r=!1,i==a.keyCode.BACKSPACE?n.begin--:i==a.keyCode.DELETE&&n.end++}else n.end-n.begin!=1||a.insertMode||(r=!1,i==a.keyCode.BACKSPACE&&n.begin--);M(p(),n.begin,n.end);var u=g();if(0==a.greedy)K(n.begin,u,void 0,!q&&i==a.keyCode.BACKSPACE&&!r);else{for(var l=n.begin,d=n.begin;d<n.end;d++)!h(d)&&r||(l=K(n.begin,u,void 0,!q&&i==a.keyCode.BACKSPACE&&!r));r||(n.begin=l)}var f=_(-1);M(p(),n.begin,n.end,!0),j(e,!1,void 0==t[1]||f>=n.end,p()),c().lastValidPosition<f?(c().lastValidPosition=-1,c().p=f):c().p=n.begin}function B(t){Q=!1;var i=this,n=e(i),s=t.keyCode,o=O(i);s==a.keyCode.BACKSPACE||s==a.keyCode.DELETE||r&&127==s||t.ctrlKey&&88==s?(t.preventDefault(),88==s&&(z=p().join("")),L(i,s,o),k(),C(i,p(),c().p),i._valueGet()==f().join("")&&n.trigger("cleared"),a.showTooltip&&n.prop("title",c().mask)):s==a.keyCode.END||s==a.keyCode.PAGE_DOWN?setTimeout(function(){var e=_(c().lastValidPosition);a.insertMode||e!=g()||t.shiftKey||e--,O(i,t.shiftKey?o.begin:e,e)},0):s==a.keyCode.HOME&&!t.shiftKey||s==a.keyCode.PAGE_UP?O(i,0,t.shiftKey?o.begin:0):s==a.keyCode.ESCAPE||90==s&&t.ctrlKey?(j(i,!0,!1,z.split("")),n.click()):s!=a.keyCode.INSERT||t.shiftKey||t.ctrlKey?0!=a.insertMode||t.shiftKey||(s==a.keyCode.RIGHT?setTimeout(function(){var e=O(i);O(i,e.begin)},0):s==a.keyCode.LEFT&&setTimeout(function(){var e=O(i);O(i,e.begin-1)},0)):(a.insertMode=!a.insertMode,O(i,a.insertMode||o.begin!=g()?o.begin:o.begin-1));var u=O(i);!0===a.onKeyDown.call(this,t,p(),a)&&O(i,u.begin,u.end),J=-1!=e.inArray(s,a.ignorables)}function U(n,s,r,o,u,l){if(void 0==r&&Q)return!1;Q=!0;var d=this,f=e(d);n=n||window.event;var r=s?r:n.which||n.charCode||n.keyCode;if(!(!0===s||n.ctrlKey&&n.altKey)&&(n.ctrlKey||n.metaKey||J))return!0;if(r){!0!==s&&46==r&&0==n.shiftKey&&","==a.radixPoint&&(r=44);var h,m,x,M=String.fromCharCode(r);if(s){var A=u?l:c().lastValidPosition+1;h={begin:A,end:A}}else h=O(d);var j=G(h.begin,h.end),I=i;j&&(i=I,e.each(t,function(e,t){"object"==typeof t&&(i=e,c().undoBuffer=p().join(""))}),L(d,a.keyCode.DELETE,h),a.insertMode||e.each(t,function(e,t){"object"==typeof t&&(i=e,N(h.begin,g()),c().lastValidPosition=_(c().lastValidPosition))}),i=I);var V=p().join("").indexOf(a.radixPoint);a.isNumeric&&!0!==s&&-1!=V&&(a.greedy&&h.begin<=V?(h.begin=y(h.begin),h.end=h.begin):M==a.radixPoint&&(h.begin=V,h.end=h.begin));var S=h.begin;m=v(S,M,u),!0===u&&(m=[{activeMasksetIndex:i,result:m}]);var w=-1;if(e.each(m,function(e,t){i=t.activeMasksetIndex,c().writeOutBuffer=!0;var n=t.result;if(!1!==n){var s=!1,r=p();if(!0!==n&&(s=n.refresh,S=void 0!=n.pos?n.pos:S,M=void 0!=n.c?n.c:M),!0!==s){if(1==a.insertMode){for(var o=g(),l=r.slice();P(l,o,!0)!=E(o)&&o>=S;)o=0==o?-1:y(o);if(o>=S){N(S,g(),M);var d=c().lastValidPosition,f=_(d);f!=g()&&d>=S&&P(p(),f,!0)!=E(f)&&(c().lastValidPosition=f)}else c().writeOutBuffer=!1}else b(r,S,M,!0);(-1==w||w>_(S))&&(w=_(S))}else if(!u){var v=S<g()?S+1:S;(-1==w||w>v)&&(w=v)}w>c().p&&(c().p=w)}}),!0!==u&&(i=I,k()),!1!==o&&(e.each(m,function(e,t){if(t.activeMasksetIndex==i)return x=t,!1}),void 0!=x)){var T=this;if(setTimeout(function(){a.onKeyValidation.call(T,x.result,a)},0),c().writeOutBuffer&&!1!==x.result){var R,K=p();R=s?void 0:a.numericInput?S>V?y(w):M==a.radixPoint?w-1:y(w-1):w,C(d,K,R),!0!==s&&setTimeout(function(){!0===D(K)&&f.trigger("complete"),Z=!0,f.trigger("input")},0)}else j&&(c().buffer=c().undoBuffer.split(""))}a.showTooltip&&f.prop("title",c().mask),n&&(n.preventDefault?n.preventDefault():n.returnValue=!1)}}function H(t){var i=e(this),n=this,s=t.keyCode,r=p();u&&s==a.keyCode.BACKSPACE&&$==n._valueGet()&&B.call(this,t),a.onKeyUp.call(this,t,r,a),s==a.keyCode.TAB&&a.showMaskOnFocus&&(i.hasClass("focus.inputmask")&&0==n._valueGet().length?(r=f().slice(),C(n,r),O(n,0),z=p().join("")):(C(n,r),r.join("")==f().join("")&&-1!=e.inArray(a.radixPoint,r)?(O(n,w(0)),i.click()):O(n,w(0),w(g()))))}function F(t){if(!0===Z)return Z=!1,!0;var i=this,a=e(i);$=p().join(""),j(i,!1,!1),C(i,p()),!0===D(p())&&a.trigger("complete"),a.click()}var W,$,q=!1,z=p().join(""),Q=!1,Z=!1,J=!1;if(void 0!=n)switch(n.action){case"isComplete":return D(n.buffer);case"unmaskedvalue":return q=n.$input.data("_inputmask").isRTL,function(t,i){if(!d()||!0!==i&&t.hasClass("hasDatepicker"))return t[0]._valueGet();var n=e.map(p(),function(e,t){return h(t)&&v(t,e,!0)?e:null}),s=(q?n.reverse():n).join("");return void 0!=a.onUnMask?a.onUnMask.call(this,p().join(""),s):s}(n.$input,n.skipDatepickerCheck);case"mask":!function(n){if(W=e(n),W.is(":input")){if(W.data("_inputmask",{masksets:t,activeMasksetIndex:i,opts:a,isRTL:!1}),a.showTooltip&&W.prop("title",c().mask),c().greedy=c().greedy?c().greedy:0==c().repeat,null!=W.attr("maxLength")){var r=W.prop("maxLength");r>-1&&e.each(t,function(e,t){"object"==typeof t&&"*"==t.repeat&&(t.repeat=r)}),g()>=r&&r>-1&&(r<f().length&&(f().length=r),0==c().greedy&&(c().repeat=Math.round(r/f().length)),W.prop("maxLength",2*g()))}if(R(n),a.numericInput&&(a.isNumeric=a.numericInput),("rtl"==n.dir||a.numericInput&&a.rightAlignNumerics||a.isNumeric&&a.rightAlignNumerics)&&W.css("text-align","right"),"rtl"==n.dir||a.numericInput){n.dir="ltr",W.removeAttr("dir");var o=W.data("_inputmask");o.isRTL=!0,W.data("_inputmask",o),q=!0}W.unbind(".inputmask"),W.removeClass("focus.inputmask"),W.closest("form").bind("submit",function(){z!=p().join("")&&W.change()}).bind("reset",function(){setTimeout(function(){W.trigger("setvalue")},0)}),W.bind("mouseenter.inputmask",function(){var t=e(this),i=this;!t.hasClass("focus.inputmask")&&a.showMaskOnHover&&i._valueGet()!=p().join("")&&C(i,p())}).bind("blur.inputmask",function(){var n=e(this),s=this,r=s._valueGet(),o=p();n.removeClass("focus.inputmask"),z!=p().join("")&&n.change(),a.clearMaskOnLostFocus&&""!=r&&(r==f().join("")?s._valueSet(""):S(s)),!1===D(o)&&(n.trigger("incomplete"),a.clearIncomplete&&(e.each(t,function(e,t){"object"==typeof t&&(t.buffer=t._buffer.slice(),t.lastValidPosition=-1)}),i=0,a.clearMaskOnLostFocus?s._valueSet(""):(o=f().slice(),C(s,o))))}).bind("focus.inputmask",function(){var t=e(this),i=this,n=i._valueGet();a.showMaskOnFocus&&!t.hasClass("focus.inputmask")&&(!a.showMaskOnHover||a.showMaskOnHover&&""==n)&&i._valueGet()!=p().join("")&&C(i,p(),_(c().lastValidPosition)),t.addClass("focus.inputmask"),z=p().join("")}).bind("mouseleave.inputmask",function(){var t=e(this),i=this;a.clearMaskOnLostFocus&&(t.hasClass("focus.inputmask")||i._valueGet()==t.attr("placeholder")||(i._valueGet()==f().join("")||""==i._valueGet()?i._valueSet(""):S(i)))}).bind("click.inputmask",function(){var t=this;setTimeout(function(){var i=O(t),n=p();if(i.begin==i.end){var s,r=q?w(i.begin):i.begin,o=c().lastValidPosition;s=a.isNumeric&&!1===a.skipRadixDance&&""!=a.radixPoint&&-1!=e.inArray(a.radixPoint,n)?a.numericInput?_(e.inArray(a.radixPoint,n)):e.inArray(a.radixPoint,n):_(o),r<s?h(r)?O(t,r):O(t,_(r)):O(t,s)}},0)}).bind("dblclick.inputmask",function(){var e=this;setTimeout(function(){O(e,0,_(c().lastValidPosition))},0)}).bind(l+".inputmask dragdrop.inputmask drop.inputmask",function(t){if(!0===Z)return Z=!1,!0;var i=this,n=e(i);if("propertychange"==t.type&&i._valueGet().length<=g())return!0;setTimeout(function(){var e=void 0!=a.onBeforePaste?a.onBeforePaste.call(this,i._valueGet()):i._valueGet();j(i,!0,!1,e.split(""),!0),!0===D(p())&&n.trigger("complete"),n.click()},0)}).bind("setvalue.inputmask",function(){var e=this;j(e,!0),z=p().join(""),e._valueGet()==f().join("")&&e._valueSet("")}).bind("complete.inputmask",a.oncomplete).bind("incomplete.inputmask",a.onincomplete).bind("cleared.inputmask",a.oncleared).bind("keyup.inputmask",H),u?W.bind("input.inputmask",F):W.bind("keydown.inputmask",B).bind("keypress.inputmask",U),s&&W.bind("input.inputmask",F),j(n,!0,!1),z=p().join("");var d;try{d=document.activeElement}catch(e){}d===n?(W.addClass("focus.inputmask"),O(n,_(c().lastValidPosition))):a.clearMaskOnLostFocus?p().join("")==f().join("")?n._valueSet(""):S(n):C(n,p()),T(n)}}(n.el);break;case"format":return W=e({}),W.data("_inputmask",{masksets:t,activeMasksetIndex:i,opts:a,isRTL:a.numericInput}),a.numericInput&&(a.isNumeric=a.numericInput,q=!0),j(W,!1,!1,n.value.split(""),!0),p().join("")}}if(void 0===e.fn.inputmask){var s=null!==navigator.userAgent.match(new RegExp("msie 10","i")),r=null!==navigator.userAgent.match(new RegExp("iphone","i")),o=null!==navigator.userAgent.match(new RegExp("android.*safari.*","i")),u=null!==navigator.userAgent.match(new RegExp("android.*chrome.*","i")),l=t("paste")?"paste":t("input")?"input":"propertychange";e.inputmask={defaults:{placeholder:"_",optionalmarker:{start:"[",end:"]"},quantifiermarker:{start:"{",end:"}"},groupmarker:{start:"(",end:")"},escapeChar:"\\",mask:null,oncomplete:e.noop,onincomplete:e.noop,oncleared:e.noop,repeat:0,greedy:!0,autoUnmask:!1,clearMaskOnLostFocus:!0,insertMode:!0,clearIncomplete:!1,aliases:{},onKeyUp:e.noop,onKeyDown:e.noop,onBeforePaste:void 0,onUnMask:void 0,showMaskOnFocus:!0,showMaskOnHover:!0,onKeyValidation:e.noop,skipOptionalPartCharacter:" ",showTooltip:!1,numericInput:!1,isNumeric:!1,radixPoint:"",skipRadixDance:!1,rightAlignNumerics:!0,definitions:{9:{validator:"[0-9]",cardinality:1},a:{validator:"[A-Za-zА-яЁё]",cardinality:1},"*":{validator:"[A-Za-zА-яЁё0-9]",cardinality:1}},keyCode:{ALT:18,BACKSPACE:8,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91},ignorables:[8,9,13,19,27,33,34,35,36,37,38,39,40,45,46,93,112,113,114,115,116,117,118,119,120,121,122,123],getMaskLength:function(e,t,i,a,n){var s=e.length;return t||("*"==i?s=a.length+1:i>1&&(s+=e.length*(i-1))),s}},escapeRegex:function(e){var t=["/",".","*","+","?","|","(",")","[","]","{","}","\\"];return e.replace(new RegExp("(\\"+t.join("|\\")+")","gim"),"\\$1")},format:function(t,s){var r=e.extend(!0,{},e.inputmask.defaults,s);return i(r.alias,s,r),n(a(r),0,r,{action:"format",value:t})}},e.fn.inputmask=function(t,s){var r,o=e.extend(!0,{},e.inputmask.defaults,s),u=0;if("string"==typeof t)switch(t){case"mask":return i(o.alias,s,o),r=a(o),0==r.length?this:this.each(function(){n(e.extend(!0,{},r),0,o,{action:"mask",el:this})});case"unmaskedvalue":var l=e(this);return l.data("_inputmask")?(r=l.data("_inputmask").masksets,u=l.data("_inputmask").activeMasksetIndex,o=l.data("_inputmask").opts,n(r,u,o,{action:"unmaskedvalue",$input:l})):l.val();case"remove":return this.each(function(){var t=e(this),i=this;if(t.data("_inputmask")){r=t.data("_inputmask").masksets,u=t.data("_inputmask").activeMasksetIndex,o=t.data("_inputmask").opts,i._valueSet(n(r,u,o,{action:"unmaskedvalue",$input:t,skipDatepickerCheck:!0})),t.removeData("_inputmask"),t.unbind(".inputmask"),t.removeClass("focus.inputmask");var a;Object.getOwnPropertyDescriptor&&(a=Object.getOwnPropertyDescriptor(i,"value")),a&&a.get?i._valueGet&&Object.defineProperty(i,"value",{get:i._valueGet,set:i._valueSet}):document.__lookupGetter__&&i.__lookupGetter__("value")&&i._valueGet&&(i.__defineGetter__("value",i._valueGet),i.__defineSetter__("value",i._valueSet));try{delete i._valueGet,delete i._valueSet}catch(e){i._valueGet=void 0,i._valueSet=void 0}}});case"getemptymask":return this.data("_inputmask")?(r=this.data("_inputmask").masksets,u=this.data("_inputmask").activeMasksetIndex,r[u]._buffer.join("")):"";case"hasMaskedValue":return!!this.data("_inputmask")&&!this.data("_inputmask").opts.autoUnmask;case"isComplete":return r=this.data("_inputmask").masksets,u=this.data("_inputmask").activeMasksetIndex,o=this.data("_inputmask").opts,n(r,u,o,{action:"isComplete",buffer:this[0]._valueGet().split("")});case"getmetadata":return this.data("_inputmask")?(r=this.data("_inputmask").masksets,u=this.data("_inputmask").activeMasksetIndex,r[u].metadata):void 0;default:return i(t,s,o)||(o.mask=t),r=a(o),0==r.length?this:this.each(function(){n(e.extend(!0,{},r),u,o,{action:"mask",el:this})})}else{if("object"==typeof t)return o=e.extend(!0,{},e.inputmask.defaults,t),i(o.alias,t,o),r=a(o),0==r.length?this:this.each(function(){n(e.extend(!0,{},r),u,o,{action:"mask",el:this})});if(void 0==t)return this.each(function(){var t=e(this).attr("data-inputmask");if(t&&""!=t)try{t=t.replace(new RegExp("'","g"),'"');var a=e.parseJSON("{"+t+"}");e.extend(!0,a,s),o=e.extend(!0,{},e.inputmask.defaults,a),i(o.alias,a,o),o.alias=void 0,e(this).inputmask(o)}catch(e){}})}}}}(jQuery);