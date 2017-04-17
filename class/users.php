<?php
session_start();

class users {
	public $host="localhost";
	public $username="root";
	public $pass="";
	public $db_name="PHPQuiz";
	public $conn;
	public $data;
	public $topic;
	public $module;
	public $qus;

	public function __construct()
	{
		$this -> conn=new mysqli($this -> host, $this -> username, $this -> pass, $this -> db_name);
		if($this -> conn -> connect_errno)
		{
			die ("database connection failed".$this -> conn -> connect_errno);
		}
	}
	
	public function signup ($data)
	{

		$this -> conn -> query($data);
		return true;
	}
	
	public function signin ($email, $pass)
	{
		$query = $this -> conn -> query("select * FROM signup where email ='$email' and pass='$pass'");
		$query -> fetch_array (MYSQLI_ASSOC);
		
		if($query->num_rows>0)
		{
			$_SESSION['email']=$email;
			return true;
		}
		
		else
		{
			return false;
		}
	}
	
	public function user_profile($email){
		$query = $this -> conn -> query("select * FROM signup where email ='$email'");
		$row=$query -> fetch_array (MYSQLI_ASSOC);
		
		if($query->num_rows>0)
		{
			$this->data[]=$row;
		}
		return $this->data;
		
	}
	
		public function profilescore($id){
		$query = $this -> conn -> query("select * FROM score where user_id ='$id'");
		$row=$query -> fetch_array (MYSQLI_ASSOC);
		
		if($query->num_rows>0)
		{
			$this->data[]=$row;
		}
		return $this->data;
		
	}
	
	public function topic_display()
	{
		$query = $this -> conn -> query("select * FROM topic");
		while($row=$query -> fetch_array (MYSQLI_ASSOC))

		{
			$this->topic[]=$row;
		}
		return $this->topic;
	}
	
	public function module_display()
	{
		$query = $this -> conn -> query("select * FROM module");
		while($row=$query -> fetch_array (MYSQLI_ASSOC))

		{
			$this->module[]=$row;
		}
		return $this->module;
	}
	
	public function qus_show($qus){
		$query = $this -> conn -> query("select * FROM quizqs where topicid='$qus'");
		while($row=$query -> fetch_array (MYSQLI_ASSOC))
		{
			$this->qus[]=$row;
		}
		return $this->qus;
	}
	
	public function answer($data) {
		
		$ans=implode("", $data);
		$right=0;
		$wrong=0;
		$no_answer=0;
		$query = $this -> conn -> query("select qsid, question, right_answer FROM quizqs where topicid='".$_SESSION['topic']."'");
		while($qust=$query->fetch_array(MYSQLI_ASSOC))
		{
			if($qust['right_answer']==$_POST[$qust['qsid']]){
				$right++;
			}
			elseif($_POST[$qust['qsid']]=="no_attempt"){
				$no_answer++;
			}
			else
			{
				$wrong++;
			}
		}

		$array=array();
		$array['right']=$right;
		$array['wrong']=$wrong;
		$array['no_answer']=$no_answer;
		return $array;
	}


	public function feedback($data){
		$query = $this -> conn -> query("select * FROM quizqs where topicid='".$_SESSION['topic']."'");
		while($qust=$query->fetch_array(MYSQLI_ASSOC))
		{
				?><br><?php
				if($_POST[$qust['qsid']]){
				echo $qust['question']."<br>";		
				echo $qust['right_answer'];
				
				//echo $_POST[$qust['qsid']];
	
				?><br><?php
		}
	}
		
	}
	public function add_quiz($rec){
		$a = $this->conn->query($rec);
		return true;
	}
	
	public function url ($url)
	{
		header("Location: ".$url);
	}
}

	if (isset($_SESSION['email'])) {
		//echo "You have logged in";
	} 
	else {
	echo "Please Log In First";
	header("Location: ../index.php");
	}
?>