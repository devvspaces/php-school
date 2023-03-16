<?php
/*function duplicate($originalDB, $newDB) {
    $db_check = @mysql_select_db ( $originalDB );
    $getTables =  @mysql_query("SHOW TABLES") or return(mysql_error());   
    $originalDBs = [];
    while($row = mysql_fetch_row( $getTables )) {
            $originalDBs[] = $row[0];
        }
    @mysql_query("CREATE DATABASE `$newDB`") or return(mysql_error());
    foreach( $originalDBs as $tab ) {
            @mysql_select_db ( $newDB ) or return(mysql_error());
            @mysql_query("CREATE TABLE $tab LIKE ".$originalDB.".".$tab) or return(mysql_error());
        @mysql_query("INSERT INTO $tab SELECT * FROM ".$originalDB.".".$tab) or return(mysql_error());
    }
    return true;
}
// helloacm.com
*/
$db_hostname = "localhost";
$originalDB= "portal";
$db_username = "root";
$db_password = "";
$con= mysqli_connect("localhost","root","","portal");
if(mysqli_connect_errno()){
    echo "failed".mysqli_connect_error();
}
function duplicate($originalDB, $newDB) {
	$db_check = @mysql_select_db ( $originalDB );
	$getTables =  @mysql_query("SHOW TABLES") or return(mysql_error());   
	$originalDBs = [];
	while($row = mysql_fetch_row( $getTables )) {
    		$originalDBs[] = $row[0];
    	}
	@mysql_query("CREATE DATABASE `$newDB`") or return(mysql_error());
	foreach( $originalDBs as $tab ) {
    		@mysql_select_db ( $newDB ) or return(mysql_error());
    		@mysql_query("CREATE TABLE $tab LIKE ".$originalDB.".".$tab) or return(mysql_error());
		@mysql_query("INSERT INTO $tab SELECT * FROM ".$originalDB.".".$tab) or return(mysql_error());
	}
	return true;
}
?>