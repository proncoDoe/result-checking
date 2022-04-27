<?php 


if(!empty($_POST["class_name"])) 
{
 $cid=$_POST['class_name'];


 $stmt = $conn->prepare("SELECT name,student_id FROM student WHERE class_name= :id order by name");
 $stmt->execute(array(':id' => $cid));
 ?><option value="">Select Category </option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
<option value="<?php echo htmlentities($row['student_id']); ?>"><?php echo htmlentities($row['name']); ?></option>
<?php
 }
}


?>