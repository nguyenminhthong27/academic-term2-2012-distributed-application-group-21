function gaia_parseFragment() {
  var hash = location.hash;
  var params = {};
  if (!hash) {
  return params;
  }
  var paramStrs = decodeURIComponent(hash.substring(1)).split('&');
  for (var i = 0; i < paramStrs.length; i++) {
      var param = paramStrs[i].split('=');
      params[param[0]] = param[1];
    }
    return params;
  }

  function gaia_prefillEmail() {
    var f = null;
    if (document.getElementById) {
      f = document.getElementById('gaia_loginform');
    }

    if (f && f.Email && (f.Email.value == null || f.Email.value == '')
        && (f.Email.type != 'hidden')) {
      hashParams = gaia_parseFragment();
      if (hashParams['Email'] && hashParams['Email'] != '') {
        f.Email.value = hashParams['Email'];
      }
    }
  }
gaia_appendParam = function(url, name, value) {
  var param = encodeURIComponent(name) + '=' + encodeURIComponent(value);
  if (url.indexOf('?') >= 0) {
  return url + '&' + param;
  } else {
  return url + '?' + param;
  }
  };
  var langChooser = document.getElementById('lang-chooser');
  if (langChooser) {
  var langChooserParam = 'hl';
  var langChooserUrl = '\x2FServiceLogin?service=mail\x26passive=true\x26rm=false\x26continue=https%3A%2F%2Fmail.google.com%2Fmail%2F\x26ss=1\x26scc=1\x26ltmpl=default\x26ltmplcache=2';
  langChooser.style.display = '';
  langChooser.onchange = function() {
  window.location.href =
  gaia_appendParam(langChooserUrl, langChooserParam, this.value);
  };
  }
</script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-992684-1']);
_gaq.push(['_setDomainName', 'accounts.google.com']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_addIgnoredRef', 'mail.google.com']);
_gaq.push(['_setAllowAnchor', true]);
_gaq.push(['_trackPageview', '/mail/homepage']);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript';
  ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' :
  'http://www') + '.google-analytics.com/ga.js';
  (document.getElementsByTagName('head')[0] ||
  document.getElementsByTagName('body')[0]).appendChild(ga);
})();
</script>
  <script type="text/javascript">
var BrowserSupport_={IsBrowserSupported:function(){var agt=navigator.userAgent.toLowerCase();var is_op=agt.indexOf("opera")!=-1;var is_ie=agt.indexOf("msie")!=-1&&document.all&&!is_op;var is_ie5=agt.indexOf("msie 5")!=-1&&document.all&&!is_op;var is_mac=agt.indexOf("mac")!=-1;var is_gk=agt.indexOf("gecko")!=-1;var is_sf=agt.indexOf("safari")!=-1;if(is_ie&&!is_op&&!is_mac){if(agt.indexOf("palmsource")!=
-1||agt.indexOf("regking")!=-1||agt.indexOf("windows ce")!=-1||agt.indexOf("j2me")!=-1||agt.indexOf("avantgo")!=-1||agt.indexOf(" stb")!=-1)return false;var v=BrowserSupport_.GetFollowingFloat(agt,"msie ");if(v!=null)return v>=5.5}if(is_gk&&!is_sf){var v=BrowserSupport_.GetFollowingFloat(agt,"rv:");if(v!=null)return v>=1.4;else{v=BrowserSupport_.GetFollowingFloat(agt,"galeon/");if(v!=null)return v>=
1.3}}if(is_sf){if(agt.indexOf("rv:3.14.15.92.65")!=-1)return false;var v=BrowserSupport_.GetFollowingFloat(agt,"applewebkit/");if(v!=null)return v>=312}if(is_op){if(agt.indexOf("sony/com1")!=-1)return false;var v=BrowserSupport_.GetFollowingFloat(agt,"opera ");if(v==null)v=BrowserSupport_.GetFollowingFloat(agt,"opera/");if(v!=null)return v>=8}if(agt.indexOf("pda; sony/com2")!=-1)return true;return false},
GetFollowingFloat:function(str,pfx){var i=str.indexOf(pfx);if(i!=-1){var v=parseFloat(str.substring(i+pfx.length));if(!isNaN(v))return v}return null}};var is_browser_supported=BrowserSupport_.IsBrowserSupported()
  </script>
<script type=text/javascript>
<!--

var start_time = (new Date()).getTime();

if (top.location != self.location) {
 top.location = self.location.href;
}

function SetGmailCookie(name, value) {
  document.cookie = name + "=" + value + ";path=/;domain=.google.com";
}

