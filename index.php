<?php
include 'dbconnect.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];

    $file = $_FILES['fileToUpload'];
    $filename = $file['name'];
    $filePath = $file['tmp_name'];
    $fileError = $file['error'];

    $file_Ext_sep = explode(".",$filename);
    $file_Ext = strtolower(end($file_Ext_sep));
    $file_Exts = array("jpg","jpeg","png");
   
    
    if($fileError == 0){
        if(in_array($file_Ext , $file_Exts)){
            $filedest = 'images/'.$filename;
            move_uploaded_file($filePath , $filedest);
            $insertSql = "INSERT INTO `profile_details`(`name` , `image`)VALUES('$name','$filedest')";
            $insertResult = mysqli_query($conn , $insertSql);
            if($insertResult){
                echo '<script>
                alert("File Uploaded");
               </script>';
            }
            else{
                echo '<script>
                alert("Sorry try again!");
               </script>';
            }
        }
        else{
            echo '<script>
            alert("Only jpeg,jpg,png allowed");
           </script>';
        }
    }
    else{
        echo '<script>
        alert("Sorry there are no file found");
       </script>';
    }
}
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
    <title>Files Uploaded form</title>
    <style>
    .lftrnd {
        border-radius: 144px 0px 0px 144px;
    }
    </style>
</head>

<body>
    <h1 class="text-center">Profile Upload</h1>
    <div class="container rounded-3 bg-primary bg-gradient col-xl-10 col-xxl-10 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-4 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Welcome</h1>
                <p class="col-lg-10 fs-4">Please fill all details very carefully.</p>
                <a class="btn btn-lg btn-warning my-3" href="show.php">Click View</a>
            </div>
            <div class="col-md-11 col-lg-8">
                <form class="p-2 p-md-5 border lftrnd bg-light" method="post" enctype="multipart/form-data">
                    <br class="my-4">
                    <div class="form-floating my-4 mx-5">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name"
                            required>
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="my-3 mx-5">
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"
                            aria-describedby="emailHelp" required>
                    </div>
                    <input class="btn btn-lg btn-primary mx-5" type="submit" name="submit" value="Submit">
                    <hr class="my-4">
                    <small class="text-muted mx-5 px-5">By clicking Submit, you agree to the terms of use.</small>
                </form>
            </div>
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