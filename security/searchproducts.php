<?php
include("db_config.php");
?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Search Products - SQL Injection humla [12th October 2013]</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				Welcome <?php echo $_SESSION["username"]; ?>!! Search for products here</a>
			</p>
        </div>
		
		<div class="response">
		
			<p style="color:white">
			<table class="response">
			<form method="POST" autocomplete="off">
			
			<tr>
				<td>
					Search for a product:  
				</td>
				<td>
					<input type="text" id="searchitem" name="searchitem">&nbsp;&nbsp;
				</td>
				<td>
					<input type="submit" value="Search!"/> 
				</td>
			</tr>
	</table>
				
			</p>

		</form>
        </div>
    
        
		<br />
<div class="searchheader" style="color:white">
<table>	
    
	<tr>
    <td style="width:200px " >
        <b>Product Name</b>
    </td>
    
    <td style="width:200px " >
        <b>Product Type</b>
    </td>
    
    <td style="width:450px " >
        <b>Description</b>
    </td>
    
    <td style="width:110px " >
        <b>Price (in USD)</b>
    </td>
 
</tr>

<?php
if (isset($_POST["searchitem"])) {

$q = "Select * from products where product_name like '".$_POST["searchitem"]."%'";
$result = mysqli_query($con,$q);
if (!$result)
{
		die("</table></div>".mysqli_error($con));
}

while($row = mysqli_fetch_array($result))
  {
  echo "<tr><td style=\"width:200px\">".$row[1]."</td><td style=\"width:200px\">".$row[2]."</td><td style=\"width:450px\">".$row[3]."</td><td style=\"width:110px\">".$row[4]."</td></tr>";
  }

}


?>
</table>
	</div>

	  
	  
	  <div class="footer">
	
      </div>
	  
	  

      </div>

	</div> <!-- /container -->
  
</body>
</html>
