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
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Item stocks</h3>
      </div>
      <div class="box-body">
        <table id="table_stocks" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Item</th>
              <th>Item Unit</th>
              <th>Item Price</th>
              <th>Item Category</th>
              <th>In Stock</th>
              <th>Ammount</th>
              <th>IN</th>
              <th>OUT</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($stocks as $s) {
                echo "<tr>";
                  echo '<td>'.stripcslashes($s->name).'</td>';
                  echo '<td>'.stripcslashes($s->unit).'</td>';
                  echo '<td> Rs '.number_format(((float)$s->price),2,'.',',' ).'</td>';
                  echo '<td>'.stripcslashes($s->category).'</td>';
                  echo '<td>'.number_format(((float)$s->no_of_units),2,'.',',' ).'</td>';
                  echo '<form action="'.base_url().'/Admin_inventory" method="post">
                          <td>
                            <input type="number" min="1" name="ammount" required>
                          </td>
                          <td>
                            <input name="item_id" value="'.$s->id.'" hidden>
                            <button name="in" type="submit" class="btn btn-block btn-success">IN</button>
                          </td>
                          <td>
                            <button name="out" type="submit" class="btn btn-block btn-danger">OUT</button>
                          </td>
                        </form>';
                echo "</tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Item</th>
              <th>Item Unit</th>
              <th>Item Price</th>
              <th>Item Category</th>
              <th>In Stock</th>
              <th>Ammount</th>
              <th>IN</th>
              <th>OUT</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="box-footer">
      </div>
    </div>
  </div>
</div>
