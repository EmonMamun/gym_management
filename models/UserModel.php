<?php

	require_once('db.php');

//=======================Validatin for login===========================================

	function validateUser(){

	//    error_reporting(0);

		$conn=getConnection();
		$sql="select * from register";
		$result=oci_parse($conn,$sql);
	
		oci_execute($result);

	    return $result;	
	}

//============================================================================

	function getUserByType($type){

		$conn = getConnection();
		$sql = "select * from register where type='{$type}'";
		$result = oci_parse($conn, $sql);
		oci_execute($result);
		$row = oci_fetch_assoc($result);

		return $row;
	}


//======================================================================================

	function insertUser($user){

		$conn=getConnection();
		$sql="insert into register(name, email, password, address, gender, qualification, type) VALUES('{$user['name']}','{$user['email']}','{$user['password']}','{$user['address']}', '{$user['gender']}', '{$user['qualification']}', '{$user['type']}')";
		
		$status=oci_parse($conn,$sql);
    	$res=oci_execute($status);
		
		if($status){
			return true;
		}else{
			return false;
		}
		return $status;
	}

//======================================================================================
?>