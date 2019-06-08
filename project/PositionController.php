<?php
include "PositionModel.php";
$position = new PositionModel($_SESSION["childId"]);
$position=$position->getPosition();

?>