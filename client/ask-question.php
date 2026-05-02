<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask Question</title>
</head>

<body>
    <main class="container mt-5">
        <form class="row g-3" action="./server/requests.php" method="post">
            <div class="col-12">
                <label for="questionTitle" class="form-label">Question Title</label>
                <input type="text" class="form-control" name="title" id="questionTitle" placeholder="Enter Your Question" required>
            </div>
            <div class="col-12">
                <label for="questionDescription" class="form-label">Question Description</label>
                <textarea type="text" class="form-control" name="description" id="questionDescription" placeholder="Question Description" cols="30" rows="10" required></textarea>
            </div>
            <div class="col-12">
                <label for="questionCategory" class="form-label">Select Question Category</label>
                <?php include("category.php"); ?>
            </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="ask-btn">Ask</button>
            </div>
        </form>

    </main>
</body>

</html>