/*!
* Persist v3.12.1 (https://alpinejs.dev/)
*/

(()=>{function d(t){let e=()=>{let n,l=localStorage;return t.interceptor((r,i,s,a,m)=>{let o=n||`_x_${a}`,u=f(o,l)?g(o,l):r;return s(u),t.effect(()=>{let c=i();p(o,c,l),s(c)}),u},r=>{r.as=i=>(n=i,r),r.using=i=>(l=i,r)})};Object.defineProperty(t,"$persist",{get:()=>e()}),t.magic("persist",e),t.persist=(n,{get:l,set:r},i=localStorage)=>{let s=f(n,i)?g(n,i):l();r(s),t.effect(()=>{let a=l();p(n,a,i),r(a)})}}function f(t,e){return e.getItem(t)!==null}function g(t,e){return JSON.parse(e.getItem(t,e))}function p(t,e,n){n.setItem(t,JSON.stringify(e))}document.addEventListener("alpine:init",()=>{window.Alpine.plugin(d)});})();