<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="Lato.css">
<link rel="stylesheet" href="font-awesome.min.css">
<link rel="stylesheet" href="drop.css">
<link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">	
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
    height: 100%;
    color: #777;
    
}
/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
/* First image (Logo. Full height) */
.bgimg-1 {
    background-image: url('wallpaper211.jpg');
    min-height: 35%;
}
/* Second image (Portfolio) */
.bgimg-2 {
    background-image: url("wallpaper111.jpg");
    min-height: 100px;
}
/* Third image (Contact) */
.bgimg-3 {
    background-image: url("wallpaper211.jpg");
    min-height: 100px;
}
.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}
/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
}
</style>
<style type="text/css" class="init">
	
	tfoot input {
		width: 100%;
		padding: 3px;
		box-sizing: border-box;
	}
	</style> 
<body>

<form name="form1" method="post">
<textarea rows="1000" name="queues[]" cols="100" style="width:300px;height:300px;"></textarea>
<input type="submit" name="submit" value="Submit" />
</form>

<?php
$con=mysqli_connect("127.0.0.1:3306","root","srsystem9823","msdb");
//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }	
if(isset($_POST["submit"]))
{
        if(!empty($_POST["queues"]))
        {
                echo '<h4>You have selected the following Queues:</4><br>';
                $submitted_array = array_keys($_POST["queues"]);                                                                  
		
                //BREAKING IN AN ARRAY
		$lines = explode(PHP_EOL, $_POST["queues"][$submitted_array[0]]);
                //foreach($lines as $queues)
                //{			
			//echo ($queues."<br>");
                //}
//REMOVING BLANK SPACES:		
function trim_value(&$value) 
{ 
    $value = trim($value); 
}
//ADDING QUOTES BETWEEN THE VALUES
function add_quotes($str) {
    return sprintf("'%s'", $str);
}
//REMOVING BLANK LINES		
array_walk($lines, 'trim_value');		
		
$VCS = "VCS";
$LPAR = "LPAR";
$HOSTF = "HOSTF";
$HOST = "HOST";
$OS = "OS";
$SLID = "SLID";
$VMID = "VMID";
$CLASSG = "CLASSG";
$IP = "IP";
$STATUS = "STATUS";
$LOCATION = "LOCATION";
$SLL = "SLL";
$FLL = "FLL";
$IM1 = "IM1";
$IM2 = "IM2";	
		
//USING IMPLODE		
//$sql=sprintf("SELECT * FROM main WHERE SSCDQ IN (".implode(',', $lines).")");
$sql=sprintf("SELECT DISTINCT IM1,FLL,SLL,VCS FROM main WHERE VCS IN (".implode(',', array_map('add_quotes',$lines)).")");		
//USED TO CHECK SQL SINTAX		
//echo $sql;		
			
$result=mysqli_query($con,$sql);	
}
else
{
        echo 'Please write something';
}
}
?>

<table id="demo1" cellpadding="0" cellspacing="0" style="width:100%" style="font-size:13px">
		    <thead>   
            <tr>
	    		            <th align=left>VCS</th>
		                    <th align=left>IM</th>
		                    <th align=left>FLL</th>
				    <th align=left>SLL</th>
           </tr>
             </thead>
                <?php while($dado = mysqli_fetch_array($result)) {?>
            
            <tbody>
            <tr>
	    		<td align=left style="font-size:14px"><?php echo $dado[$VCS]; ?></td>
		        <td align=left style="font-size:14px"><?php echo $dado[$IM1]; ?></td>
		    	<td align=left style="font-size:14px"><?php echo $dado[$FLL]; ?></td>
			<td align=left style="font-size:14px"><?php echo $dado[$SLL]; ?></td>
		        </tr>
             </tbody>
                <?php } ?>
                </table> <br><br>



</body>
</html>
