<html>
  <head>
		<title>ResetDB</title>
	</head>
  <?php
    $manager = new MongoDB\Driver\Manager("mongodb://db_mongo:27017");
    try {
			echo "Resetting nosqli.sqli <br/>";
			$command =  new \MongoDB\Driver\Command(["drop" => "sqli"]);
			$result = $manager->executeCommand('nosqli', $command);
			echo "Collection sqli has dropped<br />\n";
		} catch (MongoDB\Driver\Exception\RuntimeException $e) {
			echo "Collection sqli not exists<br />\n";
		}

    $bulk = new MongoDB\Driver\BulkWrite;
		$bulk->insert([ "name" => 'bi0x', "age" => 21, "passwd" => "biox2333"]);
		$bulk->insert([ "name" => 'xux', "age" => 19, "passwd" => "xux2333"]);
		$bulk->insert([ "name" => 'peco', "age" => 21, "passwd" => "peco2333"]);
		$bulk->insert([ "name" => 'k0nashi', "age" => 22, "passwd" => "konashi2333"]);
		$result = $manager->executeBulkWrite('nosqli.sqli', $bulk);
		echo $result->getInsertedCount()." documents inserted\n";

  ?>
</html>