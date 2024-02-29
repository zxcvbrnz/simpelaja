import{_ as w}from"./AuthenticatedLayout-uBCviqzS.js";import{Q as m,o as c,c as h,a as n,u as t,w as l,F as _,Z as v,b as e,t as d,i as o,d as u,r as y,T as b}from"./app-6xvXvQMU.js";import{S as f}from"./sweetalert2.all-CR9EboZA.js";const k={class:"py-4 font-sans"},B={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},C={class:"font-semibold text-xl text-slate-500 leading-tight mb-4"},V={class:"flex bg-white px-4 py-6 shadow-md","aria-label":"Breadcrumb"},j={class:"inline-flex items-center space-x-1 md:space-x-3"},D={class:"inline-flex items-center"},L=e("svg",{"aria-hidden":"true",class:"w-4 h-4 mr-2",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"})],-1),P={class:"flex items-center"},T=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),z={"aria-current":"page"},H={class:"flex items-center"},M=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),S={class:"ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"},K={class:"mt-6 p-6 bg-white shadow-md rounded-sm"},N={class:"flex justify-end mb-4"},A=e("svg",{xmlns:"http://www.w3.org/2000/svg",width:"20",height:"20",fill:"currentColor",class:"bi bi-bookmark-plus-fill",viewBox:"0 0 16 16"},[e("path",{"fill-rule":"evenodd",d:"M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z"})],-1),F=e("span",null,"Tambah",-1),U={id:"example",class:"stripe hover",style:{width:"100%","padding-top":"1em","padding-bottom":"1em"}},q=e("thead",null,[e("tr",null,[e("th",{"data-priority":"1",class:"text-start"},"pelayanan")])],-1),E={class:"flex justify-between"},I={class:"mr-5 font-bold overflow-hidden whitespace-nowrap text-ellipsis"},Q={class:"flex items-center space-x-4"},Y=e("i",{class:"fa-sharp fa-solid fa-eye"},null,-1),Z=e("i",{class:"fa-sharp fa-solid fa-pen-to-square"},null,-1),G=["onClick"],J=e("i",{class:"fa-solid fa-trash"},null,-1),O=[J],ae={__name:"index",setup(R){const x=m().props.data,i=m().props.name,g=(a,p)=>{const s=b({id:a});f.fire({title:"Apakah kamu yakin?",text:`Kamu akan menghapus program ${p} ini!`,icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya, Hapus!"}).then(r=>{r.isConfirmed&&s.delete(route("delete.subpelayanan",{id:a}),{onSuccess:()=>{f.fire({title:"Dihapus!",text:"Program telah dihapus.",icon:"success"}).then(W=>{location.reload()})}})})};return $(document).ready(function(){$("#example").DataTable({responsive:!0}).columns.adjust().responsive.recalc()}),(a,p)=>(c(),h(_,null,[n(t(v),{title:"Indikator Upaya Kesehatan Perseorangan dan Penunjang"}),n(w,null,{default:l(()=>[e("div",k,[e("div",B,[e("h2",C,d(a.$page.props.name.pelayanan),1),e("nav",V,[e("ol",j,[e("li",D,[n(t(o),{href:a.route("dashboard"),class:"inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"},{default:l(()=>[L,u(" Dashboard ")]),_:1},8,["href"])]),e("li",null,[e("div",P,[T,n(t(o),{href:a.route("ukpp.pelayanan"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:l(()=>[u(" Upaya Kesehatan Perseorangan dan Penunjang")]),_:1},8,["href"])])]),e("li",z,[e("div",H,[M,e("span",S,d(t(i).pelayanan),1)])])])]),e("div",K,[e("div",N,[n(t(o),{href:a.route("add.subpelayanan",{id:t(i).id}),class:"flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600"},{default:l(()=>[A,F]),_:1},8,["href"])]),e("table",U,[q,e("tbody",null,[(c(!0),h(_,null,y(t(x),(s,r)=>(c(),h("tr",{key:r},[e("td",E,[e("span",null,[e("span",I,d(r+1),1),u(d(s.subpelayanan),1)]),e("div",Q,[n(t(o),{href:a.route("pelayanan.detail.admin",{id_pelayanan:t(i).id,id_sub:s.id}),class:"text-teal-600 hover:text-teal-500"},{default:l(()=>[Y]),_:2},1032,["href"]),n(t(o),{href:a.route("edit.subpelayanan",{id:t(i).id,id_sub:s.id}),class:"text-polynesian-blue hover:text-carolina-blue"},{default:l(()=>[Z]),_:2},1032,["href"]),e("button",{onClick:()=>g(s.id,s.subpelayanan),class:"text-red-600 hover:text-red-500"},O,8,G)])])]))),128))])])])])])]),_:1})],64))}};export{ae as default};