<?phpinclude_once("../db/dbconnection.php");$businessId = $_POST["businessId"];$category = $_POST["category"];$query = "DELETE FROM categories WHERE business_id='$businessId' AND category='$category'";mysqli_query($link, $query);//remove all category items to the new category$query = "SELECT * FROM category_items WHERE business_id='$businessId' AND category='$category'";if($result = mysqli_query($link, $query)) {	while($row = mysqli_fetch_array($result)) { //while loop to query each row of data		if(mysqli_num_rows($result)) {			$category_item = $row["category_item"];			$query = "DELETE FROM category_items WHERE business_id='$businessId' AND category='$category' AND category_item='$category_item'";			mysqli_query($link, $query);		}	}}?>