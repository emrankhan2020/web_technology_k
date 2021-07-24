<?php 

require_once ('model/model.php');

function fetchAllUsers(){
	echo 'success';
	return showAllUsers();

}
function fetchUsers($username){
	return showUsers($username);

}
