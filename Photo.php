<?php
include 'kernel.php';
?>
			<div id="inside">
			<h1>Инверсия цветов фотографии</h1>
			<input type="file" id="inp" onchange="upload()">
			<input type="button" value="Негатив" onclick="negative()" id="button">
			<br><br>
			<canvas id="cnv"></canvas>
			</div>
		</div>
	</body>
</html>