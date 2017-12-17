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
        <h3 class="box-title">Edit Item <?= $item->name; ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?= base_url(); ?>/Admin_items/item_edit/<?= $item->id; ?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Item name</label>
            <div class="col-sm-10">
              <input class="form-control" name="item_name" value="<?= $item->name ?>" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Item unit</label>
            <div class="col-sm-10">
              <input class="form-control" name="item_unit" value="<?= $item->unit ?>" type="text" required>
            </div>
          </div>
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
            <textarea class="textarea" name="item_description" rows="10" cols="80" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
              <?= $item->description ?>
            </textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="category_name" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
              <input class="form-control" name="price" value="<?= $item->price ?>" type="number" min="1" required>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
              <select class="select2" name="category" style="width:100%;">
                <?php
                foreach ($categories as $c) {
                  if ($item->category_id == $c->id)
                    echo '<option selected value="'.$c->id.'">'.$c->name.'</option>';
                  else
                    echo '<option value="'.$c->id.'">'.$c->name.'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <?php
            foreach ($attributes as $a)
            {
                if(isset($item_attributes[$a->field_name]))
                  echo '<div class="form-group">
                          <label class="col-sm-2 control-label">'.$a->field_name.'</label>
                          <div class="col-sm-10">
                            <input class="form-control" name="attribute_'.$a->id.'" value="'.$item_attributes[$a->field_name].'" type="text">
                          </div>
                        </div>';
                else
                  echo '<div class="form-group">
                          <label class="col-sm-2 control-label">'.$a->field_name.'</label>
                          <div class="col-sm-10">
                            <input class="form-control" name="attribute_'.$a->id.'" placeholder="Value" type="text">
                          </div>
                        </div>';
            }

            foreach ($item_images as $image)
            {
              echo '<div class="form-group">
                      <label class="col-sm-2 control-label">Image 1</label>
                      <div class="col-sm-10">
                        <image style="width:25%;" src="'.base_url().'/Main/image/item/'.$image->id.'"/>
                        <button name="delete_image" value="'.$image->id.'" type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </div>';
            }

            for($i=sizeof($item_images)+1; $i<=5; $i++)
            {
              echo '<div class="form-group">
                      <label class="col-sm-2 control-label">Image '.$i.'</label>
                      <div class="col-sm-10">
                        <input name="image_'.$i.'" id="image_'.$i.'" type="file">
                        <p class="help-block">Uploal Item image '.$i.'</p>
                      </div>
                    </div>';
            }
          ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?= base_url() ?>/Admin_items/" class="btn btn-warning"> Go back </a>
          <button name="update_item" type="submit" class="btn btn-success pull-right">Update</button>
          <button name="delete_item" type="submit" class="btn btn-danger pull-right" style="margin-right: 5px;">Delete</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>
