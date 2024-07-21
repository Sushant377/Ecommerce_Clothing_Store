(()=>{"use strict";var e,t={840:()=>{const e=window.wp.blocks,t=window.React,r=(window.wp.i18n,window.wp.element),a=window.wp.components,o=window.wp.blockEditor,n=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"create-block/lead-form-builder","version":"0.1.0","title":"Lead Form Builder","category":"text","icon":"feedback","keywords":["contact form","lead form builder","themehunk"],"description":"Lead Form Builder is a contact form builder as well as lead generator.","example":{},"supports":{"html":false},"textdomain":"lead-form-builder","attributes":{"formid":{"type":"string","default":1},"title":{"type":"string"},"formList":{"type":"object"},"randerForm":{"type":"string","default":"[lead-form form-id=1 title=Contact Us]"}},"editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","render":"file:./render.php","viewScript":"file:./view.js"}'),{name:i,...l}=n;(0,e.registerBlockType)(i,{...l,edit:function({attributes:e,setAttributes:n,isSelected:i}){const[l,s]=(0,r.useState)(!1),[c,d]=(0,r.useState)(!1),[m,f]=(0,r.useState)(!0),u=wp.data.select("core").getSite();!1===l&&u&&s(u.url);const{formid:p,title:b,randerForm:w,formList:h}=e,v=async()=>{try{const e={data:p,title:b};await fetch(lfbScriptData.ajax_url,{method:"POST",headers:{"X-WP-Nonce":lfbScriptData.security},body:new URLSearchParams({action:"lead_form_builderr_data",security:lfbScriptData.security,data:JSON.stringify(e)})}).then((e=>e.json())).then((e=>{e.data.lfb_form&&e.data.lfb_form.length&&d(!0),n({formList:e.data.lfb_form,randerForm:e.data.lfb_rander}),f(!1)})).catch((e=>{console.error("Error in AJAX request:",e)}))}catch(e){console.error("Error fetching data:",e)}};(0,r.useEffect)((()=>{f(!0),v()}),[p]),(0,r.useEffect)((()=>{v()}),[b]);const y=e=>{window.open(`${l}/wp-admin/admin.php?page=${e}`,"_blank")};return(0,t.createElement)("div",{...(0,o.useBlockProps)()},i&&(0,t.createElement)(o.InspectorControls,{key:"setting"},(0,t.createElement)(a.Panel,{header:"lfb"},(0,t.createElement)(a.PanelBody,{title:"Lead Form Builder",initialOpen:!0},c&&(0,t.createElement)(a.SelectControl,{label:"Slect Lead Form",value:p,options:[{disabled:!0,label:"Select Form",value:""},...h&&h.map((function(e,t){return{label:e.form_title,value:e.id}}))],onChange:e=>n({formid:e})}),(0,t.createElement)(a.Button,{variant:"secondary",onClick:()=>y("wplf-plugin-menu")},"Customize Lead Form")))),m&&(0,t.createElement)(a.Spinner,null),c&&(0,t.createElement)(r.RawHTML,null,w),!1===c&&!1===m&&(0,t.createElement)(a.Button,{variant:"primary",onClick:()=>y("add-new-form")},"Create New Form"))},save:function({attributes:e}){return o.useBlockProps.save(),null}})}},r={};function a(e){var o=r[e];if(void 0!==o)return o.exports;var n=r[e]={exports:{}};return t[e](n,n.exports,a),n.exports}a.m=t,e=[],a.O=(t,r,o,n)=>{if(!r){var i=1/0;for(d=0;d<e.length;d++){for(var[r,o,n]=e[d],l=!0,s=0;s<r.length;s++)(!1&n||i>=n)&&Object.keys(a.O).every((e=>a.O[e](r[s])))?r.splice(s--,1):(l=!1,n<i&&(i=n));if(l){e.splice(d--,1);var c=o();void 0!==c&&(t=c)}}return t}n=n||0;for(var d=e.length;d>0&&e[d-1][2]>n;d--)e[d]=e[d-1];e[d]=[r,o,n]},a.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={826:0,431:0};a.O.j=t=>0===e[t];var t=(t,r)=>{var o,n,[i,l,s]=r,c=0;if(i.some((t=>0!==e[t]))){for(o in l)a.o(l,o)&&(a.m[o]=l[o]);if(s)var d=s(a)}for(t&&t(r);c<i.length;c++)n=i[c],a.o(e,n)&&e[n]&&e[n][0](),e[n]=0;return a.O(d)},r=globalThis.webpackChunkexample_static=globalThis.webpackChunkexample_static||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})();var o=a.O(void 0,[431],(()=>a(840)));o=a.O(o)})();