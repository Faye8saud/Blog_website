
<?php

include 'partials/header.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //fetch category from database 
    $query= "SELECT * FROM categories WHERE id=$id";
    $result= mysqli_query($connection , $query);
    if(mysqli_num_rows($result) == 1){
        $category = mysqli_fetch_assoc($result);
    }
} else {
    header('Location: ' .ROOT_URL . 'admin/manage-users.php');
    die();
}
?>
        <section class="form_section">
    <div class="container form_section-container">
        <h2>Edit category</h2>
        <div class="alert_message error">
            <p>this is an error message</p>
        </div>
            <form action="<?= ROOT_URL?>admin/edit-category-logic.php" method="POST">
                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
                <label id="des-id" for="description">Descreption</label>            
                    
               <textarea name="description" value="<?= $category['description'] ?>" id="des-id" rows="4"></textarea>

                    <button class="btn" name="submit" type="submit">Update category</button>
                   
            </form>
    </div>
</section>



<?php 
include '../partials/footer.php';
?>