<?php
include 'dbconnect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>View Uploaded form</title>

</head>

<body>
    <div class="container my-4">
        <div class="row">
            <?php
              $sql = "Select *from `profile_details` ORDER BY sno DESC";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
                  $name = $row['name'];
                  $image = $row['image'];
            ?>
            <div class="col-md-3 mt-3">
                <div class="card" style="height:330px">
                    <a href="#"><img style="height: 250px;" src="<?php echo $image ?>" class="card-img-top" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="#"
                                class="text-decoration-none text-dark"><?php echo $name ?></a> </h5>
                    </div>
                </div>
            </div>
            <?php
              }
           ?>




        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>