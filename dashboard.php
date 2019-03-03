<?php  
	$db = mysqli_connect('192.168.0.102:3306','root','root','hackathon');
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $id=$_GET["id"];
   	$arr=array();
    $query ="select * from dumps where userid=$id";
    $result = $db->query($query);
    if($result->num_rows > 0) {
    	
		while($row = $result->fetch_assoc()) {
			$user=$row['userid'];
			array_push($arr,array("1_1",$row['1_1']));
			array_push($arr,array("1_2",$row['1_2']));
			array_push($arr,array("1_3",$row['1_3']));
			array_push($arr,array("1_4",$row['1_4']));
			array_push($arr,array("1_5",$row['1_5']));
			array_push($arr,array("1_6",$row['1_6']));
			array_push($arr,array("1_7",$row['1_7']));
			array_push($arr,array("1_8",$row['1_8']));
			array_push($arr,array("1_9",$row['1_9']));
			array_push($arr,array("1_10",$row['1_10']));
			array_push($arr,array("2_1",$row['2_1']));
			array_push($arr,array("2_2",$row['2_2']));
			array_push($arr,array("2_3",$row['2_3']));
			array_push($arr,array("2_4",$row['2_4']));
			array_push($arr,array("2_5",$row['2_5']));
			array_push($arr,array("2_6",$row['2_6']));
			array_push($arr,array("2_7",$row['2_7']));
			array_push($arr,array("2_8",$row['2_8']));
			array_push($arr,array("2_9",$row['2_9']));
			array_push($arr,array("2_10",$row['2_10']));
			array_push($arr,array("3_1",$row['3_1']));
			array_push($arr,array("3_2",$row['3_2']));
			array_push($arr,array("3_3",$row['3_3']));
			array_push($arr,array("3_4",$row['3_4']));
			array_push($arr,array("3_5",$row['3_5']));
			array_push($arr,array("3_6",$row['3_6']));
			array_push($arr,array("3_7",$row['3_7']));
			array_push($arr,array("3_8",$row['3_8']));
			array_push($arr,array("3_9",$row['3_9']));
			array_push($arr,array("3_10",$row['3_10']));

			

		}
	}
	
	$size = count($arr)-1;
    for ( $i = 0; $i < $size+1; $i++ )
	{
   		for ($j = 0; $j < $size+1; $j++ )
   		{
      		if ($arr[$i][1] > $arr[$j][1])
      		{
        		$temp = $arr[$i];
         		$arr[$i] = $arr[$j];
         		$arr[$j] = $temp;
      		}
   		}
	}
	
	$one=$arr[0][0];
	$two=$arr[1][0];
	$three=$arr[2][0];
	$onew=$arr[0][1];
	$twow=$arr[1][1];
	$threew=$arr[2][1];
	
	

    $query1 ="select * from modeltables1s where user_id=$id limit 1";
    $result1 = $db->query($query1);
    if($result1->num_rows > 0) {
    	
		while($row1 = $result1->fetch_assoc()) {
			$nexttimestamp=$row1['schedule_notification'];
		}
	}

    $query2 ="select * from recommendations where userid=$id";
    $result2 = $db->query($query2);
    if($result2->num_rows > 0) {
    	
		while($row2 = $result2->fetch_assoc()) {
			$ione=$row2['iteam1'];
			$itwo=$row2['iteam2'];
			$ithree=$row2['iteam3'];

		}
	}

    		
	
	$datetimeFormat = 'Y-m-d H:i:s';

$date = new \DateTime();
// If you must have use time zones
// $date = new \DateTime('now', new \DateTimeZone('Europe/Helsinki'));
$date->setTimestamp($nexttimestamp);


	
	?>

	<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<title>Dashboard</title>
	</head>
	<body>
		<div class="jumbotron">
			<h1 class="display-4"><?php echo $id; ?></h1>
			<p class="lead">Recommendation for the user</p>
			
		</div>

		
		<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
			Category Recommended
		</button>
		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
			User Preferences
		</button>
		<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
			Scheduled Time
		</button>
		<button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
			Recommended items
		</button>

		</p>

		<div class="collapse" id="collapseExample1">
			<div class="card card-body">
				<button type="button" class="btn btn-primary"><?php echo $one; ?> <span class="badge"><?php echo $onew; ?></span></button><br>
				<button type="button" class="btn btn-primary"><?php echo $two; ?> <span class="badge"><?php echo $twow; ?></span></button><br>
				<button type="button" class="btn btn-primary"><?php echo $three; ?> <span class="badge"><?php echo $threew; ?></span></button><br>
			</div>

		</div> 
		<div class="collapse" id="collapseExample2">
			<div class="card card-body">
			<p> Quiet Hours<input type="checkbox" id="subscribeNews" name="subscribe" value="Quiet Hours" checked></p>
			</div>

		</div>
		<div class="collapse" id="collapseExample3">
			<div class="card card-body">
				<?php echo $date->format($datetimeFormat);?>
			</div>

		</div> 
		<div class="collapse" id="collapseExample4">
			<div class="card card-body">
				<button type="button" class="btn btn-primary"><?php echo $ione; ?> </button><br>
				<button type="button" class="btn btn-primary"><?php echo $itwo; ?></button><br>
				<button type="button" class="btn btn-primary"><?php echo $ithree; ?> </span></button><br>
			
			</div>

		</div> 
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>

	





