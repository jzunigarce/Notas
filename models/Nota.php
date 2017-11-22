<?php  
	namespace  app\model;

	require_once(dirname(__FILE__) . '/../db/DB.php');
	
	use app\db\DB;

	class Nota {
		
		private $id;
		private $content;
		private $idUser;
		const TABLE = 'notes';

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
	    public function getContent()
	    {
	        return $this->content;
	    }

	    /**
	     * @param mixed $content
	     *
	     * @return self
	     */
	    public function setContent($content)
	    {
	        $this->content = $content;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getIdUser()
	    {
	        return $this->idUser;
	    }

	    /**
	     * @param mixed $idUser
	     *
	     * @return self
	     */
	    public function setIdUser($idUser)
	    {
	        $this->idUser = $idUser;

	        return $this;
	    }

	    public function create () 
	    {
	    	try {
	   			$db = new DB();
	   			$conn = $db->getConnection();
	   			$sql = "INSERT INTO " . self::TABLE . "(content, id_user) VALUES(:content, :idUser)";
	   			$query = $conn->prepare($sql);
	   			$result = $query->execute(array(':content' => $this->content, ':idUser' => $this->idUser));
	   		} catch(Exception $e) {
	   			$result = false;
	   		} 
	   		return $result;
	    }

	    public static function findByUser ($user) 
	    {
	    	try {
	    		$db = new DB();
	    		$conn = $db->getConnection();
	    		$sql = "SELECT * FROM " . self::TABLE . " WHERE id_user = :idUser";
	    		$query = $conn->prepare($sql);
	    		$query->execute(array(
	    			':idUser' => $user
	    		));

	    		$notas = array();
	    		while($row=$query->fetch(\PDO::FETCH_ASSOC)) {
	    			$nota = new Nota();
	    			$nota->setId($row['id']);
	    			$nota->setContent($row['content']);
	    			$nota->setIdUser($row['id_user']);
	    			array_push($notas, $nota);
	    		}
	    		return $notas;
	    	} catch(Exception $e) {
	    		return null;
	    	}
	    }

	    public function delete($id)
	    {
	    	try {
	    		$db = new DB();
	    		$conn = $db->getConnection();
	    		$sql = "DELETE FROM " . self::TABLE . " WHERE id=:id";
	    		$query = $conn->prepare($sql);
	    		$result = $query->execute(array(':id' => $id));
	    	}catch(Exception $e) {
	    		$result = false;
	    	}
	    	return $result;
	    }
	}