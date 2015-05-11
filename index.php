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
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question3">3. Colleges with the largest enrollment overall</a><br>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question4">4. Colleges with the largest enrollment of freshman</a><br>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question5">5. Colleges with the highest revenue from tuition</a><br>
		<a href = "http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question6">6. Colleges with the lowest non zero tuition revenue</a><br>
		<a href = http://web.njit.edu/~ia85/IS-218-FinalProject/index.php?page=question7>7. The Top 10 colleges by region</a><br>
		
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
			
			$STH = $DBH->query("SELECT instnm, round(totalF / total * 100) AS percentage
								FROM hd13, ef13a
								WHERE hd13.unitid = ef13a.unitid
								ORDER BY percentage DESC
								LIMIT 10");
			
			$this->content .= "<h1>Colleges with the highest percentage of women students<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
					<th>% of women</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['instnm'] . "</td>";
				$this->content .= "<td>" . $rows['percentage'] . "</td>";
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
			
			$STH = $DBH->query("SELECT instnm, round(totalM / total * 100) AS percentage
								FROM hd13, ef13a
								WHERE hd13.unitid = ef13a.unitid
								ORDER BY percentage DESC
								LIMIT 10");
			
			$this->content .= "<h1>Colleges with the highest percentage of male students<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
					<th>% of Male</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['instnm'] . "</td>";
				$this->content .= "<td>" . $rows['percentage'] . "</td>";
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
			
			$STH = $DBH->query("SELECT instnm, FORMAT(f1a01,0) AS endowments
								FROM hd13, f1213
								WHERE hd13.unitid = f1213.unitid
								ORDER BY endowments DESC
								LIMIT 10;");
			
			$this->content .= "<h1>Colleges with the largest endowment overall<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
					<th>Endowment</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['instnm'] . "</td>";
				$this->content .= "<td>" . $rows['endowments'] . "</td>";
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
			
			$STH = $DBH->query("SELECT instnm, FORMAT(freshmen,0) AS freshman
						  FROM hd13, ef13c
						  WHERE hd13.unitid = ef13c.unitid
						  ORDER BY freshmen DESC
						  LIMIT 10;");
			
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
			
			$STH = $DBH->query("SELECT instnm, FORMAT(f1a01,0) AS tuition
						  FROM hd13, f1213
						  WHERE hd13.unitid = f1213.unitid
						  ORDER BY tuition DESC
						  LIMIT 10;");
			
			$this->content .= "<h1>Colleges with the highest revenue from tuition<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
					<th>Revenue</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['instnm'] . "</td>";
				$this->content .= "<td>" . $rows['tuition'] . "</td>";
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
			
			$STH = $DBH->query("SELECT instnm, FORMAT(f1a01,0) AS tuition
								FROM hd13, f1213
								WHERE hd13.unitid = f1213.unitid
								AND tuition != 0
								ORDER BY tuition ASC
								LIMIT 10;");
			
			$this->content .= "<h1>Colleges with the lowest non zero tuition revenue<h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
					<th>College Name</th>
					<th>Lowest Revenue</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['instnm'] . "</td>";
				$this->content .= "<td>" . $rows['tuition'] . "</td>";
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

class question7 extends page
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
			
			$STH = $DBH->query("select * from(
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '0'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1) alias
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '1'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 ) 
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '2'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 ) 
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '3'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 )
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '4'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 )
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '5'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 )
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '6'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 )
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '7'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 )
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '8'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 )
								UNION ALL (
								  select instnm, obereg, FORMAT(endowment,0)  AS endowments
								  from institution, financial 
								  where institution.unitid = financial.unitid
								  AND `obereg` =  '9'
								  group by institution.unitid
								  order by endowment desc
								  LIMIT 1 )");
			
			$this->content .= "<h1>The top 10 colleges by region <h1><br>";
			
			$this->content .= "<table border = 2>";
			$this->content .= "
				<tr>
				<th>College Name</th>
				<th>Region</th>
				<th>Total Endowment</th>
				</tr>
			";
			while($rows = $STH->fetch())
			{
				$this->content .= "<tr>";
				$this->content .= "<td>" . $rows['instnm'] . "</td>";
				$this->content .= "<td>" . $rows['obereg'] . "</td>";
				$this->content .= "<td>" . $rows['endowments'] . "</td>";
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