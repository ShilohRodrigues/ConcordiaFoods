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


function deleteTableRow(r) {
  let i = r.parentNode.parentNode.rowIndex;
  document.getElementById("productTable").deleteRow(i);
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

function Cart_Adjust(calling_element) {

  
  let ClassName = calling_element.className;
  
  const PricePerUnit = [1.49 , 4.49];
  let name = ClassName.match(/\D+/)[0];
  let number = ClassName.match(/\d+/)[0];

  let feild = "quantity" + number;
  let Quantity = document.querySelector(".Pquantity" + number + " ." + feild);
  console.log(".Pquantity" + number + " ." + feild);

  if (name == "PButton") {
   if (1 < parseInt(Quantity.textContent)) {
         QuantityNumber = parseInt(Quantity.textContent) - 1
         localStorage.setItem(".Pquantity" + number + " ." + feild , QuantityNumber);
         Quantity.innerHTML = QuantityNumber;
         let ItemTotal = document.querySelector(".Pprice" + number);
         ItemTotal.innerHTML = precise(QuantityNumber * PricePerUnit[number-1] )+ " $";
         localStorage.setItem(".Pprice" + number, precise(QuantityNumber * PricePerUnit[number-1] )+ " $");

   }


 }else {
         QuantityNumber = parseInt(Quantity.textContent) + 1;
         Quantity.innerHTML = QuantityNumber;
         localStorage.setItem(".Pquantity" + number + " ." + feild, QuantityNumber);
         let ItemTotal = document.querySelector(".Pprice" + number);
         ItemTotal.innerHTML = precise(QuantityNumber * PricePerUnit[number-1] ) + " $";
         localStorage.setItem(".Pprice" + number, precise(QuantityNumber * PricePerUnit[number-1] )+ " $");


  }



 

 let subtotal = 0;
 let n = 1;
  while (document.querySelector(".Pquantity" + n + " ." + "quantity" + n)!= null) {
     subtotal = subtotal + document.querySelector(".Pquantity" + n + " ." + "quantity" + n).textContent* PricePerUnit[n-1];
     n++;
   }
 console.log(subtotal);
 localStorage.setItem("Amounttext", subtotal);
 document.querySelector(".Amounttext").innerHTML = Number.parseFloat(subtotal).toPrecision(4) + " $";
 let QST = subtotal * 0.09975;
 document.querySelector(".QSTamount").innerHTML = Number.parseFloat(QST).toPrecision(4) + " $";
 localStorage.setItem("QSTamount",   QST);

 let GST = subtotal * 0.05;
  document.querySelector(".GSTamount").innerHTML = Number.parseFloat(GST).toPrecision(4) + " $";
 localStorage.setItem("GSTamount", GST);

 let total = subtotal + QST + GST;
 document.querySelector(".totalamount").innerHTML = Number.parseFloat(total).toPrecision(4) + " $";
 localStorage.setItem("totalamount", total);



}
function precise(x) {
  return Number.parseFloat(x).toPrecision(4);
}

document.addEventListener("DOMContentLoaded", function(event) {
  
  document.querySelector(".Pquantity1 .quantity1").innerHTML = localStorage.getItem(".Pquantity1 .quantity1");
  document.querySelector(".Pquantity2 .quantity2").innerHTML = localStorage.getItem(".Pquantity2 .quantity2");
  document.querySelector(".Pprice1").innerHTML = localStorage.getItem(".Pprice1");
  document.querySelector(".Pprice2").innerHTML = localStorage.getItem(".Pprice2");

  document.querySelector(".Amounttext").innerHTML = Number.parseFloat(localStorage.getItem("Amounttext")).toPrecision(4) + " $";
  document.querySelector(".QSTamount").innerHTML = Number.parseFloat(localStorage.getItem("QSTamount")).toPrecision(4) + " $";
  document.querySelector(".GSTamount").innerHTML = Number.parseFloat(localStorage.getItem("GSTamount")).toPrecision(4) + " $";
  document.querySelector(".totalamount").innerHTML = Number.parseFloat(localStorage.getItem("totalamount")).toPrecision(4) + " $";
  
});