import{Q as _,T as x,o as d,c as n,a,u as t,w as r,F as f,Z as g,b as e,t as c,i as m,d as p,e as v,f as w,g as y}from"./app-QgNPq1f0.js";import{_ as b}from"./AuthenticatedLayout-fXIfv3KI.js";import{_ as k}from"./TextInput-FwbzsHJb.js";import{_ as B}from"./InputLabel-h276iZNW.js";import{_ as V}from"./InputError-BY8cqXDb.js";import{S as M}from"./sweetalert2.all-Rn9OMCtz.js";const S={class:"py-4 font-sans"},C={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},E={class:"font-semibold text-xl text-slate-500 leading-tight mb-4"},N={class:"flex bg-white px-4 py-6 shadow-md","aria-label":"Breadcrumb"},T={class:"inline-flex items-center space-x-1 md:space-x-3"},U={class:"inline-flex items-center"},$=e("svg",{"aria-hidden":"true",class:"w-4 h-4 mr-2",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"})],-1),z={class:"flex items-center"},D=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),L={"aria-current":"page"},F={class:"flex items-center"},K=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),q={class:"ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"},I={class:"mt-6 p-6 bg-white shadow-md rounded-sm"},P={class:"w-full md:w-1/2 space-y-3 pe-4"},Q={class:"flex items-center gap-4 pt-4"},Z=["disabled"],j={key:0,class:"text-sm text-gray-600"},X={__name:"Edit",setup(A){const o=_().props.data,s=x({program:o.program}),h=()=>{s.patch(route("update.ukm",{id:o.id}),{onSuccess:()=>{M.fire({title:"Berhasil!",text:"Telah Mengubah Data",icon:"success"})}})};return(l,i)=>(d(),n(f,null,[a(t(g),{title:"Indikator Upaya Kesehatan Masyarakat"}),a(b,null,{default:r(()=>[e("div",S,[e("div",C,[e("h2",E," Edit "+c(t(o).program),1),e("nav",N,[e("ol",T,[e("li",U,[a(t(m),{href:l.route("dashboard"),class:"inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"},{default:r(()=>[$,p(" Dashboard ")]),_:1},8,["href"])]),e("li",null,[e("div",z,[D,a(t(m),{href:l.route("ukm.program"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:r(()=>[p(" Upaya Kesehatan Masyarakat")]),_:1},8,["href"])])]),e("li",L,[e("div",F,[K,e("span",q," Edit "+c(t(o).program),1)])])])]),e("div",I,[e("form",{onSubmit:v(h,["prevent"])},[e("div",P,[e("div",null,[a(B,{for:"program",value:"Nama Program"}),a(k,{id:"program",modelValue:t(s).program,"onUpdate:modelValue":i[0]||(i[0]=u=>t(s).program=u),type:"text",class:"mt-1 block w-full",autocomplete:"program",required:""},null,8,["modelValue"]),a(V,{message:t(s).errors.program,class:"mt-2"},null,8,["message"])])]),e("div",Q,[e("button",{class:"flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600",disabled:t(s).processing},"Update",8,Z),a(w,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:r(()=>[t(s).recentlySuccessful?(d(),n("p",j,"Saved.")):y("",!0)]),_:1})])],32)])])])]),_:1})],64))}};export{X as default};