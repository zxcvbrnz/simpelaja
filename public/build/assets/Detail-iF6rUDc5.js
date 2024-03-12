import{_ as w}from"./AuthenticatedLayout-fXIfv3KI.js";import{d as y}from"./dayjs.min-_ghNEJSA.js";import{Q as b,o as s,c as l,a as r,u as t,w as n,F as m,Z as k,b as e,i as c,d as _,t as i,r as x}from"./app-QgNPq1f0.js";const j={class:"py-4 font-sans"},M={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},B=e("h2",{class:"font-semibold text-xl text-slate-500 leading-tight mb-4"}," Indikator Manajemen Puskesmas ",-1),D={class:"flex bg-white px-4 py-6 shadow-md","aria-label":"Breadcrumb"},C={class:"inline-flex items-center space-x-1 md:space-x-3"},L={class:"inline-flex items-center"},P=e("svg",{"aria-hidden":"true",class:"w-4 h-4 mr-2",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"})],-1),z={class:"flex items-center"},N=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),V={class:"flex items-center"},Y=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),S={"aria-current":"page"},F={class:"flex items-center"},H=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),I={class:"ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"},T={class:"mt-6 p-6 bg-white shadow-md rounded-sm"},E={id:"example",class:"stripe hover",style:{width:"100%","padding-top":"1em","padding-bottom":"1em"}},O=e("thead",null,[e("tr",null,[e("th",{"data-priority":"1",class:"text-start"},"No"),e("th",{"data-priority":"2",class:"text-start"},"Puskesmas"),e("th",{"data-priority":"3",class:"text-start"},"Dilaporkan Pada"),e("th",{"data-priority":"4",class:"text-start"},"Skala"),e("th",{"data-priority":"5",class:"text-start"},"Options")])],-1),Q={class:"font-bold"},Z={class:"flex items-center"},q=e("i",{class:"fa-sharp fa-solid fa-eye"},null,-1),U={__name:"Detail",setup(A){const{data:p,user:v,sub:g,manajemen:h}=b().props;return $(document).ready(function(){$("#example").DataTable({responsive:!0}).columns.adjust().responsive.recalc()}),(d,G)=>(s(),l(m,null,[r(t(k),{title:"Indikator Manajemen Puskesmas"}),r(w,null,{default:n(()=>[e("div",j,[e("div",M,[B,e("nav",D,[e("ol",C,[e("li",L,[r(t(c),{href:d.route("dashboard"),class:"inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"},{default:n(()=>[P,_(" Dashboard ")]),_:1},8,["href"])]),e("li",null,[e("div",z,[N,r(t(c),{href:d.route("manajemen.index"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:n(()=>[_(" Manajemen Puskesmas")]),_:1},8,["href"])])]),e("li",null,[e("div",V,[Y,r(t(c),{href:d.route("manajemen.detail",{id:t(h).id}),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:n(()=>[_(i(t(h).manajemen),1)]),_:1},8,["href"])])]),e("li",S,[e("div",F,[H,e("span",I,i(t(g).nama_submanajemen),1)])])])]),e("div",T,[e("table",E,[O,e("tbody",null,[(s(!0),l(m,null,x(t(v),(o,f)=>(s(),l("tr",{key:f},[e("td",null,[e("span",Q,i(f+1),1)]),e("td",null,i(o.name),1),e("td",null,[(s(!0),l(m,null,x(t(p).filter(a=>a.id_users==o.id),(a,u)=>(s(),l("div",{key:u},i(t(y)(String(a.created_at)).format("DD MMMM YYYY, HH:mm")),1))),128))]),e("td",null,[(s(!0),l(m,null,x(t(p).filter(a=>a.id_users==o.id),(a,u)=>(s(),l("div",{key:u},i(a.hasil),1))),128))]),e("td",Z,[r(t(c),{href:d.route("manajemen.detail.admin.user",{id_manajemen:t(h).id,id_sub:d.$page.props.sub.id,id_user:o.id}),class:"text-teal-600 hover:text-teal-500"},{default:n(()=>[q]),_:2},1032,["href"])])]))),128))])])])])])]),_:1})],64))}};export{U as default};