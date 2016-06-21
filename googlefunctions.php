<?php

require_once __DIR__ . '/vendor/autoload.php';


define('APPLICATION_NAME', 'Google Code');
define('CREDENTIALS_PATH', '~/.credentials/admin-directory_v1-php-quickstart.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/admin-directory_v1-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Directory)
));

if (php_sapi_name() != 'cli') {
  throw new Exception('This application must be run on the command line.');
}


$dir = new Google_Service_Directory($client);
// SET UP THE USER/USERNAME OBJECTS
$user = new Google_Service_Directory_User();
$name = new Google_Service_Directory_UserName();
$new_person = array();
// SET THE ATTRIBUTES
$name->setGivenName('Tester');
$name->setFamilyName('Testerton');
$user->setName($name);
$user->setHashFunction("SHA-1");
$user->setPrimaryEmail("testy.testerton@lumapictures.com");
$user->setPassword(hash("sha1","Testing123"));
// the JSON object shows us that externalIds is an array, so that's how we set it here
$user->setExternalIds(array("value"=>28790,"type"=>"custom","customType"=>"EmployeeID"));
result = $dir->users->insert($user);
echo "New user ".$result->primaryEmail." created successfully."
?>