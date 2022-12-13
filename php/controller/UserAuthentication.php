<?php

require_once "../model/database.php";

date_default_timezone_set('Asia/Manila');

session_start();

class user_action extends DBConn
{
    private $username;
    protected $password;

    function sanitizeInputs($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    private function setLogin($u, $p)
    {
        $conn = parent::set_connection();
        $this->username = $this->sanitizeInputs($u);
        $this->password = $this->sanitizeInputs($p);
        $query_CheckIfUser_Exist = "SELECT username FROM users_tbl WHERE username = ?";
        $_CheckIfUser_Exist  = $conn->prepare($query_CheckIfUser_Exist);
        $_CheckIfUser_Exist->execute([$u]);
        if ($_CheckIfUser_Exist->rowCount() !== 0) { // Check if user exists            
            $Input_UsernamePassword = "SELECT username,password FROM users_tbl WHERE username = ? AND password = ?";
            $_UsernamePassword = $conn->prepare($Input_UsernamePassword);
            $_UsernamePassword->execute([$u, $p]);
            if ($_UsernamePassword->rowCount() !== 0) { // Verify Username and Password                
                $query_CheckIfUser_IsAdmin = "SELECT username,is_admin FROM users_tbl WHERE username = ? AND is_admin = ?";
                $_CheckIfUser_IsAdmin = $conn->prepare($query_CheckIfUser_IsAdmin);
                $_CheckIfUser_IsAdmin->execute([$u, 1]);
                if ($_CheckIfUser_IsAdmin->rowCount() !== 0) { // Check If user is admin
                    // If user is admin
                    unset($_SESSION['user']);
                    unset($_SESSION['access']);
                    $_SESSION['user'] = $u;
                    $_SESSION['access'] = 1;
                    echo json_encode([
                        'status' => 1,
                        'msg' => "User logged in as Admin",
                        'goto' => 'index.php'
                    ]);
                } else {
                    // If user is not admin                     
                    $check_IfUser_HasAccess = "SELECT username,is_allowed FROM users_tbl WHERE username = ? and is_allowed  = ?";
                    $_IfUser_HasAccess = $conn->prepare($check_IfUser_HasAccess);
                    $_IfUser_HasAccess->execute([$u, 1]);
                    if ($_IfUser_HasAccess->rowCount() !== 0) { //check if user is given access
                        // If User has allowed access                        
                        unset($_SESSION['user']);
                        unset($_SESSION['access']);
                        $_SESSION['user'] = $u;
                        $_SESSION['access'] = 2;
                        echo json_encode([
                            'status' => 1,
                            'msg' => "User access granted",
                            'goto' => 'index.php'
                        ]);
                    } else {
                        // If User has no access                     
                        echo json_encode([
                            'status' => 0,
                            'msg' => "User is registered but not granted access"
                        ]);
                    }
                }
            } else {
                // Incorrect Username or Password
                echo json_encode([
                    'status' => 0,
                    'msg' => "Incorrect Username or Password"
                ]);
            }
        } else {
            // User not found!            
            echo json_encode([
                'status' => 0,
                'msg' => "User does not exist!"
            ]);
        }
    }

    public function login($u, $p)
    {
        $this->setLogin($u, $p);
    }

    public function setGuestLogin($gU)
    {
        unset($_SESSION['user']);
        unset($_SESSION['access']);
        $_SESSION['user'] = $gU;
        $_SESSION['access'] = 0;
        echo json_encode([
            'msg' => "You logged in as guest!",
            'goto' => 'index.php'
        ]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $UserLogin = new user_action;
    $myUsername = $_POST['username'];
    $myPassword = $_POST['password'];
    $UserLogin->login($myUsername, $myPassword);
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $gUsername = "Guest";
    $GuestLogin = new user_action;
    $GuestLogin->setGuestLogin($gUsername);
} else {
    echo "No Valid Requests Made!";
}
