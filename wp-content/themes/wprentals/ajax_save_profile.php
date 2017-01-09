<?php 
include("../../../wp-load.php");

if( isset($_POST) ) {
	$currentuserid = wp_get_current_user();
	$loginuserID = $currentuserid->ID;

	if( $_POST['q'] == '1' ) {
		update_user_meta($loginuserID, 'nickname', $_POST['loginName']);
		echo get_user_meta($loginuserID, 'nickname', true);
	} elseif ( $_POST['q'] == '2' ) {
		update_user_meta($loginuserID, 'live_in', $_POST['loginName']);
		echo get_user_meta($loginuserID, 'live_in', true);
	} else {
		echo '';
	}




} else {
	die() . 'Error! You cannot access this file manualy.';
}