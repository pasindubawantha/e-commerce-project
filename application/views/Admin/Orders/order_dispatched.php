<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Orders Dispatched</h3>
      </div>
      <div class="box-body">
        <table id="table_orders" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Shipping address</th>
              <th>Paid</th>
              <th>Date Created</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($order_dispatched as $o)
              {
                echo "<tr>";
                  echo '<td> #ORD-'.$o->id.'</td>';
                  echo '<td>'.$o->address.'</td>';
                  if((int)$o->paid)
                    echo '<td> <span style="color : green;" class="glyphicon glyphicon-ok"></span> </td>';
                  else
                    echo '<td> <span style="color : red;" class="glyphicon glyphicon-remove"></span> </td>';
                  echo '<td>'.$o->time.'</td>';
                  echo '<td>
                  <form method="post" action="'.base_url().'/Admin_orders/order_dispatched/">
                      <button type="submit" name="delivered" value="'.$o->id.'" class="btn btn-block btn-success">Delivered
                      </button>
                  </form>
                    </td>';
                echo "</tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Order ID</th>
              <th>Shipping address</th>
              <th>Paid</th>
              <th>Date Created</th>
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
