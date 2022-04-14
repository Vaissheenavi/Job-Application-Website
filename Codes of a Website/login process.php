<?php     session_start();
  function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  //test connection
  require_once ("settings.php");      
  $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        echo "< p> Database collection failure </p>"; 
    }
    //if statement that prevents access to manage.php by url
    if (empty($_POST['username']) || empty($_POST['password']))
        {
            header ('Location: login.php');
            die();
        }

    else {
        $user = $_POST["username"];
        $user = sanitise_input($user);

        $pass = $_POST["password"];
        $pass = sanitise_input($pass);

        //$user = mysqli_real_escape_string($conn, $user_unsafe);  i think its better to jsut sanitise the variables
        //$pass = mysqli_real_escape_string($conn, $pass_unsafe);
         
        $query = "SELECT * FROM `login` WHERE `username`='$user' AND `password`='$pass'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_array($result);
            $name = $row["username"];
            $counter = mysqli_affected_rows($conn);
            $id = $row["id"];

            if ($counter == 0) {
                echo "<script type='text/javascript'>alert('Invalid Username or Password');
                document.location='login.php'</script>";
            }
            else {
                $_SESSION['id'] = $id;
                $_SESSION['id'] = $name;
                echo "<script type='text/javascript'>
                document.location='manager.php'</script>";
            }
    }     

?>