function lg() {
  var now = (new Date()).getTime();

  var cookie = "T" + start_time + "/" + start_time + "/" + now;
  SetGmailCookie("GMAIL_LOGIN", cookie);
}

function gaiacb_onLoginSubmit() {
  lg();
  if (!fixed) {
    FixForm();
  }
  return true;
}

function StripParam(url, param) {
  var start = url.indexOf(param);
  if (start == -1) return url;
  var end = start + param.length;

  var charBefore = url.charAt(start-1);
  if (charBefore != '?' && charBefore != '&') return url;

  var charAfter = (url.length >= end+1) ? url.charAt(end) : '';
  if (charAfter != '' && charAfter != '&' && charAfter != '#') return url;
  if (charBefore == '&') {
  --start;
  } else if (charAfter == '&') {
  ++end;
  }
  return url.substring(0, start) + url.substring(end);
}
var fixed = 0;
function FixForm() {
  if (is_browser_supported) {
  var form = el("gaia_loginform");
  if (form && form["continue"]) {
  var url = form["continue"].value;
  url = StripParam(url, "ui=html");
  url = StripParam(url, "zy=l");
  form["continue"].value = url;
  }
  }
  fixed = 1;
}
function el(id) {
  if (document.getElementById) {
  return document.getElementById(id);
  } else if (window[id]) {
  return window[id];
  }
  return null;
}
// Estimates of nanite storage generation over time.
var CP = [
 [ 1224486000000, 7254 ],
 [ 1335290400000, 7704 ],
 [ 1335376800000, 10240 ],
 [ 2144908800000, 13531 ],
 [ 2147328000000, 43008 ],
 [ 46893711600000, Number.MAX_VALUE ]
];
var quota_elem;
var ONE_PX = "https://mail.google.com/mail/images/c.gif?t=" +
  (new Date()).getTime();
function LogRoundtripTime() {
  var img = new Image();
  var start = (new Date()).getTime();
  img.onload = GetRoundtripTimeFunction(start);
  img.src = ONE_PX;
}
function GetRoundtripTimeFunction(start) {
  return function() {
  var end = (new Date()).getTime();
  SetGmailCookie("GMAIL_RTT", (end - start));
  }
}
function MaybePingUser() {
  var f = el("gaia_loginform");
  if (f.Email.value) {
  new Image().src = 'https://mail.google.com/mail?gxlu=' +
  encodeURIComponent(f.Email.value) +
  '&zx=' + (new Date().getTime());
  }
}
function OnLoad() {
  gaia_setFocus();
  MaybePingUser();
  var passwd_elem = el("Passwd");
  if (passwd_elem) {
  passwd_elem.onfocus = MaybePingUser;
  }
  LogRoundtripTime();
  if (!quota_elem) {
  quota_elem = el("quota");
  updateQuota();
  }
  LoadConversionScript();
}
function updateQuota() {
  if (!quota_elem) {
  return;
  }
  var now = (new Date()).getTime();
  var i;
  for (i = 0; i < CP.length; i++) {
    if (now < CP[i][0]) {
      break;
    }
  }
  if (i == 0) {
    setTimeout(updateQuota, 1000);
  } else if (i == CP.length) {
    quota_elem.innerHTML = CP[i - 1][1];
  } else {
    var ts = CP[i - 1][0];
    var bs = CP[i - 1][1];
    quota_elem.innerHTML = format(((now-ts) / (CP[i][0]-ts) * (CP[i][1]-bs)) + bs);
    setTimeout(updateQuota, 1000);
  }
}

var PAD = '.000000';

