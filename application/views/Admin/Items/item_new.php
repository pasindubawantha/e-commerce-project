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
        <h3 class="box-title">New Item</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?= base_url(); ?>/Admin_items/item_new" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Item name</label>
            <div class="col-sm-10">
              <input class="form-control" name="item_name" placeholder="Item name" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Item unit</label>
            <div class="col-sm-10">
              <input class="form-control" name="item_unit" placeholder="unit" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
            <textarea class="textarea" placeholder="Description" name="item_description" rows="10" cols="80" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
            </textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
              <input class="form-control" name="price" placeholder="Price" type="number" min="1" required>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
              <select class="select2" name="category" style="width:100%;">
                <?php
                foreach ($categories as $c) {
                  echo '<option value="'.$c->id.'">'.$c->name.'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <?php
            foreach ($attributes as $a) {
                echo '<div class="form-group">
                        <label class="col-sm-2 control-label">'.$a->field_name.'</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="attribute_'.$a->id.'" placeholder="Value" type="text">
                        </div>
                      </div>';
            }
          ?>
          <div class="form-group">
            <label class="col-sm-2 control-label">Image 1</label>
            <div class="col-sm-10">
              <input name="image_1" id="image_1" type="file">
              <p class="help-block">Uploal Item image 1</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Image 2</label>
            <div class="col-sm-10">
              <input name="image_2" id="image_2" type="file">
              <p class="help-block">Uploal Item image 2</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Image 3</label>
            <div class="col-sm-10">
              <input name="image_3" id="image_3" type="file">
              <p class="help-block">Uploal Item image 3</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Image 4</label>
            <div class="col-sm-10">
              <input name="image_4" id="image_4" type="file">
              <p class="help-block">Uploal Item image 4</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Image 5</label>
            <div class="col-sm-10">
              <input name="image_5" id="image_5" type="file">
              <p class="help-block">Uploal Item image 5</p>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?= base_url() ?>/Admin_items/" class="btn btn-warning"> Go back </a>
          <button name="new_item" type="submit" class="btn btn-success pull-right">Create</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>
