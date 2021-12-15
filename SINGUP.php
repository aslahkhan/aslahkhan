<!DOCTYPE html>
<html>
<body>
<?php
$FIRSTNAME =$_POST['FIRST NAME'];
$SURENAME =$_POST['SURE NAME'];
$PHONENUMBER =$_POST['PHONE NUMBER'];
$MAILID =$_POST['MAIL ID'];
$PASSWORD=$_POST['PASSWORD'];
$CONFORMEPASSWORD =$_POST['CONFORME PASSWORD'];

if (!empty($FIRSTNAME)||!empty($SURENAME)||!empty($PASSWORD)||!empty($MAILID)||!empty($PASSWORD)||!empty($CONFORMEPASSWORD)) {

    $host ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $dbname="register";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if (mysqli_connect_error()) {
        die('connect error('.mysqli_connect_error().')'. mysqli_connect_error())
        $select= "select email from register where email=? limit 1";
        $insert = "insert into register (FIRSTNAME,SURENAME,PHONENUMER,MAILID,PASSWORD,CONFORMPASSWORD) values(?,?,?,?,?,?) ";
        $stmt = $conn->prepare($select);
        $stmt->bind_param("s", $MAILID);
        $stmt->execute():
        $stmt->bind_result($MAILID);
        $rnum =$stmt->num_row;
       
        if ($rnum==0) {
            $stmt->$conn->prepare($insert);
            $stmt->bind_param("ssssii", $FIRSTNAME,$SURENAME,$PHONENUMBER,$MAILID,$PASSWORD,$CONFORMEPASSWORD);
            $stmt->execute();
            echo "New record inserted sucessfully";
           
        }else{
            echo "someone alredy register"
        }
        $stmt->close();
        $conn->close();
    }

}else{
echo "All field are requid";
die();
    }
    
}
?>
</body>
</html>