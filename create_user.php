<?php

/*
 * change password example
 *
 */

/** HMail Server configuration variables */
$hmail_admin_password = '';
$hmail_admin_name = 'Administrator';
$hmail_server_name = '';

/** Optional Variables */
$hmail_domain_name = "example.com"; //Domain name to create the email address on
$hmail_new_user = 'test'; //new email address, before the @ sign
$hmail_new_pass = 'test123'; //new mailbox password
$hmail_new_size = 256; //Size is mb for the new mailbox

/** Connect to the HMail Server */
require_once('hmail_connect.php');

/** Ensure the domain exists */
$obDomain = $hCOMApp->Domains->ItemByName($hmail_domain_name);

if(!isset($obDomain)){
    die('Domain name does not exist within HMail Server');
}

/** Create Mailbox with minimal input values */
$obAccounts = $obDomain->Accounts();
$obAccount = $obAccounts->Add();

$obAccount->Address = $hmail_new_user . "@" . $obDomain->Name;
$obAccount->Password = $hmail_new_pass;
$obAccount->Active = 1;

$obAccount->MaxSize = $hmail_new_size;
$obAccount->Save();