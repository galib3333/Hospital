
// Calculate total and due automatically
function calculateAmounts() {
    var subTotal = parseFloat(document.getElementById('sub_total').value) || 0;
    var discount = parseFloat(document.getElementById('discount').value) || 0;
    var total = subTotal - discount;
    var dueDate = new Date(document.getElementById('bill_date').value);
    var currentDate = new Date();
    var due = total;

    // Calculate due only if the current date is after the bill date
    if (currentDate > dueDate) {
        due = total;
    } else {
        due = 0;
    }

    document.getElementById('total').value = total.toFixed(2);
    document.getElementById('due').value = due.toFixed(2);
}

// Attach event listeners to input fields
document.getElementById('sub_total').addEventListener('input', calculateAmounts);
document.getElementById('discount').addEventListener('input', calculateAmounts);
document.getElementById('bill_date').addEventListener('input', calculateAmounts);
