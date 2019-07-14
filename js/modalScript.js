// ADMIN
// Admin Manage Edit Client Modal Box
$(document).on("click","#btnEditClient",function(){
  var id = $(this).data('id');
  var name = $(this).data('name');
  var email = $(this).data('email');
  var contact = $(this).data('contact');
  var usern = $(this).data('username');
  var passw = $(this).data('password');
  // Edit Modal Box Sections
  $("#editClientModal #client-id").val(id);
  $("#editClientModal #client-name").val(name);
  $("#editClientModal #client-email").val(email);
  $("#editClientModal #client-contact").val(contact);
  $("#editClientModal #client-username").val(usern);
  $("#editClientModal #client-password").val(passw);
});

// Admin Manage Delete Client Modal Box
$(document).on("click","#btnDeleteClient",function(){
  var id = $(this).data('id');
  // Delete Modal Box Sections
  $("#cfmDelClientModal #client-id").val(id);
});

// Admin Manage Approve Client Modal Box
$(document).on("click","#btnRequestClient",function(){
  var id = $(this).data('id');
  var name = $(this).data('name');
  var email = $(this).data('email');
  var reason = $(this).data('reason');
  var company = $(this).data('company');
  var contact = $(this).data('contact');
  // Edit Modal Box Sections
  $("#approveClientModal #client-id").val(id);
  $("#approveClientModal #client-name").val(name);
  $("#approveClientModal #client-email").val(email);
  $("#approveClientModal #client-reason").val(reason);
  $("#approveClientModal #client-company").val(company);
  $("#approveClientModal #client-contact").val(contact);
});

// CLIENT
// Client Maintenance Edit Customer Modal Box
$(document).on("click","#btnEditCustomer",function(){
  var id = $(this).data('id');
  var name = $(this).data('name');
  var email = $(this).data('email');
  var contact = $(this).data('contact');
  var address = $(this).data('address');
  // Edit Modal Box Sections
  $("#editCustomerModal #customer-id").val(id);
  $("#editCustomerModal #customer-name").val(name);
  $("#editCustomerModal #customer-email").val(email);
  $("#editCustomerModal #customer-contact").val(contact);
  $("#editCustomerModal #customer-address").val(address);
});

// Client Maintenance Delete Customer Modal Box
$(document).on("click","#btnDeleteCustomer",function(){
  var id = $(this).data('id');
  // Edit Modal Box Sections
  $("#deleteCustomerModal #customer-id").val(id);
});

// Client Maintenance Edit product Modal Box
$(document).on("click","#btnEditProduct",function(){
  var id = $(this).data('id');
  var name = $(this).data('name');
  var price = $(this).data('price');
  var description = $(this).data('description');
  // Edit Modal Box Sections
  $("#editProductModal #product-id").val(id);
  $("#editProductModal #product-name").val(name);
  $("#editProductModal #product-price").val(price);
  $("#editProductModal #product-description").val(description);
});

// Client Maintenance Delete Product Modal Box
$(document).on("click","#btnDeleteProduct",function(){
  var id = $(this).data('id');
  // Edit Modal Box Sections
  $("#deleteProductModal #product_id").val(id);
});

// Client Quotation Delete Modal Box
$(document).on("click","#btnDeleteQuotation",function(){
  var id = $(this).data('id');
  // Delete Modal Box Sections
  $("#deleteQuotationModal #quotation_ID").val(id);
});

// Client Invoice Delete Modal Box
$(document).on("click","#btnDeleteInvoice",function(){
  var id = $(this).data('id');
  // Edit Modal Box Sections
  $("#deleteInvoiceModal #invoice_ID").val(id);
});
