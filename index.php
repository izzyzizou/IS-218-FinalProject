<?php
    $program = new program();
class program{
	
	function __construct(){
		
		$page = 'homepage';
		$arg = NULL;
		
		if(isset($_REQUEST['page'])){
			$page = $_REQUEST['page'];
		}
		
		if(isset($_REQUEST['arg'])){
			$arg = $_REQUEST['arg'];
		}
		
		$page = new $page($arg);
		
	}
	
	
}
	
abstract class page{
	
	public $content;
	
	function __construct($arg = NULL){
		
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			
			$this->get();
		}
		else{
			
			$this->post();
		}
	}
	
	function menu(){
				
	}
		
	function get(){
	}
	
	function post(){
	}
	
	function __destruct(){
		//Echo out some content
		echo $this->content;
	}
	
	
	
}
	
class homepage extends page{
	
	function get(){
		$this->content = '
		<h1> IS 218 Final Project </h1>
		<h2>College Data Project</h2>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question1">1. Colleges with the highest percentage of women students</a><br>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question2">2. Colleges with the highest percentage of male students</a><br>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question3">3. Colleges with the largest endowment overall</a><br>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question4">4. Colleges with the largest enrollment of freshman</a><br>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question5">5. Colleges with the highest revenue from tuition</a><br>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question6">6. Colleges with the lowest non zero tuition revenue</a><br>
		<h2>The Top 10 colleges by region for the following statistics:</h2>
		<a href = *>1. Endowment</a><br>
		<a href = *>2. Total Current Assets</a><br>
		<a href = *>3. Total current liabilities</a><br>
		<a href = *>4. Lowest non-zero tuition</a><br>
		<a href = *>5. Highest Tuition</a><br>
		
		';
	}
	
}
class question1 extends page
{
	function get()
	{
		$host = "sql1.njit.edu";
		$dbname = "ia85";
		$user = "ia85";
		$pass = 'carport85';
		try
		{
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$STH = $DBH->query("qry here");
			
			$this->content .= "<h1>Colleges with the highest percentage of women students<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['EFAGE08'] . "</td>";
				$this->content .= "</tr>";
			}
			
			$this->content .= "</table>";
			$DBH = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

class question2 extends page
{
	function get()
	{
		$host = "sql1.njit.edu";
		$dbname = "ia85";
		$user = "ia85";
		$pass = 'carport85';
		try
		{
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$STH = $DBH->query("qry here");
			
			$this->content .= "<h1>Colleges with the highest percentage of male students<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['EFAGE07'] . "</td>";
				$this->content .= "</tr>";
			}
			
			$this->content .= "</table>";
			$DBH = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

class question3 extends page
{
	function get()
	{
		$host = "sql1.njit.edu";
		$dbname = "ia85";
		$user = "ia85";
		$pass = 'carport85';
		try
		{
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$STH = $DBH->query("qry here");
			
			$this->content .= "<h1>Colleges with the largest endowment overall<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['EFAGE07'] . "</td>";
				$this->content .= "</tr>";
			}
			
			$this->content .= "</table>";
			$DBH = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

class question4 extends page
{
	function get()
	{
		$host = "sql1.njit.edu";
		$dbname = "ia85";
		$user = "ia85";
		$pass = 'carport85';
		try
		{
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$STH = $DBH->query("qry here");
			
			$this->content .= "<h1>Colleges with the largest enrollment of freshman<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['EFAGE07'] . "</td>";
				$this->content .= "</tr>";
			}
			
			$this->content .= "</table>";
			$DBH = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

class question5 extends page
{
	function get()
	{
		$host = "sql1.njit.edu";
		$dbname = "ia85";
		$user = "ia85";
		$pass = 'carport85';
		try
		{
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$STH = $DBH->query("qry here");
			
			$this->content .= "<h1>Colleges with the highest revenue from tuition<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['EFAGE07'] . "</td>";
				$this->content .= "</tr>";
			}
			
			$this->content .= "</table>";
			$DBH = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

class question6 extends page
{
	function get()
	{
		$host = "sql1.njit.edu";
		$dbname = "ia85";
		$user = "ia85";
		$pass = 'carport85';
		try
		{
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$STH = $DBH->query("qry here");
			
			$this->content .= "<h1>Colleges with the lowest non zero tuition revenue<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['EFAGE07'] . "</td>";
				$this->content .= "</tr>";
			}
			
			$this->content .= "</table>";
			$DBH = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>