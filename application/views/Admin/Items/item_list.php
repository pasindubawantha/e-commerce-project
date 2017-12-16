<div class="row">
  <div class="col-lg-3 col-xs-6">
    <a href="<?=base_url();?>/Admin_items/item_new" class="small-box-footer">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>Create</h3>

          <p>New Item</p>
        </div>
        <div class="icon">
          <i class="glyphicon glyphicon-plus"></i>
        </div>
        <div class="small-box-footer">
          create <i class="fa fa-arrow-circle-right"></i>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-3 col-xs-6">
  </div>
  <div class="col-lg-3 col-xs-6">
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Items</h3>
      </div>
      <div class="box-body">
        <table id="table_items" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Item</th>
              <th>Unit</th>
              <th>Category</th>
              <th>Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($items as $i) {
                echo "<tr>";
                  echo '<td>'.$i->name.'</td>';
                  echo '<td>'.$i->unit.'</td>';
                  echo '<td>'.$i->category.'</td>';
                  echo '<td> Rs '.number_format(((float)$i->price),2,'.',',' ).'</td>';
                  echo '<td>
                    <a href="'.base_url().'/Admin_items/item_edit/'.$i->id.'" class="btn btn-block btn-info">Edit
                    </a>
                    </td>';
                echo "</tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Item</th>
              <th>Unit</th>
              <th>Category</th>
              <th>Price</th>
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
