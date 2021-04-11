<?php
include "db.php";



$catid=setID();
$cat_name='';
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
    header("location: ../pages/category.php");

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
    $catid=$_GET['delete'];
    echo $catid;
    $sql="delete from `category` WHERE CatID='$catid'";
   $result= mysqli_query($GLOBALS['connect'],$sql);
   header("location: ../pages/category.php");
    global $d;
    $d=true;
    if($result)
    {
        echo "<script> alert ('data has benn deleted ')</script>";
    }
    //header("location: ../pages/category.php");

}
//function to set the values in the fileds
function editF()
{
    global $catid;
    $catid=$_GET['edit'];
    $t="category";
    $c="CatID";
    $v=$catid;
   $result= getDataRecord($t,$v);
   $row=mysqli_fetch_assoc($result);
   global $cat_name;
    $cat_name=$row['CatName'];
   global  $check;
     $check=false;
   
    
}

// function to insert data into the book table
function createData(){
    
    $cat_name=$_POST['cat_name'];
       if(!empty($cat_name)){
    mysqli_query($GLOBALS['connect'],"insert into   category VALUES(null,'$cat_name')");

    header("location: ../pages/category.php");}else{
        echo "<script> alert ('enter the name pls ')</script>";
        return;
        
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
function getDataRecord($table,$idv)
{
    
    $sql="select * from $table where CatID=$idv";
    $result =mysqli_query($GLOBALS['connect'],$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}
 //function to update the data
 function UpdateData()
 {

     $catid=$_GET['edit'];    
     $cat_name=$_POST['cat_name'];
     if(!empty($cat_name)){
     $sql="update category set CatName='$cat_name' where CatID=$catid ";
     $result=mysqli_query($GLOBALS['connect'],$sql);
    // header("location: ../pages/category.php");
    if($result)
     echo "<script> alert ('data has been updated ')</script>";
     
    }else{
        echo "<script> alert ('enter the name pls ')</script>";
        return;
     }
 }

// set id to textbox
function setID(){
    $table="category";
    $getid = getData($table);
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['CatID'];
        }
    }
    return ($id + 1);
}


?>
