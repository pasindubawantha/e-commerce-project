<div class="row">
  <div class="col-xs-12">
    <div style="display:<?php if(isset($fail)) echo"block"; else echo "none"; ?>;" class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Failed!</h4>
      <?php if(isset($message)) echo $message; ?>
    </div>
    <div style="display:<?php if(isset($success)) echo"block"; else echo "none"; ?>;"  class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>
      <?php if(isset($message)) echo $message; ?>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Update Caregory <?= $category->name; ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?= base_url(); ?>/Admin_items/categories_edit/<?= $category->id ?>" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Category name</label>
            <div class="col-sm-10">
              <input class="form-control" name="category_name" placeholder="<?= $category->name; ?>" type="text">
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input hidden name="category_id" value="<?= $category->id; ?>">
          <a href="<?= base_url() ?>/Admin_items/categories" class="btn btn-warning"> Go back </a>
          <button name="update_category" type="submit" class="btn btn-success pull-right">Update</button>
          <button name="delete_category" type="submit" class="btn btn-danger pull-right" style="margin-right: 5px;">Delete</button>

        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>
