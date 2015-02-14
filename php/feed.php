<?php 

	include 'config.php';

	
	$query = "select * from tbl_announcements  ORDER BY id DESC limit 100";


	

	
	$result = mysqli_query($conn,$query) or die (mysqli_error($conn));
	
	$return = array();
	while($row = mysqli_fetch_array($result))
	{
	   $return[] = array(
			'title' => $row[1],
			'details' => $row[2],
			'poster'=> $row[3],
			'datetime' => $row[4],
		
			);
	}
	
	echo json_encode($return);
	
	
	?>