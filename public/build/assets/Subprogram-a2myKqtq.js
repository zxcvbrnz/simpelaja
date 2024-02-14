import{_ as b}from"./AuthenticatedLayout-JBDbt0kp.js";import{Q as m,o as i,c as d,a as o,u as t,w as r,F as x,Z as y,b as e,t as c,i as n,d as p,g as f,r as k,j as B,T as C}from"./app-ONHfqMyQ.js";import{S as g}from"./sweetalert2.all-xtiJSL5N.js";const V={class:"py-4 font-sans"},M={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},D={class:"font-semibold text-xl text-slate-500 leading-tight mb-4"},L={class:"flex bg-white px-4 py-6 shadow-md","aria-label":"Breadcrumb"},S={class:"inline-flex items-center space-x-1 md:space-x-3"},T={class:"inline-flex items-center"},j=e("svg",{"aria-hidden":"true",class:"w-4 h-4 mr-2",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"})],-1),z={class:"flex items-center"},H=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),N={"aria-current":"page"},K={class:"flex items-center"},A=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),F={class:"ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"},P={class:"mt-6 p-6 bg-white shadow-md rounded-sm"},U={key:0,class:"flex justify-end mb-4"},q=e("svg",{xmlns:"http://www.w3.org/2000/svg",width:"20",height:"20",fill:"currentColor",class:"bi bi-bookmark-plus-fill",viewBox:"0 0 16 16"},[e("path",{"fill-rule":"evenodd",d:"M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z"})],-1),E=e("span",null,"Tambah",-1),I={id:"example",class:"stripe hover",style:{width:"100%","padding-top":"1em","padding-bottom":"1em"}},Q=e("thead",null,[e("tr",null,[e("th",{"data-priority":"1",class:"text-start"},"Program")])],-1),Y={class:"flex justify-between"},Z={class:"mr-5 font-bold overflow-hidden whitespace-nowrap text-ellipsis"},G=e("i",{class:"fa-sharp fa-solid fa-eye"},null,-1),J={key:1,class:"flex items-center space-x-4"},O=e("i",{class:"fa-sharp fa-solid fa-eye"},null,-1),R=e("i",{class:"fa-sharp fa-solid fa-pen-to-square"},null,-1),W=["onClick"],X=e("i",{class:"fa-solid fa-trash"},null,-1),ee=[X],re={__name:"Subprogram",setup(te){const w=m().props.data,h=m().props.auth.user,l=m().props.name,v=a=>{const _=C({id:a});g.fire({title:"Apakah kamu yakin?",text:"Kamu akan menghapus program ini!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya, Hapus!"}).then(s=>{s.isConfirmed&&_.delete(route("delete.subprogram",{id:l.id}),{onSuccess:()=>{g.fire({title:"Dihapus!",text:"Program telah dihapus.",icon:"success"}).then(u=>{location.reload()})}})})};return $(document).ready(function(){$("#example").DataTable({responsive:!0}).columns.adjust().responsive.recalc()}),(a,_)=>(i(),d(x,null,[o(t(y),{title:"Indikator Upaya Kesehatan Masyarakat"}),o(b,null,{default:r(()=>[e("div",V,[e("div",M,[e("h2",D,c(a.$page.props.name.program),1),e("nav",L,[e("ol",S,[e("li",T,[o(t(n),{href:a.route("dashboard"),class:"inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"},{default:r(()=>[j,p(" Dashboard ")]),_:1},8,["href"])]),e("li",null,[e("div",z,[H,o(t(n),{href:a.route("ukm.program"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:r(()=>[p(" Upaya Kesehatan Masyarakat")]),_:1},8,["href"])])]),e("li",N,[e("div",K,[A,e("span",F,c(t(l).program),1)])])])]),e("div",P,[t(h).role==="admin"?(i(),d("div",U,[o(t(n),{href:a.route("add.subprogram",{id:t(l).id}),class:"flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600"},{default:r(()=>[q,E]),_:1},8,["href"])])):f("",!0),e("table",I,[Q,e("tbody",null,[(i(!0),d(x,null,k(t(w),(s,u)=>(i(),d("tr",{key:u},[e("td",Y,[e("span",null,[e("span",Z,c(u+1),1),p(c(s.nama),1)]),t(h).role==="puskesmas"?(i(),B(t(n),{key:0,href:a.route("program.detail.data",{id_program:t(l).id,id_sub:s.id}),class:"text-teal-600 hover:text-teal-500"},{default:r(()=>[G]),_:2},1032,["href"])):f("",!0),t(h).role==="admin"?(i(),d("div",J,[o(t(n),{href:a.route("program.detail.admin",{id_program:t(l).id,id_sub:s.id}),class:"text-teal-600 hover:text-teal-500"},{default:r(()=>[O]),_:2},1032,["href"]),o(t(n),{href:a.route("edit.subprogram",{id:t(l).id,id_sub:s.id}),class:"text-polynesian-blue hover:text-carolina-blue"},{default:r(()=>[R]),_:2},1032,["href"]),e("button",{onClick:()=>v(s.id),class:"text-red-600 hover:text-red-500"},ee,8,W)])):f("",!0)])]))),128))])])])])])]),_:1})],64))}};export{re as default};