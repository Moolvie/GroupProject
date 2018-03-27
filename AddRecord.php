<?php
$DBName = "Songs";
$ArtistName = $_POST['ArtistName'];
$SongTitle = $_POST['SongTitle'];
$AlbumTitle = $_POST['AlbumTitle'];
$SongLength = $_POST['SongLength'];

$DBConnect = mysqli_connect("localhost","root","crumplebatverifytree", $DBName);
if ($DBConnect === FALSE)
	echo "<p>Connect error: " . mysqli_error() . "</p>\n";
else {
	$ADDartist = "INSERT INTO Artist" . " (ArtistID, ArtistName)" .
		 " VALUES (NULL, '" . $ArtistName. "');";
	$DBConnect->query($ADDartist);

	$ANumber = "Select ArtistID from Artist where ArtistName = '" . $ArtistName . "';";
	$ANumber = '"'. $ANumber . '"';
	echo "<p>$ANumber</p>\n";

	$result = mysqli_query($DBConnect, $ANumber);
	echo "<p>The Query result is $result[0] </p>\n";	
	$ADDSongTitle ="INSERT INTO Song" ." (SongID, ArtistID, SongTitle, SongLength)" .
		" VALUES (NULL, " . $result[0] . ",'" . $SongTitle . "','" . $SongLength . "')";
	echo "<p>$ADDSongTitle</p>\n";
	$DBConnect->query($ADDSongTitle);
}
?>
