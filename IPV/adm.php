<?php
//HERE LAYS THE CONNECTOR BETWEEN THE PAGE AND THE DATABASE
include("class/connector.php"); 
$consulta = "SELECT * FROM ipvtable";
	
$conn = $mysqli -> query($consulta) or die($mysqli -> error);
//$con variable will be used to fill up the HTML table bellow using while
//$mysqli -> query($consulta) is a SELECT QUERY in que DataBase
//$con = $mysqli -> query($consulta) or die($mysqli -> error);
//THESE VARIABLE WILL BE CALLED IN THE TABLE
$ID = "ID";
$SERVER = "SERVER"; 
$DUEDATE = "DUEDATE";
$DUE = "DUE";
$SEV = "SEV";
$ADVISORY = "ADVISORY";
$DESCRIPTION = "DESCRIPTION";
$COMPLETED = "COMPLETED";
?>

<html lang="en">
<head>
  <title>IPV - Management</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="css/reset.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="drop.css">
  <script src="tableToExcel.js"></script>
  
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>	
	
<script src="js/index.js"></script>

<style>
</style>

</head>

<body>

<font face="arial" size="5" color="#DF7401"><b>IPV - Records Management</b></font>
<!--START MENU CODING -->
<?php include('menu.php'); ?>
<!--END MENU CODING -->

<?PHP
session_start();
if(isset($_SESSION['nome_usu_sessao']))
        {
                ?>
	
	
  <section>
  <!-- RESPONSIVE TABLE <div style="overflow-y:auto;">-->
  <div>
      <!--<table id="myTable" cellpadding="0" cellspacing="0" border="0">-->
      <br>
      <center>
	<input type="button" class="mybutton" onclick="tableToExcel('myTable', 'W3C Example Table')" value="Export to Excel">
      </center>	
      <br>
      <table id="myTable1" cellpadding="0" cellspacing="0" border="0">
          <thead>
        <tr class="header">
	<th>Server</th>
	<th>Due Date</th>
	<th>Due</th>
	<th>Severity</th>
	<th>Advisory</th>
	<th>Description</th>
        <th>Completed</th>
	<th>Action</th>
        </tr>
      </thead>
      <tbody>
      	<?php while($dado = $conn->fetch_array()): ?>
	 <tr>
	<td><?php echo $dado[$SERVER]; ?></td>
	<td><?php echo $dado[$DUEDATE]; ?></td>
	<td><?php echo $dado[$DUE]; ?></td>
	<?php
	        if ($dado[$SEV] == 'L'){
		echo '<td style="background-color:#D0FA58;">';
                echo low; 
		}
                elseif ($dado[$SEV] == 'M'){
		echo '<td style="background-color:#FAAC58;">';
                echo medium; 
		}
		elseif ($dado[$SEV] == 'H'){
		echo '<td style="background-color:#FA5858;">';
		$STATUS = "Closed";
                echo high;
		} 
		?>
		</td>
	<td><?php echo $dado[$ADVISORY]; ?></td>
	<td><?php echo $dado[$DESCRIPTION]; ?></td>
	<td><?php echo $dado[$COMPLETED]; ?></td>
	<td>
	<?php
	echo "<a href='update.php?id=". $dado[$ID] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
        echo "<a href='delete.php?id=". $dado[$ID] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";	
	?>
	</td>
	<!--here below, example on how to add complement text to the column-->
	<!--<td><?php //echo $dado[$PROCUTILI]; ?>%</td>-->
        </tr>
	<?php endwhile; ?>
      </tbody>
    </table>
  </div>
</section>
</tr>
</table>

</script>
<!-- TABLE FILTER -->
<script src="tablefilter.js"></script>
<script src="test-alternate-rows.js"></script>

<!-- DROP BOX -->
<script src="script.js"></script>


                <?PHP
        }
else
        {
                ?>
        <div>
            <br>
            <br>
                Restrict area, logon is required - <a href="login.php"><strong>LOGIN HERE</strong></a>.
        </div>
                <?PHP
        }
?>


<script data-config>
//If setting here, it will ignore the MAIN JS.
//It is possible to customize many tables building new
//like this, for example demo2, demo3, with different attributes...
	
var filtersConfig = {
        base_path: '/',
        auto_filter: {
            delay: 1100 //milliseconds
        },
        filters_row_index: 1,
	col_0: 'select',
	col_1: 'select',
	col_2: 'select',
	col_3: 'select',
	col_4: 'select',
	col_5: 'select',
  col_6: 'select',
        state: true,	
	
        msg_filter: 'Filtering...'
    };
    var tf = new TableFilter('myTable', filtersConfig);
    tf.init();
</script>


</body>
</html>