function format(num) {
  var str = String(num);
  var dot = str.indexOf('.');
  if (dot < 0) {
     return str + PAD;
  } if (PAD.length > (str.length - dot)) {
  return str + PAD.substring(str.length - dot);
  } else {
  return str.substring(0, dot + PAD.length);
  }
}
var google_conversion_type = 'landing';
var google_conversion_id = 1069902127;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "FFFFFF";
function LoadConversionScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "https://www.googleadservices.com/pagead/conversion.js";
}

  
  try {
    gaia_prefillEmail();
  } catch (e) {
  }


  
  function gaia_setFocus() {
    var f = null;
    if (document.getElementById) {
      f = document.getElementById('gaia_loginform');
    }
    if (f) {
      if (f.Email && (f.Email.value == null || f.Email.value == '')
          && (f.Email.type != 'hidden') && f.Email.focus) {
        f.Email.focus();
      } else if (f.Passwd) {
        f.Passwd.focus();
      }
    }
  }
  window.onload = gaia_setFocus;

  function gaia_onLoginSubmit() {
    
    
    if (window.gaiacb_onLoginSubmit) {
      return gaiacb_onLoginSubmit();
    } else {
      return true;
    }
  }
  document.getElementById('gaia_loginform').onsubmit = gaia_onLoginSubmit;

  
  
    var Ga=!0,Gb=null,G=!1,Gc;var Ge=function(a,b){var c=a;a&&"string"==typeof a&&(c=document.getElementById(a));if(b&&!c)throw new Gd(a);return c},Gd=function(a){this.id=a;this.toString=function(){return"No element found for id '"+this.id+"'"}};var Gf={},Gg;Gg=window.addEventListener?function(a,b,c){var d=function(a){var b=c.call(this,a);G===b&&Gh(a);return b},a=Ge(a,Ga);a.addEventListener(b,d,G);Gi(a,b).push(d);return d}:window.attachEvent?function(a,b,c){var a=Ge(a,Ga),d=function(){var b=window.event,d=c.call(a,b);G===d&&Gh(b);return d};a.attachEvent("on"+b,d);Gi(a,b).push(d);return d}:void 0;var Gh=function(a){a.preventDefault?a.preventDefault():a.returnValue=G;return G};var Gi=function(a,b){Gf[a]=Gf[a]||{};Gf[a][b]=Gf[a][b]||[];return Gf[a][b]};var Gj=function(){try{return new XMLHttpRequest}catch(a){for(var b=["MSXML2.XMLHTTP.6.0","MSXML2.XMLHTTP.3.0","MSXML2.XMLHTTP","Microsoft.XMLHTTP"],c=0;c<b.length;c++)try{return new ActiveXObject(b[c])}catch(d){}}return Gb},Gk=function(){this.g=Gj();this.c={}};Gk.prototype.h=function(){};
