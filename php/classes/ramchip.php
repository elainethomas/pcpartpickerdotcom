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
	 *constructor for this RamChip
	 *
	 * @param int $newProductId id of this RamChip or null if a new RamChip
	 * @param string $newProductName string containing the product name
	 * @param string $newManufacturer string containing the name of the product manufacturer
	 * @param string $newModelName string containing the product name
	 * @param int $newPrice current sale price of product
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws Exception if some other exception is thrown
	 **/
	public function __construct($newProductId, $newProductName, $newManufacturer, $newModelName, $newPrice = null) {
		try {
			$this->setProductId($newProductId);
			$this->setProductName($newProductName);
			$this->setManufacturer($newManufacturer);
			$this->setModelName($newModelName);
		} catch(InvalidArgumentException $invalidArgument) {
			// rethrow the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			// rethrow the exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			// rethrow generic exception
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
	}

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
