<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>'{{sitename}}'</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;900&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css'>
	<link rel="stylesheet" href="./style.css">
	<style>
		/* CSS for styling the buttons */
		button {
			display: inline-block;
			padding: 10px 20px;
			font-size: 16px;
			border: none;
			border-radius: 4px;
			background-color: #4CAF50;
			color: #FFFFFF;
			text-align: center;
			cursor: pointer;
		}

		.button {
			display: inline-block;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			color: #ffffff;
			background-color: #7aa8b7;
			border-radius: 6px;
			outline: none;
		}
	</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="card"><img src="logo.png" />
    <h1>{{sitename}}<p><img src="tape.gif" width="50%" height="50%" /></h1>
    <p>
        <a class="button" href="index.php">Menu</a>
        <button id="play-button" onclick="playSong()">Play</button>
        <button id="pause-button" onclick="togglePlayPause()">Pause</button>
        <button id="next-button" onclick="playNextSong()">Next</button>


        <?php
            $music_dir = "{{foldername}}";
            $songs = scandir($music_dir);
            unset($songs[0]);
            unset($songs[1]);
            shuffle($songs);
            $songs_json = json_encode($songs);
        ?>

        <audio id="audio-player"></audio>

        <script>
            var audioPlayer = document.getElementById("audio-player");
            var songs = <?php echo $songs_json; ?>;
            var currentSong = 0;
            var isPlaying = false;
            var isPaused = false;

            function playSong() {
                audioPlayer.src = "{{foldername}}/" + songs[currentSong];
                audioPlayer.play();
                updateNowPlaying(currentSong);
                isPlaying = true;
                isPaused = false;
                currentSong++;
                if (currentSong >= songs.length) {
                    currentSong = 0;
                    shuffle(songs);
                }
            }

            function updateNowPlaying(currentSong) {
                var currentSongName = songs[currentSong].replace(/\.[^/.]+$/, "");
                document.getElementById("now-playing").innerHTML = "Now Playing: " + currentSongName;
            }

            function togglePlayPause() {
                if (isPlaying) {
                    if (isPaused) {
                        audioPlayer.play();
                        isPaused = false;
                    } else {
                        audioPlayer.pause();
                        isPaused = true;
                    }
                } else {
                    playSong();
                }
            }

            function playNextSong() {
                currentSong++;
                if (currentSong >= songs.length) {
                    currentSong = 0;
                    shuffle(songs);
                }
                audioPlayer.src = "{{foldername}}/" + songs[currentSong];
                audioPlayer.play();
                updateNowPlaying(currentSong);
                isPlaying = true;
                isPaused = false;
            }

            audioPlayer.addEventListener('ended', function() {
                playNextSong();
            });

            // play the first song on page load
            playSong();
        </script>

        <div id="now-playing"></div>
        <p>

    </div>
<!-- partial -->


</body>
</html>
