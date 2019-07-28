$(document).ready(function () {
   

    $("#addContactRow").on("click", function () {
        var counter = 0;
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><select name="contactType'+ counter +'" data-placeholder="Choose a Type..." class="w3-select"><option value=""></option><option value="mobile">mobile</option><option value="email">email</option></select></td>';
        cols += '<td><input type="text" name="contactData'+ counter +'"  class="w3-input" /></td>';
        cols += '<td><input type="checkbox" name="contactPrimary'+ counter +'" class="w3-check" /></td>';
		cols += '<td><input type="checkbox" name="contactPreferred'+ counter +'" class="w3-check" /></td>';

        cols += '<td><input type="button" class="w3-btn w3-theme w3-red ibtnDel"  value="Delete"></td>';
        newRow.append(cols);
        $("#ContactInformationTable").append(newRow);
        counter++;

        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });
    });

    $("#addAddressRow").on("click", function () {
        var counter = 0;
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><select name="contactType'+ counter +'" data-placeholder="Choose a Type..." class="w3-select"><option value=""></option><option value="mobile">mobile</option><option value="email">email</option></select></td>';
        cols += '<td><input type="text" name="contactData'+ counter +'"  class="w3-input" /></td>';
        cols += '<td><input type="checkbox" name="contactPrimary'+ counter +'" class="w3-check" /></td>';
		cols += '<td><input type="checkbox" name="contactPreferred'+ counter +'" class="w3-check" /></td>';

        cols += '<td><input type="button" class="w3-btn w3-theme w3-red ibtnDel"  value="Delete"></td>';
        newRow.append(cols);
        $("#AddressInformationTable").append(newRow);
        counter++;

        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });
    });

});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}