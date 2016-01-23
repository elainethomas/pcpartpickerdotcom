<?
//put this on the top of the file


require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("ramchip.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/enajera2.ini");


//now you can use the PDO object normally

$ramChip = new RamChip(null, 1, "this is from PHP");
$ramChip->insert($pdo);
$ramChip->setProductId("now I added an id");
$ramChip->setProductName("now I added a name for the ram chip, many words");
$ramChip->setManufacturerName("now I added a manufacturer name for the ram chip, there is no need to worry");
$ramChip->setPrice("now I added a price for the ram chip, wow such price");
$ramChip->update($pdo);

$ramChip->delete($pdo);
