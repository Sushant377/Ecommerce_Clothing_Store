import{_ as u,d as _,c as f}from"./js/_plugin-vue_export-helper.BLXtEB-G.js";import{l as w}from"./js/index.DQR9DFri.js";import{l as h}from"./js/index.CdwEuUIl.js";import{l as g}from"./js/index.3BJ3ZnWB.js";import{b as x,z as a,l as P}from"./js/links.C572zDFG.js";import{e as S}from"./js/elemLoaded.COgXIo-H.js";import{s as b}from"./js/metabox.CE2B6Dot.js";import{o as r,c as m,a as e,af as E,b as c,t as k}from"./js/runtime-core.esm-bundler.DMBo7TXk.js";import"./js/translations.Buvln_cw.js";import"./js/default-i18n.Bd0Z306Z.js";import"./js/constants.B6ynd7gz.js";import"./js/Caret.CGwYaMo_.js";import"./js/helpers.D5tYIqKS.js";const y={setup(){return{postEditorStore:x()}},emits:["standalone-update-post"],data(){return{strings:{label:this.$t.__("Don't update the modified date",this.$td)}}},methods:{addLimitModifiedDateAttribute(){a()&&window.wp.data.dispatch("core/editor").editPost({aioseo_limit_modified_date:this.postEditorStore.currentPost.limit_modified_date})}},computed:{canShowSvg(){return a()&&this.postEditorStore.currentPost.limit_modified_date}},watch:{"postEditorStore.currentPost.limit_modified_date"(t){window.aioseoBus.$emit("standalone-update-post",{limit_modified_date:t})}}},L={key:0},v={class:"components-checkbox-control__input-container"},B={key:0,xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",width:"24",height:"24",role:"img",class:"components-checkbox-control__checked","aria-hidden":"true",focusable:"false"},D=e("path",{d:"M18.3 5.6L9.9 16.9l-4.6-3.4-.9 1.2 5.8 4.3 9.3-12.6z"},null,-1),M=[D],A={class:"components-checkbox-control__label",for:"aioseo-limit-modified-date-input"};function C(t,o,d,i,p,n){return i.postEditorStore.currentPost.id?(r(),m("div",L,[e("span",v,[E(e("input",{id:"aioseo-limit-modified-date-input",class:"components-checkbox-control__input",type:"checkbox","onUpdate:modelValue":o[0]||(o[0]=s=>i.postEditorStore.currentPost.limit_modified_date=s),onChange:o[1]||(o[1]=(...s)=>n.addLimitModifiedDateAttribute&&n.addLimitModifiedDateAttribute(...s))},null,544),[[_,i.postEditorStore.currentPost.limit_modified_date]]),n.canShowSvg?(r(),m("svg",B,M)):c("",!0)]),e("label",A,k(p.strings.label),1)])):c("",!0)}const V=u(y,[["render",C]]);if(a()&&window.wp){const{createElement:t}=window.wp.element,{registerPlugin:o}=window.wp.plugins,{PluginPostStatusInfo:d}=window.wp.editPost;o("aioseo-limit-modified-date",{render:()=>t(d,{},t("div",{id:"aioseo-limit-modified-date"}))})}const l=()=>{let t=f({...V,name:"Standalone/LimitModifiedDate"});t=w(t),t=h(t),t=g(t),P(t),t.mount("#aioseo-limit-modified-date")};b()&&window.aioseo&&window.aioseo.currentPost&&window.aioseo.currentPost.context==="post"&&(document.getElementById("aioseo-limit-modified-date")?l():(S("#aioseo-limit-modified-date","aioseoLimitModifiedDate"),document.addEventListener("animationstart",function(o){o.animationName==="aioseoLimitModifiedDate"&&l()},{passive:!0})));