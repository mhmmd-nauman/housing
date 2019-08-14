<?php
session_start();
require_once "db.php";
$fullname = $_POST['fullname'];
$cnic = $_POST['cnic'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];
$city = $_POST['city'];
$image = $_FILES['fileToUpload']['name'];


// $sql = "INSERT INTO `customer` (`customer_name`, `cnic`, "
//         . " `address`, `mobile_number`, "
//         . " `email`, `password`, `image`) "
//         . "  VALUES "
//         . " (NULL, "
//         . " '$fullname', "
//         . " '$cnic', "
//         . " '$address', "
//         . " '$contact', "
//         . " '$email', "
//         . " '$password', "
//         . " '');";
// $result = $conn->query($sql);
//$row = $result->fetch_assoc();


// header("Location:index.php?message=success&text=Account created successfuly");
$query_db="SELECT * FROM customer WHERE `email`='$email'";
        $query=$conn->query($query_db);
        $numrow=$query->num_rows;
        if($numrow<=0){
$target_dir = "assets/dataimg/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


                    // ****Check if image file is a actual image or fake image****//

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

                            // ****Check if file already exists**** //
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
                    // **** Check file size ****//
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
             //****/ Allow certain file formats ****//
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else 
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
                    $sql = "INSERT INTO customer (customer_name,city, cnic, email,address,mobile_number,image,password,type)
            VALUES ('$fullname', '$city','$cnic', '$email','$address','$contact','$image','$password','$type')";

            if ($conn->query($sql) === TRUE){
                $id = $conn->insert_id;
                $d=$_SESSION['uid'] = array(
                    'email'=>$email,
                    'customer_name'=>$fullname,
                    'id'=>$id,
                    'type'=>$type,
                    'image'=>$image,
                    'city'=>$city 
                );
                if($d['type'] == "seller"){
                    header('location:vendor_panel/index.php');
                }else{
                    header('location:user_panel/index.php');
                }
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
                $conn->close();
                
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        else{
            ?>
                    <script>
                    alert("!!Email Already Register!");
                    window.open('register.php','_self');
                    </script>
                        <?php
                        
        }

?>

