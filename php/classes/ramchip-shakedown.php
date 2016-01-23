<?
//put this on the top of the file


require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("ramchip.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/enajera2.ini");


//now you can use the PDO object normally

$ramchip = new RamChip(null, 1, "this is from PHP");
$ramchip->insert($pdo);
$ramchip->update($pdo);
$ramchip->delete($pdo);