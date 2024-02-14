import{_ as p}from"./AuthenticatedLayout-JBDbt0kp.js";import{Q as u,o as f,c as x,a as e,u as s,w as l,F as g,Z as v,b as t,i as c,d as a,t as d}from"./app-ONHfqMyQ.js";import{_ as n}from"./InputLabel-Rh1n0wwc.js";const w={class:"py-4 font-sans"},k={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},b=t("h2",{class:"font-semibold text-xl text-slate-500 leading-tight mb-4"}," Detail User Puskesmas ",-1),y={class:"flex bg-white px-4 py-6 shadow-md","aria-label":"Breadcrumb"},D={class:"inline-flex items-center space-x-1 md:space-x-3"},P={class:"inline-flex items-center"},B=t("svg",{"aria-hidden":"true",class:"w-4 h-4 mr-2",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[t("path",{d:"M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"})],-1),J={class:"flex items-center"},M=t("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[t("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),C={"aria-current":"page"},V={class:"flex items-center"},j=t("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[t("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),z={class:"ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"},K={class:"mt-6 p-6 bg-white shadow-md rounded-sm"},L={class:"text-xl text-slate-600 mb-6"},N={class:"flex items-center space-x-6"},U={class:"mb-6"},F=t("td",{class:"ps-6"}," : ",-1),S={class:"font-medium text-gray-700"},$=t("td",{class:"ps-6"}," : ",-1),A={class:"font-medium text-gray-700"},E=t("td",{class:"ps-6"}," : ",-1),Q={class:"font-medium text-gray-700"},T=t("td",{class:"ps-6"}," : ",-1),Z={class:"font-medium text-gray-700"},q=t("td",{class:"ps-6"}," : ",-1),G={class:"font-medium text-gray-700"},H=t("td",{class:"ps-6"}," : ",-1),I={class:"font-medium text-gray-700"},O=t("td",{class:"ps-6"}," : ",-1),R={class:"font-medium text-gray-700"},W=t("td",{class:"ps-6"}," : ",-1),X={class:"font-medium text-gray-700"},at={__name:"Detail",setup(Y){const i=u().props.userpuskesmas,o=u().props.profil,m=u().props.totalDesa,_=u().props.totalPenduduk,h=u().props.sdm;return(r,tt)=>(f(),x(g,null,[e(s(v),{title:"Detail User Puskesmas"}),e(p,null,{default:l(()=>[t("div",w,[t("div",k,[b,t("nav",y,[t("ol",D,[t("li",P,[e(s(c),{href:r.route("dashboard"),class:"inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"},{default:l(()=>[B,a(" Dashboard ")]),_:1},8,["href"])]),t("li",null,[t("div",J,[M,e(s(c),{href:r.route("data.puskesmas"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:l(()=>[a(" Puskesmas")]),_:1},8,["href"])])]),t("li",C,[t("div",V,[j,t("span",z," Detail "+d(s(i).name),1)])])])]),t("div",K,[t("div",L,d(s(i).name),1),t("div",N,[t("table",null,[t("tr",U,[t("td",null,[e(n,null,{default:l(()=>[a("Kepala Puskesmas")]),_:1})]),F,t("td",null,[t("span",S,d(s(o).Kepala_puskesmas),1)])]),t("tr",null,[t("td",null,[e(n,null,{default:l(()=>[a("Alamat")]),_:1})]),$,t("td",null,[t("span",A,d(s(o).alamat_puskesmas),1)])]),t("tr",null,[t("td",null,[e(n,null,{default:l(()=>[a("Jumlah Pustu")]),_:1})]),E,t("td",null,[t("span",Q,d(s(o).jumlah_pustu),1)])]),t("tr",null,[t("td",null,[e(n,null,{default:l(()=>[a("Jumlah Poskesdes")]),_:1})]),T,t("td",null,[t("span",Z,d(s(o).jumlah_poskesdes),1)])]),t("tr",null,[t("td",null,[e(n,null,{default:l(()=>[a("Jumlah UKBM")]),_:1})]),q,t("td",null,[t("span",G,d(s(o).jumlah_ukbm),1)])]),t("tr",null,[t("td",null,[e(n,null,{default:l(()=>[a("Jumlah Desa")]),_:1})]),H,t("td",null,[t("span",I,d(s(m)),1)]),t("td",null,[e(s(c),{href:r.route("detail.puskesmas.desa",{id:s(i).id}),class:"text-sm font-medium underline text-blue-800 hover:text-blue-600"},{default:l(()=>[a("Detail > ")]),_:1},8,["href"])])]),t("tr",null,[t("td",null,[e(n,null,{default:l(()=>[a("Jumlah Penduduk")]),_:1})]),O,t("td",null,[t("span",R,d(s(_)),1)])]),t("tr",null,[t("td",null,[e(n,null,{default:l(()=>[a("Jumlah SDM")]),_:1})]),W,t("td",null,[t("span",X,d(s(h)),1)]),t("td",null,[e(s(c),{href:r.route("detail.puskesmas.sdm",{id:s(i).id}),class:"text-sm font-medium underline text-blue-800 hover:text-blue-600"},{default:l(()=>[a("Detail > ")]),_:1},8,["href"])])])])])])])])]),_:1})],64))}};export{at as default};