<?php echo form_open('Customer_main/login','autocomplete = "off"'); ?>

<div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" style="width: 15%">
</div>
<div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" name="password" style="width: 15%;">
</div>

<button type="submit" class="btn btn-default" name="submit">Submit</button>

<?php echo form_close(); ?>
