<?php
/**
 * RamChip, a temporary memory module
 *
 *A ramChip refers to RAM (random access memory) pluggable, essential computer component.
 *A ramChip is a saleable product.
 *
 *@author Elaine Thomas <enajera2@cnm.edu>
 **/
class RamChip {
	/**
	 * id for this RamChip; this is the primary key
	 * @var int $productId
	 **/
	private $productId;
	/**
	 *product name supplied by manufacturer
	 *@var string $productName
	 **/
	private $productName;
	/**
	 * product manufacturer name
	 * @var string $manufacturer
	 */
	private $manufacturer;
	/**
	 * the particular design or version of product
	 * @var string $model
	 */
	private $model;
	/**
	 * the sale price supplied by manufacturer
	 * @var int $price
	 */
	private $price;

	/**
	 *accessor method for product id
	 *
	 *@return int value of product id
	 **/
	public function getProductId () {
		return($this->productId);
	}

	/**
	 * mutator method for product id
	 *
	 * @param int $newProductId new value of product id
	 * @throws InvalidArgumentException if product id is not an integer
	 * @throws RangeException if product id is negative
	 **/
	public function setProductId($newProductId) {
		//first apply the filer to the input
		$newProductId = filter_var($newProductId, FILTER_VALIDATE_INT);

		//if filter var()rejects the new id, throw an Exception
		if ($newProductId <= 0) {
				throw(new RangeException("product id must be positive"));
	}
		//finally, if we got here, we know it's a valid id - save it to the object
		$this->productId = $newProductId;
	}
}

try {

	$ramChip = new RamChip();
	$ramChip->setProductId("not an integer");
} catch(Exception $exception) {
	echo "Exception: " . $exception->getMessage();
} catch(TypeError $typeError) {
	echo "Type Error: " . $typeError->getMessage();
}
