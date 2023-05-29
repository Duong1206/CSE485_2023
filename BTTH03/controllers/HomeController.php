<?php
include_once 'services/ArticleService.php';

class HomeController{
    public function index(){
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        include("views/article/list_articles.php");

    }
}