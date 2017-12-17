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
  <div class="col-xs-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Add new caregory</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?= base_url(); ?>/Admin_items/categories" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Category name</label>
            <div class="col-sm-10">
              <input class="form-control" name="category_name" placeholder="Category name" type="text" required>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button name="new_category" type="submit" class="btn btn-info pull-right">Create</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Categories</h3>
      </div>
      <div class="box-body">
        <table id="table_categories" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Category</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($categories as $c) {
                echo "<tr>";
                  echo '<td>'.stripcslashes($c->name).'</td>';
                  echo '<td>
                    <a href="'.base_url().'/Admin_items/categories_edit/'.$c->id.'" class="btn btn-block btn-info">Edit
                    </a>
                    </td>';
                echo "</tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Category</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="box-footer">
      </div>
    </div>
  </div>
</div>
