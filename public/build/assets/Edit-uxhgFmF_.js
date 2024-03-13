import{Q as N,T as B,o as n,c as d,a as i,u as t,w as f,F as v,Z as M,b as e,t as _,i as w,d as V,e as q,h as p,v as k,g as c,j as g,r as h,f as C}from"./app-qHeMDGYD.js";import{_ as S}from"./AuthenticatedLayout-jOHxDqJQ.js";import{_ as r}from"./TextInput-zMnDlN7o.js";import{_ as u}from"./InputLabel-Nw9SX-R6.js";import{_ as x}from"./InputError-IzGw0w8a.js";import{S as T}from"./sweetalert2.all-TwWI_jPR.js";const D={class:"py-4 font-sans"},E={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},L={class:"font-semibold text-xl text-slate-500 leading-tight mb-4"},$={class:"flex bg-white px-4 py-6 shadow-md","aria-label":"Breadcrumb"},z={class:"inline-flex items-center space-x-1 md:space-x-3"},F={class:"inline-flex items-center"},I=e("svg",{"aria-hidden":"true",class:"w-4 h-4 mr-2",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"})],-1),j={class:"flex items-center"},P=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),Q={"aria-current":"page"},R={class:"flex items-center"},Z=e("svg",{"aria-hidden":"true",class:"w-6 h-6 text-gray-400",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),A={class:"ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"},G={class:"mt-6 p-6 bg-white shadow-md rounded-sm"},H={class:"flex flex-wrap"},J={class:"w-full md:w-1/2 space-y-3 pe-4"},K={class:"flex space-x-6"},O={class:"flex space-x-2"},W={class:"flex space-x-2"},X={class:"w-full"},Y={class:"flex items-center"},ee={key:0,class:"w-2/3"},te={key:1,class:"font-bold px-3"},le={key:2,class:"w-1/3"},se={key:0},ae={class:"w-full md:w-1/2"},ie={class:"flex space-x-3"},oe=e("option",{value:"null",disabled:"",hidden:""},"-",-1),ne=["value"],de=e("span",{class:"px-2 flex items-center font-bold"}," % ",-1),re={class:"mt-3"},ue={class:"flex space-x-3"},me=e("option",{value:"null",disabled:"",hidden:""},"-",-1),_e=["value"],pe=e("span",{class:"px-2 flex items-center font-bold"}," % ",-1),ce={class:"mt-3"},fe={class:"flex space-x-3"},ve=e("span",{class:"px-2 flex items-center font-bold"}," - ",-1),xe=e("span",{class:"px-2 flex items-center font-bold"}," % ",-1),ye={class:"mt-3"},ge={class:"flex space-x-3"},he=e("option",{value:"null",disabled:"",hidden:""},"-",-1),be=["value"],we=e("span",{class:"px-2 flex items-center font-bold"}," % ",-1),Ve={class:"flex items-center gap-4 pt-4"},ke=["disabled"],Ue={key:0,class:"text-sm text-gray-600"},De={__name:"Edit",setup(Ne){const{data:o}=N().props,l=B({mutu:o.mutu,str_penyebut:o.str_penyebut,str_pembilang:o.str_pembilang,kali:o.kali,type:o.type,target:o.target,type_target:o.type_target,nilai_4:o.nilai_4,type_nilai_4:o.type_nilai_4,nilai_7_start:o.nilai_7_start,nilai_7_end:o.nilai_7_end,nilai_10:o.nilai_10,type_nilai_10:o.type_nilai_10}),y=[{value:">",label:1},{value:"<",label:2},{value:">=",label:3},{value:"<=",label:4}],U=()=>{l.patch(route("mutu.update",{id:o.id}),{onSuccess:()=>{T.fire({title:"Berhasil!",text:"Berhasil Memperbaharui Data",icon:"success"})}})};return(b,a)=>(n(),d(v,null,[i(t(M),{title:"Indikator Nasional Mutu"}),i(S,null,{default:f(()=>[e("div",D,[e("div",E,[e("h2",L," Edit "+_(t(o).mutu),1),e("nav",$,[e("ol",z,[e("li",F,[i(t(w),{href:b.route("dashboard"),class:"inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"},{default:f(()=>[I,V(" Dashboard ")]),_:1},8,["href"])]),e("li",null,[e("div",j,[P,i(t(w),{href:b.route("nasionalmutu.index"),class:"ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"},{default:f(()=>[V(" Nasional Mutu")]),_:1},8,["href"])])]),e("li",Q,[e("div",R,[Z,e("span",A," Edit "+_(t(o).mutu),1)])])])]),e("div",G,[e("form",{onSubmit:q(U,["prevent"])},[e("div",H,[e("div",J,[e("div",null,[i(u,{for:"mutu",value:"Nama Indikator"}),i(r,{id:"mutu",modelValue:t(l).mutu,"onUpdate:modelValue":a[0]||(a[0]=s=>t(l).mutu=s),type:"text",class:"mt-1 block w-full",autocomplete:"mutu",required:""},null,8,["modelValue"]),i(x,{message:t(l).errors.mutu,class:"mt-2"},null,8,["message"])]),e("div",K,[e("div",O,[p(e("input",{type:"radio",name:"type",id:"type1","onUpdate:modelValue":a[1]||(a[1]=s=>t(l).type=s),value:"1"},null,512),[[k,t(l).type]]),i(u,{for:"type1",value:"Type 1"})]),e("div",W,[p(e("input",{type:"radio",name:"type",id:"type2","onUpdate:modelValue":a[2]||(a[2]=s=>t(l).type=s),value:"2"},null,512),[[k,t(l).type]]),i(u,{for:"type2",value:"Type 2"})])]),e("div",X,[i(u,{for:"nama",value:"Cara Perhitungan"}),e("div",Y,[t(l).type===1||t(l).type===2?(n(),d("div",ee,[i(r,{id:"str_pembilang",modelValue:t(l).str_pembilang,"onUpdate:modelValue":a[3]||(a[3]=s=>t(l).str_pembilang=s),type:"text",required:"",class:"mt-1 block w-full",autocomplete:"str_pembilang"},null,8,["modelValue"]),i(x,{message:t(l).errors.str_pembilang,class:"mt-2"},null,8,["message"])])):c("",!0),t(l).type===1?(n(),d("span",te,"x")):c("",!0),t(l).type===1?(n(),d("div",le,[i(r,{id:"kali",modelValue:t(l).kali,"onUpdate:modelValue":a[4]||(a[4]=s=>t(l).kali=s),type:"number",class:"mt-1 block w-full",autocomplete:"kali"},null,8,["modelValue"]),i(x,{message:t(l).errors.kali,class:"mt-2"},null,8,["message"])])):c("",!0)]),t(l).type===1?(n(),d("div",se,[i(r,{id:"str_penyebut",modelValue:t(l).str_penyebut,"onUpdate:modelValue":a[5]||(a[5]=s=>t(l).str_penyebut=s),type:"text",class:"mt-1 block w-full",autocomplete:"str_penyebut"},null,8,["modelValue"]),i(x,{message:t(l).errors.str_penyebut,class:"mt-2"},null,8,["message"])])):c("",!0)])]),e("div",ae,[e("div",null,[i(u,{for:"target",value:"Target"}),e("div",ie,[p(e("select",{"onUpdate:modelValue":a[6]||(a[6]=s=>t(l).type_target=s),class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/5 mt-1",required:""},[oe,(n(),d(v,null,h(y,(s,m)=>e("option",{key:m,value:s.label},_(s.value),9,ne)),64))],512),[[g,t(l).type_target]]),i(r,{id:"target",modelValue:t(l).target,"onUpdate:modelValue":a[7]||(a[7]=s=>t(l).target=s),type:"number",step:"0.01",class:"mt-1 block w-2/5",autocomplete:"target",required:""},null,8,["modelValue"]),de])]),e("div",re,[i(u,{for:"nilai_4",value:"Nilai 4"}),e("div",ue,[p(e("select",{"onUpdate:modelValue":a[8]||(a[8]=s=>t(l).type_nilai_4=s),class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/5 mt-1"},[me,(n(),d(v,null,h(y,(s,m)=>e("option",{key:m,value:s.label},_(s.value),9,_e)),64))],512),[[g,t(l).type_nilai_4]]),i(r,{id:"nilai_4",modelValue:t(l).nilai_4,"onUpdate:modelValue":a[9]||(a[9]=s=>t(l).nilai_4=s),type:"number",step:"0.01",class:"mt-1 block w-2/5",autocomplete:"nilai_4",required:""},null,8,["modelValue"]),pe])]),e("div",ce,[i(u,{for:"nilai_7",value:"Nilai 7"}),e("div",fe,[i(r,{id:"nilai_7_start",modelValue:t(l).nilai_7_start,"onUpdate:modelValue":a[10]||(a[10]=s=>t(l).nilai_7_start=s),type:"number",step:"0.01",required:"",class:"mt-1 block w-1/3",autocomplete:"nilai_7_start"},null,8,["modelValue"]),ve,i(r,{id:"nilai_7_end",modelValue:t(l).nilai_7_end,"onUpdate:modelValue":a[11]||(a[11]=s=>t(l).nilai_7_end=s),type:"number",step:"0.01",required:"",class:"mt-1 block w-1/3",autocomplete:"nilai_7_end"},null,8,["modelValue"]),xe])]),e("div",ye,[i(u,{for:"nilai_10",value:"Nilai 10"}),e("div",ge,[p(e("select",{"onUpdate:modelValue":a[12]||(a[12]=s=>t(l).type_nilai_10=s),class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/5 mt-1"},[he,(n(),d(v,null,h(y,(s,m)=>e("option",{key:m,value:s.label},_(s.value),9,be)),64))],512),[[g,t(l).type_nilai_10]]),i(r,{id:"nilai_10",modelValue:t(l).nilai_10,"onUpdate:modelValue":a[13]||(a[13]=s=>t(l).nilai_10=s),type:"number",step:"0.01",required:"",class:"mt-1 block w-2/5",autocomplete:"nilai_10"},null,8,["modelValue"]),we])])])]),e("div",Ve,[e("button",{class:"flex items-center text-sm space-x-2 text-white shadow-sm shadow-icterina px-4 py-2 rounded-sm bg-indigo-700 hover:bg-indigo-600",disabled:t(l).processing},"Update",8,ke),i(C,{"enter-active-class":"transition ease-in-out","enter-from-class":"opacity-0","leave-active-class":"transition ease-in-out","leave-to-class":"opacity-0"},{default:f(()=>[t(l).recentlySuccessful?(n(),d("p",Ue,"Updated.")):c("",!0)]),_:1})])],32)])])])]),_:1})],64))}};export{De as default};