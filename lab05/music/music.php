<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $song_count=5678; ?>
		<p>
			I love music.
			I have <?=$song_count?> total songs,
			which is over <?=(int)($song_count/10)?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News </h2>

			<ol>
				<?php
					$newspages = $_GET["newspages"];
					if(empty($_GET)){
						$newspages=5;
					}
				  for ($i = 11; $i > 11-$newspages; $i--) {
					if ($i<10){?>
						<li><a href="https://www.billboard.com/archive/article/20190<?= $i ?>">2019-<?= $i ?></a></li>
					<?php } else{ ?>
			    	<li><a href="https://www.billboard.com/archive/article/2019<?= $i ?>">2019-<?= $i ?></a></li>
					<?php } ?>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
					$text = file("favorite.txt");
					foreach ($text as $text) {?>
						<li><a href="http://en.wikipedia.org/wiki/<?= $text ?>"><?= $text ?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<!-- <li class="mp3item">
					<a href="lab5/musicPHP/songs/paradise-city.mp3">paradise-city.mp3</a>
				</li>
				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li> -->
				<?php
					$poems=glob("lab5/musicPHP/songs/*.mp3");
					$arr1=array();
					foreach($poems as $filename){
						array_push($arr1, filesize($filename));
					}
					array_multisort($arr1, $poems);
					array_reverse($poems);
					foreach ($poems as $filename) { ?>
					<li class="mp3item">
						<a href="<?= $filename ?>"><?= basename($filename) ?></a> (<?= (int)(filesize($filename)/1024) ?> KB)
					</li>
				<?php } ?>



				<!-- Exercise 8: Playlists (Files) -->
				<?php
					$poems=glob("lab5/musicPHP/songs/*.m3u");
					rsort($poems);
					foreach ($poems as $filename) { ?>
				<li class="playlistitem"><?= basename($filename) ?>:
					<ul>
						<?php
							$search='#';
							$songlist=file($filename);
							shuffle($songlist);
							foreach ($songlist as $songlist) {
								if(strpos($songlist,$search)===false){?>
								<li><?=$songlist ?></li>
								<?php }} ?>
					</ul>
				<?php } ?>

			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
