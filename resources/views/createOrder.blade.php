@include('layouts.header')
@include('layouts.nav')
<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.create_order')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>

            <form id="productdata" method="post" enctype="multipart/form-data" class="pb-5">

                <div class="grid grid-cols-3 gap-x-6 mx-6 my-6">

                    <div class="flex gap-4">
                        <div>
                            <label class="text-[14px] font-normal" for="order_id">@lang('lang.Order_Id')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="order_id" id="order_id" value="01">
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="order_date">@lang('lang.Order_Date')</label>
                            <input type="date"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="order_date" id="order_date">
                        </div>
                    </div>
                    <div class="">
                        <label class="text-[14px] font-normal" for="customer_name">@lang('lang.Customer_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="customer_name" id="customer_name" placeholder=" @lang('lang.Name_Here')">
                    </div>
                    <div class="">
                        <label class="text-[14px] font-normal" for="customer_phone">@lang('lang.Customer_phone')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="customer_phone" id="customer_phone" placeholder=" @lang('lang.Phone_Here')">
                    </div>
                    <div class="mt-4 ">
                        <label class="text-[14px] font-normal" for="product">@lang('lang.Product')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="product" id="product">
                            <option value="">@lang('lang.Product')</option>


                        </select>


                    </div>

                    <div class="grid grid-cols-2 gap-4  mt-4">
                        <div>
                            <label class="text-[14px] font-normal" for="Product_Price">@lang('lang.Product_Price')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="Product_Price" id="Product_Price" value="100" readonly>
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="Tax">@lang('lang.Tax')%</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="Tax" id="tax" readonly value="18">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="order_quantity">@lang('lang.Quantity')</label>
                        <input type="number"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="order_quantity" id="order_quantity" placeholder=" @lang('lang.Quantity')" min="1">

                    </div>

                    <div class="mt-4  col-span-3  ">
                        <div class="flex gap-4 items-center">
                            <div class="w-full">
                                <label class="text-[14px] font-normal" for="Customer_Adress">@lang('lang.Customer_Adress')</label>
                                <input type="text"
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="Customer_Adress" id="Customer_Adress" placeholder=" @lang('lang.Adress_Here')"
                                    min="1">
                            </div>
                            <div class="mt-6 flex">
                                <button id="addProductBtn" type="button"
                                    class="bg-primary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-sm flex justify-center items-center"
                                    style="width: 132px"> <span class="text-2xl pr-2">+</span> Add Product</button>

                            </div>
                        </div>
                    </div>



            </form>

        </div>
        <div class="px-6">
            <table class="w-full">
                <thead class=" border-2 border-primary bg-primary text-white">
                    <tr>
                        <th class="py-3">Code</th>
                        <th>Product Name</th>
                        <th>Unit Price</th>
                        <th>Tax</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="product_output">

                </tbody>
                <tfoot>
                    <tr>
                        <td class="border-2 border-primary py-2" colspan="3">
                            <div class="text-right pr-2 w-[100%]">Sub Total:</div>
                        </td>
                        <td class="border-2 border-primary py-2" colspan="2">
                            <div class="" id="subtotal">0</div>
                        </td>
                        <td class="border-2 border-primary py-1" colspan="2">
                            <div class="flex gap-2 w-[80%] mx-auto">
                                <form action="#" class="flex items-center gap-4 w-full">
                                    <label class="text-[14px] font-normal" for="discount">@lang('lang.Discount'):</label>
                                    <input type="number"
                                        class="w-[50%] border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="discount" id="discount" value="0" min="0">

                                    <label class="text-[14px] font-normal"
                                        for="delivery_charges">@lang('lang.Delivery_Charges'):</label>
                                    <input type="text"
                                        class="w-[50%] border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="delivery_charges" id="delivery_charges"
                                        placeholder="@lang('lang.Delivery_Charges')">
                                </form>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-2 border-primary py-2 px-2" colspan="3">
                            <div class="text-right    w-[100%] font-bold text-primary">Grand Total:</div>
                        </td>
                        <td class="border-2 border-primary py-2 " colspan="2">
                            <div class="" id="grandTotal">0</div>
                        </td>
                        <td class="border-2 border-primary py-2" colspan="2">
                            <div class=""></div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="py-7 flex justify-end  pr-6">
            <button type="button"
                class="bg-primary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-sm flex justify-center items-center"
                style="width: 132px">Save & Print</button>
        </div>
    </div>
</div>





@include('layouts.footer')

<script>
    $(document).ready(function() {
        $('#addProductBtn').click(function() {
            var product = $('#product').val();
            var price = $('#Product_Price').val();
            var tax = $('#tax').val();
            var quantity = $('#order_quantity').val();
            var total = (price * quantity) + ((price * quantity) * (tax / 100));
            if (isNaN(parseInt(quantity)) || isNaN(parseFloat(price))) {
                // If either quantity or price is not a valid number, do not append the row
                return;
            }
            var existingRow = $('#product_output').find('.productName').filter(function() {
                return $(this).text() === product;
            }).closest('tr');

            if (existingRow.length > 0) {
                // If the product already exists, update the quantity
                var existingQuantity = parseInt(existingRow.find('.quantity').text());
                var updatedQuantity = existingQuantity + parseInt(quantity);
                existingRow.find('.quantity').text(updatedQuantity);
            } else {
                // If the product doesn't exist, add a new row
                console.log(product);
                var productData = `<tr>
            <td class="border-2 border-primary">35</td>
            <td class="border-2 border-primary productName">${product}</td>
            <td class="border-2 border-primary">${price}</td>
            <td class="border-2 border-primary px-5">${tax}%</td>
            <td class="border-2 border-primary py-2 quantity">${quantity}</td>
            <td class="border-2 border-primary py-2  total">${total}</td>
            <td class="border-2 border-primary">
                <div class="flex justify-center">
                    <button class="delete-btn">
                        <img width="40px" src="{{ asset('images/icons/delete.svg') }}" alt="delete">
                    </button>
                </div>
                </div>
            </td>
        </tr>`;
                $('#product_output').append(productData);
                // Clear input fields
                $('#product').val('');
                $('#Product_Price').val('');
                $('#tax').val('');
                $('#order_quantity').val('');
                var subTotal = 0;
                $('#product_output .total').each(function() {
                    subTotal += parseFloat($(this).text());
                    $('#subtotal').html(subTotal);
                    console.log("Sub Total is" + subTotal);
                });
            }
        });
        // Recalculate grand total when discount or delivery charges change
        $('#discount, #delivery_charges').on('input', function() {
            var subTotal = parseFloat($('#subtotal').text());
            var discount = parseFloat($('#discount').val()) || 0; // default to 0 if input is empty
            var deliveryCharges = parseFloat($('#delivery_charges').val()) ||
                0; // default to 0 if input is empty
            var grandTotal = subTotal - (subTotal * (discount / 100)) + deliveryCharges;
            $('#grandTotal').text(grandTotal);
        });
        // Add click event listener for dynamically generated delete buttons
        $('#product_output').on('click', '.delete-btn', function() {
            $(this).closest('tr').remove();
        });



        // get product data
        $.ajax({
            type: "GET",
            url: '../productData',
            dataType: "json",
            success: function(response) {
                var products = response
                    .products; // Assuming response.products is an array of objects

                // Clear existing options from the select element
                $('#product').empty();

                // Iterate over each product object
                $.each(products, function(index, product) {
                    var productName = product
                        .name; // Get the name field from each product object
                    var productId = product
                        .id; // Get the name field from each product object
                    // Append a new option with the product name to the select element
                    $('#product').append($('<option></option>').attr('value', productName)
                        .attr('productId', productId).text(productName));
                });
            },
            error: function(jqXHR) {
                let response = JSON.parse(jqXHR.responseText);
                console.log("error");
                Swal.fire(
                    'Warning!',
                    'Student Not Found',
                    'warning'
                );
            }
        });

        $('#product').change(function() {
            var selectedOption = $(this).find(':selected');
            var productId = selectedOption.attr('productId');
            var url = '../singleproductData/' + productId;
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    var products = response.products;

                    // Iterate over each product object
                    $.each(products, function(index, product) {
                        var productName = product.name;
                        $('#Product_Price').val(product.rate);
                        $('#tax').val(product.tax);
                    });
                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        'product Not Found',
                        'warning'
                    );
                }

            });

        });


    });
</script>
