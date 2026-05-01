<div>
    <h4 class="text-center mb-4">Categories</h4>
    <ol class="list-group list-group-numbered">
        <?php
        include('./db/dbConnect.php');
        $query = "SELECT * FROM category";
        $categories = $conn->query($query);


        foreach ($categories as $category) {
            $cateory_id = $category['id'];
            $category_name = ucfirst($category['name']);
            echo "
        <a href='?category_id=$cateory_id' class='list-group-item list-group-item-action'>$category_name</a>
        ";
        }

        ?>
    </ol>
</div>