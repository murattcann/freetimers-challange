
let spinner = '<img src="./public/assets/images/loader.gif" class="loader">';
let warningAlert = '<div class="alert alert-warning">No recorded data yet.</div>';

$(function(){
    setTimeout(() => {
         loadCartItems();
    }, 750);
});


/**
 * Sets ajax request with given parameters
 * @param string method 
 * @param object data
 * @param callback successCallBack
 */
function request(method, data = {}, successCallBack){
    $.ajax({
        type: method,
        url: './index.php',
        dataType: "json",
        data : data,
        success: successCallBack
    });
}

/**
 * Loads rows from database for each related table card
 * @param string tableName
 * @param string orderColumn
 * @param string orderDirection
 */
function loadCartItems(){

    let tableHtml = '';
     
    request("POST", {action: "getCartItems"}, (response)=> {
        if(response.rowCount > 0){
            $.each(response.rows, (index, row) => {
                tableHtml += `
                    <tr>
                        <td>${row.id}</td>
                        <td>${row.measurement_unit}</td>
                        <td>${row.depth_measurement_unit}</td>
                        <td>
                            <span class="d-block"><b>Width: </b> ${row.width}</span>
                            <span class="d-block"><b>Length: </b> ${row.length}</span>
                            <span class="d-block"><b>Depth: </b> ${row.depth}</span>
                        </td>
                        <td>£${parseFloat(row.unit_price).toFixed(2)}</td>
                        <td>${row.bag_count}</td>
                        <td>£${parseFloat(row.unit_price * row.bag_count).toFixed(2)}</td>

                    </tr>
                `;
            })
        }else{
            tableHtml = `
                <tr>
                    <td colspan="7" style="text-center">
                        <div class="alert alert-warning text-center">There is no item recorded yet.</div>
                    </td>
                </tr>
            `;
        }

        $("#cartItemsTable").find("tbody").html(tableHtml);
        $("#totalBagCounter").html(response.totalData.totalQty);
        $("#totalCartPriceHolder").html("£" + response.totalData.totalPrice);
    })
}

$(document).on("click", "#calculateBtn", function(e){
    e.preventDefault();
    let width = $("#width").val();
    let length = $("#length").val();
    let depth = $("#depth").val();

    if(width < 1 || length < 1 || depth < 1){
        alert("Please fill in the relevant values ​​greater than 1");
        return false;
    }

    calculateData = {
        action: "calculate",
        measurement_unit : $("#measurementUnit").val(),
        depth_measurement_unit : $("#depthMeasurementUnit").val(),
        width : width,
        length : length,
        depth : depth,
    };
    request("POST", calculateData, (response) => {
         $("#quantityHolder").html(response.calculatedResult)
         $("#addToCart").data("bag-count",response.calculatedResult)
         $("#totalPriceHolder").html("£"+parseFloat(response.calculatedResult * 72).toFixed(2));
    });
     
})

let calculateData = {};
$(document).on("click", "#addToCart", function(e){
    e.preventDefault();
    let width = $("#width").val();
    let length = $("#length").val();
    let depth = $("#depth").val();

    if(width < 1 || length < 1 || depth < 1){
        alert("Please fill in the relevant values ​​greater than 1");
        return false;
    }
    calculateData.action = "addToCart";
    calculateData.bag_count = $(this).data("bag-count");
    console.log("bas", calculateData);
    
    request("POST", calculateData, (response) => {
        if(response.status == 201){
            $("#successMessage").removeClass("d-none");
            loadCartItems();
            setTimeout(() => {
                    $("#successMessage").addClass("d-none");
            }, 2000);
        }else{
            alert("An error occured. Please try again");
        }
    });
     
})
$(document).on("keyup input",  ".numberInput", function(){
    
    let _this = $(this);
    let value = $(this).val().trim();
    
    // check string  correction for numeric value if variable type selected as numeric
    if(/\D/g.test(value))
    {
        _this.val(value.replace(/\D/g,''));
    }
})
