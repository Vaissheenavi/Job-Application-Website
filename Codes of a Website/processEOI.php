<?php 

 function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!isset($_POST["firstname"])) {
    header("location:apply.php");
    exit();
    
    
}else {

    $JobRefNum = $FirstName = $LastName = $StreetAddress = $Suburb = $State = $Postcode = $Email = $PhoneNumber = $Skills = $OtherSkills = ''; 
    
    $errMsg ="";

        $JobRefNum = $_POST["jobrefnum"];
        if (!isset ($_POST["jobrefnum"]))
            $errMsg .= "<p>Please enter the job reference number.</p>";
        else if (!preg_match ("/^[A-Za-z0-9]{5}$/", $JobRefNum))
            $errMsg .= "<p>Job Reference Number must be exactly 5 alphanumeric characters.</p>";


        $FirstName = $_POST["firstname"];                                          
        if (!isset ($_POST["firstname"]))  
            $errMsg .= "<p>Please enter your first name.</p>";
        else if (!preg_match ("/^[a-zA-Z]{1,20}$/", $FirstName))
            $errMsg .= "<p>First name must be max 20 alpha characters.</p>";


        $LastName = $_POST["lastname"];
        if (!isset ($_POST["lastname"]))    
            $errMsg .= "<p>Please enter your last name.</p>";
        else if (!preg_match ("/^[a-zA-Z]{1,20}$/", $LastName))
            $errMsg .= "<p>Last name must be max 20 alpha characters.</p>" ;
            

            $Birth = $_POST["dateofbirth"];
            //echo $Birth; 
            if (!isset ($_POST["dateofbirth"]))    
                $errMsg .= "<p>Please enter a valid date of birth. </p>";
            else if (!preg_match ("/^\d{4}.\d{1,2}.\d{1,2}$/",$Birth)){
                $errMsg .= "<p>Please enter a valid date of birth and it has to match dd/mm/yyyy</p>" ;
            }   
            else {
                $dob = date(str_replace("/","-", $Birth));
                $currentDate = date ("d-m-Y");
                $age = date_diff(date_create($dob), date_create($currentDate));
                $age = $age ->format("%y");
                //echo $age;
            if($age < 15 || $age > 80)
                $errMsg .= "<p> You must be between 15 and 80 years old. </p>";
            }    


        
        if(!isset($_POST["gender"])){
            $errMsg .= "<p>Please enter your gender. </p>";
        }
        else{
            $Gender = $_POST["gender"]; 
        }


        $StreetAddress = $_POST["streetaddress"];
        if (!isset ($_POST["streetaddress"])) 
            $errMsg .= "<p>Please enter your street address. </p>";
        else if (!preg_match ("/^[#.0-9a-zA-Z\s,-]{1,40}$/", $StreetAddress))
            $errMsg .= "<p>The street address must be max 40 characters.</p>";


        $Suburb = $_POST["suburbtown"];
        if (!isset ($_POST["suburbtown"]))   
            $errMsg .= "<p>Please enter your suburb. </p>";
        else if (!preg_match ("/^[#.0-9a-zA-Z\s,-]{1,40}$/", $Suburb))
            $errMsg .= "<p>The suburb must be max 40 characters.</p>";


        $State = $_POST["state"];
        if ($State == ""){								
            $errMsg .= "<p>You must select your state.</p>\n";
         }
        

         $Postcode = $_POST["postcode"];
        if (!isset ($_POST["postcode"])) 
            $errMsg .= "<p>Please enter your postcode. </p>";
        else if (!preg_match ("/^[0-9]{4}$/", $Postcode)){
            $errMsg .= "<p>The postcode has to be exactly 4 digits. </p>" ; 
            //echo $Postcode[0];
        }
        else{
                switch ($State){
                case "VIC":
                    if ($Postcode[0] != "3" && $Postcode[0] != "8"){					//VIC post code must start with 3 or 8
                        $errMsg .= "<p>VIC post code must start with 3 or 8.</p>\n";
                    }
                    break;
                
                case "QLD":
                    if ($Postcode[0] != "4" && $Postcode[0] != "9"){					//QLD post code must start with 4 or 9
                        $errMsg .= "<p>QLD post code must start with 4 or 9.</p>\n";
                    }
                    break;
                
                case "SA":
                    if ($Postcode[0] != "5"){										//SA post code must start with 5
                        $errMsg .= "<p>SA post code must start with 5.</p>\n";
                    }
                    break;
                case "TAS":
                    if ($Postcode[0] != "7"){										//TAS post code must start with 7
                        $errMsg .= "<p>TAS post code must start with 7.</p>\n";
                    }
                    break;
             case "WA":
                if ($Postcode[0] != "6"){										//NA post code must start with 6
                      $errMsg .= "<p>WA post code must start with 6.</p>\n";
                   }
                break;
                case "NT":
                if ($Postcode[0] != "0"){										//NT and ACT post code must start with 0
                        $errMsg .= "<p>NT post code must start with 0.</p>\n";
                    }
                    break;
                case "ACT":
                    if ($Postcode[0] != "0"){										//NT and ACT post code must start with 0
                        $errMsg .= "<p>ACT post code must start with 0.</p>\n";
                    }
                    break;
             case "NSW":
                 if ($Postcode[0] != "1" && $Postcode[0] != "2"){					//NSW post code must start with 1 or 2
                      $errMsg .= "<p>NSW post code must start with 1 or 2.</p>\n";
                   }
                break;
                }
            }    



        $Email = $_POST["email"];
        if (!isset ($_POST["email"]))   
            $errMsg .= "<p>Please enter an email</p>";
        elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL))   
            $errMsg .= "<p>The email is in the wrong format. </p>" ; 
        

        $PhoneNumber = $_POST["phonenum"];
        if (!isset ($_POST["phonenum"]))        
            $errMsg .= "<p>Please enter your phone number.</p>";
        elseif (!preg_match ("/^[0-9]{8,12}$/", $PhoneNumber))
            $errMsg .= "<p>Phone number has to be 8 to 12 digits.</p>";  
        

        if (isset ($_POST["list"])){
            $Skills = $_POST["list"]; 
            $Skills = implode (", ", $Skills); 
            $others = $_POST["others"];
            $OtherSkills = $others;
            if(in_array('otherskills', $_POST["list"]) && empty ($others))
                $errMsg .= "<p>Other skills cannot be empty.</p>";
        }         
        


        
            
                                      
        $Status = "New";     
        
        

        if ($errMsg !="") {
            echo "<p>", $errMsg, "</p>";
        }
        else {

    $JobRefNum = sanitise_input($JobRefNum);
    $FirstName = sanitise_input($FirstName);
    $LastName = sanitise_input($LastName);  
    $Birth = sanitise_input($Birth);  
    $Gender = sanitise_input($Gender);      
    $StreetAddress = sanitise_input($StreetAddress);
    $Suburb = sanitise_input($Suburb);
    $State = sanitise_input($State);
    $Postcode = sanitise_input($Postcode);        
    $Email = sanitise_input($Email);
    $PhoneNumber = sanitise_input($PhoneNumber);
    $Skills = sanitise_input($Skills);
    $OtherSkills = sanitise_input($OtherSkills);
    

    require_once ("settings.php");
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p> Database connection failure. </p>"; 
        }else { 
            $query = "CREATE TABLE IF NOT EXISTS eoi (
                EOInumber INT AUTO_INCREMENT PRIMARY KEY,
                JobRefNum VARCHAR(5),
                FirstName VARCHAR(20),
                LastName VARCHAR(20),
                StreetAddress VARCHAR(40),
                Suburb VARCHAR(40),
                State VARCHAR(3),
                Postcode INT(4),
                Email VARCHAR(30),
                PhoneNumber INT(12),
                Skills VARCHAR(50),
                OtherSkills VARCHAR(50),
                Status VARCHAR(10));";
            $addtable = mysqli_query($conn,$query);
            if (!$addtable) {
                echo "<p>Add table did not go through", $query,"</p>";
            }

            $insert_query = "INSERT INTO eoi (JobRefNum, FirstName, LastName, StreetAddress, Suburb, State, Postcode, Email, PhoneNumber, Skills, OtherSkills, Status) 
            VALUES ('$JobRefNum', '$FirstName', '$LastName', '$StreetAddress', '$Suburb', '$State', '$Postcode', '$Email', '$PhoneNumber', '$Skills', '$OtherSkills', '$Status');";
            
            $result = mysqli_query($conn,$insert_query);
            
            echo "<p>Your Application was successful. Your Application ID is " .mysqli_insert_id($conn). ".</p>";     // application was successful, paste application ID
            
                
            if (!$result) {
                echo "<p>Result did not go through", $insert_query,"</p>";                    
            }       

        }
    }   
    
}


?>