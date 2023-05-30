<?php 

include 'database.php';

class Question extends database{

	public function addQuestion($title,$description,$user_id)
	{
		$created_at = date('Y-m-d H:i:s');
		$sql = "INSERT INTO questions (title,description,user_id,created_at) VALUES ('$title','$description','$user_id','$created_at')";
		$this->execute($sql);
		return true;
	}

}

 ?>