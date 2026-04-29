<select class="form-select" name="category" id="questionCategory">
    <option value="">Select Question Category</option>
    <?php
    include("./db/dbConnect.php");
    $query = "SELECT * FROM category";
    $cateories = $conn->query($query);
    foreach ($cateories as $category) {
        $categoryId =  $category["id"];
        $categoryName = ucfirst($category["name"]);
        echo "<option value='$categoryId'>$categoryName</option>";
    }
    ?>
</select>