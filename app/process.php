<?php

ob_start();
session_start();

if (isset($_POST['btnlogin'])) {
    $user = strtolower(trim($_POST['txtuname']));
    $pass = (trim($_POST['txtpass']));
//   echo $user . " - " . $user_type . " - " . $pass;
    if ($user != "" && $pass != "") {
        require_once 'dbfile.php';
        $obj = new Database();
        $obj->connect();
        $table = "users";
         $where = "LCASE(uname)='$user' and passw='$pass'";
        $obj->select($table, "id, uname, name, rno, passw, email, dob, phno, type, cdate, rec_status",$where);
        $res = $obj->getResult();
        //id, uname, name, rno, passw, email, dob, phno, type, cdate, rec_status
        $a = 0;
        date_default_timezone_set('Asia/Kolkata');
       if ($res){
            $dbuserid = $res[$a]['id'];
            $dbusername = strtolower($res[$a]['uname']);
            $dbname = ucwords($res[$a]['name']);
            $dbrno = $res[$a]['rno'];
            $dbpassword = $res[$a]['passw'];
            $dbemail = $res[$a]['email'];
            $dbdob = $res[$a]['dob'];
            $dbphno = $res[$a]['phno'];
            $user_type = $res[$a]['type'];
            $a++;
           echo "<br/>Resiult " . $dbusername . " -- " . $dbpassword . " -- " ;
        

        if ($user == $dbusername && $pass == $dbpassword) {
            $_SESSION['session_userid'] = $dbuserid;
            $_SESSION['session_username'] = $dbusername;
            $_SESSION['session_name'] = $dbname;
            $_SESSION['session_rno'] = $dbrno;
            $_SESSION['session_email'] = $dbemail;
            $_SESSION['session_dob'] = $dbdob;
            $_SESSION['session_phno'] = $dbphno;


         
            switch ($user_type) {
                case "Admin":
                    header("location: index");
                    break;
                case "user":
                    header("Location: ../user/user/indexu");
                    break;
            }
        } 
        else {
            header("Location: ../login.php?sorry");
        }
       }
       else {
            header("Location: ../login.php?sorry=0&opt=1");
        }
    }
}
?>
