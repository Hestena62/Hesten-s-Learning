// Description: Tracking code for OWA
// Version: 1.0
// Date: 2016-06-30

//<![CDATA[
var owa_baseUrl = 'http://www.hestena62.com/owa/';
var owa_cmds = owa_cmds || [];
owa_cmds.push(['setSiteId', '12c559d967e574d90cf369f1a0f43fe3']);
owa_cmds.push(['trackPageView']);
owa_cmds.push(['trackClicks']);

(function() {
    var _owa = document.createElement('script'); _owa.type = 'text/javascript'; _owa.async = true;
    owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl );
    _owa.src = owa_baseUrl + 'modules/base/dist/owa.tracker.js';
    var _owa_s = document.getElementsByTagName('script')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
}());
//]]>