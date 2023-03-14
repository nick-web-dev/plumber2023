<?php

include ('config.php');
// echo 'in progress';
set_time_limit(0);

$sql = "SELECT * FROM `log` WHERE `status` LIKE '0' LIMIT 1";
$result = $connect->query($sql);


$row        = $connect->query( "SELECT `filename` FROM `log` WHERE `status` LIKE '0' LIMIT 1" )->fetch();
$filename   =  $row["filename"];

    // $filename = '2046528891.csv';
    $file_data = fopen('../file/' . $filename, 'r');
	
	while (($row = fgetcsv($file_data)) !== FALSE) {	
        $data = array(
			'username'			=> null,
			'email'			=> $row[0],
			'password'			=> null,
			'user_image'		=> null,
			'payment_status'	=> null,
			'auth_level'		=> 2,
			'device_token'		=> null,
			'device_name'		=> null,
			'created_date'		=> null,
			'user_status'		=> 1,
			'mobile_no'		=> $row[1],
			'no_of_employees'	=> $row[2],
			'unique_id'		=> null,
			'type'				=> null,
			'name_on_card'		=> null,
			'card_no'			=> null,
			'expiry_date'		=> null,
			'cvv'				=> null,
			'save_secure'		=> null,
			'admin_status'		=> null,
			'company_name'		=> $row[3],
			'website_url'		=> $row[4],
			'title'			=> $row[5],
			'open_hours'		=> null,
			'emergency_service'=> null,
			'type_of_plumbling'=> null,
			'company_description'=> null,
			'response_time'	=> null,
			'years_of_business'=> null,
			'number_of_tracks'	=> null,
			'first_name'		=> $row[6],
			'address'			=> $row[7],
			'latitude'			=> null,
			'longitude'		=> null,
			'street'			=> $row[8],
			'city'				=> $row[9],
			'zip_code'			=> $row[10],
			'zip_code_covered'=> null,
			'last_name'		=> $row[11],
			'state'			=> $row[12],
			'country'			=> $row[13],
			'otp'				=> null,
			'banner_image'		=> null,
			'street_address'	=> $row[14],
			'membership'		=> null,
			'verification_code'=> null,
			'hide_show'		=>  null,
			'country_code'		=> null,
			'otp_status'		=> null,
			'month'			=> null,
			'year'				=> null,
			'payment_date'		=> null,
			'sort_by'			=> null,


		);

		$query = "INSERT INTO tbl_sample (	username,	email,	`password`,	user_image,	payment_status,	auth_level,	device_token,	device_name,	created_date,	user_status,	mobile_no,	no_of_employees,	unique_id,	`type`,	name_on_card,	card_no,	`expiry_date`,	cvv,	save_secure,	admin_status,	company_name,	website_url,	title,	open_hours,	emergency_service,	type_of_plumbling,	company_description,	response_time,	years_of_business,	number_of_tracks,	first_name,	`address`,	latitude,	longitude,	street,	city,	zip_code,	zip_code_covered,	last_name,	`state`,	country,	otp,	banner_image,	street_address,	membership,	verification_code,	hide_show,	country_code,	otp_status,	`month`,	`year`,	payment_date,	sort_by) 
    	VALUES (:username,	:email,	:password,	:user_image,	:payment_status,	:auth_level,	:device_token,	:device_name,	:created_date,	:user_status,	:mobile_no,	:no_of_employees,	:unique_id,	:type,	:name_on_card,	:card_no,	:expiry_date,	:cvv,	:save_secure,	:admin_status,	:company_name,	:website_url,	:title,	:open_hours,	:emergency_service,	:type_of_plumbling,	:company_description,	:response_time,	:years_of_business,	:number_of_tracks,	:first_name,	:address,	:latitude,	:longitude,	:street,	:city,	:zip_code,	:zip_code_covered,	:last_name,	:state,	:country,	:otp,	:banner_image,	:street_address,	:membership,	:verification_code,	:hide_show,	:country_code,	:otp_status,	:month,	:year,	:payment_date,	:sort_by)";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		sleep(1);

		if(ob_get_level() > 0)
		{
			ob_end_flush();
		}
	}
// Close the CSV file
			
// Get the current time and filename
$datetime = date('Y-m-d H:i:s');
//$filename = 'file.txt';
$status = '1';
$step  = $connect->prepare("update log set status=:status where filename=:filename");
$step->bindParam(':status',$status);
$step->bindParam(':filename',$filename);
$step->execute();

// Insert a new row into the log table
// $sql = "INSERT INTO log (filename, datetime, status) VALUES (:filename, :datetime, :status)";

// $statement1 = $connect->prepare($sql);

// $log_data = array(
//     'filename'  => $filename,
//     'datetime'  => $datetime,
//     'status'    => $status


// );

// $statement1->execute($log_data);	



// Close the database connection

// Send an email to confirm that the data has been inserted
// mail('msamrat@appwardsoftware.com', 'Import Complete', 'The data from the CSV file has been successfully imported into the tbl_sample table.');	


?>