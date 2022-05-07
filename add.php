
<?php

//add.php

include('db.php');

if(isset($_POST["product"]))
{
	$category_name = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["product"]);

	$data = array(
		':product'	=>	$category_name
	);

	$query = "SELECT * FROM fproduct WHERE product = :product";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	if($statement->rowCount() == 0)
	{
		$query = "INSERT INTO fproduct (product) VALUES (:product)";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		echo 'yes';
	}
}

?>