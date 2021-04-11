<? session_start();?>
<?php 
include_once("../php/db.php");


if(isset($_POST['login']))
{
    $user=$_POST['username'];
    $pass=$_POST['pass'];
   
    
   
    checkUser($user,$pass);
}

function checkUser($e,$p)
{
    $sql="select * from employee where empemail='$e' and empphone='$p'";
    $result=mysqli_query($GLOBALS['connect'],$sql);
    if($result ){
        $row=mysqli_fetch_assoc($result);
      
        header("location: main.php");
    }else{
        echo "sorry you are not exist";
    }

}


?>