<?php
include('auth.php');
include('db.php');
// if (isset($_POST["employee_id"])) {
//     // echo $_POST["employee_id"];
//     $output = '';
//     $query = "SELECT * FROM users WHERE user_id = '" . $_POST["employee_id"] . "'";
//     $result = mysqli_query($connect, $query);
//     $output .= '  
//      <div class="table-responsive">  
//           <table class="table table-bordered">';
//     while ($row = mysqli_fetch_array($result)) {
//         $output .= '  
//                <tr>  
//                     <td width="30%"><label>Name</label></td>  
//                     <td width="70%">' . $row["name"] . '</td>  
//                </tr>  
//                <tr>  
//                     <td width="30%"><label>Email</label></td>  
//                     <td width="70%">' . $row["email"] . '</td>  
//                </tr>  
//                <tr>  
//                     <td width="30%"><label>Status</label></td>  
//                     <td width="70%">' . $row["status"] . '</td>  
//                </tr>  
//                <tr>  
//                     <td width="30%"><label>Uploaded_on</label></td>  
//                     <td width="70%">' . $row["uploaded_on"] . '</td>  
//                </tr>  

//           ';
//     }
//     $output .= '  
//           </table>  
//      </div>  
//      ';
//     echo $output;
// }

// ##################################################################
// delete post

if (isset($_POST['delete_post'])) {
    $deleteid = $_POST['delete_post'];
    if ($deleteid) {
        $sql = "DELETE from urlfetcher WHERE content_id = '$deleteid' ";

        if (mysqli_query($connect, $sql)) {
            echo json_encode(array("statusCode" => 1));
        } else {
            echo json_encode(array("statusCode" => 2));
        }
    } else {
        echo json_encode(array("statusCode" => 2));
    }
}


// ##################################################################


// Delete user
if (isset($_POST['delete_user'])) {
    $deleteid = $_POST['delete_user'];
    if ($deleteid) {
        $sql = "DELETE from users WHERE user_id = '$deleteid' ";

        if (mysqli_query($connect, $sql)) {
            echo json_encode(array("statusCode" => 1));
        } else {
            echo json_encode(array("statusCode" => 2));
        }
    } else {
        echo json_encode(array("statusCode" => 2));
    }
}
// ##################################################################
// Update Data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $sql = "UPDATE `users` 
   SET `name`='$name',
   `status`='$status',
   `uploaded_on`=NOW()
   WHERE user_id=$id";
    if (mysqli_query($connect, $sql)) {
        echo json_encode(array("statusCode" => 1));
    } else {
        echo json_encode(array("statusCode" => 2));
    }
    mysqli_close($connect);
}
