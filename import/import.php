<?php

//import.php

header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include ('config.php');
set_time_limit(0);

ob_implicit_flush(1);

session_start();

if(isset($_SESSION['csv_file_name']))
{
	// $connect = new PDO("mysql:host=localhost; dbname=callplumber", "root", "");

	$file_data = fopen('file/' . $_SESSION['csv_file_name'], 'r');

	fgetcsv($file_data);

	while($row = fgetcsv($file_data))
	{
		$data = array(
			':username'			=> $row[1],
			':email'			=> $row[2],
			':password'			=> $row[3],
			':user_image'		=> $row[4],
			':payment_status'	=> $row[5],
			':auth_level'		=> $row[6],
			':device_token'		=> $row[7],
			':device_name'		=> $row[8],
			':created_date'		=> $row[9],
			':user_status'		=> $row[10],
			':mobile_no'		=> $row[11],
			':no_of_employees'	=> $row[12],
			':unique_id'		=> $row[13],
			':type'				=> $row[14],
			':name_on_card'		=> $row[15],
			':card_no'			=> $row[16],
			':expiry_date'		=> $row[17],
			':cvv'				=> $row[18],
			':save_secure'		=> $row[19],
			':admin_status'		=> $row[20],
			':company_name'		=> $row[21],
			':website_url'		=> $row[22],
			':title'			=> $row[23],
			':open_hours'		=> $row[24],
			':emergency_service'=> $row[25],
			':type_of_plumbling'=> $row[26],
			':company_description'=> $row[27],
			':response_time'	=> $row[28],
			':years_of_business'=> $row[29],
			':number_of_tracks'	=> $row[30],
			':first_name'		=> $row[31],
			':address'			=> $row[32],
			':latitude'			=> $row[33],
			':longitude'		=> $row[34],
			':street'			=> $row[35],
			':city'				=> $row[36],
			':zip_code'			=> $row[37],
			':zip_code_covered'=> $row[38],
			':last_name'		=> $row[39],
			':state'			=> $row[40],
			':country'			=> $row[41],
			':otp'				=> $row[42],
			':banner_image'		=> $row[43],
			':street_address'	=> $row[44],
			':membership'		=> $row[45],
			':verification_code'=> $row[46],
			':hide_show'		=> $row[47],
			':country_code'		=> $row[48],
			':otp_status'		=> $row[49],
			':month'			=> $row[50],
			':year'				=> $row[51],
			':payment_date'		=> $row[52],
			':sort_by'			=> $row[53],


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

	unset($_SESSION['csv_file_name']);
}

?>