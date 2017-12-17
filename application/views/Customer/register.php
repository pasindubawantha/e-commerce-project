<h2>Register</h2>


<form>
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
    <label class="" for="customer_address_1">Address <abbr title="required" class="required">*</abbr>
    </label>
    <input type="text" value="" placeholder="Street address" id="customer_address_1" name="customer_address_1" class="input-text ">
</p>

<p id="customer_address_2_field" class="form-row form-row-wide address-field">
    <input type="text" value="" placeholder="Apartment, suite, unit etc. (optional)" id="customer_address_2" name="customer_address_2" class="input-text ">
</p>

<p id="customer_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
    <label class="" for="customer_city">Town / City <abbr title="required" class="required">*</abbr>
    </label>
    <input type="text" value="" placeholder="Town / City" id="customer_city" name="customer_city" class="input-text ">
</p>

<p id="customer_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
    <label class="" for="customer_state">County</label>
    <input type="text" id="customer_state" name="customer_state" placeholder="State / County" value="" class="input-text ">
</p>
<p id="customer_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
    <label class="" for="customer_postcode">Postcode <abbr title="required" class="required">*</abbr>
    </label>
    <input type="text" value="" placeholder="Postcode / Zip" id="customer_postcode" name="customer_postcode" class="input-text ">
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
<div class="clear"></div>


<div class="create-account">
    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
    <p id="account_password_field" class="form-row validate-required">
        <label class="" for="account_password">Account password <abbr title="required" class="required">*</abbr>
        </label>
        <input type="password" value="" placeholder="Password" id="account_password" name="account_password" class="input-text">
    </p>
    <div class="clear"></div>
</div>
</form>