<?php
include 'kernel.php';
session_start();
?>
			<div id="inside">
				<h1>Связь с Семёном</h1>
				<audio id="aud"></audio>
				<form method="post" action="Svyaz.php"> 
					<textarea id="txt" name="txt" readonly>
<?php
if(empty($_SESSION["ser"]))
{
	$semen = Purcipine::makeWithName("Семён");
}
else
{
    $semen = unserialize($_SESSION["ser"]);
	$testaddion = 4 + 3;
}
if(isset($_POST["txt"])){
    if(isset($_POST["play"]))
        $semen->play();
    elseif(isset($_POST["eat"]))
        $semen->eat();
    elseif(isset($_POST["grow"]))
        $semen->grow();
    elseif(isset($_POST["pat"]))
        $semen->pat();
}
$_SESSION["ser"] = serialize($semen);
$semen->getCond();
?>
					</textarea>
					<input type="submit" value="Погладить" name="pat" id="button">
					<input type="submit" value="Поиграть" name="play" id="button">
					<input type="submit" value="Покормить" name="eat" id="button">
					<input type="submit" value="Повзрослеть" name="grow" id="button">
				</form>
<script>
			</div>
		</div>
	</body>
</html>