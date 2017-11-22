<?php 
	namespace  app\model;

	require_once(dirname(__FILE__) . '/../db/DB.php');
	
	use app\db\DB;

	class User {
		
		private $id;
		private $firstName;
		private $lastName;
		private $email;
		private $password;
		const TABLE = 'users';


	
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function create() 
   	{
   		try {
   			$db = new DB();
   			$conn = $db->getConnection();
   			$sql = "INSERT INTO " . self::TABLE . "(name, last_name, email, password) VALUES(:name, :last_name, :email, :password)";
   			$query = $conn->prepare($sql);
   			$result = $query->execute(array(':name' => $this->firstName, ':last_name' => $this->lastName, ':email' => $this->email, ':password' => $this->password));
   		} catch(Exception $e) {
   			$result = false;
   		} 
   		return $result;
  	}

    public static function findByEmail($email)
    {
        try {
            $db = new DB();
            $conn = $db->getConnection();
            $sql = "SELECT * FROM  " . self::TABLE . " WHERE email = :email limit 1";
            $query = $conn->prepare($sql);
            $result = $query->execute(array(':email' => $email));
            $user = null;
            if($row=$query->fetch(\PDO::FETCH_ASSOC)) {
                $user = new User();
                $user->setId($row['id']);
                $user->setFirstName($row['name']);
                $user->setLastName($row['last_name']);
                $user->setEmail($row['email']);
                $user->setPassword($row['password']);
            }
            return $user;
        } catch(Exception $e) {
            return null;
        }
    }
}
 ?>