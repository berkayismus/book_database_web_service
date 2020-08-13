<?php

class Book{

    // props
    public $book_id;
    public $category_id;
    public $book_name;
    public $book_detail;
    public $book_page_number;
    public $book_publisher;
    public $book_status;
    public $book_created_date;
    public $book_total_score;
    public $book_total_rep;
    public $book_average_score;

    // getter & setters
    function setBookId($book_id){
        $this->book_id = $book_id;
    }
    function getBookId(){
        return $this->book_id;
    }
    //

    function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
    function getCategoryId(){
        return $this->category_id;
    }
    //

    function setBookName($book_name){
        $this->book_name = $book_name;
    }
    function getBookName(){
        return $this->book_name;
    }
    //

    function setBookDetail($book_detail){
        $this->book_detail = $book_detail;
    }
    function getBookDetail(){
        return $this->book_detail;
    }
    //

    function setBookPageNumber($book_page_number){
        $this->book_page_number = $book_page_number;
    }
    function getBookPageNumber(){
        return $this->book_page_number;
    }
    //

    function setBookPublisher($book_publisher){
        $this->book_publisher = $book_publisher;
    }
    function getBookPublisher(){
        return $this->book_publisher;
    }
    //

    function setBookStatus($book_status){
        $this->book_status = $book_status;
    }
    function getBookStatus(){
        return $this->book_status;
    }
    //

    function setBookCreatedDate($book_created_date){
        $this->book_created_date = $book_created_date;
    }
    function getBookCreatedDate(){
        return $this->book_created_date;
    }
    //

    function setBookTotalScore($book_total_score){
        $this->book_total_score = $book_total_score;
    }
    function getBookTotalScore(){
        return $this->book_total_score;
    }
    //

    function setBookTotalRep($book_total_rep){
        $this->book_total_rep = $book_total_rep;
    }
    function getBookTotalRep(){
        return $this->book_total_rep;
    }
    //

    function setBookAverageScore($book_average_score){
        $this->book_average_score = $book_average_score;
    }
    function getBookAverageScore(){
        return $this->book_average_score;
    }
    //

    





}

?>

