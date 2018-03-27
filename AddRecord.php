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

	$ANumber = "Select ArtistID from Artist where ArtistName = '" . $ArtistName . "'";
	
	$result = $DBConnect->query($ANumber);

	$ArtistNumber = $result->fetch_assoc();
	
	$ADDSongTitle ="INSERT INTO Song" ." (SongID, ArtistID, SongTitle, SongLength)" .
		" VALUES (NULL, " . $ArtistNumber['ArtistID'] . ", '" . $SongTitle . "', '" . $SongLength . "')";
	
	$DBConnect->query($ADDSongTitle);
}
?>
