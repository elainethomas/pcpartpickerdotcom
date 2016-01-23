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
			$this->setPrice($newPrice);
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
		// base case: if the product id is null, this is a new product without a mySQL assigned id (yet)
		if($newProductId === null) {
			$this->ProductId = null;
			return;
		}

	//verify the product id is valid

		$newProductId = filter_var($newProductId). FILTER_VALIDATE_INT);
		if($newProductId === false) {
				throw(new InvalidArgumentException("product id is not a valid integer"));
			}

	//verify the product id is positive
		if($newProductId <= 0) {
			throw(new RangeException ("product id is not positive"));

	//convert and store the product id
		$this->productId = intval($newProductId);
	}
	}

		/**
		 * accessor method for tweet content
		 *
		 * @return string value of tweet content
		 **/
	public function getProductName() {
			return($this->productName);
		}

	/**
	 * mutator method for product name
	 *
	 * @param string $newTweetContent new name
	 * @throws InvalidArgumentException if $newProductName is not a string or insecure
	 * @throws RangeException if $newProductName is > 128 characters
	 **/
	public function setProductName($newProductName) {
			// verify the product name content is secure
			$newProductName = trim($newProductName);
			$newProductName = filter_var($newProductName FILTER_SANITIZE_STRING);
			if(empty($newProductName) === true) {
				throw(new InvalidArgumentException("product name content is empty or insecure"));
			}

			// verify the tweet content will fit in the database
			if(strlen($newProductName) > 128) {
				throw(new RangeException("product name content too large"));
			}

			// store the tweet content
			$this->productName = $newProductName;
		}

	/**
	 * accessor method for manufacturer content
	 *
	 * @return string value manufacturer name
	 **/
	public function getManufacturer() {
		return($this->manufacturer);
	}

	/**
	 * mutator method for manufacturer name
	 *
	 * @param string $newManufacturer name
	 * @throws InvalidArgumentException if $newManufacturer is not a string or insecure
	 * @throws RangeException if $newManufacturer is > 128 characters
	 **/
	public function setManufacturerName($newManufacturerName) {
		// verify the product name content is secure
		$newManufacturerName = trim($newManufacturerName);
		$newManufacturerName = filter_var($newManufacturerName FILTER_SANITIZE_STRING);
			if(empty($newManufacturerName) === true) {
				throw(new InvalidArgumentException("manufacturer name content is empty or insecure"));
			}

			// verify the tweet content will fit in the database
			if(strlen($newProductName) > 128) {
				throw(new RangeException("product name content too large"));
			}

			// store the tweet content
			$this->productName = $newProductName;
		}



}
