<?php

class Category{
    // props
    public $category_id;
    public $category_name;

    // getters & setters
    function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
    function getCategoryId(){
        return $this->category_id;
    }
    //

    function setCategoryName($category_name){
        $this->category_name = $category_name;
    }
    function getCategoryName(){
        return $this->category_name;
    }

}

?>