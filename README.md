# Music-On-Demand-CMS
![image](https://github.com/hitsfm/Music-On-Demand-CMS/blob/main/screenshots/Index.png)

<br>

![image](https://github.com/hitsfm/Music-On-Demand-CMS/blob/main/screenshots/player.png)

<br>
Simple PHP cms for mp3 streaming player script.<p>
<h2>Features</h2>
<li>-Streaming Of MP3 feeds (folders) in randon order in infinite loop.
-Simple Play, Pause, Next player button controls.</li>
<li>Song title is pulled from file name, Useless strings like (dot) and mp3 are stripped and title of Current Song is displayed inside player window</li>
<p><br>
The idea was for me to create a simple cms PHP solution that would work on my home http server and stream my mp3 organized folders (format) to the internet in a non stop random loop kind of how Amazon music stream on demand feeds work. and I would be able to playback any desired musical format I have configured with the cms to suit the mood of the event I may be at as long as I got a data connection to the internet with this script i'm good to party.

<h1>Installation</h1>
<li>Copy contents of this repo to your PHP web server </li>
<li>Setup a first feed type. Ex: 90sDance. So in your script folder create a new folder call it 90sdance to keep things simple. load up all your mp3s in this folder. More the better. It's very important this step gets done first, or folder not found PHP error may confuse you during script setup later on. </li>
<li>Now Test the script to make sure it was uploaded correct. head over to your index.html file from your localhost when just testing.. A welcome page with a player indicating to choose a type to continue will appear with a left sidebar menu that is blank. Congratulations! The site works.</li>
<li>Head over to create_new_site.php This is the basic admin backend for your cms. It does a very basic funtion. It creates your feeds by using a template code in filling in a few variables such as Site Name and Folder name. For your first feed make sure you set the folder name to match the folder you first created earlier and dumped your mp3s into. The name will be what ever you want to call this feed such as 90sDance. Once you submit the information the script creates a new php file with the file name as the name you entered under "Site Name" and will forward you to the new player page. If all is correct. Simply press play and the music will start. Click on menu to go back to index.html and notice the first feed now shows up as a clickable link in your sidebar navigation.</li>
<li>Create as many more music folder types as you please and repeat the proccess of going to create_new_site.php to setup those new feed types a new unique player PHP file and let the script auto insert a new link to the sidebar nav under the last link as it updates your index.html file. Repeat the proccess as much as you need to add a new feed starting by creating a new folder and naming it and dumping your files into. Head over to create_new_site.php and add the new feed and done.</li>
<p>
<h1>Limitations</h1>
<li>File create_new_site.php is in the open and not safe for production mode. Create your own script for that or keep it easy by simply setting up an encrypted password with Apache. to access that file. Also, rename it to something secret only you know. If you do these two things. The script will be pretty safe.</li>
<li>No way to delete new feeds from front end, You must delete the music folder and the php new site file and delete the navbarlink in index.html. All this only taking a moment if you had to do this.</li>
