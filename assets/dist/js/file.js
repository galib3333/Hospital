<script>
  // Function to calculate the total and due dynamically
  function calculateTotalAndDue() {
    var subtotals = document.getElementsByName("sub_total");
    var discounts = document.getElementsByName("discount");
    var totals = document.getElementsByName("total");
    var dues = document.getElementsByName("due");

    var total = 0;

    // Iterate over each row of inputs
    for (var i = 0; i < subtotals.length; i++) {
      // Get the values from the current row
      var subtotal = parseFloat(subtotals[i].value) || 0;
      var discount = parseFloat(discounts[i].value) || 0;

      // Calculate the total for the current row
      var rowTotal = subtotal - discount;

      // Update the total and due for the current row
      totals[i].value = rowTotal.toFixed(2);
      dues[i].value = rowTotal.toFixed(2);
      
      // Add the row total to the overall total
      total += rowTotal;
    }

    // Display the overall total
    document.getElementById("overall_total").innerHTML = total.toFixed(2);
  }

  // Attach the event listener to calculate totals and dues on change
  document.addEventListener("change", calculateTotalAndDue);

  // Trigger the initial calculation when the page loads
  calculateTotalAndDue();
</script>
