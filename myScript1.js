function updatePrice() {

  let qt = document.getElementById("quantity");
  let costPerKg = document.getElementById("cost-per-kg");
  let weight = document.getElementById("weight");
  let totPrice;

  //Check if the price is per kg or per unit
  //Weight will be null if it is per unit
  if (weight == null)
    totPrice = qt.value * costPerKg.innerHTML;
  else
    totPrice = qt.value * costPerKg.innerHTML * weight.innerHTML;

  //Round to two decimals
  totPrice = Math.round(totPrice*100) / 100;
  document.getElementById("tot-price").innerHTML = "$" + totPrice;

}


function storeQ(store){
  localStorage.setItem(store,document.getElementById("quantity").value);
}


function getQ(store){
  let value=localStorage.getItem(store);
  if(localStorage.getItem(store)==""||localStorage.getItem(store)==null){
    document.getElementById("quantity").value="0";
  }
  else{
    document.getElementById('quantity').value=localStorage.getItem(store);
  }
  updatePrice();
}


function clearQ(store){
  document.getElementById('quantity').value="0";
  localStorage.removeItem(store);
}

//Function for deleting table row without json associated to the table
function deleteTableRow(r) {
  let i = r.parentNode.parentNode.rowIndex;
  document.getElementById("orderTable").deleteRow(i);
}

//Delete the table row when the x button is clicked
//Call php function using AJAX to delete product from json
function deleteProductTableRow(r) {

  let table = document.getElementById("productTable");
  let i = r.parentNode.parentNode.rowIndex;
  let name = table.rows[i].cells[0].innerHTML;
  console.log(name);
  $.ajax({
    url:"http://localhost/ConcordiaFoods/BackEndPages/ProductList.php",
    type: "post",
    data: {"prodName": name}
  });

  table.deleteRow(i);

}
function deleteOrderTableRow(r) {

  let table = document.getElementById("productTable");
  let i = r.parentNode.parentNode.rowIndex;
  let num = table.rows[i].cells[0].innerHTML;
  console.log(num);
  $.ajax({
    url:"http://localhost/ConcordiaFoods/BackEndPages/p11.php",
    type: "post",
    data: {"orderNum": num}
  });

  table.deleteRow(i);

}

function deleteUserRow(r) {

  let table = document.getElementById("productTable");
  let i = r.parentNode.parentNode.rowIndex;
  let id = table.rows[i].cells[1].innerHTML;
  console.log(id);
  $.ajax({
    url:"http://localhost/ConcordiaFoods/BackEndPages/UsersList.php",
    type: "post",
    data: {"StudentID": id}
  });

  table.deleteRow(i);

}

