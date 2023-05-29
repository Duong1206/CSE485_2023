<?php
include_once 'configs/Dbconnection.php';
include_once 'models/Article.php';

class ArticleService{
    public function getAllArticles(){
        $dbconn = new Dbconnection();
        $conn = $dbconn->getConnection();

        $select = "SELECT * FROM article";

        $statment = $conn->query($select);

        $articles = [];

        while($row = $statment->fetch()){
            $article = new Article($row['id'], $row['title'], $row['summary'], $row['content'],
            $row['created'], $row['category_id'], $row['member_id'], $row['image_id'], $row['published']);

            array_push($articles, $article);
        }
        $conn = null;
        return $articles;
    }

    public function getArticleById($id){
        $dbconn = new Dbconnection();
        $conn = $dbconn->getConnection();
        $select_Id = "SELECT * FROM article WHERE id = $id";
        $statment = $conn->query($select_Id);
        $row = $statment->fetch();
        $article = new Article($row['id'], $row['title'], $row['summary'], $row['content'],
            $row['created'], $row['category_id'], $row['member_id'], $row['image_id'], $row['published']);
        $conn = null;
        return $article;
    }

    public function insert(array $arguments){
        $dbconn = new Dbconnection();
        $conn = $dbconn->getConnection();

        $sql = "INSERT INTO `article` (`id`, `title`, `summary`, 'content', `created`, `category_id`, `member_id`, `image_id`, `published`) 
        VALUES (null, :title, :summary, :content, :created, :category_id, :member_id, :image_id, :published)";
        $statment = $conn->prepare($sql);
        $statment->execute($arguments);
        $conn = null;
    }

    public function update(array $arguments){
        $dbconn = new Dbconnection();
        $conn = $dbconn->getConnection();
        
        $sql = "UPDATE article SET `title` = :title, `summary` = :summary, `created` = :created,
        `category_id` = :category_id, `member_id` = :member_id, `image_id` = :image_id, `published` = :published WHERE `id` = :id";
        $statment = $conn->prepare($sql);
        $statment->execute($arguments);
        $conn = null;
        
    }

    public function delete($id){
        $dbconn = new Dbconnection();
        $conn = $dbconn->getConnection();
        
        $sql = "DELETE FROM article WHERE id = $id";
        $statment = $conn->prepare($sql);
        $statment->execute();
        $conn = null;
    }
}