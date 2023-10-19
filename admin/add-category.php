<?php 
session_start();
include 'partials/header.php';

//get back form data if invalid
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);

?>


        <section class="form_section">
    <div class="container form_section-container">
        <h2>Add Category</h2>
       
        <?php 
        if(isset($_SESSION['add-category'])) :
        ?>
         <div class="alert_message error">
           <?= $_SESSION['add-category'];
           unset($_SESSION['add-category']); ?>
        </div>
        <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST" >
                <input type="text" name="title"  value="<?= $title ?>" placeholder="Title">

               <label id="des-id" for="description">Descreption</label>           
                    
               <textarea name="description" value="<?= $description ?>" id="des-id" rows="4"></textarea>
                    <button class="btn" name="submit" type="submit">Create category</button>
                   
            </form>
    </div>
</section>


<?php 
include '../partials/footer.php';
?>