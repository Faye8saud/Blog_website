<?php
session_start();
require 'config/database.php';

if(isset($_POST['submit'])) {
    //get form data

    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title){
        $_SESSION['add-category'] = "Enter a title ";

    } elseif(!$description){
        $_SESSION['add-category'] = "Enter description";
    }

    //redirect back to aff category page with form data if there was inavalid input
   if(isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] =$_POST;
        header('Location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        //insert category into database
        //$query = "INSERT INTO categories (title , descreption) VALUES ('$title' , '$descreption')";
        $result = mysqli_query($connection , "INSERT INTO `categories` (`title`, `description`) VALUES ('$title' , '$descreption')");
        if(mysqli_errno($connection)){
            $_SESSION['add-category'] = "Couldnt add category";
            header('Location: ' . ROOT_URL . 'admin/add-category.php');
            die();

        }else{
            $_SESSION['add-category-success'] =  "category . $title .  added successfuly";
            header('Location: ' . ROOT_URL . 'admin/manage-categories.php');
            die();
        }
    }

}
?>