<?php
include "admin/includes/db.php"; 
function mycode() {
		 function myFunction() {
			
			 
            
			 $error = '<div id="myerror" class="alert alert-success alert-dismissible border border-warning" style="width:70%;margin-left:auto;margin-right:auto;">';
             $error .= '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
             $error .= '<strong>Alert!</strong> Search Can not be empty.';
             $error .=  '</div><br /><br />';
			 echo $error;

		 }
 
  if (isset($_POST['search'])) {
	  $search_txt = $_POST['search'];
	  $page = $_GET['path'];
	  $page;
	  
	  if (!empty($search_txt)) {
		 
		 global $con;
		 try {
		 $query = "SELECT * FROM posts WHERE post_title LIKE '%$search_txt%'";
		 }		 
		 catch(Exception $e) {
			 echo "No result found " . $e-> getMessage();
		 }
		 

			
			
		$res = mysqli_query($con, $query);
					 
		if($res->num_rows == 0) {
				echo "No Result Found";
		}
		 while ($row = mysqli_fetch_assoc($res)){
			 echo "<hr>";
			 echo "<pre>";
		 print_r($row);
		 echo "</pre>";

		 }
		 
	  } else {
		 echo "Search Can't be empty";
		 header("Location:". $page . "?search=rejcted");
         return myFunction();

	  }
	  
	  
	  
  }
}

mycode();

?>
