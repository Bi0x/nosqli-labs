<?php
error_reporting(0);
$manager=new MongoDB\Driver\Manager("mongodb://db_mongo:27017");
$name = $_GET['name'];
$passwd = $_GET['passwd'];

$query=new MongoDB\Driver\Query(array(
    "name" => $name,
    "passwd" => $passwd
));

$result = $manager->executeQuery('nosqli.sqli',$query);
$count=count($result);
if($count > 0)
{
    foreach($result as $user)
    {  
        $user = ((array)$user);
        echo '====Login Successful====</br>';
        echo 'name:'.$user['name'].'</br>';
        echo 'passwd:'.$user['passwd'].'</br>';
    }
}
else{
    echo "Login Failed!";
}
