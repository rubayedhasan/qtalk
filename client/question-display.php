<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Question</title>
</head>

<body>
    <main class="container">
        <section>
            <div class="row">
                <!-- question list -->
                <div class="col-9">
                    <h4 class="text-start mb-4">Question List</h4>
                    <?php
                    include("./db/dbConnect.php");

                    if (isset($_GET['category_id'])) {
                        //cat_id declare and initialize in index.php
                        $query = "SELECT * FROM question_list WHERE category_id = $cat_id";
                    } else {

                        $query = "SELECT * FROM question_list";
                    }
                    $questions = $conn->query($query);
                    if ($questions->num_rows > 0) {
                        foreach ($questions as $qst) {
                            echo "
                        <div class='card mb-3'>
                               <div class='card-body'>
                                        <a href='?qst_id=$qst[id]'>$qst[title]</a>
                                </div>
                        </div>
                        ";
                        }
                    } else {
                        echo "NO data Fount in Database";
                    }
                    ?>
                </div>

                <!-- category list  -->
                <div class="col-1"></div>
                <div class="col-2">
                    <?php
                    include('./client/category-list.php');
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>

</html>