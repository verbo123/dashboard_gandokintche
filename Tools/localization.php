<?php
error_reporting(E_ALL | E_STRICT);

//// define constants
//define('PROJECT_DIR', realpath('./'));
//define('LOCALE_DIR', PROJECT_DIR .'/locale');
//define('DEFAULT_LOCALE', 'fr_FR');
//
//require('lib/gettext/gettext.inc');
//
//$supported_locales = array('en_US', 'fr_FR');
//$encoding = 'UTF-8';
//
//$locale = (isset($_GET['lang']))? $_GET['lang'] : DEFAULT_LOCALE;
//
//// gettext setup
//T_setlocale(LC_MESSAGES, $locale);
//// Set the text domain as 'messages'
//$domain = 'messages';
//bindtextdomain($domain, LOCALE_DIR);
//
//
//// bind_textdomain_codeset is supported only in PHP 4.2.0+
//if (function_exists('bind_textdomain_codeset'))
//    bind_textdomain_codeset($domain, $encoding);
//textdomain($domain);
//
//header("Content-type: text/html; charset=$encoding");
//
//

require('lib/gettext/streams.php');
require('lib/gettext/gettext.php');
define('DEFAULT_LOCALE', 'fr_FR');

$locale_lang=(isset($_COOKIE['lang']))? $_COOKIE['lang'] : DEFAULT_LOCALE;
$locale_file=new FileReader("locale/$locale_lang/LC_MESSAGES/messages.mo");
$locale_fetch=new gettext_reader($locale_file);

function ma_tra($text)
{
    global $locale_fetch;
    return $locale_fetch->translate($text);
}



