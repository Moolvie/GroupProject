<!DOCTYPE html>
<html>
<head>
</head>
<style>
label {
   display: inline-block;
   width: 100px;
}
</style>
<body>
<?php
$DBName = "Songs";
$ArtistName = $_POST['ArtistName'];
$SongTitle = $_POST['SongTitle'];
$AlbumTitle = $_POST['AlbumTitle'];
$SongLength = $_POST['SongLength'];

 
$DBConnect = mysqli_connect("localhost","root","", $DBName);
if ($DBConnect === FALSE)
	echo "<p>Connect error: " . mysqli_error() . "</p>\n";
else {
        // Build Query to add artist name to Artist table
	$ADDartist = "INSERT INTO Artist" . " (ArtistID, ArtistName)" .
		 " VALUES (NULL, '" . $ArtistName. "');";

	// Get generated ArtistId
	$ArtistNumber = mysqli_insert_id($DBConnect);
	
	// Build query for Song Table
	$ADDSongTitle ='INSERT INTO Song' .' (SongID, ArtistID, SongTitle, SongLength)' .
		' VALUES (NULL, ' . $ArtistNumber . ', "' . $SongTitle .
		 '", "' . $SongLength . '")';
	// run query 
	$DBConnect->query($ADDSongTitle);

	// Get generated SongID
	$SongNumber = mysqli_insert_id($DBConnect);

	// build query for Album
	$ADDalbum = "INSERT INTO Album" . " (AlbumID, AlbumName, ArtistID)" .
		" VALUES (NULL, '" . $AlbumTitle . "', " . $ArtistNumber . ")";
	$DBConnect->query($ADDalbum);

	// Get generated AlbumID 
	$AlbumNumber = myqli_insert_id($DBConnect);

        // build query to store AlbumID and SongID in AlbumSong
	$ADDalbumInfo = "INSERT INTO AlbumSong" . " (AlbumID, SongID)" . " VALUES (" .
		$AlbumNumber . ", " . $SongNumber . ")";

	// run the query
	$DBConnect->query($ADDalbumInfo);

	// Close the database
	mysqli_close($DBConnect);
}
?>
<form method="POST" action="AddRecord.php">
<p>
<label>Artist Name: </label>
<input type="text" name="ArtistName">
</p>
<p>
<label>Song Title:</label>
<input type="text" name="SongTitle">
</p>
<p>
<label>Album Title:</label>
<input type="text" name="AlbumTitle">
</p>
<p>
<label>Song Duration:</label>
<input type="text" name="SongLength">
</p>
<label><label>
<input type="submit" name="Submit">
</form>
</body>
</html>
