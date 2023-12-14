<?php
require 'connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="container mt-5">
    <h1 class="row mb-3">
        Update
    </h1>

    <!-- START MAIN SECTION TO UPDATE-->
    <div class="row text-bg-light p-3 rounded">
        <div class="add-section">
            <form action="controllers/controller_updatetask.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" method="POST">

                <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <label for="title" class="form-label">Modify</label>
                    <input type="text" class="form-control" name="title" style="border-color: #ff6666" placeholder="This field is required">

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary" name="Update">Update
                        </button>

                    <?php } else { ?>
                        <label for="title" class="form-label">Modify</label>
                        <input type="text" class="form-control" name="title" placeholder="Update your title">

                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-primary" name="Update">Update
                            </button>
                        <?php } ?>
                        </div>

            </form>
        </div>
    </div>
    <!-- END MAIN SECTION TO UPDATE-->

</body>

</html>