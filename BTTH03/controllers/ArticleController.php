<?php
include_once "services/ArticleService.php";

class ArticleController{
    public function index(){
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        include("views/article/list_articles.php");
    }
    public function add_article(){
        $articleService = new ArticleService();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if(isset($_POST['add'])){
            $title = trim($_POST['txtTitle'] ?? '');
            $summary = trim($_POST['txSummary'] ?? '');
            $content = $_POST['txtContent'] ?? '';
            $created = date('Y-m-d H:i:s');
            $category_id = trim($_POST['txtSummary'] ?? '');
            $member_id = trim($_POST['txtMember_id'] ?? '');
            $image_id = $_POST['txtImage_id'] ?? '';
            $published = trim($_POST['txtPublished'] ?? '');


          
            if(!empty($title) and !empty($name) and !empty($summary)){
                $arguments['title'] = $title;
                $arguments['summary'] = $summary;
                $arguments['content'] = $content;
                $arguments['created'] = $created;
                $arguments['category_id'] = $category_id;
                $arguments['member_id'] = $member_id;
                $arguments['image_id'] = $image_id;
                $arguments['published'] = $published;



            }
            else{
                $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                header("location:?controller=article&action=add_article&mess=$mess");
            }

        }
        include("views/article/add_article.php");
        }

        public function edit_article(){
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $articleService = new ArticleService();
            $article = $articleService->getArticleById($id);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $title = trim($_POST['txtTitle'] ?? '');
            $summary = trim($_POST['txtSummary'] ?? '');
            $content = $_POST['txtContent'] ?? '';
            $created = date('Y-m-d H:i:s');
            $category_id = trim($_POST['txtCategory_id'] ?? '');
            $member_id = $_POST['txtMember_id'] ?? '';
            $image_id = trim($_POST['txtImage_id'] ?? '');
            $published = trim($_POST['txtPublished'] ?? '');

            if(isset($_POST['update'])){
                if(!empty($title) and !empty($name) and !empty($summary)){
                        
                        $arguments['id'] = $id;
                        $arguments['title'] = $title;
                        $arguments['summary'] = $summary;
                        $arguments['content'] = $content;
                        $arguments['created'] = $created;
                        $arguments['category_id'] = $category_id;
                        $arguments['member_id'] = $member_id;
                        $arguments['image_id'] = $image_id;
                        $arguments['published'] = $published;
                        $articleService->update($arguments);
                        header("location:?controller=article");
                    }
                    else{
                        $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                        header("location:?controller=article&action=edit_article&id=$id&mess=$mess");
                    }
                
                    
                }
        include('views/article/edit_article.php');
    }

    public function delete_article(){
        $articleService = new ArticleService();
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(isset($_POST['confirm'])){
            $articleService->delete($id);
            header("location:?controller=article");
        }
        include('views/article/delete_article.php');
    }
}
