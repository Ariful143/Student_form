<?php

namespace App\classes;

class Student
{
    public function saveStudentInfo($data){
        $link= mysqli_connect('localhost','root', '', 'pictusphp72');
//        echo '<pre>';
//        print_r($link);
        $sql= "INSERT INTO students(name,email,mobile) VALUES('$data[name]','$data[email]','$data[mobile]')";
       if(mysqli_query($link, $sql)) {
           $message="Student info save successfully";
           return $message;
       }else{
           die("Query problem".mysqli_error($link));
       }
    }

    public function getAllStudentInfo(){
        $link= mysqli_connect('localhost','root', '', 'pictusphp72');
        $sql="SELECT * FROM students";
        if(mysqli_query($link,$sql)){
            $queryResult=mysqli_query($link,$sql);
//            echo '<pre>';
//            print_r($queryResult);
            return $queryResult;
        }else{
          die('Query Problem'.mysqli_error($link));
        }

    }


    public function getStudentInfoById($id){
        $link= mysqli_connect('localhost','root', '', 'pictusphp72');
        $sql="SELECT * FROM students Where id='$id'";
        if(mysqli_query($link,$sql)){
            $queryResult=mysqli_query($link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($link));
        }


    }

    public  function updateStudentInfo($data,$id){
        $link= mysqli_connect('localhost','root', '', 'pictusphp72');
        $sql="UPDATE students SET name='$data[name]', email='$data[email]', mobile='$data[mobile]' WHERE id='$id'";
        if(mysqli_query($link, $sql)) {
            header('Location: view-student.php');
            $message="Student info update successfully";
            return $message;
        }else{
            die("Query problem".mysqli_error($link));
        }
    }

}