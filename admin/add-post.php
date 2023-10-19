
<?php 
include 'partials/header.php';

//fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection ,$query);

//get back form data if form was invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

//delete form data session
unset($_SESSION['add-post-data']);
?>

        <section class="form_section">
    <div class="container form_section-container">
        <h2>Add Post</h2>
        <?php if(isset($_SESSION['add-post'])) : ?>
        <div class="alert_message error">
          <p>
            <?= $_SESSION['add-post'];
            unset($_SESSION['add-post']);
            ?> 
          </p>
        </div>
        <?php  endif ?>
            <form action="<?= ROOT_URL?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="title" value="<?= $title ?>" id="" placeholder="Title">
                 

                <select name="category">
                    <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title']?></option>
                        <?php endwhile ?>
                </select>
                <div class="form_control">
            
            <label for="thumbnail">add thumbnail</label>
            <input type="file" name="thumbnail">
        </div>
        <label id="des-id" for="descreption">Descreption</label>            
          <textarea name="body"  value="<?= $body ?>" id="des-id" rows="5"></textarea>

                <div class="form_control inline">
                    <?php  if(isset($_SESSION['user_is_admin'])) : ?>
                    <input type="checkbox" name="is_featured" id="is_featured">
                    <label for="is_featured">Featured</label>
                    <?php endif  ?>
                </div>
                        
               

                    <button class="btn" name="submit" type="submit">Create Post</button>
                   
            </form>
    </div>
</section>


<?php 
include '../partials/footer.php';
?>