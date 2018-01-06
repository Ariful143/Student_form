<?php
require_once 'vendor/autoload.php';
use App\classes\Student;

$id=$_GET['id'];
$queryResult=Student::getStudentInfoById($id);
$student=mysqli_fetch_assoc($queryResult);
//echo '<pre>';
//print_r($student);

$message='';
if(isset($_POST['btn'])){
    $message=Student::updateStudentInfo($_POST,$id);
}
?>



<hr/>
<a href="index_.php"> Add Student</a>
<a href="view-student.php"> View Student</a>
<hr/>
<form action="" method="POST">
    <table>
        <tr>
            <th>Name</th>
            <td><input type="text" value="<?php echo $student['name']?>" name="name"  /></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" value="<?php echo $student['email']?>" name="email" /></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="number" value="<?php echo $student['mobile']?>" name="mobile"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Update" </td>
        </tr>
    </table>
</form>