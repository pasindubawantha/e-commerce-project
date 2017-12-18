<div class="row">
  <div class="col-xs-12">
    <div style="display:<?php if(isset($fail)) echo"block"; else echo "none"; ?>;" class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Failed!</h4>
      <?php if(isset($message)) echo $message; ?>
    </div>
    <div style="display:<?php if(isset($sucess)) echo"block"; else echo "none"; ?>;"  class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Sucess!</h4>
      <?php if(isset($message)) echo $message; ?>
    </div>
  </div>
</div>
<section class="invoice">
  <form action="<?= base_url(); ?>/Admin_orders/order_processing_detail/<?= $order_id; ?>" method="post">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          Order #ORD-<?= $order_id; ?>
        </big>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
        <table class="table">
          <tr>
            <td> <strong class="pull-right"> Customer :</strong> </td>
            <td>
              <?php
                  echo $order['customer']->name;
                  echo '<br>';
                  echo $order['address']->address;
              ?>
            </td>
          </tr>
        </table>
      </div>
      <!-- /.col -->
      <div class="col-sm-6 invoice-col">
        <table class="table">
          <tr>
            <td> <strong class="pull-right">Order ID :</strong> </td>
            <td> #ORD-<?= $order_id; ?> </td>
          </tr>
          <tr>
            <td> <strong class="pull-right">Order date :</strong> </td>
            <td> <?= $order['order']->time ?> </td>
          </tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Item</th>
            <th>Category</th>
            <th>No of units</th>
            <th>Units in stock</th>
            <th></th>
            <th>Unit price</th>
            <th>Tax</th>
            <th>Subtotal</th>
            <th>After tax Subtotal</th>
          </tr>
          </thead>
          <tbody>
            <?php
              if($order['items'] > 0)
                $can_process = true;
              else
                $can_process = false;
              $total = 0.00;
              foreach ($order['items'] as $i)
              {
                $subtotal = (float)$i->no_of_units * (float)$i->unit_price;
                $tax = ((float)$i->tax_percentage/100.00) * (float)$subtotal;
                $sub_after_tax = $subtotal + $tax;
                $total += (float)$sub_after_tax;
                echo '<tr>';
                  echo '<td>'.$i->name.'</td>';
                  echo '<td>'.$i->category.'</td>';
                  echo '<td>'.number_format($i->no_of_units ,2,'.',',' ).' '.$i->unit.'</td>';
                  echo '<td>'.number_format($i->stock ,2,'.',',' ).' '.$i->unit.'</td>';
                  if($i->no_of_units < $i->stock)
                    echo '<td><span style="color : green;" class="glyphicon glyphicon-ok"></span></td>';
                  else
                  {
                    echo '<td><span style="color : red;" class="glyphicon glyphicon-remove"></span></td>';
                    $can_process=false;
                  }
                  echo '<td> Rs '.number_format($i->unit_price ,2,'.',',' ).'</td>';
                  echo '<td>'.number_format($i->tax_percentage ,2,'.',',' ).' %</td>';
                  echo '<td>'.number_format($subtotal ,2,'.',',' ).'</td>';
                  echo '<td>'.number_format($sub_after_tax ,2,'.',',' ).'</td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
      </div>
      <!-- /.col -->
      <div class="col-xs-6">


        <div class="table-responsive">
          <table class="table">
            <tbody><tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rs<?= number_format(((float)$total),2,'.',',' ); ?></td>
            </tr>
            <tr>
                <?php
                if(!isset($shipping_cost))
                {
                  echo '<th>Shipping cost :</th>';
                  echo '<td>Rs <input type="number" min="0" name="shipping_cost" required></td>';
                }
                else
                {
                  echo '<th>Shipping cost :</th>';
                  echo '<td>Rs '.number_format($shipping_cost,2,'.',',' ).'</td>';
                }

               ?>
            </tr>

            <tr>
              <th>Total:</th>
              <td>Rs
                <?php
                if(isset($shipping_cost))
                  {
                    echo number_format(($total+(float)$shipping_cost),2,'.',',' ).' </td>';
                    echo '<input name="shipping_cost" value="'.$shipping_cost.'" hidden>';
                  }
                else
                {
                   echo number_format(((float)$total),2,'.',',' ).' + Shipping cost';
                }
               ?>
              </td>
            </tr>
          </tbody></table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">

          <?php
            if(isset($success))
            {
              echo '<a disabled class="btn btn-success pull-right">';
              echo 'Done !';
              echo '</a>';
            }
            elseif($can_process)
            {
              echo '<button type="submit" name="process_order" class="btn btn-success pull-right">';
              echo 'Process Order';
              echo '</button>';
            }
            else
            {
              echo '<a disabled class="btn btn-danger pull-right">';
              echo 'Unable to process order';
              echo '</a>';
            }
          ?>
        <a style="margin-right: 5px;" href="<?= base_url(); ?>/Admin_Orders" class="btn btn-danger pull-left" >
          Go back
        </a>
      </div>
    </div>
    <input hidden name="po_form" value="true">
    </form>
    </section>
