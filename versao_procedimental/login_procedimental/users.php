<?php
	include("session.php");

	// informação da caixa de pesquisa
	if(isset($_POST['search']))
	{
		$valueToSearh = $_POST['valueToSearh'];
		$query = "SELECT * FROM users WHERE firstname LIKE '%".$valueToSearh."%' OR lastname LIKE '%".$valueToSearh."%'";
		$result = filterRecord($query);
	}
	else
	{
		$query = "SELECT *FROM users";
		$result = filterRecord($query);
	}

	function filterRecord($query)
	{
		include("config.php");
		$filter_result = mysqli_query($mysqli, $query);
		return $filter_result;
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="icon-bar">
      <a href="home.php"><i class="fa fa-home"></i></a>
      <a class="active" href="users.php"><i class="fa fa-user"></i></a>
      <a href="registration.php"><i class="fa fa-registered"></i></a>
      <a href="print_all.php" target="_blank"><i class="fa fa-print"></i></a>
      <a href="logout.php"><i class="fa fa-power-off"></i></a>
    </div>

    <h2>User</h2>
    <hr/>

    <div class="container">
       
       <table>
           <tr>
               <td>
                   <form action="" method="POST">
                        <input type="search" name="valueToSearh" placeholder="Procurar">
                        <button type="submit" class="signupbtn" name="search" >Procurar</button>
                    </form>
               </td>
               <td>
                   <a href="registration.php" class="Right">Adicionar Utilizador</a>
               </td>
           </tr>
       </table>
<?php


    echo "<table border='1'>
        <tr>
        <th>Nome</th>
        <th>Apelido</th>
        <th>Aniversário</th>
        <th>Editar</th>
        <th>Apagar</th>
        <th>PDF</th>
        </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['birthdate'] . "</td>";
    echo "<td><a href='edit.php?id=".$row['username']."'><img src='./images/icons8-Edit-32.png' alt='Edit'></a></td>";
    echo "<td><a href='delete.php?id=".$row['username']."'><img src='./images/icons8-Trash-32.png' alt='Delete'></a></td>";
    echo "<td><a href='print.php?id=".$row['username']."'><img src='./images/icons8-Print-32.png' alt='Print'></a></td>";
    echo "</tr>";
    }
    echo "</table>";

?>
    </div>
</body>
</html>
