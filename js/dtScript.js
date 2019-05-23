$(document).ready(function() {
    $('#table_quotation').DataTable({
      "language": {
         "emptyTable":"No Data Found"
     }
    });
} );

$(document).ready(function() {
    $('#table_quotation_product').DataTable({
      "paging":   false,
      "ordering": false,
      "info":     false,
      "search":   true,
      "language": {
         "emptyTable":"No Data Found"
     }
    });
} );

$(document).ready(function() {
    $('#table_manage_request').DataTable({
      "language": {
         "emptyTable":"No Data Found"
     }
    });
} );

$(document).ready(function() {
    $('#table_manage_online').DataTable({
      "language": {
         "emptyTable":"No Data Found"
     }
    });
} );

$(document).ready(function() {
    $('#table_manage_offline').DataTable({
      "language": {
         "emptyTable":"No Data Found"
     }
    });
} );
