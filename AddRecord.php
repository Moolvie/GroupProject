<?php
$DBName = "Songs";
$ArtistName = $_POST['ArtistName'];
$SongTitle = $_POST['SongTitle'];
$AlbumTitle = $_POST['AlbumTitle'];
$SongLength = $_POST['SongLength'];

<<<<<<< HEAD
echo "<p>Artist Name: $ArtistName</p>\n";
echo "<p>Song Title: $SongTitle</p>\n";
echo "<p>Album Title: $AlbumTitle</p>\n";
echo "<p>Song Length: $SongLength</p>\n";

=======
>>>>>>> 350324fa39eee98da9971f8e0bdeeaf6ac421dd5
$DBConnect = mysqli_connect("localhost","root","crumplebatverifytree", $DBName);
if ($DBConnect === FALSE)
	echo "<p>Connect error: " . mysqli_error() . "</p>\n";
else {
	// Build Query to add artist name to Artist table
	$ADDartist = "INSERT INTO Artist" . " (ArtistID, ArtistName)" .
		 " VALUES (NULL, '" . $ArtistName. "');";
	// Add artist name to Artist table
	$DBConnect->query($ADDartist);
	
	// Build query to grab the ArtistID just created 
	$ANumber = "Select ArtistID from Artist where ArtistName = '" . $ArtistName . "'";
	
	// run query and store result
	$result = $DBConnect->query($ANumber);
	
	// convert result to an associatve array
	$ArtistNumber = $result->fetch_assoc();
	
	// Build query with Artist number to update Song Table
	$ADDSongTitle ="INSERT INTO Song" ." (SongID, ArtistID, SongTitle, SongLength)" .
		" VALUES (NULL, " . $ArtistNumber['ArtistID'] . ", '" . $SongTitle . "', '" . $SongLength . "')";
	
	// run query 
	$DBConnect->query($ADDSongTitle);
}
?>
