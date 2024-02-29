import{_ as v}from"./AuthenticatedLayout-uBCviqzS.js";import{Q as _,o as c,c as m,a as o,u as t,w as l,F as f,Z as g,b as e,t as d,i,d as h,r as b,T as y}from"./app-6xvXvQMU.js";import{S as p}from"./sweetalert2.all-CR9EboZA.js";const k={class:"py-4 font-sans"},j={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},B={class:"font-semibold text-xl text-slate-500 leading-tight mb-4"},C={class:"flex bg-white px-4 py-6 shadow-md","aria-label":"Breadcrumb"},M={class:"inline-flex items-center space-x-1 md:space-x-3"},V={class:"inline-flex items-center"},D=e("svg",{"aria-hidden":"true",class:"w-4 h-4 mr-2",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"})],-1),L={class:"flex items-center"},T=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),z={"aria-current":"page"},H={class:"flex items-center"},S=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),N={class:"ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"},P={class:"mt-6 p-6 bg-white shadow-md rounded-sm"},A={class:"flex justify-end mb-4"},F=e("svg",{xmlns:"http://www.w3.org/2000/svg",width:"20",height:"20",fill:"currentColor",class:"bi bi-bookmark-plus-fill",viewBox:"0 0 16 16"},[e("path",{"fill-rule":"evenodd",d:"M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z"})],-1),q=e("span",null,"Tambah",-1),E={id:"example",class:"stripe hover",style:{width:"100%","padding-top":"1em","padding-bottom":"1em"}},I=e("thead",null,[e("tr",null,[e("th",{"data-priority":"1",class:"text-start"},"Manajemen")])],-1),K={class:"flex justify-between"},Q={class:"mr-5 font-bold overflow-hidden whitespace-nowrap text-ellipsis"},Y={class:"flex items-center space-x-4"},Z=e("i",{class:"fa-sharp fa-solid fa-eye"},null,-1),G=e("i",{class:"fa-sharp fa-solid fa-pen-to-square"},null,-1),J=["onClick"],O=e("i",{class:"fa-solid fa-trash"},null,-1),R=[O],se={__name:"index",setup(U){const{data:x,name:n}=_().props;_().props.auth.user;const w=(s,u)=>{const a=y({id:s});p.fire({title:"Apakah kamu yakin?",text:`Kamu akan menghapus ${u} ini!`,icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya, Hapus!"}).then(r=>{r.isConfirmed&&a.delete(route("submanajemen.delete",{id:n.id}),{onSuccess:()=>{p.fire({title:"Dihapus!",text:"Program telah dihapus.",icon:"success"}).then(W=>{location.reload()})}})})};return $(document).ready(function(){$("#example").DataTable({responsive:!0}).columns.adjust().responsive.recalc()}),(s,u)=>(c(),m(f,null,[o(t(g),{title:"Indikator Manajemen Puskesmas"}),o(v,null,{default:l(()=>[e("div",k,[e("div",j,[e("h2",B,d(t(n).manajemen),1),e("nav",C,[e("ol",M,[e("li",V,[o(t(i),{href:s.route("dashboard"),class:"inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"},{default:l(()=>[D,h(" Dashboard ")]),_:1},8,["href"])]),e("li",null,[e("div",L,[T,o(t(i),{href:s.route("manajemen.index"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:l(()=>[h(" Manajemen Puskesmas")]),_:1},8,["href"])])]),e("li",z,[e("div",H,[S,e("span",N,d(t(n).manajemen),1)])])])]),e("div",P,[e("div",A,[o(t(i),{href:s.route("submanajemen.create",{id:t(n).id}),class:"flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600"},{default:l(()=>[F,q]),_:1},8,["href"])]),e("table",E,[I,e("tbody",null,[(c(!0),m(f,null,b(t(x),(a,r)=>(c(),m("tr",{key:r},[e("td",K,[e("span",null,[e("span",Q,d(r+1),1),h(d(a.nama_submanajemen),1)]),e("div",Y,[o(t(i),{href:s.route("manajemen.detail.admin",{id_manajemen:t(n).id,id_sub:a.id}),class:"text-teal-600 hover:text-teal-500"},{default:l(()=>[Z]),_:2},1032,["href"]),o(t(i),{href:s.route("submanajemen.edit",{id:t(n).id,id_sub:a.id}),class:"text-polynesian-blue hover:text-carolina-blue"},{default:l(()=>[G]),_:2},1032,["href"]),e("button",{onClick:()=>w(a.id,a.nama_submanajemen),class:"text-red-600 hover:text-red-500"},R,8,J)])])]))),128))])])])])])]),_:1})],64))}};export{se as default};