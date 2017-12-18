<h2>Register</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('Customer_main/registration', 'autocomplete="off"'); ?>
<p id="customer_first_name_field" class="form-row form-row-first validate-required">
    <label class="" for="customer_first_name">First Name <abbr title="required" class="required">*</abbr>
    </label>
    <input type="text" value="" placeholder="" id="customer_first_name" name="customer_first_name" class="input-text ">
</p>

<p id="customer_last_name_field" class="form-row form-row-last validate-required">
    <label class="" for="customer_last_name">Last Name <abbr title="required" class="required">*</abbr>
    </label>
    <input type="text" value="" placeholder="" id="customer_last_name" name="customer_last_name" class="input-text ">
</p>
<div class="clear"></div>

<p id="customer_company_field" class="form-row form-row-wide">
    <label class="" for="customer_company">Company Name</label>
    <input type="text" value="" placeholder="" id="customer_company" name="customer_company" class="input-text ">
</p>

<p id="customer_address_1_field" class="form-row form-row-wide address-field validate-required">
    <label class="" for="customer_address_1">Billing Address 1 <abbr title="required" class="required">*</abbr>
    </label>
    <input type="text" value="" placeholder="Number" id="customer_address_1" name="customer_address_1" class="input-text ">
</p>

<p id="customer_address_2_field" class="form-row form-row-wide address-field">
    <input type="text" value="" placeholder="Street Address" id="customer_address_2" name="customer_address_2" class="input-text ">
</p>

<p id="customer_address_2_field" class="form-row form-row-wide address-field">
    <input type="text" value="" placeholder="City" id="customer_address_3" name="customer_address_3" class="input-text ">
</p>

<p id="customer_address_1_field" class="form-row form-row-wide address-field validate-required">
    <label class="" for="customer_address_1">Billing Address 2
    </label>
    <input type="text" value="" placeholder="Number" id="customer_address_2_1" name="customer_address_2_1" class="input-text ">
</p>

<p id="customer_address_2_field" class="form-row form-row-wide address-field">
    <input type="text" value="" placeholder="Street Address" id="customer_address_2_2" name="customer_address_2_2" class="input-text ">
</p>

<p id="customer_address_2_field" class="form-row form-row-wide address-field">
    <input type="text" value="" placeholder="City" id="customer_address_2_3" name="customer_address_2_3" class="input-text ">
</p>

<div class="clear"></div>

<p id="customer_email_field" class="form-row form-row-first validate-required validate-email">
    <label class="" for="customer_email">Email Address <abbr title="required" class="required">*</abbr>
    </label>
    <input type="text" value="" placeholder="" id="customer_email" name="customer_email" class="input-text ">
</p>

<p id="customer_phone_field" class="form-row form-row-last validate-required validate-phone">
    <label class="" for="customer_phone">Phone <abbr title="required" class="required">*</abbr>
    </label>
    <input type="text" value="" placeholder="" id="customer_phone" name="customer_phone" class="input-text ">
</p>

<p id="account_password_field" class="form-row validate-required">
    <label class="" for="account_password">Account password <abbr title="required" class="required">*</abbr>
    </label>
    <input type="password" value="" placeholder="Password" id="account_password" name="account_password" class="input-text">
</p>
<p id="account_password_field" class="form-row validate-required">
    <label class="" for="account_password">Retype password <abbr title="required" class="required">*</abbr>
    </label>
    <input type="password" value="" placeholder="Password" id="account_password_conf" name="account_password_conf" class="input-text">
</p>

<input type="submit" name="submit" value="submit">

<?php form_close(); ?>