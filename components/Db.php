<?php

class Db
{
	
	public static function getConnection()
	{
		$params = include(ROOT.'/config/db_params.php');

		// Create connection
		$db = new mysqli($params['server_name'], $params['user_name'], $params['password'], $params['base_name']);

		// Check connection
		if ($db->connect_error) 
		{
    		die("Connection failed: " . $conn->connect_error);
		} 
		// echo "Connected successfully";
		return $db;
	}

	public static function returnResults($result,$array=false)
	{	
		if( !$array )
		{
			if ( $result->num_rows > 1 ) 
			{
				$data = array();
			    // output data of each row
			    while( $row = $result->fetch_assoc() ) {
			    	array_push($data, $row);
			    }
			    return $data;
			}
			elseif( $result->num_rows == 1 )
			{
				$data = array();
			    // output data of each row
			    while( $row = $result->fetch_assoc() ) {
			    	$data = $row;
			    }
			    return $data;
			}
		}
		else
		{
			if ( $result->num_rows >= 1 ) 
			{
				$data = array();
			    // output data of each row
			    while( $row = $result->fetch_assoc() ) {
			    	array_push($data, $row);
			    }
			    return $data;
			}
		}
		
	}

}