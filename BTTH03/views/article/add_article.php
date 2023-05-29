
<?php include('views/include/header.php')?>
<link rel="stylesheet" href="assets/css/style.css">
<main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Title</span>
                        <input type="text" class="form-control" name="txtTitle" value="<?= $article->getTitle() ?>">
                        
                    </div>
                    
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Name</span>
                        <input type="text" class="form-control" name="txtName" value="<?= $article->getSummary() ?>">
                    </div>
                    
                   
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Category</span>
                        <input type="text" class="form-control" name="txtCategory" value="<?= $article->getContent() ?>">
                    </div>


                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Summary</span>
                        <input type="text" class="form-control" name="txtSummary" value="<?= $article->getSummary() ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">ID Category</span>
                        <input type="text" class="form-control" name="txtAuthor" value="<?= $article->getCategory_id() ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">ID Member</span>
                        <input type="text" class="form-control" name="txtAuthor" value="<?= $article->getMember_id() ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">ID Image</span>
                        <input type="text" class="form-control" name="txtAuthor" value="<?= $article->getImage_id() ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Published</span>
                        <input type="text" class="form-control" name="txtAuthor" value="<?= $article->getPublished() ?>">
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu" class="btn btn-success" name="update">
                        <a href="?controller=article" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include('views/include/footer.php')?>