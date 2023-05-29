<?php
include_once 'views/include/header.php';
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="?controller=article&action=add_article" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">Id</th>
                        <th scope="col" style="text-align: center;">Name</th>
                        <th scope="col" style="text-align: center;">Summary</th>
                        <th scope="col" style="text-align: center;">Created</th>
                        <th scope="col" style="text-align: center;">ID Category</th>
                        <th scope="col" style="text-align: center;">ID Member</th>
                        <th scope="col" style="text-align: center;">ID Image</th>
                        <th scope="col" style="text-align: center;">Published</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($articles as $article) { ?>
                        <tr>
                            <th scope="row" style="text-align: center;">
                                <?= $article->getId() ?>
                            </th>
                            <td style="max-width: 100px;">
                                <?= $article->getTitle() ?>
                            </td>
                            <td style="max-width: 100px;">
                                <?= $article->getSummary() ?>
                            </td>
                            <td style="max-width: 100px;">
                                <?= $article->getCreated() ?>
                            </td>
                            <td style="max-width: 100px;">
                                <?= $article->getCategory_id() ?>
                            </td>
                            <td style="max-width: 100px;">
                                <?= $article->getMember_id() ?>
                            </td>
                            <td style="max-width: 100px;">
                                <?= $article->getImage_id() ?>
                            </td>
                            <td style="max-width: 100px;">
                                <?= $article->getPublished() ?>
                            </td>
                                <a href="?controller=article&action=edit_article&id=<?= $article->getId() ?>"><button
                                        class="btn-primary"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            </td>
                            <td>
                                <a href="?controller=article&action=delete_article&id=<?= $article->getId() ?>"><button
                                        class="btn-danger"><i class="fa-solid fa-trash"></button></i></a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include('views/include/footer.php') ?>