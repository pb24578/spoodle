<?phpinclude_once("../db/dbconnection.php");$businessId = $_POST["businessId"];$oldCategory = $_POST["oldCategory"];$newCategory = $_POST["newCategory"];$query = "UPDATE categories SET category='$newCategory' WHERE business_id='$businessId' AND category='$oldCategory'";mysqli_query($link, $query);//update all category items to the new category$query = "SELECT * FROM category_items WHERE business_id='$businessId' AND category='$oldCategory'";if($result = mysqli_query($link, $query)) {	while($row = mysqli_fetch_array($result)) { //while loop to query each row of data		if(mysqli_num_rows($result)) {			$category_item = $row["category_item"];			$query = "UPDATE category_items SET category='$newCategory' WHERE business_id='$businessId' AND category='$oldCategory' AND category_item='$category_item'";			mysqli_query($link, $query);		}	}}?>