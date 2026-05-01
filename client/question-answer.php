<div class="ms-2 mb-4">
    <h5>Answer:</h5>
    <?php

    // question_is is declare and initialize in index.php 
    $query = "SELECT * FROM quention_answers WHERE question_id = $question_id";
    $answers = $conn->query($query);
    foreach ($answers as $ans) {
        echo "
        <div class='card ms-4 mb-3'>
                <p class='card-body'>
                        $ans[answer]
                </p>
        </div>
        ";
    }

    ?>
</div>