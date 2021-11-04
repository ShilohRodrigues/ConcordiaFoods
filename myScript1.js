function updatePrice() {
  
  let quantity = document.getElementById("quantity");
  let costPerKg = document.getElementById("cost-per-kg");
  let weight = document.getElementById("weight");
  
  let totPrice;
  
  //Check if the price is per kg or per unit
  //Weight will be null if it is per unit
  if (weight == null) 
    totPrice = quantity.value * costPerKg.innerHTML;
  else 
    totPrice = quantity.value * costPerKg.innerHTML * weight.innerHTML;
  
  //Round to two decimals
  totPrice = Math.round(totPrice*100) / 100;
  document.getElementById("tot-price").innerHTML = "$" + totPrice;
  
}