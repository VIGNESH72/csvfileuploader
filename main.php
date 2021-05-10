<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$message = '';

if(isset($_POST["upload"]))
{
 if($_FILES['student_marklist_file']['name'])
 {
  $filename = explode(".", $_FILES['student_marklist_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['student_marklist_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $student_mark = mysqli_real_escape_string($connect, $data[0]);  
                $student_name = mysqli_real_escape_string($connect, $data[1]);
    $query = "
     UPDATE student_marklist 
     SET student_name = '$student_name', 
     student_password='$student_password'
     WHERE student_mark= '$student_mark'
    ";
    mysqli_query($connect, $query);
   }
   fclose($handle);
   header("location: index.php?updation=1");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">student_marklist Updation Done</label>';
}

$query = "SELECT * FROM student_marklist";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Update Mysql Database through Upload CSV File using PHP</title>
<script>
<src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
</script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script >
<src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Upload CSV File using PHP</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="student_marklist_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <?php echo $message; ?>
   <h3 align="center">Deals of the Day</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Student Name</th>
      <th>Student Mark</th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["student_name"].'</td>
       <td>'.$row["student_mark"].'</td>
	 <td>'.$row["student_password"].'</td>
      </tr>
      ';
     }
     ?>
    </table>
   </div>
  </div>
 </body>
</html>
