import{u as h,m as C,n as F,t as R}from"./links.C572zDFG.js";import{C as L}from"./constants.B6ynd7gz.js";import{a as T}from"./Caret.CGwYaMo_.js";import{_ as x,u as k}from"./_plugin-vue_export-helper.BLXtEB-G.js";import{v as $,o,c as n,a as s,t as a,C as q,b as l,F as v,ac as m,B as N,aa as V,ad as H,ae as M}from"./runtime-core.esm-bundler.DMBo7TXk.js";const g={components:{SvgCaret:T},computed:{faq(){var t;const e=((t=this.richResults)==null?void 0:t.faq)||[];return Array.isArray(e)&&e.length?e:[]},reviewSnippet(){var r;const t={...{bestRating:null,ratingValue:null,reviewCount:null,ratingCount:null,priceCurrency:null,price:null,priceFrom:null,priceTo:null},...((r=this.richResults)==null?void 0:r.reviewSnippet)||{}};if(Object.values(t).every(c=>c===null)||!t.reviewCount&&!t.ratingCount)return{};for(const[c,p]of Object.entries(t))if(["bestRating","ratingValue"].includes(c)&&(5<p||p===null))return{};return t.price=isNaN(parseFloat(t.price))?null:parseFloat(t.price).toFixed(2),t.priceFrom=isNaN(parseFloat(t.priceFrom))?null:parseFloat(t.priceFrom).toFixed(2),t.priceTo=isNaN(parseFloat(t.priceTo))?null:parseFloat(t.priceTo).toFixed(2),t},yellowStarsWidth(){return`${this.reviewSnippet.ratingValue*100/5}%`},urlBreadcrumbs(){try{const e=new URL(this.url);let t=e.hostname+e.pathname.replace(/\/$/,"");return t=t.substring(0,50).trim()+(50<t.length?"...":""),`${e.protocol}//`+t.replaceAll("/"," &rsaquo; ")}catch{return""}},parseFavicon(){var r;const e=h();let t=`https://www.google.com/s2/favicons?sz=64&domain=${e.aioseo.urls.domain}`;try{t=new URL(this.favicon||"").href}catch{(r=e.aioseo.data)!=null&&r.isDev&&(t=`${e.aioseo.urls.home}/favicon.ico`)}return t},parseDescription(){const e=C(this.description.substring(0,160).trim()+(160<this.description.length?" ...":""),!1);if(!this.focusKeyphrase)return e;const t=this.focusKeyphrase.split(" "),r=new RegExp("\\b"+t.join("\\b|\\b")+"\\b","gi");return e.replace(r,"<strong>$&</strong>")}},methods:{stripTags:F,getReviewSnippetPriceLabel(){if(parseFloat(this.reviewSnippet.price)===0&&!this.reviewSnippet.priceTo)return this.strings.free;if(this.reviewSnippet.priceCurrency){const e=L.find(t=>t.value===this.reviewSnippet.priceCurrency)||{};return this.reviewSnippet.priceFrom&&this.reviewSnippet.priceTo?`${e==null?void 0:e.symbol}${this.reviewSnippet.priceFrom} - ${e==null?void 0:e.symbol}${this.reviewSnippet.priceTo}`:`${e==null?void 0:e.symbol}${this.reviewSnippet.price}`}return`$${this.reviewSnippet.price}`},getReviewSnippetCountLabel(){if(this.device==="desktop"){const e=this.reviewSnippet.ratingCount||this.reviewSnippet.reviewCount,t=this.reviewSnippet.ratingCount?this.$t._n("vote","votes",e,this.$td):this.$t._n("review","reviews",e,this.$td);return this.$t.sprintf(this.$t.__("%1$s %2$s",this.$td),e,t)}return`(${this.reviewSnippet.ratingCount||this.reviewSnippet.reviewCount})`},truncate:R},props:{focusKeyphrase:String,device:{type:String,default:"desktop"},favicon:String,hostname:{type:String,default(){const e=h();return e.aioseo.data.siteName||e.aioseo.urls.domain}},url:{type:String,default(){return h().aioseo.urls.mainSiteUrl}},title:String,description:String,richResults:Object},data(){return{strings:{free:this.$t.__("Free",this.$td),rating:this.$t.__("Rating",this.$td)}}}},S=()=>{k(e=>({"7b50d6ab":e.yellowStarsWidth}))},y=g.setup;g.setup=y?(e,t)=>(S(),y(e,t)):S;const j=e=>(H("data-v-cd9bf8ff"),e=e(),M(),e),A={class:"aioseo-google-search-preview__main"},B={class:"aioseo-google-search-preview__favicon"},U={class:"favicon-wrapper"},I=["src"],O={class:"aioseo-google-search-preview__location"},D={class:"hostname text-truncate"},P=["innerHTML"],z={class:"aioseo-google-search-preview__title"},E=["innerHTML"],K={key:0,class:"aioseo-google-search-preview__review-snippet"},W=j(()=>s("div",{class:"aioseo-google-search-preview__review-snippet__stars"},[s("div")],-1)),G={class:"aioseo-google-search-preview__review-snippet__rating"},Y={class:"aioseo-google-search-preview__review-snippet__count bullet"},J={key:0,class:"aioseo-google-search-preview__review-snippet__price bullet"},Q={key:1,class:"aioseo-google-search-preview__anchor"},X={class:"aioseo-google-search-preview__anchor__link"},Z={key:0,class:"aioseo-google-search-preview__anchor__bullet"},ee={key:2,class:"aioseo-google-search-preview__faq"},te={class:"aioseo-google-search-preview__faq__question",role:"button"},se=["innerHTML"],ie=["innerHTML"];function re(e,t,r,c,p,i){var d,w,f;const b=$("svg-caret");return o(),n("div",{class:V(["aioseo-google-search-preview",`aioseo-google-search-preview--${r.device}`])},[s("div",A,[s("div",B,[s("div",U,[s("img",{src:i.parseFavicon,alt:"Favicon",loading:"lazy",decoding:"async",height:"18",width:"18"},null,8,I)])]),s("div",O,[s("div",D,a(r.hostname.replace(/^(m|www)\./,"")),1),s("div",{class:"url text-truncate",innerHTML:i.urlBreadcrumbs},null,8,P)]),s("div",z,a(r.title.substring(0,70).trim()+(r.title.length>70?" ...":"")),1),s("div",{class:"aioseo-google-search-preview__description",innerHTML:i.parseDescription},null,8,E)]),Object.values(i.reviewSnippet).length?(o(),n("div",K,[W,s("div",G,[s("span",null,a(p.strings.rating)+":",1),q(" "+a(parseFloat(i.reviewSnippet.ratingValue).toFixed(2)),1)]),s("div",Y,a(i.getReviewSnippetCountLabel()),1),((d=i.reviewSnippet)==null?void 0:d.price)!==null?(o(),n("div",J,a(i.getReviewSnippetPriceLabel()),1)):l("",!0)])):l("",!0),(f=(w=this.richResults)==null?void 0:w.anchorLinks)!=null&&f.length?(o(),n("div",Q,[(o(!0),n(v,null,m(this.richResults.anchorLinks,(u,_)=>(o(),n(v,{key:`anchor-${_}`},[s("span",X,a(i.truncate(u,30)),1),_!==this.richResults.anchorLinks.length-1?(o(),n("span",Z," • ")):l("",!0)],64))),128))])):l("",!0),Object.values(i.faq).length?(o(),n("div",ee,[(o(!0),n(v,null,m(i.faq.slice(0,3),(u,_)=>(o(),n("details",{key:`faq-${_}`,class:"aioseo-google-search-preview__faq__container"},[s("summary",te,[s("span",{class:"text-truncate",innerHTML:i.truncate(i.stripTags(u.question),60)},null,8,se),N(b,{width:"20"})]),s("span",{class:"aioseo-google-search-preview__faq__answer",innerHTML:i.stripTags(u.answer)},null,8,ie)]))),128))])):l("",!0)],2)}const pe=x(g,[["render",re],["__scopeId","data-v-cd9bf8ff"]]);export{pe as C};