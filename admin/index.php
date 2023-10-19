
<?php 
include 'partials/header.php';


//fetch current users posts from databse 
$current_user_id = $_SESSION['user-id'];
$query = "SELECT id , title , category_id FROM posts WHERE author_id =$current_user_id ORDER BY id DESC";
$posts = mysqli_query($connection , $query);

?>



<section class="dashboard">
<?php if(isset($_SESSION['add-post-success'])) : ?> <!-- Show if add post was  successful -->
    <div class="alert_message success container">
        <p>
            <?= $_SESSION['add-post-success'];
            unset($_SESSION['add-post-success']);
            ?>
        </p>
    </div>
    <?php elseif(isset($_SESSION['edit-post-success'])) : ?> <!-- Show if edit post was  successful -->
    <div class="alert_message success container">
        <p>
            <?= $_SESSION['edit-post-success'];
            unset($_SESSION['edit-post-success']);
            ?>
        </p>
    </div>
    <?php elseif(isset($_SESSION['edit-post'])) : ?> <!-- Show if edit post was not  successful -->
    <div class="alert_message success container">
        <p>
            <?= $_SESSION['edit-post'];
            unset($_SESSION['edit-post']);
            ?>
        </p>
    </div>
    <?php elseif(isset($_SESSION['delete-post-success'])) : ?> <!-- Show if delete post was successful -->
    <div class="alert_message error container">
        <p>
            <?= $_SESSION['delete-post-success'];
            unset($_SESSION['delete-post-success']);
            ?>
        </p>
    </div>
    <?php endif ?>
    <div class="container dashboard_container">
        <button id="show_sidebar-btn" class="sidebar_toggle"> <i class="fa-solid fa-chevron-right"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="fa-solid fa-chevron-left"></i></button>
        <aside>
            <ul>
                
                <li><a href="<?= ROOT_URL?>admin/add-post.php"><i class="fa-regular fa-address-card"></i>
                <h5>Add post</h5>
                </a>
            </li>

            <li><a href="<?= ROOT_URL?>admin/index.php" class="active"><i class="fa-solid fa-pen"></i>
                <h5>manage post</h5>
                </a>
            </li>
            <?php  if (isset($_SESSION['user_is_admin'])) : ?>
            <li><a href="<?= ROOT_URL?>admin/add-user.php"><i class="fa-solid fa-user"></i>
                <h5>Add User</h5>
                </a>
            </li>
            <li><a href="<?= ROOT_URL?>admin/manage-users.php" ><i class="fa-solid fa-users"></i>
                <h5>Manage Users</h5>
                </a>
            </li>
            <li><a href="<?= ROOT_URL?>admin/add-category.php"><i class="fa-solid fa-pen-to-square"></i>
                <h5> Add category</h5>
                </a>
            </li>
            <li><a href="<?= ROOT_URL?>admin/manage-categories.php" ><i class="fa-solid fa-list"></i>
                <h5>Manage Categories</h5>
                </a>
            </li>
            <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Manage posts</h2>
            <?php if(mysqli_num_rows($posts) > 0 ) :?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                
                    </tr>
                </thead>
                <tbody>
                    <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                    <!-- get category title from each post from categories table -->
                    <?php $category_id = $post['category_id'];
                         $category_query = "SELECT title FROM categories WHERE id=$category_id";
                         $category_result = mysqli_query($connection, $category_query);
                         $category = mysqli_fetch_assoc($category_result);
                         ?>
                    <tr>
                        <td> <?= $post['title']?> </td>
                        <td><?= $category['title'] ?> </td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id']?>" class="btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id']?>" class="btn sm danger">Delete</a></td>
                    </tr>
                        <?php endwhile ?>
                </tbody>
            </table>
            <?php else : ?>
                <div class="alert_message error"><?= "No posts Found" ?></div>
                <?php endif ?>
        </main>
    </div>
</section>



<?php 
include '../partials/footer.php';
?>