# Joomla Content Security Policy Plugin
A Joomla Content Security Policy Plugin

## Installing
1. Copy files onto Joomla install
2. In the administrator area, click on "Extentions" -> "Manage" -> "Discover"
3. Install the "Content Security Policy"
4. In the plug-in manager, enable "System - Content Security Policy"

## Workflow
This is pretty much based on a site admin work-flow like...
1. Set the site to `content="default-src 'self'; `
2. See what's broken
3. Fix broken things one at a time, like  `content="default-src 'self'; script-src 'self' *.google-analytics.com "`  to let google analytics work.

In practice an admin would probably do this with `Content-Security-Policy-Report-Only` and just review the reports.

## Related docs...
* https://www.itoctopus.com/how-content-security-policy-can-help-protect-your-joomla-website
* https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP

## See also...
* https://github.com/joomla/joomla-cms/issues/14246
* https://github.com/joomla/joomla-cms/pull/18301

## Options screen
![options screen](http://ssofb.co.uk/images/Plugins_System_-_CSP_-_joomla_dev_01_-_Administration_-_2017-11-06_23.27.54.png "Options Screen")

## Handy to paste...
* cp -v /var/www/html/joomla_dev_01/plugins/system/contentsecuritypolicy/* plugins/system/contentsecuritypolicy/
* cp -v /var/www/html/joomla_dev_01/administrator/language/en-GB/en-GB.plg_system_contentsecuritypolicy.*  administrator/language/en-GB/



