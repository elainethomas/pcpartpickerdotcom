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
	private $manufacturerName;
	/**
	 * the particular design or version of product
	 * @var string $model
	 */
	private $modelName;
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
	 * @param $newManufacturerName
	 * @param string $newModelName string containing the product name
	 * @param int $newPrice current sale price of product
	 * @throws Exception if some other exception is thrown
	 * @internal param string $newManufacturer string containing the name of the product manufacturer
	 */
	public function __construct($newProductId, $newProductName, $newManufacturerName, $newModelName, $newPrice = null) {
		try {
			$this->setProductId($newProductId);
			$this->setProductName($newProductName);
			$this->setManufacturerName($newManufacturerName);
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
			$this->productId = null;
			return;
		}

		// verify the product id is valid
		$newProductId = filter_var($newProductId, FILTER_VALIDATE_INT);
		if($newProductId === false) {
			throw(new InvalidArgumentException("product id is not a valid integer"));
		}

	//verify the product id is positive
		if($newProductId <= 0) {
			throw(new RangeException ("product id is not positive"));
		}

	//convert and store the product id
		$this->productId = intval($newProductId);
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
	 * @param string $newProductName new name
	 * @throws InvalidArgumentException if $newProductName is not a string or insecure
	 * @throws RangeException if $newProductName is > 128 characters
	 **/
	public function setProductName($newProductName) {
			// verify the product name content is secure
			$newProductName = trim($newProductName);
			$newProductName = filter_var($newProductName, FILTER_SANITIZE_STRING);
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
	public function getManufacturerName() {
		return($this->manufacturerName);
	}

	/**
	 * mutator method for manufacturer name
	 *
	 * @param string $newManufacturerName
	 * @throws InvalidArgumentException if $newManufacturerName is not a string or insecure
	 * @throws RangeException if $newManufacturerName is > 128 characters
	 **/
	public function setManufacturerName($newManufacturerName) {
		// verify the manufacturer name content is secure
		$newManufacturerName = trim($newManufacturerName);
		$newManufacturerName = filter_var($newManufacturerName,FILTER_SANITIZE_STRING);
			if(empty($newManufacturerName) === true) {
				throw(new InvalidArgumentException("manufacturer name content is empty or insecure"));
			}

		// verify the manufacturer name content will fit in the database
			if(strlen($newManufacturerName) > 128) {
				throw(new RangeException("manufacturer name content too large"));
			}

			// store the manufacturer name content
			$this->manufacturerName = $newManufacturerName;
		}

	/**
	 * accessor method for model name content
	 *
	 * @return string value model name
	 **/
	public function getModelName() {
		return($this->modelName);
	}

	/**
	 * mutator method for model name
	 *
	 * @param string $newModelName
	 * @throws InvalidArgumentException if $newModelName is not a string or insecure
	 * @throws RangeException if $newModelName is > 128 characters
	 **/

	public function setModelName($newModelName) {
		// verify the product name content is secure
		$newModelName = trim($newModelName);
		$newModelName = filter_var($newModelName,FILTER_SANITIZE_STRING);
		if(empty($newModelName) === true) {
			throw(new InvalidArgumentException("model name content is empty or insecure"));
		}

		// verify the model name content will fit in the database
		if(strlen($newModelName) > 128) {
			throw(new RangeException("model name content too large"));
		}

		// store the model name content
		$this->modelName = $newModelName;
	}

	/**
	 * accessor method for model name content
	 *
	 * @return int value model name
	 **/
	public function getPrice() {
		return($this->price);
	}

	/**
	 * mutator method for RamChip price
	 *
	 * @param double $newPrice new price of RamChip
	 * @throws InvalidArgumentException if $newPrice is not a double
	 * @throws RangeException if $newPrice is not positive
	**/
	public function setPrice($newPrice) {
		// verify the price value is valid
		$newPrice = filter_var($newPrice, FILTER_VALIDATE_INT);
		if($newPrice === false) {
			throw(new InvalidArgumentException("price value is not a valid integer"));
		}

		// verify the price value is positive
		if($newPrice <= 0) {
			throw(new RangeException("price value cannot be negative"));
		}

		// convert and store the price value
		$this->price = doubleval($newPrice);

}

	// ///////////////////////////////////////////////////////////////

	/**
	 * inserts this RamChip into mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function insert(PDO $pdo) {
		// enforce the productId is null (i.e., don't insert a product id that already exists)
		if($this->productId !== null) {  //**IT NEEDS TO NOT EXIST!!
			throw(new PDOException("not a new product id"));
			//DO NOT INSERT THE SAME KEY TWICE
		}

		// create query template
		$query	 = "INSERT INTO ramChip(productName, manufacturerName, modelName, price ) VALUES(:productName, :manufacturerName, :modelName, :price)";
		$statement = $pdo->prepare($query);
		//THERE IS NO PRIMARY KEY HERE BC WE ARE GOING TO INSERT IT

		// bind the member variables to the place holders in the template
		$parameters = array("productName" => $this->productName, "manufacturerName" => $this->manufacturerName, "modelName" => $this->modelName, "price" => $this->price);
		$statement->execute($parameters); //EXECUTE IS THE LIVE STEP TO THE DATABASE

		// update the null tweetId with what mySQL just gave us
		$this->tweetId = intval($pdo->lastInsertId()); //this permanently resolves the "EXISTENTIAL PROBLEM"
	}


	/**
	 * deletes this Tweet from mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function delete(PDO $pdo) {
		// enforce the tweetId is not null (i.e., don't delete a tweet that hasn't been inserted)
		if($this->tweetId === null) {  //**IT NEEDS TO BE SURE IT DOES EXIST
			throw(new PDOException("unable to delete a tweet that does not exist"));
		}

		// create query template
		$query	 = "DELETE FROM tweet WHERE tweetId = :tweetId";  //WITHOUT THE WHERE CLAUSE IT WILL DELETE ALL TWEETS
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = array("tweetId" => $this->tweetId);
		$statement->execute($parameters);
	}

	/**
	 * updates this Tweet in mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function update(PDO $pdo) {
		// enforce the tweetId is not null (i.e., don't update a tweet that hasn't been inserted)
		if($this->tweetId === null) {
			throw(new PDOException("unable to update a tweet that does not exist"));
		}

		// create query template  **IF THERE IS NO WHERE CLAUSE IT WILL UPDATE THE WHOLE THING
		$query	 = "UPDATE tweet SET profileId = :profileId, tweetContent = :tweetContent, tweetDate = :tweetDate WHERE tweetId = :tweetId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDate = $this->tweetDate->format("Y-m-d H:i:s");
		$parameters = array("profileId" => $this->profileId, "tweetContent" => $this->tweetContent, "tweetDate" => $formattedDate, "tweetId" => $this->tweetId);
		$statement->execute($parameters);

	}

