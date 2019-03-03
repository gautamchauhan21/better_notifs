
<?php

    $db = mysqli_connect('192.168.0.102:3306','root','root','hackathon');
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	$query = "SELECT * FROM modeltables order by schedule_notification asc";
    $result = $db->query($query);
    $arr=array();
    $c=0;
    $ntype=0;
    $pid=0;
    $catid=0;
    $itemid=0;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$timestamp = strtotime($row['schedule_notification']);
			$ntype=$row['notiifcation_type'];
			$pid=$row['parent_id'];
			$catid=$row['cat_id'];
			$itemid=$row['item_id'];


			$arr[$c]=$timestamp;
			$c=$c+1;
		}
	}
	$d=0;
	foreach ($arr as $a) {
		$d=$d+1;
		if(strtotime("now")<$a){
			$time_to_be_sent=$a;
			break;
		}
	}
	$category=1;
	$notificationType="Flash Sale 1";
	
	$flag=0;
	echo $time_to_be_sent;
	echo $ntype;
	echo $pid;
	echo $catid;
	echo $itemid;
	 $check=0;

	while($check<2) {
		$check++;
		sleep(10);
		$time_to_be_sent=$arr[$d];
		$tim=strtotime("now");
		echo " ".$tim;
		if(strtotime("now")+10<$time_to_be_sent){
				$d=$d+1;
				$query = "insert into receives (user_id,notiifcation_type,parent_id,cat_id,item_id,is_clicked,schedule_notification) values (377,'$ntype',$pid,$catid,$itemid,0,$time_to_be_sent)";

				echo $query;

				 $result = $db->query($query);
				$authToken = 'key=AAAAE32AS_4:APA91bEW9waiauOFO5QpWpt5w26LJIeVLK-VxDyB26aokdpYKNRkGT2-6xvT9fxVusRAvs6ks1s1Pue6yy2RD49CL1ZUEqrxge9CRp0Pkey1ygNNjcHCLNTjwskVSRM7rzu83UQ6us2Y';


				$postData = array(
				    'to' => 'cz7DtpnHpvc:APA91bFBB7aV7GJdQBNZl-hvXFfyeGKiztsGsTI6g6YkAPjH1JfCIwBXAkmBZbvWGtYTmLmhhPkAmx0qQJONtl9bykyAsn1MjPFdkV7-vQhPHiLOBmkYnwAWi95Vq9xOnBeCr02Gz8xy',
				    'collapse_key' => 'type_a',
				    'notification' => array('body' => $category, 'title'=>$notificationType),
				    'data' => array('link' => "paytm.xyz")
				);

				

				// Setup cURL
				$ch = curl_init('https://fcm.googleapis.com/fcm/send');
				curl_setopt_array($ch, array(
				    CURLOPT_POST => TRUE,
				    CURLOPT_RETURNTRANSFER => TRUE,
				    CURLOPT_HTTPHEADER => array(
				        'Authorization: '.$authToken,
				        'Content-Type: application/json'
				    ),
				    CURLOPT_POSTFIELDS => json_encode($postData)
				));

				// Send the request
				$response = curl_exec($ch);

				// Check for errors
				if($response === FALSE){
				    die(curl_error($ch));
				}

				// Decode the response
				$responseData = json_decode($response, TRUE);
			}

			

}
	
	
?>



