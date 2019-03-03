<?php   
	$db = mysqli_connect('192.168.0.102:3306','root','root','hackathon');
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query ="select * from receives order by schedule_notification desc limit 2";
    $result = $db->query($query);
    $timestap=0;
    $c=0;
    if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($c==0){
			$timestamp1 = $row['schedule_notification'];
			$c++;
			}
			if($c==1){
				$timestamp2 = $row['schedule_notification'];
			}
			
		}
	}


	echo $timestamp1;
	echo $timestamp2;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	
    		$clicked1=$_POST['clicked1'];
    		$clicked2=$_POST['clicked2'];
    		
    		
    		$query ="update receives set is_clicked=$clicked1 where schedule_notification=$timestamp1";
    		$result = $db->query($query);
    		$query1 ="update receives set is_clicked=$clicked2 where schedule_notification=$timestamp2";
    		$result1 = $db->query($query1);

    		

    		
	


	}
	?>

	<html>

	<body>
<form action="" method="POST">
	<h6> clicked 1</h6>
	<input type="radio" name="clicked1" value="1" checked> Yes<br>
  	<input type="radio" name="clicked1" value="2"> No<br>
  	<br><h6> clicked 2</h6>
  	<input type="radio" name="clicked2" value="1" checked> Yes<br>
  	<input type="radio" name="clicked2" value="2"> No<br>
	


	 <br><br>
	 <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	
	 


	</body>
	</html>

	










