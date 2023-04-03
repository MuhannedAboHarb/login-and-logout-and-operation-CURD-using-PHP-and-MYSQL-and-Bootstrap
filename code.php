<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string(Connect(), $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query(Connect(), $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string(Connect(), $_POST['student_id']);

    $name = mysqli_real_escape_string(Connect(), $_POST['name']);
    $email = mysqli_real_escape_string(Connect(), $_POST['email']);
    $phone = mysqli_real_escape_string(Connect(), $_POST['phone']);
    $course = mysqli_real_escape_string(Connect(), $_POST['img']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', img='$img' WHERE id='$student_id' ";
    $query_run = mysqli_query(Connect(), $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string(Connect(), $_POST['name']);
    $email = mysqli_real_escape_string(Connect(), $_POST['email']);
    $phone = mysqli_real_escape_string(Connect(), $_POST['phone']);
    $course = mysqli_real_escape_string(Connect(), $_POST['img']);

    $query = "INSERT INTO students (name,email,phone,img) VALUES ('$name','$email','$phone','$img')";

    $query_run = mysqli_query(Connect(), $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>