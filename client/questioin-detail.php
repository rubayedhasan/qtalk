<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Detail</title>
</head>

<body>
    <main class="container">
        <section>
            <div class="row">
                <!-- question-->
                <div class="col-8">
                    <h3 class="text-center mb-2">Question</h3>
                    <div>
                        <?php
                        include('./db/dbConnect.php');
                        // $question_id is decalare and initalize in the index page 
                        $query = "SELECT * FROM question_list WHERE id = $question_id";
                        $question = $conn->query($query);
                        $question_arr = $question->fetch_assoc();

                        echo "
                        <h4 class='text-info mb-3'>
                             Question: $question_arr[title]
                        </h4>
                        <p class='mb-4'>
                            $question_arr[description]
                        </p>
                        ";

                        // answer 
                        include('./client/question-answer.php');
                        ?>
                        <form action="./server/requests.php" method="post">
                            <input type="hidden" name="question_id" value=<?php echo "$question_id"; ?>>
                            <textarea class="form-control mb-3" name="questionAnswer" id="question-answer" placeholder="Write Your Answer"></textarea>
                            <button class="btn btn-primary" type="submit" name="answer-btn">Answer Question</button>
                        </form>
                    </div>
                </div>

                <!-- related question  -->
                <div class="col-4"></div>
            </div>
        </section>
    </main>
</body>

</html>