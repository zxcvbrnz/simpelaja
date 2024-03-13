import{Q as u,T as w,o as h,c as _,a as s,u as t,w as o,F as b,Z as y,b as e,t as m,i as n,d as c,e as k,f as S,g as V}from"./app-qHeMDGYD.js";import{_ as M}from"./AuthenticatedLayout-jOHxDqJQ.js";import{_ as p}from"./TextInput-zMnDlN7o.js";import{_ as f}from"./InputLabel-Nw9SX-R6.js";import{_ as x}from"./InputError-IzGw0w8a.js";import{S as B}from"./sweetalert2.all-TwWI_jPR.js";const D={class:"py-4 font-sans"},j={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},C={class:"font-semibold text-xl text-slate-500 leading-tight mb-4"},N={class:"flex bg-white px-4 py-6 shadow-md","aria-label":"Breadcrumb"},z={class:"inline-flex items-center space-x-1 md:space-x-3"},E={class:"inline-flex items-center"},L=e("svg",{"aria-hidden":"true",class:"w-4 h-4 mr-2",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"})],-1),T={class:"flex items-center"},$=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),U={class:"flex items-center"},q=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),F={"aria-current":"page"},J={class:"flex items-center"},P=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),Q={class:"ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"},Z={class:"mt-6 p-6 bg-white shadow-md rounded-sm"},A={class:"w-full md:w-1/2 space-y-3 pe-4"},G={class:"flex items-center gap-4 pt-4"},H=["disabled"],I={key:0,class:"text-sm text-gray-600"},te={__name:"update",setup(K){const l=u().props.data,v=u().props.auth.user,a=w({nama_sdm:l.nama_sdm,jumlah_sdm:l.jumlah_sdm}),g=()=>{a.patch(route("sdm.update",{id:l.id}),{onSuccess:()=>{B.fire({title:"Berhasil!",text:"Telah Mengubah Data",icon:"success"})}})};return(r,d)=>(h(),_(b,null,[s(t(y),{title:"SDM"}),s(M,null,{default:o(()=>[e("div",D,[e("div",j,[e("h2",C," Edit "+m(t(l).nama_sdm),1),e("nav",N,[e("ol",z,[e("li",E,[s(t(n),{href:r.route("dashboard"),class:"inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"},{default:o(()=>[L,c(" Dashboard ")]),_:1},8,["href"])]),e("li",null,[e("div",T,[$,s(t(n),{href:r.route("detail.profil"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:o(()=>[c(" Detail Puskesmas "+m(t(v).name),1)]),_:1},8,["href"])])]),e("li",null,[e("div",U,[q,s(t(n),{href:r.route("sdm"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:o(()=>[c(" SDM")]),_:1},8,["href"])])]),e("li",F,[e("div",J,[P,e("span",Q," Edit "+m(t(l).nama_sdm),1)])])])]),e("div",Z,[e("form",{onSubmit:k(g,["prevent"])},[e("div",A,[e("div",null,[s(f,{for:"sdm",value:"Nama SDM"}),s(p,{id:"sdm",modelValue:t(a).nama_sdm,"onUpdate:modelValue":d[0]||(d[0]=i=>t(a).nama_sdm=i),type:"text",class:"mt-1 block w-full",autocomplete:"sdm",required:""},null,8,["modelValue"]),s(x,{message:t(a).errors.nama_sdm,class:"mt-2"},null,8,["message"])]),e("div",null,[s(f,{for:"jumlah",value:"Jumlah SDM"}),s(p,{id:"jumlah",modelValue:t(a).jumlah_sdm,"onUpdate:modelValue":d[1]||(d[1]=i=>t(a).jumlah_sdm=i),type:"number",class:"mt-1 block w-full",autocomplete:"penduduk",required:""},null,8,["modelValue"]),s(x,{message:t(a).errors.jumlah_sdm,class:"mt-2"},null,8,["message"])])]),e("div",G,[e("button",{class:"flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600",disabled:t(a).processing},"Update",8,H),s(S,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:o(()=>[t(a).recentlySuccessful?(h(),_("p",I,"Saved.")):V("",!0)]),_:1})])],32)])])])]),_:1})],64))}};export{te as default};