/*! For license information please see ninja-tables-gutenblock.js.LICENSE.txt */
(()=>{"use strict";var e,t={7415:(e,t,r)=>{var n=r(5893);function o(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,o,u,a,l=[],i=!0,c=!1;try{if(u=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;i=!1}else for(;!(i=(n=u.call(r)).done)&&(l.push(n.value),l.length!==t);i=!0);}catch(e){c=!0,o=e}finally{try{if(!i&&null!=r.return&&(a=r.return(),Object(a)!==a))return}finally{if(c)throw o}}return l}}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return u(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return u(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function u(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}var a=wp.i18n.__,l=wp.blocks.registerBlockType,i=wp.components.TextControl,c=wp.element.useState;l("ninja-tables/guten-block",{title:a("Ninja Tables"),icon:(0,n.jsxs)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 321.98 249.25",children:[(0,n.jsx)("path",{class:"A",d:"M312.48 249.25H9.5a9.51 9.51 0 0 1-9.5-9.5V9.5A9.51 9.51 0 0 1 9.5 0h303a9.51 9.51 0 0 1 9.5 9.5v230.25a9.51 9.51 0 0 1-9.52 9.5zM9.5 7A2.53 2.53 0 0 0 7 9.5v230.25a2.53 2.53 0 0 0 2.5 2.5h303a2.53 2.53 0 0 0 2.5-2.5V9.5a2.53 2.53 0 0 0-2.5-2.5z"}),(0,n.jsx)("path",{class:"A",d:"M75 44.37h8.75v202.7H75z"}),(0,n.jsx)("path",{class:"B",d:"M129.37 44.37"}),(0,n.jsx)("path",{class:"C",d:"M249.37 44.37"}),(0,n.jsx)("path",{class:"A",d:"M6.16.5h309.66a6 6 0 0 1 6 6v43.8a.63.63 0 0 1-.63.63H.8a.63.63 0 0 1-.63-.63V6.5a6 6 0 0 1 6-6zM4.88 142.84h312.6v15.1H4.88zM22.47 90h28.27v16.97H22.47zm89.13 0h165.67v16.97H111.6zM22.47 190h28.27v16.97H22.47zm89.13 0h165.67v16.97H111.6z"})]}),category:"formatting",keywords:[a("Ninja Tables"),a("Gutenberg Block"),a("ninja-tables-gutenberg-block")],attributes:{tableId:{type:"string"},dataSource:{type:"string"}},edit:function(e){var t=e.attributes,r=e.setAttributes,u=o(c([]),2),l=u[0],s=u[1],f=window.ninja_tables_tiny_mce,p=function(e){var t=e.target.value.split(","),n=t[0],o=t[1];r({tableId:n}),r({dataSource:o}),s([])},d=function(e){if("string"==typeof e){var t=e,n=f.tables.filter((function(e){return e.text.toLowerCase().includes(t.toLowerCase())})).map((function(e){return{value:[e.value,e.data_source],label:e.text}}));s(n),n.length&&r({tableId:""})}else{var o=f.tables.map((function(e){return{value:[e.value,e.data_source],label:e.text}}));s(o)}};return(0,n.jsxs)("div",{className:"ninja-tables-guten-wrapper",children:[(0,n.jsx)("div",{className:"ninja-tables-logo",children:(0,n.jsx)("img",{src:f.logo,alt:"ninja-tables-logo"})}),(0,n.jsxs)("div",{className:"nt-guten-block-select",children:[(0,n.jsx)(i,{value:function(e){if(e)return f.tables.find((function(t){return parseInt(t.value)===parseInt(e)})).text}(t.tableId),placeholder:a("Search a Table"),onClick:d,onChange:d}),l.length>0&&(0,n.jsx)("ul",{children:l.map((function(e){return(0,n.jsx)("li",{children:(0,n.jsx)("button",{onClick:p,value:e.value,children:e.label})},e.value)}))})]})]})},save:function(e){var t=e.attributes;return"drag_and_drop"===t.dataSource?'[ninja_table_builder id="'+t.tableId+'"]':'[ninja_tables id="'+t.tableId+'"]'}})},8214:()=>{},3151:()=>{},9307:()=>{},5299:()=>{},2186:()=>{},5676:()=>{},5251:(e,t,r)=>{var n=r(7294),o=Symbol.for("react.element"),u=Symbol.for("react.fragment"),a=Object.prototype.hasOwnProperty,l=n.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,i={key:!0,ref:!0,__self:!0,__source:!0};function c(e,t,r){var n,u={},c=null,s=null;for(n in void 0!==r&&(c=""+r),void 0!==t.key&&(c=""+t.key),void 0!==t.ref&&(s=t.ref),t)a.call(t,n)&&!i.hasOwnProperty(n)&&(u[n]=t[n]);if(e&&e.defaultProps)for(n in t=e.defaultProps)void 0===u[n]&&(u[n]=t[n]);return{$$typeof:o,type:e,key:c,ref:s,props:u,_owner:l.current}}t.jsx=c,t.jsxs=c},2408:(e,t)=>{var r=Symbol.for("react.element"),n=Symbol.for("react.portal"),o=Symbol.for("react.fragment"),u=Symbol.for("react.strict_mode"),a=Symbol.for("react.profiler"),l=Symbol.for("react.provider"),i=Symbol.for("react.context"),c=Symbol.for("react.forward_ref"),s=Symbol.for("react.suspense"),f=Symbol.for("react.memo"),p=Symbol.for("react.lazy"),d=Symbol.iterator;var y={isMounted:function(){return!1},enqueueForceUpdate:function(){},enqueueReplaceState:function(){},enqueueSetState:function(){}},v=Object.assign,b={};function h(e,t,r){this.props=e,this.context=t,this.refs=b,this.updater=r||y}function _(){}function m(e,t,r){this.props=e,this.context=t,this.refs=b,this.updater=r||y}h.prototype.isReactComponent={},h.prototype.setState=function(e,t){if("object"!=typeof e&&"function"!=typeof e&&null!=e)throw Error("setState(...): takes an object of state variables to update or a function which returns an object of state variables.");this.updater.enqueueSetState(this,e,t,"setState")},h.prototype.forceUpdate=function(e){this.updater.enqueueForceUpdate(this,e,"forceUpdate")},_.prototype=h.prototype;var g=m.prototype=new _;g.constructor=m,v(g,h.prototype),g.isPureReactComponent=!0;var j=Array.isArray,w=Object.prototype.hasOwnProperty,S={current:null},x={key:!0,ref:!0,__self:!0,__source:!0};function O(e,t,n){var o,u={},a=null,l=null;if(null!=t)for(o in void 0!==t.ref&&(l=t.ref),void 0!==t.key&&(a=""+t.key),t)w.call(t,o)&&!x.hasOwnProperty(o)&&(u[o]=t[o]);var i=arguments.length-2;if(1===i)u.children=n;else if(1<i){for(var c=Array(i),s=0;s<i;s++)c[s]=arguments[s+2];u.children=c}if(e&&e.defaultProps)for(o in i=e.defaultProps)void 0===u[o]&&(u[o]=i[o]);return{$$typeof:r,type:e,key:a,ref:l,props:u,_owner:S.current}}function k(e){return"object"==typeof e&&null!==e&&e.$$typeof===r}var E=/\/+/g;function C(e,t){return"object"==typeof e&&null!==e&&null!=e.key?function(e){var t={"=":"=0",":":"=2"};return"$"+e.replace(/[=:]/g,(function(e){return t[e]}))}(""+e.key):t.toString(36)}function R(e,t,o,u,a){var l=typeof e;"undefined"!==l&&"boolean"!==l||(e=null);var i=!1;if(null===e)i=!0;else switch(l){case"string":case"number":i=!0;break;case"object":switch(e.$$typeof){case r:case n:i=!0}}if(i)return a=a(i=e),e=""===u?"."+C(i,0):u,j(a)?(o="",null!=e&&(o=e.replace(E,"$&/")+"/"),R(a,t,o,"",(function(e){return e}))):null!=a&&(k(a)&&(a=function(e,t){return{$$typeof:r,type:e.type,key:t,ref:e.ref,props:e.props,_owner:e._owner}}(a,o+(!a.key||i&&i.key===a.key?"":(""+a.key).replace(E,"$&/")+"/")+e)),t.push(a)),1;if(i=0,u=""===u?".":u+":",j(e))for(var c=0;c<e.length;c++){var s=u+C(l=e[c],c);i+=R(l,t,o,s,a)}else if(s=function(e){return null===e||"object"!=typeof e?null:"function"==typeof(e=d&&e[d]||e["@@iterator"])?e:null}(e),"function"==typeof s)for(e=s.call(e),c=0;!(l=e.next()).done;)i+=R(l=l.value,t,o,s=u+C(l,c++),a);else if("object"===l)throw t=String(e),Error("Objects are not valid as a React child (found: "+("[object Object]"===t?"object with keys {"+Object.keys(e).join(", ")+"}":t)+"). If you meant to render a collection of children, use an array instead.");return i}function $(e,t,r){if(null==e)return e;var n=[],o=0;return R(e,n,"","",(function(e){return t.call(r,e,o++)})),n}function I(e){if(-1===e._status){var t=e._result;(t=t()).then((function(t){0!==e._status&&-1!==e._status||(e._status=1,e._result=t)}),(function(t){0!==e._status&&-1!==e._status||(e._status=2,e._result=t)})),-1===e._status&&(e._status=0,e._result=t)}if(1===e._status)return e._result.default;throw e._result}var A={current:null},P={transition:null},T={ReactCurrentDispatcher:A,ReactCurrentBatchConfig:P,ReactCurrentOwner:S};t.Children={map:$,forEach:function(e,t,r){$(e,(function(){t.apply(this,arguments)}),r)},count:function(e){var t=0;return $(e,(function(){t++})),t},toArray:function(e){return $(e,(function(e){return e}))||[]},only:function(e){if(!k(e))throw Error("React.Children.only expected to receive a single React element child.");return e}},t.Component=h,t.Fragment=o,t.Profiler=a,t.PureComponent=m,t.StrictMode=u,t.Suspense=s,t.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED=T,t.cloneElement=function(e,t,n){if(null==e)throw Error("React.cloneElement(...): The argument must be a React element, but you passed "+e+".");var o=v({},e.props),u=e.key,a=e.ref,l=e._owner;if(null!=t){if(void 0!==t.ref&&(a=t.ref,l=S.current),void 0!==t.key&&(u=""+t.key),e.type&&e.type.defaultProps)var i=e.type.defaultProps;for(c in t)w.call(t,c)&&!x.hasOwnProperty(c)&&(o[c]=void 0===t[c]&&void 0!==i?i[c]:t[c])}var c=arguments.length-2;if(1===c)o.children=n;else if(1<c){i=Array(c);for(var s=0;s<c;s++)i[s]=arguments[s+2];o.children=i}return{$$typeof:r,type:e.type,key:u,ref:a,props:o,_owner:l}},t.createContext=function(e){return(e={$$typeof:i,_currentValue:e,_currentValue2:e,_threadCount:0,Provider:null,Consumer:null,_defaultValue:null,_globalName:null}).Provider={$$typeof:l,_context:e},e.Consumer=e},t.createElement=O,t.createFactory=function(e){var t=O.bind(null,e);return t.type=e,t},t.createRef=function(){return{current:null}},t.forwardRef=function(e){return{$$typeof:c,render:e}},t.isValidElement=k,t.lazy=function(e){return{$$typeof:p,_payload:{_status:-1,_result:e},_init:I}},t.memo=function(e,t){return{$$typeof:f,type:e,compare:void 0===t?null:t}},t.startTransition=function(e){var t=P.transition;P.transition={};try{e()}finally{P.transition=t}},t.unstable_act=function(){throw Error("act(...) is not supported in production builds of React.")},t.useCallback=function(e,t){return A.current.useCallback(e,t)},t.useContext=function(e){return A.current.useContext(e)},t.useDebugValue=function(){},t.useDeferredValue=function(e){return A.current.useDeferredValue(e)},t.useEffect=function(e,t){return A.current.useEffect(e,t)},t.useId=function(){return A.current.useId()},t.useImperativeHandle=function(e,t,r){return A.current.useImperativeHandle(e,t,r)},t.useInsertionEffect=function(e,t){return A.current.useInsertionEffect(e,t)},t.useLayoutEffect=function(e,t){return A.current.useLayoutEffect(e,t)},t.useMemo=function(e,t){return A.current.useMemo(e,t)},t.useReducer=function(e,t,r){return A.current.useReducer(e,t,r)},t.useRef=function(e){return A.current.useRef(e)},t.useState=function(e){return A.current.useState(e)},t.useSyncExternalStore=function(e,t,r){return A.current.useSyncExternalStore(e,t,r)},t.useTransition=function(){return A.current.useTransition()},t.version="18.2.0"},7294:(e,t,r)=>{e.exports=r(2408)},5893:(e,t,r)=>{e.exports=r(5251)}},r={};function n(e){var o=r[e];if(void 0!==o)return o.exports;var u=r[e]={exports:{}};return t[e](u,u.exports,n),u.exports}n.m=t,e=[],n.O=(t,r,o,u)=>{if(!r){var a=1/0;for(s=0;s<e.length;s++){for(var[r,o,u]=e[s],l=!0,i=0;i<r.length;i++)(!1&u||a>=u)&&Object.keys(n.O).every((e=>n.O[e](r[i])))?r.splice(i--,1):(l=!1,u<a&&(a=u));if(l){e.splice(s--,1);var c=o();void 0!==c&&(t=c)}}return t}u=u||0;for(var s=e.length;s>0&&e[s-1][2]>u;s--)e[s]=e[s-1];e[s]=[r,o,u]},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={621:0,229:0,843:0,908:0,343:0,718:0,148:0};n.O.j=t=>0===e[t];var t=(t,r)=>{var o,u,[a,l,i]=r,c=0;if(a.some((t=>0!==e[t]))){for(o in l)n.o(l,o)&&(n.m[o]=l[o]);if(i)var s=i(n)}for(t&&t(r);c<a.length;c++)u=a[c],n.o(e,u)&&e[u]&&e[u][0](),e[u]=0;return n.O(s)},r=self.webpackChunk=self.webpackChunk||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})(),n.O(void 0,[229,843,908,343,718,148],(()=>n(7415))),n.O(void 0,[229,843,908,343,718,148],(()=>n(9307))),n.O(void 0,[229,843,908,343,718,148],(()=>n(5299))),n.O(void 0,[229,843,908,343,718,148],(()=>n(2186))),n.O(void 0,[229,843,908,343,718,148],(()=>n(5676))),n.O(void 0,[229,843,908,343,718,148],(()=>n(8214)));var o=n.O(void 0,[229,843,908,343,718,148],(()=>n(3151)));o=n.O(o)})();