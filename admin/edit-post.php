
<?php 
include 'partials/header.php';

//fetch categories from database
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection ,$category_query);


//fetch post data from databse
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'] , FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection , $query);
    $post = mysqli_fetch_assoc($result);
} else{
    header('Location: ' . ROOT_URL . 'admin/');
    die();
}
?>

        <section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Post</h2>
       
            <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" value="<?= $post['id'] ?>" name="id">
            <input type="hidden" value="<?= $post['thumbnail'] ?>" name="previous_thumbnail_name">
            <input type="text" value="<?= $post['title'] ?>" name="title" placeholder="Title">
                 

                <select name="category">
                    <?php  while($category = mysqli_fetch_assoc($categories)) :  ?>

                    <option value="<?= $category['id']?>"><?= $category['title']?></option>
                    <?php  endwhile ?>
                </select>

        
                <div class="form_control inline">
                <?php  if(isset($_SESSION['user_is_admin'])) : ?>
                    <input name="is_featured"  value="1" type="checkbox" id="is_featured" checked>
                    <label for="is_featured" >Featured</label>
                    <?php  endif ?>
                </div>

                <div class="form_control">
            
                    <label for="thumbnail">change thumbnail</label>
                    <input name="thumbnail" type="file" id="thumbnail">
                </div>
                <label id="des-id" for="descreption">Body</label>            
                  <textarea name="body" id="des-id" rows="5"><?= $post['body']?></textarea>

                    <button class="btn" name="submit" type="submit">update Post</button>
                   
            </form>
    </div>
</section>

<?php 
include '../partials/footer.php';
?>