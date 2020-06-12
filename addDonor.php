<!DOCTYPE html>

<html>

<head>
 <title>Add Donor</title>
 <link rel="stylesheet" href="styleSheet.css">
</head>

<body>
    <?php include('header.html'); ?>
	<h1>➕ Add Blood Donor</h1>
        
        <?php
        if(isset($_POST['add'])){
            $queryInsert = "INSERT INTO donors ( Fname, Lname, Age, PhoneNumber, Address, Gender, BloodType ) VALUES ( '{$_POST['fname']}', '{$_POST['lname']}', {$_POST['age']}, {$_POST['phoneNumber']}, '{$_POST['address']}', '{$_POST['gender']}', '{$_POST['bloodType']}' )";

            if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
              die( "Could not connect to database </body></html>" );

            if ( !mysqli_select_db( $database, "hospital" ) )
                 die( "Could not open products database </body></html>" );

            if ( !( mysqli_query( $database, $queryInsert ) ) )  {
                  print( "<p>Could not execute query!</p>" );
                  die( mysqli_error() . "</body></html>" );
            }

            mysqli_close( $database );
            
			echo '<script>alert("Donor added successfully !")</script>';
        }
        ?>
        
	<form method="POST" action="addDonor.php" class="form">
	
		<table>
			<tr>
				<td>First Name:</td> <td><input type="text" name="fname" /></td>
			</tr>
			<tr>
				<td>Last Name:</td> <td> <input type="text" name="lname" /></td>
			</tr>
			<tr>
				<td>Age:</td> <td><input type="number" name="age" /></td>
			</tr>
			<tr>
				<td>Phone Number:</td> <td><input type="number" name="phoneNumber" /></td>
			</tr>
			<tr>
				<td>Address:</td> <td><input type="text" name="address" /></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" value="Male">Male
				<input type="radio" name="gender" value="Female">Female</td>
			</tr>
			<tr>
				<td>Blood Type:</td>
				<td><select name="bloodType">
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
				</select></td>
			</tr>
		</table>
		<br/>
		<input type="submit" name="add" value="Add" class="add"/>
	
	</form>

	
	<img src="images/blood1.png" class="lower_left">
	
</body>

</html>