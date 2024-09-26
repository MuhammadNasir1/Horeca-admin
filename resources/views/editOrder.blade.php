@include('layouts.header')
@include('layouts.nav')
<div class="mx-4 mt-12">


    <form action="../addUpdatedOrder/{{ $order->id }}" method="post" enctype="multipart/form-data" class="pb-5">
        @csrf
        <input type="hidden" name="order_from" value="{{ $order->order_from }}">
        <input type="hidden" name="platform" value="{{ $order->platform }}">
        <input type="hidden" name="customer_id" value="{{ $order->customer_id }}">
        <input type="hidden" name="order_status" value="{{ $order->order_status }}">
        <input type="hidden" name="user_id" value="{{ $order->user_id }}">
        <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
            <div>


                <div class=" lg:grid lg:grid-cols-3 gap-x-6 mx-6 my-6">

                    <div class="flex gap-4">
                        <div>
                            <label class="text-[14px] font-normal" for="order_id">@lang('lang.Order_Id')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="order_id" id="order_id" value="{{ $order->id }}" readonly>
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="order_date">@lang('lang.Order_Date')</label>
                            <input type="date"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="order_date" id="order_date" required value="{{ $order->order_date }}">
                        </div>
                    </div>
                    <div class="">
                        <label class="text-[14px] font-normal" for="customer_name">@lang('lang.Customer_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="customer_name" id="customer_name" placeholder=" @lang('lang.Name_Here')" required
                            value="{{ $order->customer_name }}">
                    </div>
                    <div class="">
                        <label class="text-[14px] font-normal" for="customer_phone">@lang('lang.Customer_phone')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="customer_phone" id="customer_phone" placeholder=" @lang('lang.Phone_Here')"
                            value="{{ $order->customer_phone }}">
                    </div>


                    <div class="mt-4  col-span-3  ">
                        <div class="md:flex gap-4 items-center">
                            <div class="w-full">
                                <label class="text-[14px] font-normal" for="Customer_Address">@lang('lang.Customer_Address')</label>
                                <br>
                                <textarea name="customer_adress" id="Customer_Address" placeholder=" @lang('lang.Address_Here')" rows="2"
                                    class="w-full   border-[#DEE2E6] rounded-[4px] focus:border-primary [40px] text-[14px]">{{ $order->customer_adress }}</textarea>
                            </div>
                            <div class="w-full">
                                <label class="text-[14px] font-normal" for="Customer_note">@lang('lang.Customer_note')</label>
                                <br>
                                <textarea name="order_note" id="Customer_note" placeholder=" @lang('lang.Note_Here')" rows="2"
                                    class="w-full   border-[#DEE2E6] rounded-[4px] focus:border-primary [40px] text-[14px]">{{ $order->order_note }}</textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="productCode">
                    <input type="hidden" id="Product_id">
                    <div class="flex gap-3 w-full">
                        <div class="mt-4 w-full">
                            <label class="text-[14px] font-normal" for="product">@lang('lang.Product')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="product" id="product">
                                <option value="">@lang('lang.Product')</option>
                            </select>
                        </div>
                        <div class="mt-4 w-full ">

                            <label class="text-[14px] font-normal" for="unitStatus">@lang('lang.Unit')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="unit_sale" id="unitStatus">
                                <option disabled>@lang('lang.Select_Unit_Sale')</option>
                                <option value="single">@lang('lang.Single')</option>
                                <option value="full_unit">@lang('lang.Full_Unit')</option>


                            </select>


                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4  mt-4">
                        <div>
                            <label class="text-[14px] font-normal" for="Product_Price">@lang('lang.Product_Price')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="price" id="Product_Price" value="0" readonly>
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="Tax">@lang('lang.Tax')%</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="Tax" id="tax" readonly value="0">
                        </div>
                    </div>

                    <div class="flex mt-4 gap-2">
                        <div class="">
                            <label class="text-[14px] font-normal" for="order_quantity">@lang('lang.Quantity')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="order_quantity" id="order_quantity" placeholder=" @lang('lang.Quantity')"
                                min="1">

                        </div>
                        <div class="mt-6 flex">
                            <button id="addProductBtn" type="button"
                                class="bg-primary toggle-button h-[40px] rounded-[4px]  px-3 font-bold text-white text-sm flex justify-center items-center">
                                <span class="text-2xl">+</span></button>


                        </div>
                    </div>





                </div>
                <div class="px-6 overflow-x-auto">
                    <table class="w-full">
                        <thead class=" border-2 border-primary bg-primary text-white">
                            <tr>
                                <th class="py-3">@lang('lang.Code')</th>
                                <th class="whitespace-nowrap">@lang('lang.Product_Name')</th>
                                <th class="whitespace-nowrap">@lang('lang.Unit_Price')</th>
                                <th class="whitespace-nowrap">@lang('lang.Tax')</th>
                                <th class="whitespace-nowrap">@lang('lang.Quantity')</th>
                                <th class="whitespace-nowrap">@lang('lang.Total_Price')</th>
                                <th class="whitespace-nowrap">@lang('lang.Action')</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="product_output">
                            @foreach ($orderItems as $orderItem)
                                <tr>
                                    <td class="border-2 border-primary">
                                        <input type="hidden"
                                            value="{{ \App\Models\Product::find($orderItem->product_id)->code }}"
                                            name="product_code[]">
                                        <input type="hidden" value="{{ $orderItem->product_id }}"
                                            name="product_id[]">
                                        <input type="hidden" value="{{ $orderItem->product_rate }}"
                                            name="product_rate[]">
                                        <input type="hidden" value="{{ $orderItem->product_tax }}"
                                            name="product_tax[]">
                                        <input type="hidden" id="quantityinput"
                                            value=" {{ $orderItem->product_quantity }}" name="product_quantity[]">
                                        <input type="hidden" id="totalinput"
                                            value="{{ $orderItem->product_total }}" name="product_total[]">
                                        <input type="hidden" value="{{ $orderItem->unit_status }}"
                                            name="unit_status[]">
                                        {{ \App\Models\Product::find($orderItem->product_id)->code }}
                                    </td>
                                    @php

                                        $productName = \App\Models\Product::find($orderItem->product_id)->name;
                                    @endphp
                                    <td class=" unitStatus hidden">{{ $orderItem->unit_status }}</td>
                                    <td class="border-2 border-primary productName">{{ $productName }}</td>
                                    <td class="border-2 border-primary">{{ $orderItem->product_rate }}</td>
                                    <td class="border-2 border-primary px-5">{{ $orderItem->product_tax }}%</td>
                                    <td class="border-2 border-primary py-2 quantity">
                                        {{ $orderItem->product_quantity }}</td>
                                    <td class="border-2 border-primary py-2  total">{{ $orderItem->product_total }}
                                    </td>
                                    <td class="border-2 border-primary">
                                        <div class="flex justify-center">
                                            <button class="delete-btn">
                                                <img width="40px" src="{{ asset('images/icons/delete.svg') }}"
                                                    alt="delete">
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="border-2 border-primary py-2" colspan="3">
                                    <div class="text-right pr-2 w-[100%]">@lang('lang.Sub_Total')</div>
                                </td>
                                <td class="border-2 border-primary py-2 px-2" colspan="2">
                                    <div class="" id="subtotal">{{ $order->sub_total }}</div>
                                </td>
                                <td class="border-2 border-primary py-1 " colspan="2">
                                    <div class="flex gap-2   mx-5 items-center">
                                        <label class="text-[14px] font-normal"
                                            for="discount">@lang('lang.Discount'):</label>
                                        <input type="number"
                                            class="lg:w-[50%] border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                            name="order_vat" id="discount" min="0"
                                            value="{{ $order->discount }}">

                                        <label class="text-[14px] font-normal"
                                            for="delivery_charges">@lang('lang.Delivery_Charges'):</label>
                                        <input type="number"
                                            class="lg:w-[50%] border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                            name="delivery_charges" id="delivery_charges"
                                            placeholder="@lang('lang.Delivery_Charges')" value="{{ $order->delivery_charges }}">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-2 border-primary py-2 px-2" colspan="3">
                                    <div class="text-right    w-[100%] font-bold text-primary">@lang('lang.Grand_total')</div>
                                </td>
                                <td class="border-2 border-primary py-2 px-2" colspan="2">
                                    <div class="" id="grandTotal">{{ $order->grand_total }}</div>
                                </td>
                                <td class="border-2 border-primary py-2" colspan="2">
                                    <div class=""></div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <input type="hidden" name="grand_total" id="grand_total" value="{{ $order->grand_total }}">
                <input type="hidden" name="sub_total" id="sub_total" value="{{ $order->sub_total }}"">
                <div class="py-7 flex justify-end  pr-6">
                    <button
                        class="bg-primary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-sm flex justify-center items-center"
                        style="width: 132px">@lang('lang.Update&Print')</button>
                </div>
            </div>
        </div>
    </form>





    @include('layouts.footer')

    <script>
        $(document).ready(function() {

            $('#addProductBtn').click(function() {
                let product = $('#product').val();
                let price = $('#Product_Price').val();
                let tax = $('#tax').val();
                let quantity = $('#order_quantity').val();
                let code = $('#productCode').val();
                let Product_id = $('#Product_id').val();
                let unitStatus = $('#unitStatus').val()
                let total = (price * quantity) + ((price * quantity) * (tax / 100));
                console.log('the total is' + total);
                console.log('html is' + $('#product_output').html());

                if (isNaN(parseInt(quantity)) || isNaN(parseFloat(price))) {
                    // If either quantity or price is not a valid number, do not append the row
                    return Swal.fire(
                        'Warning!',
                        'Select the quantity',
                        'warning'
                    );;
                }
                // var existingRow = $('#product_output').find('.productName').filter(function() {
                //     return $(this).text() === product;
                // }).closest('tr');

                var existingRow = $('#product_output').find('.productName').filter(function() {
                    return $(this).text() === product;
                }).closest('tr').filter(function() {
                    return $(this).find('.unitStatus').text() === unitStatus;
                });
                if (existingRow.length > 0) {
                    // If the product already exists, update the quantity
                    var existingQuantity = parseInt(existingRow.find('.quantity').text());
                    var updatedQuantity = existingQuantity + parseInt(quantity);
                    existingRow.find('.quantity').text(updatedQuantity);
                    existingRow.find('#quantityinput').val(updatedQuantity);
                    existingRow.find('#totalinput').html() + total;


                    ////

                    var currentTotal = parseFloat(existingRow.find('.total')
                        .text()); // Get the current total and convert to number
                    var incrementValue = parseFloat(total); // Convert 'total' to a number

                    if (!isNaN(currentTotal) && !isNaN(incrementValue)) { // Check if both are valid numbers
                        var updatedTotal = (currentTotal + incrementValue).toFixed(
                            2); // Increment and format to 2 decimal places
                        existingRow.find('.total').text(updatedTotal); // Update the total display
                        existingRow.find('#totalinput').val(
                            updatedTotal); // Update the input field with the new total
                    } else {
                        console.error("Invalid total value:", total);
                    }

                    console.log(total);

                    var subTotal = 0;
                    $('#product_output .total').each(function() {
                        subTotal += parseFloat($(this).text());
                        $('#subtotal').html(subTotal);
                        // console.log("Sub Total is" + subTotal);
                        $('#grandTotal').html(subTotal.toFixed(2));
                        $('#grand_total').val(subTotal.toFixed(2));
                        $('#sub_total').val(subTotal.toFixed(2));
                    });

                    $('#product').val('Select_Product').trigger('change');
                    $('#Product_Price').val('');
                    $('#tax').val('');
                    $('#order_quantity').val('');

                } else {
                    // If the product doesn't exist, add a new row
                    console.log(product);
                    var productData = `<tr>
            <td class="border-2 border-primary">
                    <input readonly type="hidden" value="${code}" name="product_code[]">
                    <input readonly type="hidden" value="${Product_id}" name="product_id[]">
                    <input readonly type="hidden" value="${price}" name="product_rate[]">
                    <input readonly type="hidden" value="${tax}" name="product_tax[]">
                    <input readonly id="quantityinput" type="hidden" value="${quantity}" name="product_quantity[]">
                    <input readonly id="totalinput" type="hidden" value="${total.toFixed(2)}" name="product_total[]">
                    <input readonly type="hidden" value="${unitStatus}" name="unit_status[]">
                ${code}</td>
     <td class="border-2 border-primary unitStatus hidden">${unitStatus}</td>
            <td class="border-2 border-primary productName">${product}</td>
            <td class="border-2 border-primary">${price}</td>
            <td class="border-2 border-primary px-5">${tax}%</td>
            <td class="border-2 border-primary py-2 quantity">${quantity}</td>
            <td class="border-2 border-primary py-2  total">${total.toFixed(2)}</td>
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
                    $('#product').val('Select_Product').trigger('change');
                    $('#Product_Price').val('');
                    $('#tax').val('');
                    $('#order_quantity').val('');

                    function calculatetotalvalue() {

                        var subTotal = 0;
                        $('#product_output .total').each(function() {
                            subTotal += parseFloat($(this).text());
                            $('#subtotal').html(subTotal);
                            // console.log("Sub Total is" + subTotal);
                            $('#grandTotal').html(subTotal.toFixed(2));
                            $('#grand_total').val(subTotal.toFixed(2));
                            $('#sub_total').val(subTotal.toFixed(2));
                        });
                    }
                    calculatetotalvalue()
                }
            });
            // Recalculate grand total when discount or delivery charges change
            $('#discount, #delivery_charges').on('input', function() {
                var subTotal = parseFloat($('#subtotal').text());
                var discount = parseFloat($('#discount').val()) || 0; // default to 0 if input is empty
                var deliveryCharges = parseFloat($('#delivery_charges').val()) ||
                    0; // default to 0 if input is empty
                var grandTotal = subTotal - (subTotal * (discount / 100)) + deliveryCharges;
                $('#grandTotal').text(grandTotal.toFixed(2));
                $('#grand_total').val(grandTotal.toFixed(2));
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
                    // $('#product').empty();
                    $('#product').html($('<option></option>').attr('value', "Select_Product").text(
                        "@lang('lang.Select_Product')"));

                    // Iterate over each product object
                    $.each(products, function(index, product) {
                        var productName = product.name;
                        var productBrand = product.brand
                        var productId = product.id;
                        $('#product').append($('<option></option>').attr('value', productName)
                            .attr('productId', productId).html(productName +
                                ` <span class="ml-4">(${productBrand})</span>`)
                        );
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

                            function checkUnitStatus() {
                                let unitStatus = $('#unitStatus').val();
                                if (unitStatus == "single") {
                                    $('#Product_Price').val(product.rate);
                                    $('#priceLable').html("@lang('lang.Product_Price')");
                                } else {
                                    $('#Product_Price').val(product.unit_price);
                                    $('#priceLable').html("@lang('lang.Unit_Price')");
                                }
                            }
                            checkUnitStatus(); // Initial check
                            $('#unitStatus').change(
                                checkUnitStatus);
                            $('#Product_Price').val(product.rate);
                            $('#Product_id').val(product.id);
                            $('#productCode').val(product.code);
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
