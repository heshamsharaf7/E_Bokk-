<?php
include "db.php";



$book_id=setID();
$book_name='';
$book_cat='';
$book_author='';
$book_country='';
$book_house='';
$book_subcat='';
$book_date='';
$book_pages="";
$book_state='';
$book_price="";
$book_borrowed='';
$check=true;
$search_text="";





// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    //UpdateData();
}

if(isset($_POST['delete'])){
    //deleteRecord();
}

if(isset($_POST['deleteall'])){
  //  deleteAll();

}


// function to insert data into the book table
function createData(){
    $book_id=setID();
    $book_name=$_POST['book_name'];
       
    $book_cat=$_POST['book_cat'];
    $book_author=$_POST['book_author'];
    
    $book_country=$_POST['book_country'];
    $book_house=$_POST['book_house'];
    $book_subcat=$_POST['book_subcat'];
    $book_date=$_POST['book_date'];
    $book_pages=$_POST['book_pages'];
    $book_state=$_POST['book_state'];
    $book_price=$_POST['book_price'];
    $book_borrowed=$_POST['book_borrowed'];
    mysqli_query($GLOBALS['connect'],"insert into   book VALUES(null,'$book_name','$book_cat','$book_author','$book_country','$book_subcat','$book_date','$book_pages','$book_state','$book_price','$book_borrowed','$book_house')");

    header("location: ../pages/book.php");

}
//function to get data 

function getData($table)
{
    
    $sql="select * from $table";
    $result =mysqli_query($GLOBALS['connect'],$sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}


// set id to textbox
function setID(){
    $table="book";
    $getid = getData($table);
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['BookID'];
        }
    }
    return ($id + 1);
}

//function to search data into the table
function searchData()
{
    
    $idsearch=$_POST['search'];
    $sql="select * from book where BookID=$idsearch ";
    $result=mysqli_query($GLOBALS['connect'],$sql);
    $row=mysqli_fetch_assoc($result);
    
    //header("location: ../index.php");
    
   return $row;
   
    
    
}
?>
