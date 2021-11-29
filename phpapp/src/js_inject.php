<?php
$manager = new MongoDB\Driver\Manager("mongodb://db_mongo:27017");
$name = $_GET['name'];
$passwd = $_GET['passwd'];
$function = "
function() {
    var name = '".$name."';
    var passwd = '".$passwd."';
    if(this.name == name && this.passwd == passwd) return true;
    else return false;
}";
$query = new MongoDB\Driver\Query(array(
    '$where' => $function
));
$result = $manager->executeQuery('nosqli.sqli', $query)->toArray();

$count = count($result);
if ($count>0) {
    foreach ($result as $user) {
        $user=(array)$user;
        echo '====Login Success====<br>';
        echo 'username: '.$user['name']."<br>";
        echo 'password: '.$user['passwd']."<br>";
    }
}
else{
    echo 'Login Failed';
}
?>
