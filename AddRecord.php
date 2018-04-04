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
	$checkForArtist = 'Select ArtistID from Artist where ArtistName = "'. $ArtistName . '"';
	$result = mysqli_query($DBConnect,$checkForArtist);
	$rowcount = mysqli_num_rows($result);
	if ($rowcount == 0){
        	// Build Query to add artist name to Artist table
		$ADDartist = "INSERT INTO Artist" . " (ArtistID, ArtistName)" .
			 " VALUES (NULL, '" . $ArtistName. "');";

		// Add artist name to Artist table
		$DBConnect->query($ADDartist);
		$result = mysqli_insert_id($DBConnect);	
	}else{
		$ArtistNumber = 'SELECT ArtistID FROM Artist WHERE ArtistName = "' . 
			$ArtistName . '"';
		$DBConnect->query($ArtistNumber);
		$result = mysqli_query($DBConnect,$ArtistNumber);
		$row = mysqli_fetch_row($result);
		$ArtistNumber = $row[0];
	}

	// Build query for Song Table
	$ADDSongTitle ='INSERT INTO Song' .' (SongID, ArtistID, SongTitle, SongLength)' .
		' VALUES (NULL, ' . $ArtistNumber . ', "' . $SongTitle .
		 '", "' . $SongLength . '");';

	// run query 
	$DBConnect->query($ADDSongTitle);

	$SongNumber = mysqli_insert_id($DBConnect);

	// build query for Album
	$ADDalbum = "INSERT INTO Album" . " (AlbumID, AlbumName, ArtistID)" .
		" VALUES (NULL, '" . $AlbumTitle . "', " . $ArtistNumber . ");";
	$DBConnect->query($ADDalbum);

	$AlbumNumber = mysqli_insert_id($DBConnect);

        // build query to store AlbumID and SongID in AlbumSong
	$ADDalbumInfo = "INSERT INTO AlbumSong" . " (AlbumID, SongID)" . " VALUES (" .
		$AlbumNumber . ", " . $SongNumber . ")";

	// run the query
	$DBConnect->query($ADDalbumInfo);

	// Close the database
	mysqli_close($DBConnect);
}
?>
<html>
<style>
label {
	display: inline-block;
	width: 100px;
}
</style>
<BODY>
<FORM METHOD="POST" ACTION="AddRecord.php"
<p>
<LABEL>Artist Name</LABEL>
<INPUT TYPE="text" name="ArtistName" required></p>
<p>
<LABEL>Song Title</Label>
<INPUT type="text" name="SongTitle" required></p>
<p>
<LABEL>Album Title</LABEL>
<INPUT type="text" name="AlbumTitle"></p>
<p>
<LABEL>Song Duration</LABEL>
<INPUT type="text" name="SongLength"></p>
<label></label>
<INPUT type="submit" name="Submit">
</FORM>
</BODY>
