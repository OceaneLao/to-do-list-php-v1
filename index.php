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
        My first to do list
    </h1>

    <!-- START MAIN SECTION TO ADD-->
    <div class="row text-bg-light p-3 rounded">
        <div class="add-section">
            <form action="controllers/controller_addtask.php" method="POST">

                <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <label for="title" class="form-label">Title of my to do list</label>
                    <input type="text" class="form-control" name="title" style="border-color: #ff6666" placeholder="This field is required">

                    <input type="hidden" name="id" value=<?php $id; ?>>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary" name="Add">Add &nbsp;<span>&#43;</span>
                        </button>

                    <?php } else { ?>
                        <label for="title" class="form-label">Title of my to do list</label>
                        <input type="text" class="form-control" name="title" placeholder="What you need to do ?">

                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-primary" name="Add">Add &nbsp;<span>&#43;</span>
                            </button>
                        </div>
                    <?php } ?>

            </form>
        </div>
    </div>
    <!-- END MAIN SECTION TO ADD-->

    <?php
    $todos = $db->query("SELECT * FROM todos ORDER BY id DESC");
    ?>

    <!-- START TO DO LIST-->

    <div class="row mt-3 text-bg-secondary p-2 rounded">
        <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="input-group text-bg-light p-2 mb-3 rounded">
                <input type="checkbox" class="check-box" id="<?php echo $todo['id'] ?>" />
                <label class="ms-2">
                    <?php echo $todo['title'] ?>
                </label>

                <p class="col-12">
                    Created : <?php echo $todo['date_time'] ?>
                </p>

                <span class="update-to-do">
                    <a href="update.php?id=<?php echo $todo['id'] ?>">✏</a>
                </span>

                <span class="remove-to-do">
                    <a href="controllers/controller_deletetask.php?id=<?php echo $todo['id'] ?>">❌</a>
                </span>
            </div>
        <?php } ?>
    </div>
    <!-- END TO DO LIST-->

    <script type="text/javascript">
        // AFFICHAGE D'UN MESSAGE POUR CONFIRMER OU ANNULER LA SUPPRESSION D'UNE TÂCHE
        const removeTask = document.getElementsByClassName("remove-to-do");

        for (const button of removeTask) {
            button.addEventListener("click", function(event) {
                const taskId = this.id;
                if (confirm("Are sure to delete task?")) {
                    removeItem(taskId);
                }
            });
        }

        // STYLE CHECKBOX
        document.addEventListener("DOMContentLoaded", function() {
            // Attend que le document soit complètement chargé

            const checkBoxes = document.querySelectorAll('.check-box');

            checkBoxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        this.nextElementSibling.style.textDecoration = 'line-through';
                        // Sauvegarder l'état de la case à cocher dans le stockage local
                        localStorage.setItem('checkbox' + checkbox.id, 'checked');
                    } else {
                        this.nextElementSibling.style.textDecoration = 'none';
                        localStorage.removeItem('checkbox' + checkbox.id);
                    }
                });

                // Vérifie si l'état de la case à cocher est sauvegardé dans le stockage local
                const storedState = localStorage.getItem('checkbox' + checkbox.id);
                if (storedState === 'checked') {
                    checkbox.checked = true;
                    checkbox.nextElementSibling.style.textDecoration = 'line-through';
                }
            });
        });
    </script>

</body>

</html>