Gk.prototype.send=function(a){var b=[],c;for(c in this.c){var d=this.c[c];b.push(c+"="+encodeURIComponent(d))}var b=b.join("&"),e=this.g,f=this.h;e.open("POST",a,Ga);e.setRequestHeader("Content-type","application/x-www-form-urlencoded");e.setRequestHeader("Content-length",""+b.length);e.onreadystatechange=function(){4==e.readyState&&f({status:e.status,text:e.responseText})};e.send(b)};
Gk.prototype.p=function(a){var b=this.h,c=this.g;c.open("GET",a,Ga);c.onreadystatechange=function(){4==c.readyState&&b({status:c.status,text:c.responseText})};c.send()};var Gm=function(a){this.i=a;this.q=this.r();if(this.i==Gb)throw new Gl("Empty module name");};Gc=Gm.prototype;Gc.r=function(){var a=window.location.pathname;return a&&0==a.indexOf("/accounts")?"/accounts/JsRemoteLog":"/JsRemoteLog"};
Gc.o=function(a,b,c){for(var d=this.q,e=this.i||"",d=d+"?module="+encodeURIComponent(e),a=a||"",d=d+"&type="+encodeURIComponent(a),b=b||"",d=d+"&msg="+encodeURIComponent(b),c=c||[],a=0;a<c.length;a++)d=d+"&arg="+encodeURIComponent(c[a]);try{var f=Math.floor(1E4*Math.random()),d=d+"&r="+(""+f)}catch(g){}return d};Gc.send=function(a,b,c){var d=new Gk;d.c={};try{var e=this.o(a,b,c);d.p(e)}catch(f){}};Gc.a=function(a,b){this.send("ERROR",a,b)};
Gc.j=function(a){var b=this;return function(){try{return a.apply(Gb,arguments)}catch(c){throw b.a("Uncatched exception: "+c),c;}}};var Gl=function(){};var Gn=Gn||new Gm("uri"),Go=RegExp("^(?:([^:/?#.]+):)?(?://(?:([^/?#]*)@)?([\\w\\d\\-\\u0100-\\uffff.%]*)(?::([0-9]+))?)?([^?#]+)?(?:\\?([^#]*))?(?:#(.*))?$"),Gp=function(a,b){return b.match(Go)[a]||Gb},Gq=function(a){return"http"==a.toLowerCase()?80:"https"==a.toLowerCase()?443:Gb},Gr=function(a,b){var c=Gp(1,b),d,e=Gp(3,b);d=e&&decodeURIComponent(e);e=Number(Gp(4,b))||Gb;if(!c||!d)return Gn.a("Invalid origin Exception",[""+b]),G;e||(e=Gq(c));var f=Gp(1,a);if(!f||f.toLowerCase()!=c.toLowerCase())return G;
c=(c=Gp(3,a))&&decodeURIComponent(c);if(!c||c.toLowerCase()!=d.toLowerCase())return G;(d=Number(Gp(4,a))||Gb)||(d=Gq(f));return e==d};var Gs=Gs||new Gm("check_connection"),Gt="^([^:]+):(\\d*):(\\d?)$",Gu=Gb,Gv=Gb,Gw=Gb,Gx=function(a,b){this.e=a;this.d=b;this.b=G};Gc=Gx.prototype;Gc.k=function(a,b){if(!b)return G;if(0<=a.indexOf(","))return Gs.a("CheckConnection result contains comma",[a]),G;var c=b.value;b.value=c?c+","+a:a;return Ga};Gc.f=function(a){return this.k(a,Gv)};Gc.m=function(a){return this.k(a,Gw)};Gc.l=function(a){a=a.match(Gt);return!a||3>a.length?Gb:a[1]};
Gc.t=function(a,b){if(!Gr(this.e,a))return G;if(this.b||!b)return Ga;"accessible"==b?(this.f(a),this.b=Ga):this.l(b)==this.d&&(this.m(b)||this.f(a),this.b=Ga);return Ga};Gc.s=function(){var a;a=this.e;var b="timestamp",c=""+(new Date).getTime();if(0<a.indexOf("#"))throw Object("Unsupported URL Exception: "+a);return a=0<=a.indexOf("?")?a+"&"+encodeURIComponent(b)+"="+encodeURIComponent(c):a+"?"+encodeURIComponent(b)+"="+encodeURIComponent(c)};
Gc.n=function(){var a=window.document.createElement("iframe"),b=a.style;b.visibility="hidden";b.width="1px";b.height="1px";b.position="absolute";b.top="-100px";a.src=this.s();a.id=this.d;Gu.appendChild(a)};
var Gy=function(a){return function(b){for(var c=b.origin.toLowerCase(),b=b.data,d=a.length,e=0;e<d&&!a[e].t(c,b);e++);}},Gz=function(){if(window.postMessage){var a;a=window.__CHECK_CONNECTION_CONFIG.iframeParentElementId;var b=window.__CHECK_CONNECTION_CONFIG.connectivityElementId,c=window.__CHECK_CONNECTION_CONFIG.newResultElementId;(Gu=document.getElementById(a))?(b&&(Gv=document.getElementById(b)),c&&(Gw=document.getElementById(c)),!Gv&&!Gw?(Gs.a("Unable to locate the input element to storeCheckConnection result",
["old id: "+b,"new id: "+c]),a=G):a=Ga):(Gs.a("Unable to locate the iframe anchor to append connection test iframe",["element id: "+a]),a=G);if(a){a=window.__CHECK_CONNECTION_CONFIG.domainConfigs;if(!a){if(!window.__CHECK_CONNECTION_CONFIG.iframeUri){Gs.a("Missing iframe URL in old configuration");return}a=[{iframeUri:window.__CHECK_CONNECTION_CONFIG.iframeUri,domainSymbol:"youtube"}]}if(0!=a.length){for(var b=a.length,c=[],d=0;d<b;d++)c.push(new Gx(a[d].iframeUri,a[d].domainSymbol));Gg(window,"message",
Gy(c));for(d=0;d<b;d++)c[d].n()}}}},GA=function(){if(window.__CHECK_CONNECTION_CONFIG){var a=window.__CHECK_CONNECTION_CONFIG.postMsgSupportElementId;if(window.postMessage){var b=document.getElementById(a);b?b.value="1":Gs.a("Unable to locate the input element to storepostMessage test result",["element id: "+a])}}};G_checkConnectionMain=Gs.j(Gz);G_setPostMessageSupportFlag=Gs.j(GA);


    window.__CHECK_CONNECTION_CONFIG = {
      
      
        newResultElementId: 'checkConnection',
        domainConfigs: [{iframeUri: 'https://accounts.youtube.com/accounts/CheckConnection?pmpo\75https%3A%2F%2Faccounts.google.com\46v\075255656690',domainSymbol: 'youtube'}],
      

      
      iframeUri: '',
      
      iframeOrigin: '',
      
      connectivityElementId: 'dnConn',
      
      iframeParentElementId: 'cc_iframe_parent',
      
      postMsgSupportElementId: 'pstMsg',
      
      msgContent: 'accessible'
    };

    G_setPostMessageSupportFlag();
    G_checkConnectionMain();
  
window.onload = function() {
  OnLoad();
  FixForm();
}
  

  

  
