(()=>{var e={n:t=>{var n=t&&t.__esModule?()=>t.default:()=>t;return e.d(n,{a:n}),n},d:(t,n)=>{for(var r in n)e.o(n,r)&&!e.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:n[r]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r:e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},t={};(()=>{"use strict";e.r(t);const n=flarum.core.compat["common/app"];e.n(n)().initializers.add("blomstra/flarum-sendgrid",(function(){console.log("[blomstra/flarum-sendgrid] Hello, forum and admin!")}));const r=flarum.core.compat["admin/app"];var a=e.n(r);function o(e,t){return o=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(e,t){return e.__proto__=t,e},o(e,t)}const s=flarum.core.compat["admin/components/ExtensionPage"];var i=function(e){function t(){return e.apply(this,arguments)||this}var n,r;return r=e,(n=t).prototype=Object.create(r.prototype),n.prototype.constructor=n,o(n,r),t.prototype.content=function(){return m("div",{className:"SendGridSettingsPage"},m("div",{className:"container"},m("form",null,m("h2",null,app.translator.trans("blomstra-sendgrid.admin.sendgrid.heading")),m("div",{className:"helpText"},app.translator.trans("blomstra-sendgrid.admin.sendgrid.text")),m("fieldset",{className:"parent"},this.buildSettingComponent({setting:"blomstra-sendgrid.sendgrid_suspend_when_email_bounced",label:app.translator.trans("blomstra-sendgrid.admin.sendgrid_suspend_when_email_bounced_label"),help:app.translator.trans("blomstra-sendgrid.admin.sendgrid_suspend_when_email_bounced_help"),type:"boolean"}),this.buildSettingComponent({setting:"blomstra-sendgrid.sendgrid_disable_notifications_on_spam_report",label:app.translator.trans("blomstra-sendgrid.admin.sendgrid_disable_notifications_on_spam_report_label"),help:app.translator.trans("blomstra-sendgrid.admin.sendgrid_disable_notifications_on_spam_report_help"),type:"boolean"})),this.submitButton())))},t}(e.n(s)());a().initializers.add("blomstra/flarum-sendgrid",(function(){a().extensionData.for("blomstra-sendgrid").registerPage(i)}))})(),module.exports=t})();
//# sourceMappingURL=admin.js.map