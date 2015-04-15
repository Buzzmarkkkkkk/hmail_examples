<?php

if(!class_exists('COM')) {
    die('COM');
}

if (!empty($hmail_server_name) && ! (bool) ini_get('com.allow_dcom')) {
    die('COM functions are disabled. Please turn on DCOM support with com.allow_dcom setting in php.ini.');
}

/** Determine if COM object is local or remote*/
if (!empty($cpw_hmailserver_server_name)) {
    /** Remote */
    $hCOMApp = new COM("hMailServer.Application", $hmail_server_name);
    $hCOMUtils = new COM("hMailServer.Utilities", $hmail_server_name);
} else {
    /** Local */
    $hCOMApp = new COM("hMailServer.Application");
    $hCOMUtils = new COM("hMailServer.Utilities");
}

/** hMailServer 4.3+ authentication */
if (! empty($hmail_admin_password)) {
    $hCOMApp->Authenticate($hmail_admin_name, $hmail_admin_password);
}