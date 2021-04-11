<?php
include "db.php";



$cid=setID();
$c_name='';
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
    header("location: ../pages/country.php");

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
    $cid=$_GET['delete'];
    $sql="delete from `country` WHERE 	CountryID='$cid'";
    mysqli_query($GLOBALS['connect'],$sql);
    header("location: ../pages/country.php");

}
//function to set the values in the fileds
function editF()
{
    global $cid;
    $cid=$_GET['edit'];
    $v=$cid;
   $result= getDataRecord($v);
   $row=mysqli_fetch_assoc($result);
   global $c_name;
    $c_name=$row['CountryName'];
   global  $check;
     $check=false;
   
    
}

// function to insert data into the book table
function createData(){
    
    $cat_name=$_POST['c_name'];
       
    mysqli_query($GLOBALS['connect'],"insert into   country VALUES(null,'$cat_name')");

    header("location: ../pages/country.php");

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
    
    $sql="select * from country where CountryID=$idv";
    $result =mysqli_query($GLOBALS['connect'],$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}
 //function to update the data
 function UpdateData()
 {

     $cid=$_GET['edit'];    
     echo $cid;
     $c_name=$_POST['c_name'];
     $sql="update country set CountryName='$c_name' where CountryID=$cid";
     $result=mysqli_query($GLOBALS['connect'],$sql);
 }

// set id to textbox
function setID(){
    $table="country";
    $getid = getData($table);
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['CountryID'];
        }
    }
    return ($id + 1);
}


?>
