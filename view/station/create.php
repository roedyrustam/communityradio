<?php
    require_once('../configuration/Connection.php');
    require_once('../model/Station.php');
    require_once('../model/Category.php');

    $station = new Station();
    
    $id = isset($_GET) && isset($_GET['id']) ? $_GET['id'] : null;
    $row = $station->mightyGetByID($id);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $station->setFields($_POST, $_FILES);
        $station->mightySave();
    }
    $category = new Category();
    $category_list = $category->mightyGetRecord();
    
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Station</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-user-info">
                        <form method="post"  action="" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>" />
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value ="<?= isset($row) && isset($row['name'])  ? $row['name'] : '' ?>" placeholder="Enter Name" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="category_id">Category </label>
                                    <select class="form-control" name="category_id">
                                        <option value=""> Select Category</option>
                                        <?php
                                            foreach ($category_list as $k => $val) {
                                        ?>
                                            <option value="<?= $val['id'] ?>" <?php if(isset($row) && isset($row['category_id']) && ($val['id'] == $row['category_id'])) echo "selected" ?> > <?= $val['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="url" class="form-label">Stream URL </label>
                                    <input type="url" class="form-control" name="url" id="url" value ="<?= isset($row) && isset($row['url'])  ? $row['url'] : '' ?>" placeholder="Enter Stream URL">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="logo" class="form-label">Logo</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="logo">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                
                                <?php
                                    $logo = isset($row) && isset($row['logo']) ? $row['logo'] : 'default.png';
                                    $path = '../upload/station/';
                                ?>
                                <div class="form-group col-md-4 mt-3">
                                    <div class="mm-avatar">
                                        <img class="avatar-60 rounded logo_preview" src="<?= $path.$logo ?>" alt="#" data-original-title="" title="">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Is Popular? </label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="is_popular" id="is_popular" <?= (isset($row) && isset($row['is_popular']) && $row['is_popular'] == 1 ) || ( $id == null ) ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="is_popular"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>