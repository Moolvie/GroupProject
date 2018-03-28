<?php
$DBName = "Songs";
$ArtistName = $_POST['ArtistName'];
$SongTitle = $_POST['SongTitle'];
$AlbumTitle = $_POST['AlbumTitle'];
$SongLength = $_POST['SongLength'];

echo "<p>Artist Name: $ArtistName</p>\n";
echo "<p>Song Title: $SongTitle</p>\n";
echo "<p>Album Title: $AlbumTitle</p>\n";
echo "<p>Song Length: $SongLength</p>\n";

$DBConnect = mysqli_connect("localhost","root","crumplebatverifytree", $DBName);
if ($DBConnect === FALSE)
	echo "<p>Connect error: " . mysqli_error() . "</p>\n";
else {
	$ADDartist = "INSERT INTO Artist" . " (ArtistID, ArtistName)" .
		 " VALUES (NULL, '" . $ArtistName. "');";
	$DBConnect->query($ADDartist);

	$ANumber = "Select ArtistID from Artist where ArtistName = '" . $ArtistName . "';";
	$ANumber = '"'.$ANumber.'"';
	echo "<p>$ANumber</p>\n";

	$result = mysqli_query($DBConnect, $ANumber);
	echo "<p>The Query result is $result</p>\n";	
	$ADDSongTitle ="INSERT INTO Song" ." (SongID, ArtistID, SongTitle, SongLength)" .
		" VALUES (NULL, " . $QueryResult . ",'" . $SongTitle . "','" . $SongLength . "')";
	echo "<p>$ADDSongTitle</p>\n";
	$DBConnect->query($ADDSongTitle);
}
?>
