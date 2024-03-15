import{p as S,q as j,l as f,s as z,o as l,c as d,b as t,m as c,h as y,x as b,a as r,w as a,n as g,f as M,k as $,u as x,i as C,g as k,d as h,t as B,y as L}from"./app-tAwzPaz0.js";const A={class:"relative"},D={__name:"Dropdown",props:{align:{type:String,default:"right"},width:{type:String,default:"48"},contentClasses:{type:String,default:"py-1 bg-white"}},setup(s){const e=s,o=m=>{n.value&&m.key==="Escape"&&(n.value=!1)};S(()=>document.addEventListener("keydown",o)),j(()=>document.removeEventListener("keydown",o));const p=f(()=>({48:"w-48"})[e.width.toString()]),v=f(()=>e.align==="left"?"ltr:origin-top-left rtl:origin-top-right start-0":e.align==="right"?"ltr:origin-top-right rtl:origin-top-left end-0":"origin-top"),n=z(!1);return(m,u)=>(l(),d("div",A,[t("div",{onClick:u[0]||(u[0]=w=>n.value=!n.value)},[c(m.$slots,"trigger")]),y(t("div",{class:"fixed inset-0 z-40",onClick:u[1]||(u[1]=w=>n.value=!1)},null,512),[[b,n.value]]),r(M,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"opacity-0 scale-95","enter-to-class":"opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"opacity-100 scale-100","leave-to-class":"opacity-0 scale-95"},{default:a(()=>[y(t("div",{class:g(["absolute z-50 mt-2 rounded-md shadow-lg",[p.value,v.value]]),style:{display:"none"},onClick:u[2]||(u[2]=w=>n.value=!1)},[t("div",{class:g(["rounded-md ring-1 ring-black ring-opacity-5",s.contentClasses])},[c(m.$slots,"content")],2)],2),[[b,n.value]])]),_:3})]))}},_={__name:"DropdownLink",props:{href:{type:String,required:!0}},setup(s){return(e,o)=>(l(),$(x(C),{href:s.href,class:"block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},{default:a(()=>[c(e.$slots,"default")]),_:3},8,["href"]))}},i={__name:"SideLink",props:{href:{type:String,required:!0},active:{type:Boolean}},setup(s){const e=s,o=f(()=>e.active?"flex items-center bg-orange-web text-slate-950 py-2 px-2 rounded-sm":"flex items-center hover:bg-orange-web hover:text-slate-950 py-2 px-2 transition duration-300 easy-in-out rounded-sm");return(p,v)=>(l(),$(x(C),{href:s.href,class:g(o.value)},{default:a(()=>[c(p.$slots,"default")]),_:3},8,["href","class"]))}},N={id:"sidebar-multi-level-sidebar",class:"shadow-lg fixed top-0 left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0","aria-label":"Sidebar"},V={class:"relative h-full px-3 py-4 overflow-y-auto bg-polynesian-blue transition-all ease-in-out duration-300"},E={class:"space-y-2 text-slate-300 font-thin text-sm"},P=t("li",null,[t("div",{class:"flex items-center p-4 rounded-lg space-x-3"},[t("span",{class:"font-thin font-salsa text-xl text-white leading-tight"}," Simpel Aja ")])],-1),T=t("hr",null,null,-1),q=t("li",null,[t("div",{class:"flex items-center px-4 pt-3 rounded-lg"},[t("span",{class:"text-md leading-tight font-bold text-slate-400"}," Menu ")])],-1),H=t("svg",{"aria-hidden":"true",class:"w-6 h-6 transition duration-75 text-white",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[t("path",{d:"M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"}),t("path",{d:"M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"})],-1),O=t("span",{class:"ml-3"},"Dashboard",-1),U={key:0},K=t("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-6 h-6 transition duration-75 text-white",fill:"currentColor",viewBox:"0 0 20 20"},[t("path",{d:"M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"})],-1),I=t("span",{class:"ml-3"},"Puskesmas",-1),F={key:1},G=t("svg",{xmlns:"http://www.w3.org/2000/svg",class:"w-6 h-6 transition duration-75 text-white",fill:"currentColor",viewBox:"0 0 20 20"},[t("path",{d:"M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"})],-1),J=t("span",{class:"ml-3"},"Detail Puskesmas",-1),Q=t("li",null,[t("div",{class:"flex items-center px-4 pt-3 rounded-lg text-slate-400"},[t("span",{class:"text-md font-bold leading-tight"}," Indikator ")])],-1),R=t("span",{class:"ms-10"},"UKM",-1),W=t("span",{class:"ms-10"},"UKPP",-1),X=t("span",{class:"ms-10"},"Manajemen",-1),Y=t("span",{class:"ms-10"},"Nasional Mutu",-1),Z=t("div",{class:"text-slate-400 absolute bottom-0 text-xs font-thin -ms-3"}," Copyright @Tebarkode Teknologi ",-1),ee={__name:"Sidebar",setup(s){return(e,o)=>(l(),d("aside",N,[t("div",V,[t("ul",E,[P,T,q,t("li",null,[r(i,{class:"items-center",href:e.route("dashboard"),active:e.route().current("dashboard")},{default:a(()=>[H,O]),_:1},8,["href","active"])]),e.$page.props.auth.user.role=="admin"?(l(),d("li",U,[r(i,{href:e.route("data.puskesmas"),active:e.route().current("data.puskesmas")||e.route().current("detail.puskesmas")||e.route().current("add.puskesmas")||e.route().current("detail.puskesmas.desa")||e.route().current("detail.puskesmas.sdm")},{default:a(()=>[K,I]),_:1},8,["href","active"])])):k("",!0),e.$page.props.auth.user.role=="puskesmas"?(l(),d("li",F,[r(i,{href:e.route("detail.profil"),active:e.route().current("detail.profil")||e.route().current("desa")||e.route().current("desa.create")||e.route().current("desa.edit")||e.route().current("sdm")||e.route().current("sdm.create")||e.route().current("sdm.edit")},{default:a(()=>[G,J]),_:1},8,["href","active"])])):k("",!0),Q,t("li",null,[r(i,{href:e.route("ukm.program"),active:e.route().current("ukm.program")||e.route().current("program.detail")||e.route().current("program.detail.data")||e.route().current("program.detail.admin")||e.route().current("program.detail.admin.user")||e.route().current("add.ukms")||e.route().current("edit.ukm")||e.route().current("add.subprogram")||e.route().current("edit.subprogram")},{default:a(()=>[R]),_:1},8,["href","active"])]),t("li",null,[r(i,{href:e.route("ukpp.pelayanan"),active:e.route().current("ukpp.pelayanan")||e.route().current("pelayanan.detail")||e.route().current("pelayanan.detail.data")||e.route().current("pelayanan.detail.admin")||e.route().current("pelayanan.detail.admin.user")||e.route().current("add.ukpps")||e.route().current("edit.ukpp")||e.route().current("add.subpelayanan")||e.route().current("edit.subpelayanan")},{default:a(()=>[W]),_:1},8,["href","active"])]),t("li",null,[r(i,{href:e.route("manajemen.index"),active:e.route().current("manajemen.index")||e.route().current("manajemen.create")||e.route().current("manajemen.edit")||e.route().current("manajemen.detail")||e.route().current("submanajemen.create")||e.route().current("submanajemen.edit")||e.route().current("manajemen.detail.admin")||e.route().current("manajemen.detail.admin.user")||e.route().current("manajemen.detail.data")},{default:a(()=>[X]),_:1},8,["href","active"])]),t("li",null,[r(i,{href:e.route("nasionalmutu.index"),active:e.route().current("nasionalmutu.index")||e.route().current("mutu.create")||e.route().current("mutu.edit")||e.route().current("mutu.detail.admin")||e.route().current("mutu.detail.admin.user")||e.route().current("nasionalmutu.detail.data")},{default:a(()=>[Y]),_:1},8,["href","active"])])]),Z])]))}},te={class:"min-h-screen bg-gray-100"},ae={class:"bg-white border-b border-gray-100"},re={class:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},se={class:"flex justify-between h-16"},ne=L('<div class="-me-2 flex items-center sm:hidden"><button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"><span class="sr-only">Open sidebar</span><svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path></svg></button></div><div class="flex"></div>',2),oe={class:"flex items-center ms-6"},ie={class:"ms-3 relative"},le={class:"inline-flex rounded-md"},ue={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"},de=t("svg",{class:"ms-2 -me-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[t("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),ce={class:"sm:ml-52"},pe={__name:"AuthenticatedLayout",setup(s){return(e,o)=>(l(),d("div",null,[t("div",te,[t("nav",ae,[r(ee),t("div",re,[t("div",se,[ne,t("div",oe,[t("div",ie,[r(D,{align:"right",width:"48"},{trigger:a(()=>[t("span",le,[t("button",ue,[h(B(e.$page.props.auth.user.name)+" ",1),de])])]),content:a(()=>[r(_,{href:e.route("profile.edit")},{default:a(()=>[h(" Profile ")]),_:1},8,["href"]),r(_,{href:e.route("logout"),method:"post",as:"button"},{default:a(()=>[h(" Log Out ")]),_:1},8,["href"])]),_:1})])])])])]),t("main",ce,[c(e.$slots,"default")])])]))}};export{pe as _};