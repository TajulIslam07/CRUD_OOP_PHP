<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Responsive Table with Bootstrap 5</title>
</head>
<body>

<div class="container">
        <h1 class="my-4">Contact Form</h1>
        <form action="
        <?php
         if(isset($_POST['submit'])){

        require_once "conn.php";
        $table=new db();
        $table->insert($_POST['fname'],$_POST['lname'],$_POST['age'],$_POST['phone']);
        }
         ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="fname" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="name" name="lname" required
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    <table class='table table-responsive'>
        <thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col'>NAME</th>
            <th scope='col'>AGE</th>
            <th scope='col'>PHONE</th>
        </tr>
        </thead>
        <?php
            require_once "conn.php";
        $table=new db();
        $table->table('user');

        ?>


    </table>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

