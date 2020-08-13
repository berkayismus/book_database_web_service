<?php

class Comment{
    
    
    // props
    public $comment_id;
    public $user_id;
    public $book_id;
    public $comment_detail;
    public $comment_created_date;
    public $comment_status;

    // getters & setters
    function setCommentId($comment_id){
        $this->comment_id = $comment_id;
    }
    function getCommentId(){
        return $this->comment_id;
    }
    //

    function setUserId($user_id){
        $this->user_id = $user_id;
    }
    function getUserId(){
        return $this->user_id;
    }
    //

    function setBookId($book_id){
        $this->book_id = $book_id;
    }
    function getBookId(){
        return $this->book_id;
    }
    //

    function setCommentDetail($comment_detail){
        $this->comment_detail = $comment_detail;
    }
    function getCommentDetail(){
        return $this->comment_detail;
    }
    //

    function setCommentCreatedDate($comment_created_date){
        $this->comment_created_date = $comment_created_date;
    }
    function getCommentCreatedDate(){
        return $this->comment_created_date;
    }
    //
    
    function setCommentStatus($comment_status){
        $this->comment_status = $comment_status;
    }
    function getCommentStatus(){
        return $this->comment_status;
    }
    //
    
    

    





}

?>