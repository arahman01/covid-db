<?php
	header('Content-Type: application/json');

	$conn = mysqli_connect("localhost","root","1234","covidproject");

	$data = array();

	
	$result = mysqli_query($conn, "SELECT count(*) as cc, 'Punjab' as province from patients where patient_city IN (SELECT city from cities where province = 'Punjab')");
	$p = mysqli_fetch_assoc($result);
	$data[] = $p;	
	mysqli_free_result($result);

	$result = mysqli_query($conn, "SELECT count(*) as cc, 'Sindh' as province from patients where patient_city IN (SELECT city from cities where province = 'Sindh')");
	$p = mysqli_fetch_assoc($result);
	$data[] = $p;	
	mysqli_free_result($result);

	$result = mysqli_query($conn, "SELECT count(*) as cc, 'AJK' as province from patients where patient_city IN (SELECT city from cities where province = 'AJK')");
	$p = mysqli_fetch_assoc($result);
	$data[] = $p;	
	mysqli_free_result($result);

	$result = mysqli_query($conn, "SELECT count(*) as cc, 'Gilgit Baltistan' as province from patients where patient_city IN (SELECT city from cities where province = 'Gilgit Baltistan')");
	$p = mysqli_fetch_assoc($result);
	$data[] = $p;	
	mysqli_free_result($result);

	$result = mysqli_query($conn, "SELECT count(*) as cc, 'Balochistan' as province from patients where patient_city IN (SELECT city from cities where province = 'Balochistan')");
	$p = mysqli_fetch_assoc($result);
	$data[] = $p;	
	mysqli_free_result($result);

	$result = mysqli_query($conn, "SELECT count(*) as cc, 'KPK' as province from patients where patient_city IN (SELECT city from cities where province = 'KPK')");
	$p = mysqli_fetch_assoc($result);
	$data[] = $p;	
	mysqli_free_result($result);

	mysqli_close($conn);

	echo json_encode($data);
?>