<?php 
	include ("../Database_files/DBConn.php");
	$query = "SELECT * from tblUser WHERE verified='n'";

	$result=mysqli_query($DBConn,$query);

	$i = 1; //counter for the checkboxes so that each has a unique name
	echo "<form action='../form_processing/verify_user_fp.php' method='POST'>"; //form started here
	echo "<table border='1'>
	<tr>
	<th>UserId</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Student Number</th>
	<th>Username</th>
	<th>Email</th>
	<th>Password</th>
	<th>Update</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['userID'] . "</td>";
		echo "<td>" . $row['fName'] . "</td>";
		echo "<td>" . $row['lName'] . "</td>";
		echo "<td>" . $row['studNum'] . "</td>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['pwd'] . "</td>";

		echo "<td><input type='checkbox' name='check[$i]' value='".$row['userID']."'/>";   
		echo "</tr>";
		$i++;
	}

	echo "</table>";
	echo "<input type='submit' name='approve' value='approve'/>";
	echo "</form>";

	mysqli_close($DBConn);
?>