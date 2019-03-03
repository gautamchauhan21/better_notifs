<?php  
	$db = mysqli_connect('192.168.0.104:3306','root','root','hackathon');
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	
    		$travel=$_POST['travel'];
    		$bp=$_POST['bp'];
    		$charge=$_POST['charge'];
    		$internet=$_POST['internet'];
    		
    		
    		$os=$_POST['os'];
    		
    		$ru=$_POST['ru'];
    		$pu=$_POST['pu'];
    		$t=strtotime("now");
    		
    		$query ="insert into user_realtimes (userid,travel_status,battery_status,charging_status,connection_status,os,ram_usage,processor_usage,created_at) values (377,$travel,$bp,$charge,$internet,$os,$ru,$pu,$t)";
    		var_dump($query);
    		$result = $db->query($query);

    		

    		
	


	}
	?>

	<html>

	<body>
<form action="" method="POST">
	<h6> Internet </h6>
	<input type="radio" name="internet" value="1" checked> Yes<br>
  	<input type="radio" name="internet" value="0"> No<br>
	<br><h6> Travel </h6>
	<input type="radio" name="travel" value="1" >Yes<br>
  	<input type="radio" name="travel" value="0" checked> No<br>
	<br><h6> Charge </h6>
	<input type="radio" name="charge" value="1" >Yes<br>
  	<input type="radio" name="charge" value="0" checked> No<br>
	<br><h6> OS Type </h6>
	<input type="radio" name="os" value="1" checked>Android<br>
  	<input type="radio" name="os" value="0" > iOS<br>
	<h6> Bettery Percentage </h6>
	
	 <div class="form-group">
	    <input type="text" class="form-control" id="battery_percentage" name="bp" aria-describedby="emailHelp" placeholder="" value=40>
	 </div>
	 
	
	<h6> Ram Usage </h6>

	 <div class="form-group">
	    <input type="text" class="form-control" id="ram_usage" aria-describedby="emailHelp" name="ru" placeholder="" value=20>
	 </div>
	 
	
	<h6> Process Usage </h6>
	
	 <div class="form-group">
	    <input type="text" class="form-control" id="processor_percentage" aria-describedby="emailHelp" name="pu" placeholder="" value=20>
	 </div>


	 <br><br>
	 <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	
	 


	</body>
	</html>

	





