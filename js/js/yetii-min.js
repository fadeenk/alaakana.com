/*Yetii - Yet (E)Another Tab Interface Implementation,version 1.5,http://www.kminek.pl/lab/yetii/,Copyright (c) Grzegorz Wojcik,Code licensed under the BSD License: http://www.kminek.pl/bsdlicense.txt*/function Yetii(){this.defaults={id:null,active:1,interval:null,wait:null,persist:null,tabclass:'tab',activeclass:'active',callback:null,leavecallback:null};this.activebackup=null;for(var h in arguments[0]){this.defaults[h]=arguments[0][h]};this.getTabs=function(){var b=[];var a=document.getElementById(this.defaults.id).getElementsByTagName('*');var c=new RegExp("(^|\\s)"+this.defaults.tabclass.replace(/\-/g,"\\-")+"(\\s|$)");for(var d=0;d<a.length;d++){if(c.test(a[d].className))b.push(a[d])}return b};this.links=document.getElementById(this.defaults.id+'-nav').getElementsByTagName('a');this.listitems=document.getElementById(this.defaults.id+'-nav').getElementsByTagName('li');this.show=function(b){for(var a=0;a<this.tabs.length;a++){this.tabs[a].style.display=((a+1)==b)?'block':'none';if((a+1)==b){this.addClass(this.links[a],this.defaults.activeclass);this.addClass(this.listitems[a],this.defaults.activeclass+'li')}else{this.removeClass(this.links[a],this.defaults.activeclass);this.removeClass(this.listitems[a],this.defaults.activeclass+'li')}}if(this.defaults.leavecallback&&(b!=this.activebackup))this.defaults.leavecallback(this.defaults.active);this.activebackup=b;this.defaults.active=b;if(this.defaults.callback)this.defaults.callback(b)};this.rotate=function(b){this.show(this.defaults.active);this.defaults.active++;if(this.defaults.active>this.tabs.length)this.defaults.active=1;var a=this;if(this.defaults.wait)clearTimeout(this.timer2);this.timer1=setTimeout(function(){a.rotate(b)},b*1000)};this.next=function(){this.defaults.active++;if(this.defaults.active>this.tabs.length)this.defaults.active=1;this.show(this.defaults.active)};this.previous=function(){this.defaults.active--;if(!this.defaults.active)this.defaults.active=this.tabs.length;this.show(this.defaults.active)};this.gup=function(b){b=b.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var a="[\\?&]"+b+"=([^&#]*)";var c=new RegExp(a);var d=c.exec(window.location.href);if(d==null)return null;else return d[1]};this.parseurl=function(b){var a=this.gup(b);if(a==null)return null;if(parseInt(a))return parseInt(a);if(document.getElementById(a)){for(var c=0;c<this.tabs.length;c++){if(this.tabs[c].id==a)return(c+1)}}return null};this.createCookie=function(b,a,c){if(c){var d=new Date();d.setTime(d.getTime()+(c*24*60*60*1000));var f="; expires="+d.toGMTString()}else var f="";document.cookie=b+"="+a+f+"; path=/"};this.readCookie=function(b){var a=b+"=";var c=document.cookie.split(';');for(var d=0;d<c.length;d++){var f=c[d];while(f.charAt(0)==' ')f=f.substring(1,f.length);if(f.indexOf(a)==0)return f.substring(a.length,f.length)}return null};this.contains=function(b,a,c){return b.indexOf(a,c)!=-1};this.hasClass=function(b,a){return this.contains(b.className,a,' ')};this.addClass=function(b,a){if(!this.hasClass(b,a))b.className=(b.className+' '+a).replace(/\s{2,}/g,' ').replace(/^\s+|\s+$/g,'')};this.removeClass=function(b,a){b.className=b.className.replace(new RegExp('(^|\\s)'+a+'(?:\\s|$)'),'$1');b.className.replace(/\s{2,}/g,' ').replace(/^\s+|\s+$/g,'')};this.tabs=this.getTabs();this.defaults.active=(this.parseurl(this.defaults.id))?this.parseurl(this.defaults.id):this.defaults.active;if(this.defaults.persist&&this.readCookie(this.defaults.id))this.defaults.active=this.readCookie(this.defaults.id);this.activebackup=this.defaults.active;this.show(this.defaults.active);var e=this;for(var g=0;g<this.links.length;g++){this.links[g].customindex=g+1;this.links[g].onclick=function(){if(e.timer1)clearTimeout(e.timer1);if(e.timer2)clearTimeout(e.timer2);e.show(this.customindex);if(e.defaults.persist)e.createCookie(e.defaults.id,this.customindex,0);if(e.defaults.wait)e.timer2=setTimeout(function(){e.rotate(e.defaults.interval)},e.defaults.wait*1000);return false}}if(this.defaults.interval)this.rotate(this.defaults.interval)};