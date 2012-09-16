<?php
define ("DBHOST","localhost");
define ("DBUSER","dbuser);
define ("DBPASS","YourPassWord");
define ("DBNAME","dbname");

define ("DBPREFIX","ninerr_");
define ("CHAR_SET","utf8");
define ("CACHEDIR","");
define ("SITE_AMMOUNT","10");
define ("COMMISSION_AMMOUNT","1");
define ("SITE_NAME","Biverr:The Awesome Fiverr Clone");
define ("SITE_TITLE",ucfirst(SITE_NAME)." Fiverr Clone Script");
define ("SITE_MAIL","admin@yoursite.com");
// mod for error reporting
class JConfig {
var $debug = '-1';
var $error_reporting = '-1';
}

?>