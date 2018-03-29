<?php
$DBName = "Songs";
$ArtistName = $_POST['ArtistName'];
$SongTitle = $_POST['SongTitle'];
$AlbumTitle = $_POST['AlbumTitle'];
$SongLength = $_POST['SongLength'];

$ArtistName = mysqli_real_escape_string($ArtistName);
$SongTitle = mysqli_real_escape_string($SongTitle);
$AlbumTitle = mysqli_real_escape_string($AlbumTitle);
$SongLength = mysqli_real_escape_string($SongLength);
 
$DBConnect = mysqli_connect("localhost","root","crumplebatverifytree", $DBName);
if ($DBConnect === FALSE)
	echo "<p>Connect error: " . mysqli_error() . "</p>\n";
else {
        // Build Query to add artist name to Artist table
	$ADDartist = "INSERT INTO Artist" . " (ArtistID, ArtistName)" .
		 " VALUES (NULL, '" . $ArtistName. "');";

	// Add artist name to Artist table
	$DBConnect->query($ADDartist);
	
	// Build query to grab the newly created ArtistID 
	$ANumber = "Select ArtistID from Artist where ArtistName = '" . $ArtistName . "'";
	
	// run query and store result
	$result = $DBConnect->query($ANumber);
	
	// convert result to an associatve array
	$ArtistNumber = $result->fetch_assoc();
	
	// Build query for Song Table
	$ADDSongTitle ='INSERT INTO Song' .' (SongID, ArtistID, SongTitle, SongLength)' .
		' VALUES (NULL, ' . $ArtistNumber['ArtistID'] . ', "' . $SongTitle .
		 '", "' . $SongLength . '")';
	// run query 
	$DBConnect->query($ADDSongTitle);

	// build query for Album
	$ADDalbum = "INSERT INTO Album" . " (AlbumID, AlbumName, ArtistID)" .
		" VALUES (NULL, '" . $AlbumTitle . "', " . $ArtistNumber['ArtistID'] . ")";
	$DBConnect->query($ADDalbum);

	// Build query to grab newly created AlbumID
	$Album_ID = "SELECT AlbumID FROM Album WHERE AlbumName = '" .  $AlbumTitle . "'";
	
	// run query and store result
	$result = $DBConnect->query($Album_ID);
	
	// convert result to an associatve array
	$AlbumNumber = $result->fetch_assoc();

	// build query to grab SongID from Songs
	$Song_ID = 'SELECT SongID FROM Song WHERE SongTitle = "' . $SongTitle . '"';

	// run query and store result
	$result = $DBConnect->query($Song_ID);

	// convert result to an associative array
	$SongNumber = $result->fetch_assoc();

        // build query to store AlbumID and SongID in AlbumSong
	$ADDalbumInfo = "INSERT INTO AlbumSong" . " (AlbumID, SongID)" . " VALUES (" .
		$AlbumNumber['AlbumID'] . ", " . $SongNumber['SongID'] . ")";

	// run the query
	$DBConnect->query($ADDalbumInfo);

	// Close the database
	mysqli_close($DBConnect);
}
?>
