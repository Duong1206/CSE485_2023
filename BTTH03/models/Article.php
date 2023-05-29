<?php
class Article{
    private $id;
    private $title;
    private $summary;
    private $content;
    private $created;
    private $category_id;
    private $member_id;
    private $imaged_id;
    private $published;
    public function __construct($id, $title, $summary, $content, $created, $category_id, $member_id, $imaged_id, $published){
        $this->id = $id;
        $this->title = $title;
        $this->summary = $summary;
        $this->content = $content;
        $this->created = $created;
        $this->category_id = $category_id;
        $this->member_id = $member_id;
        $this->imaged_id = $imaged_id;
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
    public function getContent(){
        return $this->content;
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
        return $this->imaged_id;
    }

    public function getPublished(){
        return $this->published;
    }
}