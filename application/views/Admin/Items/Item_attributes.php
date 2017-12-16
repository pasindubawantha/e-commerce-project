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
        <h3 class="box-title">Add new attribute</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?= base_url(); ?>/Admin_items/item_attributes" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="field_name" class="col-sm-2 control-label">Attribute name</label>
            <div class="col-sm-10">
              <input class="form-control" name="field_name" placeholder="Attribute name" type="text" required>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button name="new_attribute" type="submit" class="btn btn-info pull-right">Create</button>
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
        <h3 class="box-title">Attributes</h3>
      </div>
      <div class="box-body">
        <table id="table_attributes" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Attribute</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($attributes as $at) {
                echo "<tr>";
                  echo '<td>'.$at->field_name.'</td>';
                  echo '<td>
                    <form action="'.base_url().'/Admin_items/item_attributes" method="post">
                      <input name="field_id" value="'.$at->id.'" hidden>
                      <button name="attribute_delete" type="submit" class="btn btn-block btn-danger">Delete</button>
                    </form>
                    </td>';
                echo "</tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Attribute</th>
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
