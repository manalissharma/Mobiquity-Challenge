<html>
   <head>
      <title>Mobiquity Challenge</title>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
      <link href="Style.css" rel="stylesheet">
   </head>
   <body>
      <div id="page">
         <table  style="width: 100%;">
            <tr>
               <td align="middle" width="400" valign="bottom">
                  <h2>Delete a Contact</h2>
               </td>
            </tr>
         </table>
         <div id="maincol">
            <?php
               $fname = $_REQUEST['FName1']; 
               $lname = $_REQUEST['LName1'];
               // Create connection
               $con=mysqli_connect("127.0.0.1","root","","test");
               
               // Check connection
               if (mysqli_connect_errno())
               		{
               			echo "Failed to connect to MySQL: " . mysqli_connect_error();
               		}
               
               $sql="DELETE FROM contacts WHERE FName='$fname' && LName='$lname'";
               
               if (!mysqli_query($con,$sql))
               		{
               			die('Error: ' . mysqli_error($con));
               }
               
               if(!$sql)
               {	
               	echo "No such Contact exists";
               	
               }
               
               else
               {
               	echo "Contact Deleted";
               	//mysqli_close($con);
               
               	//displaying data in a table
               	$result = mysqli_query($con,"SELECT * FROM contacts");
               
               	echo "<table border='1'>
               				
               	<tr>
               		<th>First Name</th>
               		<th>Last Name</th>
               		<th>Street</th>
               		<th>City</th>
               		<th>State</th>
               		<th>Country</th>
               	</tr>";
               
               	while($row = mysqli_fetch_array($result))
               			{
               				echo "<tr>";
               				echo "<td>" . $row['FName'] . "</td>";
               				echo "<td>" . $row['LName'] . "</td>";
               				echo "<td>" . $row['Street'] . "</td>";
               				echo "<td>" . $row['City'] . "</td>";
               				echo "<td>" . $row['State'] . "</td>";
               				echo "<td>" . $row['Country'] . "</td>";
               				echo "</tr>";
               			}
               
               	echo "</table>"; 
               }
               
               mysqli_close($con);
               
               ?>
            <h3><a href="Main.html" style="color:black;">Home</a></h3>
         </div>
      </div>
   </body>
</html>