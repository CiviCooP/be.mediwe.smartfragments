<?php

/*BEGINPHP*/
if (PHP_SAPI === "cli") {
  $_SERVER["SCRIPT_FILENAME"] = '/home/klaas/buildkit/build/mediwe/index.php';
  $_SERVER["REMOTE_ADDR"] = '127.0.0.1';
  $_SERVER["SERVER_SOFTWARE"] = NULL;
  $_SERVER["REQUEST_METHOD"] = 'GET';
  $_SERVER["SCRIPT_NAME"] = '/home/klaas/buildkit/bin/cv';
}
$GLOBALS['_CV'] = array (
  'ADMIN_EMAIL' => 'admin@example.com',
  'ADMIN_PASS' => 'mafsMIxwChIR',
  'ADMIN_USER' => 'admin',
  'CIVI_CORE' => '/home/klaas/buildkit/build/mediwe/sites/all/modules/civicrm/',
  'CIVI_DB_ARGS' => '-h 127.0.0.1 -u mediwecivi_6zryc -pmediwecivi_6zryc -P 3306 mediwecivi_6zryc',
  'CIVI_DB_DSN' => 'mysql://mediwecivi_6zryc:VMM15Giyr7Du7b9o@127.0.0.1:3306/mediwecivi_6zryc?new_link=true',
  'CIVI_DB_HOST' => '127.0.0.1',
  'CIVI_DB_NAME' => 'mediwecivi_6zryc',
  'CIVI_DB_PASS' => 'VMM15Giyr7Du7b9o',
  'CIVI_DB_PORT' => 3306,
  'CIVI_DB_USER' => 'mediwecivi_6zryc',
  'CIVI_FILES' => '/home/klaas/buildkit/build/mediwe/sites/default/files/civicrm/',
  'CIVI_SETTINGS' => '/home/klaas/buildkit/build/mediwe/sites/default/civicrm.settings.php',
  'CIVI_SITE_KEY' => 'hZPPJns3gubNG0Fq',
  'CIVI_TEMPLATEC' => '/home/klaas/buildkit/build/mediwe/sites/default/files/civicrm/templates_c/',
  'CIVI_UF' => 'Drupal',
  'CIVI_VERSION' => '4.7.29',
  'CMS_DB_ARGS' => '-h 127.0.0.1 -u mediwecms_vidp0 -pmediwecms_vidp0 -P 3306 mediwecms_vidp0',
  'CMS_DB_DSN' => 'mysql://mediwecms_vidp0:U1Nb8QG3VTtrKhPy@127.0.0.1:3306/mediwecms_vidp0?new_link=true',
  'CMS_DB_HOST' => '127.0.0.1',
  'CMS_DB_NAME' => 'mediwecms_vidp0',
  'CMS_DB_PASS' => 'U1Nb8QG3VTtrKhPy',
  'CMS_DB_PORT' => 3306,
  'CMS_DB_USER' => 'mediwecms_vidp0',
  'CMS_ROOT' => '/home/klaas/buildkit/build/mediwe/',
  'CMS_TITLE' => 'mediwe',
  'CMS_URL' => 'http://mediwe.l/',
  'CMS_VERSION' => '',
  'DEMO_EMAIL' => 'demo@example.com',
  'DEMO_PASS' => 'demo',
  'DEMO_USER' => 'demo',
  'EXT_DLS' => '',
  'IS_INSTALLED' => '',
  'SITE_TOKEN' => 'vY5iqkZRtDdOHf3z',
  'SITE_TYPE' => 'drupal-clean',
  'TEST_DB_ARGS' => '-h 127.0.0.1 -u mediwetest_mvs38 -pmediwetest_mvs38 -P 3306 mediwetest_mvs38',
  'TEST_DB_DSN' => 'mysql://mediwetest_mvs38:4787V90uDvdPv9fk@127.0.0.1:3306/mediwetest_mvs38?new_link=true',
  'TEST_DB_HOST' => '127.0.0.1',
  'TEST_DB_NAME' => 'mediwetest_mvs38',
  'TEST_DB_PASS' => '4787V90uDvdPv9fk',
  'TEST_DB_PORT' => 3306,
  'TEST_DB_USER' => 'mediwetest_mvs38',
  'WEB_ROOT' => '/home/klaas/buildkit/build/mediwe',
);
define("CIVICRM_SETTINGS_PATH", '/home/klaas/buildkit/build/mediwe/sites/default/civicrm.settings.php');
$error = @include_once CIVICRM_SETTINGS_PATH;
if ($error == FALSE) {
  throw new \Exception("Could not load the CiviCRM settings file: {$settings}");
}
require_once $GLOBALS["civicrm_root"] . "/CRM/Core/ClassLoader.php";
\CRM_Core_ClassLoader::singleton()->register();\CRM_Core_Config::singleton();\CRM_Utils_System::loadBootStrap(array(), FALSE);
/*ENDPHP*/



print_r(CRM_Smartfragments_TextFragment::listApplications());
