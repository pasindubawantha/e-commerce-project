<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Item stock log</h3>
      </div>
      <div class="box-body">
        <table id="table_stock_logs" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Item</th>
              <th>Item Unit</th>
              <th>Item Price</th>
              <th>Item Category</th>
              <th>Transfer Ammount</th>
              <th>Type</th>
              <th>Time</th>
              <th>User</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($logs as $s) {
                echo "<tr>";
                  echo '<td>'.stripcslashes($s->name).'</td>';
                  echo '<td>'.stripcslashes($s->unit).'</td>';
                  echo '<td> Rs '.number_format(((float)$s->price),2,'.',',' ).'</td>';
                  echo '<td>'.stripcslashes($s->category).'</td>';
                  echo '<td>'.number_format(((float)$s->no_of_units),2,'.',',' ).'</td>';
                  if($s->in)
                    echo '<td><small class="label pull-right bg-green">IN</small></td>';
                  else
                    echo '<td><small class="label pull-right bg-red">OUT</small></td>';
                  echo '<td>'.stripcslashes($s->time).'</td>';
                  echo '<td>'.stripcslashes($s->user).'</td>';

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
              <th>Transfer Ammount</th>
              <th>Type</th>
              <th>Time</th>
              <th>User</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="box-footer">
      </div>
    </div>
  </div>
</div>
