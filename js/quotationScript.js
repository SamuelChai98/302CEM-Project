function productTotalPriceCount(){
  var q = document.getElementById("qPQuantity").value;
  var p = document.getElementById("qPPrice").value;
  var ta = q * p;
  ta = parseFloat(ta).toFixed(2);
  document.getElementById("qPTotalAmount").value = ta;
}

function quotationAddItem() {
  var table = document.getElementById("quotationProductTable");
  var name = document.getElementById("qPName").value;
  var qty = document.getElementById("qPQuantity").value;
  var price = document.getElementById("qPPrice").value;
  var tax = document.getElementById("qPTax").value;
  var total = document.getElementById("qPTotalAmount").value;
  var final = document.getElementById("qFinalAmount").value;
  if(name == "" || qty == "" || price == "" || tax == ""){
    alert('empty field detected!');
    return false;
  }
  if(parseFloat(qty) == "" || parseFloat(price) == ""){
    alert('invalid number input');
    return false;
  }
  if(final == ""){
    final = 0;
  }
  var f = parseFloat(final);
  var t = parseFloat(total);
  var ta = parseFloat(f + t).toFixed(2);
  // final = final + parseFloat(total);
  // console.log(name+qty+price+tax+total);
  var row = table.insertRow(2);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  // var rowIndex = row.rowIndex; // INSERT ROW INDEX
  var rowCount = table.rows.length;
  // var fa = 0; // Final Amount Variable
  console.log("debug log:"+rowCount);
  var count = 0;
  while(count < rowCount){
    // fa += total;
    // console.log(count);
    count++;
  }
  cell1.innerHTML = "<input type='hidden' name='rowInput["+count+"][pID]' value=''><input name='rowInput["+count+"][pName]' class='form-control-plaintext' value='"+name+"'>";
  cell1.colSpan = 2;
  cell2.innerHTML = "<input name='rowInput["+count+"][pQuantity]' class='form-control-plaintext' value='"+qty+"'>";
  cell3.innerHTML = "<input name='rowInput["+count+"][pPrice]' class='form-control-plaintext' value='"+price+"'>";
  cell4.innerHTML = "<input name='rowInput["+count+"][pTax]' class='form-control-plaintext' value='"+tax+"'>";
  cell5.innerHTML = "<input name='rowInput["+count+"][pTotalAmount]' class='form-control-plaintext' value='"+total+"'>";
  cell6.classList.add("text-center");
  cell6.innerHTML = "<button type='button' class='btn btn-danger text-center' id='btn_add' onclick='quotationDeleteItem(this.parentNode.parentNode,"+total+")'><i class='fa fa-ban'></i></button>";
  // var f = parseFloat(final);
  // var t = parseFloat(total);
  // console.log(tt);
  document.getElementById("qFinalAmount").value = ta;
}

function quotationDeleteItem(delRow,total) {
  var final = document.getElementById("qFinalAmount").value;
  var f = parseFloat(final);
  var ta = f - total;
  ta = parseFloat(ta).toFixed(2);
  // var table = document.getElementById("quotationProductTable");
  // var deleteRow = rowCount + 1;
  // var del = x.rowIndex;
  console.log('row number is '+delRow.rowIndex);
  document.getElementById("quotationProductTable").deleteRow(delRow.rowIndex);
  document.getElementById("qFinalAmount").value = ta;
}
