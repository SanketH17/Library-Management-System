<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<style type="text/css">
		.srch
		{
			padding-left: 1000px
		}

	</style>
</head>
<body>
	<!-- __________________________ SEARCH BAR _____________________ -->

		<div class="srch">
			<form class="navbar-form" method="post" name="form1">
				
					<input class="form-control" type="text" name="search" placeholder="search books here" required="">
					<button style="background-color:#d0cd97" type="submit" name="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
						
					</button>
				
				
			</form>
		</div>


	<h2>List Of Books</h2>
	<?php /* if we search something for books we need to show only that particular book to the user not all */

		if(isset($_POST['submit'])) /* isset = to check whether the button is pressed or not */
		{
			$q=mysqli_query($db, "SELECT * from books where name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q) == 0) /* to check the number of matching rows with the name which user has entered 
			> if no data that is rows doesn't match with the user entered name then the nno of rows will be zero */
			{
				echo "Sorry !! :( No books found. Try again" ;
			}

/*___________________________________________________________________________*/

			/* If any row found we show it inside the table */
			else
			{
				echo "<table class='table table-bordered table-hover' >"; /* designing by the Bootstrap classes*/
			echo "<tr style='background-color: #d0cd97;'>"; /*Table row tag*/
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";   /*Table header tag*/
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q)) //Data will be written inside the while loop
			// This will fetch all te rows in that table  
			{
				echo "<tr>"; //Table row
				echo "<td>"; echo $row['bid']; echo "</td>"; //Table data tag
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}

/*_____________________________________________________________________________-*/


		/* ___________ if the button is not pressed _________*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;"); /* To select the whole table from the database */

		echo "<table class='table table-bordered table-hover' >"; /* designing by the Bootstrap classes*/
			echo "<tr style='background-color: #d0cd97;'>"; /*Table row tag*/
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";   /*Table header tag*/
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res)) //Data will be written inside the while loop
			// This will fetch all te rows in that table  
			{
				echo "<tr>"; //Table row
				echo "<td>"; echo $row['bid']; echo "</td>"; //Table data tag
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

	?>
</body>
</html>