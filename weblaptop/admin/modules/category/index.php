            <?php 
            $open = "category";
            require_once __DIR__. "/../../autoload/autoload.php";

            $category= $db->fetchAll("category");
             ?>
            <?php  
            require_once __DIR__. "/../../layouts/header.php";
            ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo modules("category") ?>">Danh sách danh mục</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="clearfix"></div>
        <?php if(isset($_SESSION['success'])) :?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

            <?php if(isset($_SESSION['error'])) :?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Home</th>
                                <th>Created</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                 <th>STT</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Home</th>
                                <th>Created</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $stt=1; foreach ($category as $item): ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td> 
                                    <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' : 'btn-danger'?>"><?php echo $item['home'] == 1 ? 'Hiển thị' : 'Không' ?></a>
                                        
                                </td>
                                <td><?php echo $item['created_at'] ?></td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
                                </td>


                            </tr>
                            <?php $stt++; endforeach ?>
                        </tbody>
                    </table>


                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <p class="small text-center text-muted my-5">
            <em>More table examples are coming soon ...</em>
        </p>
    </div>
    <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span></span>
            </div>
        </div>
    </footer>
</div>

<?php  
   require_once __DIR__. "/../../layouts/footer.php";
    ?>