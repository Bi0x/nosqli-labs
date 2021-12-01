<?php
$manager=new MongoDB\Driver\Manager("mongodb://db_mongo_old:27017");
$name = $_GET['name'];
$passwd = $_GET['passwd'];

$cmd = "db.sqli.distinct('name',{'name':'".$name."', 'passwd':'".$passwd."'})";

$query=new MongoDB\Driver\Command([
  "eval" => $cmd
]);

try {
    $cursor = $manager->executeCommand('nosqli', $query);
} catch(MongoDB\Driver\Exception $e) {
    echo "Login Field!";
    exit;
}

$result = $cursor->toArray()[0]->retval;
print_r($result);
echo "<br />";

$count=count($result);
if($count > 0)
{
    foreach($result as $user)
    {  
        $user = ((array)$user);
        echo '====Login Successful====</br>';
        echo 'name:'.$user[0].'</br>';
    }
}
else{
    echo "Login Field!";
}
