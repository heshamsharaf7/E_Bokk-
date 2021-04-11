<?php
include "db.php";



$hid=setID();
$h_name='';
$h_country="";
$check=true;
$message;





// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    
    UpdateData();
}
if(isset($_GET['edit']))
{
    
    editF();

}
if(isset($_POST['read']))
{
    header("location: ../pages/house.php");

}

if(isset($_GET['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
  //  deleteAll();

}

// function to delte record
function deleteRecord()
{
    $hid=$_GET['delete'];
    $sql="delete from `house` WHERE 	HID='$hid'";
    mysqli_query($GLOBALS['connect'],$sql);
    echo "<script> alert ('data has been deleted ')</script>";
    header("location: ../pages/house.php");
    

}
//function to set the values in the fileds
function editF()
{
    global $hid;
    $hid=$_GET['edit'];
    $v=$hid;
   $result= getDataRecord($v);
   $row=mysqli_fetch_assoc($result);
   global $h_name,$h_country;
    $h_name=$row['Hname'];
    $h_country=$row['Hcountry'];
   global  $check;
     $check=false;
   
    
}

// function to insert data into the book table
function createData(){
    
    $h_name=$_POST['h_name'];
    $h_country=$_POST['h_country'];
    echo $h_country;
       if(!empty($h_country)){
    mysqli_query($GLOBALS['connect'],"insert into   house VALUES(null,'$h_name','$h_country')");
    echo "<script> alert ('data has been inserted ')</script>";
    
    }else{
        echo "<script> alert ('enter the house name pls! ')</script>";
    }
}
//function to get all data 

function getData($table)
{
    
    $sql="select * from $table";
    $result =mysqli_query($GLOBALS['connect'],$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

//function to get the sepecfic record
function getDataRecord($idv)
{
    
    $sql="select * from house where HID=$idv";
    $result =mysqli_query($GLOBALS['connect'],$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}
 //function to update the data
 function UpdateData()
 {
 
     $hid=$_GET['edit'];        
     $h_name=$_POST['h_name'];
     echo $h_name;
     $h_country=$_POST['h_country'];
     $sql="update house set Hname='$h_name', Hcountry='$h_country' where HID =$hid";
     $result=mysqli_query($GLOBALS['connect'],$sql);
     echo "<script> alert ('data has been updated ')</script>";
 }

// set id to textbox
function setID(){
    $table="house";
    $getid = getData($table);
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['HID'];
        }
    }
    return ($id + 1);
}


?>
