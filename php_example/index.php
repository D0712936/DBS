<form name="form1" method="post" action="action.php" >
文字輸出欄位: <input name="MyHead">
<input type="submit" value="送出">
</form>

<?php
	if(isset($_POST['MyHead'])) {
		$MyHead=$_POST["MyHead"];
	
		$dbhost = 'localhost:3307';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'ods_db';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db($dbname);
		$sql = "SELECT Pid FROM parkinglot where Ploc LIKE \"%".$MyHead."%\";";
		$result = mysql_query($sql) or die('MySQL query error');
		while($row = mysql_fetch_array($result)){
			echo $row['Pid']."<p>";
		}
	}
?>

