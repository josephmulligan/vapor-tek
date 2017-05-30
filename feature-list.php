<?php include('includes/header.php');
include('includes/nav.php');
?>

<div class='container'>
  
  <h1>User Management System</h1>
  <div class='row'>
  
    <div class='col-sm-3'>
      <h2 class='popover-title'>Create New User Accounts</h2>
      <em class='popover-content'>The AA creates a new account for an existing customer, and alerts the customer to their account creation. The user receives an email prompt to login for the first time. (complete)</em>
    </div>
    <div class='col-sm-3'>
      <h2 class='popover-title'>Request New Password</h2>
      <em class='popover-content'>The Customer logs in to the site for the first time and is prompted to change their password in the system. Upon changing their password they see their user area.</em>
    </div>
    <div class='col-sm-3'>
      <h2 class='popover-title'>Enter User Details</h2>
      <em class='popover-content'>The user logs in to the site using their personal username and password. They are given access to their user area. (complete)</em>
    </div> 
    <div class='col-sm-3'>
      <h2 class='popover-title'>View User Area</h2>
      <em class='popover-content'>The user, upon login, is redirected to their user area where they can browse their actions. (complete)</em>
    </div>
  </div>
  
  <h1>Product Management System</h1>
  <div class='row'>
  
    <div class='col-sm-4'>
      <h2 class='popover-title'>View Invoices</h2>
      <em class='popover-content'>The customer clicks on the ‘view invoices’ link in their user area and sees their past invoices for previous purchases. (WIP)</em>
    </div>
    <div class='col-sm-4'>
      <h2 class='popover-title'>Create / Delete Products</h2>
      <em class='popover-content'>The PM or MD fills in the webform to create or delete products from the products table. (complete)</em>
    </div>
    <div class='col-sm-4'>
      <h2 class='popover-title'>Request Certificate of Analysis</h2>
      <em class='popover-content'>The customer views an invoice and wishes to see the CoA. They click the button on the invoices screen to request a CoA.</em>
    </div> 
  </div>
  <div class='row'>
    <div class='col-sm-4'>
      <h2 class='popover-title'>Create Invoice</h2>
      <em class='popover-content'>The MD fills in the webform to charge the customer for their order.</em>
    </div>
  <div class='col-sm-4'>
      <h2 class='popover-title'>Create Certificate of Analysis</h2>
      <em class='popover-content'>The MD fills in the details to create a CoA form for the customer who has requested it.</em>
    </div>
  <div class='col-sm-4'>
      <h2 class='popover-title'>Update Stock Information</h2>
      <em class='popover-content'>The PM or MD make changes to stock information if new stock arrives so that customers can order from the new batch.</em>
    </div>
  </div>
  
  <h1>Product Management System</h1>
  <div class='row'>
  
    <div class='col-sm-4'>
      <h2 class='popover-title'>Request Order Cancellation</h2>
      <em class='popover-content'>The customer does not wish to purchase the order they have placed so clicks to request a cancellation of the order.</em>
    </div>
    <div class='col-sm-4'>
      <h2 class='popover-title'>Place New Order</h2>
      <em class='popover-content'>The customer places an order via the products page. They receive both on screen confirmation along with an email containing the order details.</em>
    </div>
    <div class='col-sm-4'>
      <h2 class='popover-title'>Amend Order Details</h2>
      <em class='popover-content'>The user wishes to amend their order details from the ‘view orders’ screen. They use the ‘make amendments’ form to change the order before dispatch.</em>
    </div> 
  </div>
  <div class='row'>
    <div class='col-sm-4'>
      <h2 class='popover-title'>Confirm Order Dispatch</h2>
      <em class='popover-content'>The PM receives notification that the order has been dispatched, so clicks the button to alert the customer that their order has been shipped.</em>
    </div>
    <div class='col-sm-4'>
      <h2 class='popover-title'>Check Stock</h2>
      <em class='popover-content'>The user wishes to see stock levels of each product, so views this from the products page.</em>
    </div>
  <div class='col-sm-4'>
      <h2 class='popover-title'>View Previous Orders</h2>
      <em class='popover-content'>The user wishes to view past orders either they have made (customer) or other users have made (PM or MD)</em>
    </div>
  </div>
  <div class='row'>
    <div class='col-sm-4 col-sm-offset-4'>
      <h2 class='popover-title'>Respond to Cancellation Request</h2>
      <em class='popover-content'>The MD has received an alert that the customer wishes to cancel. They contact the customer to approve or disapprove their request.</em>
    </div>
  </div>
  
</div>

<?php include('includes/footer.php'); ?>