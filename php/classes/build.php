<?php
// namespace Edu\Cnm\Enajera2\DataDesign;

// require_once ("autoload.php");

/**
 * Build, a list of parts
 *
 *A Build refers to a completed build that used a specified product.
 *
 *@author Elaine Thomas <enajera2@cnm.edu>
 **/
class Build {
	/**
	 * id for this Build; this is the primary key
	 * @var int $buildId
	 **/
	private $buildId;
	/**
	 * id for profile who created build
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * id for the product(s) included in this build
	 * @var int $productId
	 */
	private $productId;
	/**
	 * the particular design or version of product
	 * @var string $modelName
	 */
	private $productName;

	/**
	 *constructor for this Build
	 *
	 * @param int $newBuildId id of this Build
	 * @param int $newProfileId id of the user who created the build
	 * @param int $newProductId id of the product included in the build
	 * @param string $newProductName string containing the product name
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws Exception if some other exception is thrown
	 **/
	public function __construct( $newBuildId, $newProfileId, $newProductId, $newProductName) {
		try {
			$this->setBuildId($newBuildId);
			$this->setProductId($newProductId);
			$this->setProfileId($newProfileId);
			$this->setProductName($newProductName);
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
	 *accessor method for build id
	 *
	 *@return int value of build id
	 **/
	public function getBuildId () {
		return($this->buildId);
	}

	/**
	 * mutator method for build id
	 *
	 * @param int $newbuildId new value of build id
	 * @throws InvalidArgumentException if product id is not an integer
	 * @throws RangeException if product id is negative
	 **/
	public function setBuildId($newBuildId) {
		// base case: if the build id is null, this is a new build without a mySQL assigned id (yet)
		if($newBuildId === null) {
			$this->buildId = null;
			return;
		}

		// verify the build id is valid
		$newBuildId = filter_var($newBuildId, FILTER_VALIDATE_INT);
		if($newBuildId === false) {
			throw(new InvalidArgumentException("build id is not a valid integer"));
		}

		//verify the build id is positive
		if($newBuildId <= 0) {
			throw(new RangeException ("build id is not positive"));
		}

		//convert and store the build id
		$this->buildId = intval($newBuildId);
	}

	/**
	 *accessor method for profile id
	 *
	 *@return int value of profile id
	 **/
	public function getProfileId () {
		return($this->profileId);
	}

	/**
	 * mutator method for profile id
	 *
	 * @param int $newProfileId new value of profile id
	 * @throws InvalidArgumentException if profile id is not an integer
	 * @throws RangeException if product id is negative
	 **/

	public function setProfileId($newProfileId) {
		/**	// base case: if the profile id is null, this is a new profile without a mySQL assigned id (yet)
		 // I don't think I need this piece of code for this attribute
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}
		**/
		// verify the profile id is valid
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newProfileId === false) {
			throw(new InvalidArgumentException("profile id is not a valid integer"));
		}

		//verify the profile id is positive
		if($newProfileId <= 0) {
			throw(new RangeException ("profile id is not positive"));
		}

		//convert and store the profile id
		$this->profileId = intval($newProfileId);
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
	 * accessor method for product name content
	 *
	 * @return string value of product name content
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
		$newProductName = trim($newProductName);  //removes all of the white space around it
		$newProductName = filter_var($newProductName, FILTER_SANITIZE_STRING);
		if(empty($newProductName) === true) {
			throw(new InvalidArgumentException("product name content is empty or insecure"));
		}

		// verify the product name will fit in the database
		if(strlen($newProductName) > 128) {
			throw(new RangeException("product name content too large"));
		}

		// store the product name content
		$this->productName = $newProductName;
	}

	/**
	 * inserts this Build into mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function insert(PDO $pdo) {
		// enforce the buildId is null (i.e., don't insert a build id that already exists)
		if($this->buildId !== null) {  //**IT NEEDS TO NOT EXIST!!
			throw(new PDOException("this build id already exists"));
			//DO NOT INSERT THE SAME KEY TWICE
		}

		// create query template
		$query	 = "INSERT INTO build(profileId, productId, productName) VALUES(:profileId, :productId, :productName)";
		$statement = $pdo->prepare($query);
		//THERE IS NO PRIMARY KEY HERE BC WE ARE GOING TO INSERT IT

		// bind the member variables to the place holders in the template
		$parameters = array("buildId" => $this->profileId, "productId" => $this->productId, "productName" => $this->productName);
		$statement->execute($parameters); //EXECUTE IS THE LIVE STEP TO THE DATABASE

		// update the null buildId with what mySQL just gave us
		$this->buildId = intval($pdo->lastInsertId()); //this permanently resolves the "EXISTENTIAL PROBLEM"
	}

	/**
	 * deletes this Build from mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function delete(PDO $pdo) {
		// enforce the productId is not null (i.e., don't delete a ram chip that hasn't been inserted)
		if($this->buildId === null) {  //**IT NEEDS TO BE SURE IT DOES EXIST
			throw(new PDOException("unable to delete a build that does not exist"));
		}

		// create query template
		$query	 = "DELETE FROM build WHERE buildId = :buildId";  //WITHOUT THE WHERE CLAUSE IT WILL DELETE ALL TWEETS
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = array("buildId" => $this->builId);
		$statement->execute($parameters);
	}

	/**
	 * updates this Build in mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function update(PDO $pdo) {
		// enforce the buildId is not null (i.e., don't update a build that hasn't been inserted)
		if($this->buildId === null) {
			throw(new PDOException("unable to update a build that does not exist"));
		}

		// create query template  **IF THERE IS NO WHERE CLAUSE IT WILL UPDATE THE WHOLE THING
		$query	 = "UPDATE build SET buildId = :buildId, profileId = :profileId, productId = :productId, productName = :productName WHERE builId = :buildId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = array("buildId" => $this->profileId, "productId" => $this->productId, "productName" => $this->productName);
		$statement->execute($parameters);
	}

	/**
	 * gets the Build by profileId
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @param int $profileId profile id to search for
	 * @return mixed Build found or null if not found
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getBuildByProfileId(PDO $pdo, string $profileId) {
		// sanitize the description before searching
		$profileId = filter_var($profileId, FILTER_VALIDATE_INT);
		if($profileId === true) {
			throw(new PDOException("profile id is not an integer"));
		}

		if($profileId <= 0) {
			throw(new PDOException("profile id is not positive"));
		}
		// create query template
		$query	 = "SELECT buildId, profileId, productId, productName  FROM build WHERE profileId LIKE :profileId";
		$statement = $pdo->prepare($query);

		// bind the profile id to the place holder in the template
		$parameters = array("profileId" => $profileId);
		$statement->execute($parameters);

		// grab the tweet from mySQL
		try {
			$tweet = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row   = $statement->fetch();
			if($row !== false) {
				$tweet = new Tweet($row["tweetId"], $row["profileId"], $row["tweetContent"], $row["tweetDate"]);
			}
		} catch(Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return($tweet);

// //////////////////////
/**
		// build an array of  ram chips
		$ramChips = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$ramChip = new RamChip($row["productId"], $row["productName"], $row["manufacturerName"], $row["modelName"], $row["price"]);
				$ramChips[$ramChips->key()] = $ramChip;
				$ramChips->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($ramChips);
	}
**/
	/**
	 * gets the RamChip by productId
	 *
	 * @param PDO $pdo PDO connection object
	 * @param int $productId product id to search for
	 * @return mixed RamChip found or null if not found
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getRamChipByProductId(PDO $pdo, $productId) {
		// sanitize the productId before searching
		$productId = filter_var($productId, FILTER_VALIDATE_INT);
		if($productId === false) {
			throw(new PDOException("product id is not an integer"));
		}
		if($productId <= 0) {
			throw(new PDOException("product id is not positive"));
		}

		// create query template
		$query	 = "SELECT productId, productName, manufacturerName, modelName, price FROM ramChip WHERE productId = :productId";
		$statement = $pdo->prepare($query);

		// bind the product id to the place holder in the template
		$parameters = array("productId" => $productId);
		$statement->execute($parameters);

		// grab the ram chip from mySQL

		try {
			$ramChip = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row   = $statement->fetch();
			if($row !== false) {
				$ramChip = new RamChip($row["productId"], $row["productName"], $row["manufacturerName"], $row["modelName"], $row["price"]);
			}
		} catch(Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return($ramChip);
	}

	/**
	 * gets all ram chips
	 *
	 * @param PDO $pdo PDO connection object
	 * @return SplFixedArray all RamChips found
	 * @throws PDOException when mySQL related errors occur
	 **/
	public static function getAllRamChips(\PDO $pdo) {
		// create query template
		$query = "SELECT productId, productName, manufacturerName, modelName, price FROM ramChip";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of ram chips
		$ramChips = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$ramChip = new RamChip($row["productId"], $row["productName"], $row["manufacturerName"], $row["modelName"], $row["price"]);
				$ramChips[$ramChips->key()] = $ramChip;
				$ramChip->next();
			} catch(Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($ramChips);
	}
}

