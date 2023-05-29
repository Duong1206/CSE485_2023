<?php
class Article{
    private $id;
    private $title;
    private $summary;
    private $created;
    private $category_id;
    private $member_id;
    private $image_id;
    private $published;
    public function __construct($id, $title, $summary, $created, $category_id, $member_id, $image_id, $published){
        $this->id = $id;
        $this->title = $title;
        $this->summary = $summary;
        $this->created = $created;
        $this->category_id = $category_id;
        $this->member_id = $member_id;
        $this->image_id = $image_id;
        $this->published = $published;
    }

    public function getID(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }
    public function getSummary(){
        return $this->summary;
    }
    public function getCreated(){
        return $this->created;
    }
    public function getCategory_id(){
        return $this->category_id;
    }
    public function getMember_id(){
        return $this->member_id;
    }

    public function getImage_id(){
        return $this->image_id;
    }

    public function getpublished(){
        return $this->published;
    }
}