function addToTable(r) {

  let table = document.getElementById("productTable");
  let i = r.parentNode.parentNode.rowIndex;
  let name = table.rows[i].cells[0].innerHTML;

  let orderTable = document.getElementById("orderTable");
  let row = orderTable.insertRow(1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = '<input type="text" name="products[]" readonly value="' + name + '">';
  cell2.innerHTML = '<input type="number" onchange="updateTotPrice()" name="quantities[]" id="order-quantity" min="0" max="100" value="1">';
  cell3.innerHTML = '<button onclick="deleteTableRow(this)"><i class="fas fa-times-circle"></i></button>';

}

function openDescription() {
  let descr = document.getElementById("txt-more-description");
  let btn = document.getElementById("bt-more-description")
  if (descr.style.display == "block") {
    descr.style.display = "none";
    btn.innerHTML = "View Description...";
  }
  else {
    descr.style.display = "block";
    btn.innerHTML = "See Less...";
  }

}


//Cart//////////////////////////
removed_element_array = [];
const PricePerUnit = [1.49 , 4.49];
let i1 = 0;
let i2 = 0;
function Cart_Adjust(calling_element) {


  let ClassName = calling_element.className;
  let subtotal = 0;
  let name = ClassName.match(/\D+/)[0];
  let number = ClassName.match(/\d+/)[0];
  let feild = "quantity" + number;
  let Quantity = document.querySelector(".Pquantity" + number + " ." + feild);
  console.log(".Pquantity" + number + " ." + feild);

  if (name == "PButton") {
   if (1 < parseInt(Quantity.textContent)) {
         QuantityNumber = parseInt(Quantity.textContent) - 1
         //localStorage.setItem(".Pquantity" + number + " ." + feild , QuantityNumber);
         Quantity.innerHTML = QuantityNumber;
         let ItemTotal = document.querySelector(".Pprice" + number);
         ItemTotal.innerHTML = precise(QuantityNumber * PricePerUnit[number-1] )+ " $";
         //localStorage.setItem(".Pprice" + number, precise(QuantityNumber * PricePerUnit[number-1] )+ " $");

   }


 }else {
         QuantityNumber = parseInt(Quantity.textContent) + 1;
         Quantity.innerHTML = QuantityNumber;
         //localStorage.setItem(".Pquantity" + number + " ." + feild, QuantityNumber);
         let ItemTotal = document.querySelector(".Pprice" + number);
         ItemTotal.innerHTML = precise(QuantityNumber * PricePerUnit[number-1] ) + " $";
         //localStorage.setItem(".Pprice" + number, precise(QuantityNumber * PricePerUnit[number-1] )+ " $");


  }






 let n = 1;
  while (document.querySelector(".Pquantity" + n + " ." + "quantity" + n)!= null) {

    if (i1 == 1) {
      n++
             subtotal =  document.querySelector(".Pquantity" + 2 + " ." + "quantity" + 2).textContent* PricePerUnit[1];

    }else {
      if (i2 == 1) {
      n++
             subtotal =  document.querySelector(".Pquantity" + 2 + " ." + "quantity" + 2).textContent* PricePerUnit[1];

    }else {
      subtotal = subtotal + document.querySelector(".Pquantity" + n + " ." + "quantity" + n).textContent* PricePerUnit[n-1];
     n++;
    }

    }

   }
 console.log(subtotal);
 //localStorage.setItem("Amounttext", subtotal);
 document.querySelector(".Amounttext").innerHTML = Number.parseFloat(subtotal).toPrecision(4) + " $";
 let QST = subtotal * 0.09975;
 document.querySelector(".QSTamount").innerHTML = Number.parseFloat(QST).toPrecision(4) + " $";
 //localStorage.setItem("QSTamount",   QST);

 let GST = subtotal * 0.05;
  document.querySelector(".GSTamount").innerHTML = Number.parseFloat(GST).toPrecision(4) + " $";
 //localStorage.setItem("GSTamount", GST);

 let total = subtotal + QST + GST;
 document.querySelector(".totalamount").innerHTML = Number.parseFloat(total).toPrecision(4) + " $";
 //localStorage.setItem("totalamount", total);



}
function precise(x) {
  return Number.parseFloat(x).toPrecision(4);
}

/*document.addEventListener("DOMContentLoaded", function(event) {

  document.querySelector(".Pquantity1 .quantity1").innerHTML = localStorage.getItem(".Pquantity1 .quantity1");
  document.querySelector(".Pquantity2 .quantity2").innerHTML = localStorage.getItem(".Pquantity2 .quantity2");
  document.querySelector(".Pprice1").innerHTML = localStorage.getItem(".Pprice1");
  document.querySelector(".Pprice2").innerHTML = localStorage.getItem(".Pprice2");

  document.querySelector(".Amounttext").innerHTML = Number.parseFloat(localStorage.getItem("Amounttext")).toPrecision(4) + " $";
  document.querySelector(".QSTamount").innerHTML = Number.parseFloat(localStorage.getItem("QSTamount")).toPrecision(4) + " $";
  document.querySelector(".GSTamount").innerHTML = Number.parseFloat(localStorage.getItem("GSTamount")).toPrecision(4) + " $";
  document.querySelector(".totalamount").innerHTML = Number.parseFloat(localStorage.getItem("totalamount")).toPrecision(4) + " $";

});*/



function Cart_X(calling_element) {

  let subtotal = 0;
  let reduced = 0;
  let ClassName = calling_element.className;
  let number = ClassName.match(/\d+/)[0];

  if (number == 1) {
    i1 = 1;
  }
  if (number == 2) {
    i2 = 1;
        console.log("subtotal");

  }

  removed_element_array.push(number);
  console.log(number);
  document.querySelector(".Pquantity" + number).style.display = 'none';
  document.querySelector(".Pimage" + number).style.display = 'none';
  document.querySelector(".Pname" + number).style.display = 'none';
  document.querySelector(".Pprice" + number).style.display = 'none';
  document.querySelector(".xbutton" + number).style.display = 'none';



  //let n = 1;

    if (i1 == 1) {
       subtotal =  document.querySelector(".Pquantity" + 2 + " ." + "quantity" + 2).textContent* PricePerUnit[1];
       console.log(subtotal);
       var div = document.querySelector('.itemstotal');
       div.innerHTML = '1 Item'
    }
    if (i2 == 1) {
        subtotal = subtotal + document.querySelector(".Pquantity" + 1 + " ." + "quantity" + 1).textContent* PricePerUnit[0];
console.log(subtotal);
        var div = document.querySelector('.itemstotal');
       div.innerHTML = '1 Item'
    }
    if (i1 == 1 && i2 == 1) {
      subtotal=0;
      console.log(subtotal);
      var div = document.querySelector('.line');
      p = document.createElement("p");
    p.innerHTML = 'Empty cart';
    div.appendChild(p);
    var div = document.querySelector('.itemstotal');
       div.innerHTML = '0 Item'

    }





console.log(subtotal);
 //localStorage.setItem("Amounttext", subtotal);
 document.querySelector(".Amounttext").innerHTML = Number.parseFloat(subtotal).toPrecision(4) + " $";
 let QST = subtotal * 0.09975;
 document.querySelector(".QSTamount").innerHTML = Number.parseFloat(QST).toPrecision(4) + " $";
 //localStorage.setItem("QSTamount",   QST);

 let GST = subtotal * 0.05;
  document.querySelector(".GSTamount").innerHTML = Number.parseFloat(GST).toPrecision(4) + " $";
 //localStorage.setItem("GSTamount", GST);

 let total = subtotal + QST + GST;
 document.querySelector(".totalamount").innerHTML = Number.parseFloat(total).toPrecision(4) + " $";
 //localStorage.setItem("totalamount", total);


function delete_user(calling_element){

  console.log("d");
}

////////////////////////////////////////////////////////////

}
