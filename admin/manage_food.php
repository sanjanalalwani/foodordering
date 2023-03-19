<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br>
        <br>
        <br>
        <a href="<?php echo SITEURL; ?>admin/add_food.php" class="btn-primary">Add Food</a>
        <br>
        <br>
        <br>
        <br>
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <table class="tbl-full">
            <tr>
                <th>S.No</th>
                <th>Food Name</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Active</th>
            </tr>
            <?php
            $sql = "SELECT * FROM tbl_food";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    $sn=1;
            ?>
                    <tr>
                        <td><?php echo $sn++; ?> </td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/update_food.php?id=<?php echo $id;?>" class="btn-secondary">Update Food</a>
                            <a href="<?php echo SITEURL; ?>admin/delete_food.php?id=<?php echo $id ?>" class="btn-danger">Delete Food</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?> <tr>
                    <td colspan="7">
                        <div class="error">No Food Added.</div>
                    </td>
                </tr>
            <?php
            }
            ?>


        </table>
    </div>

</div>

<?php include('partials/footer.php') ?>