@include('layouts.header')
@include('layouts.nav')
<div class="mx-4 mt-12">


    <form id="orderForm" method="post" enctype="multipart/form-data" class="pb-5"
        url="../addUpdatedOrder/{{ $order->id }}">
        {{-- <form action="../addUpdatedOrder/{{ $order->id }}" method="post" enctype="multipart/form-data" class="pb-5"> --}}
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
                                <option value="full_unit" id="unitOption">@lang('lang.Full_Unit')</option>


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
                    <input type="hidden" id="weight">





                </div>
                <div class="px-6 overflow-x-auto">
                    <table class="w-full">
                        <thead class=" border-2 border-primary bg-primary text-white">
                            <tr>
                                <th class="py-3">@lang('lang.Code')</th>
                                <th class="whitespace-nowrap">@lang('lang.Product_Name')</th>
                                <th class="whitespace-nowrap">@lang('lang.Unit_Price')</th>
                                <th class="whitespace-nowrap">@lang('lang.Tax')</th>
                                <th class="whitespace-nowrap">@lang('lang.Weight')</th>
                                <th class="whitespace-nowrap">@lang('lang.Quantity')</th>
                                <th class="whitespace-nowrap">@lang('lang.Total_Price')</th>
                                <th class="whitespace-nowrap">@lang('lang.Action')</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="product_output">
                            @foreach ($orderItems as $orderItem)
                                @if ($orderItem->unit_status == 'single')
                                    @php
                                        $total_weight =
                                            \App\Models\Product::find($orderItem->product_id)->content_weight *
                                            $orderItem->product_quantity;
                                    @endphp
                                @else
                                    @php
                                        $total_weight =
                                            \App\Models\Product::find($orderItem->product_id)->package_weight *
                                            $orderItem->product_quantity;
                                    @endphp
                                @endif
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
                                        <input readonly type="hidden" value="{{ $total_weight }}"
                                            id="totalWeightInput">

                                        {{ \App\Models\Product::find($orderItem->product_id)->code }}
                                    </td>
                                    @php

                                        $productName = \App\Models\Product::find($orderItem->product_id)->name;

                                        $product_status = \App\Models\Product::find($orderItem->product_id)->status;
                                        if ($product_status == 'deleted') {
                                            $p_message = __('lang.Delete_From_Stock');
                                            $color = 'text-red-600';
                                        } elseif ($product_status == 'deleted') {
                                            $p_message = '(Un-Active From Stock)';
                                            $color = 'text-blue-700';
                                        } else {
                                            $p_message = '';
                                            $color = '';
                                        }
                                    @endphp
                                    <td class=" unitStatus hidden">{{ $orderItem->unit_status }}</td>
                                    <td class="border-2 border-primary productName">{{ $productName }}
                                        <br><span
                                            class="text-xs font-bold {{ $color }} ">{{ $p_message }}</span>
                                    </td>
                                    <td class="border-2 border-primary">{{ $orderItem->product_rate }}</td>
                                    <td class="border-2 border-primary px-5">{{ $orderItem->product_tax }}</td>
                                    <td class="border-2 border-primary px-5" id="totalWeightColumn">
                                        {{ $total_weight }}Kg
                                    </td>
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
                                <td class="border-2 border-primary py-2" colspan="4">
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
                                <td class="border-2 border-primary py-2 px-2" colspan="4">
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
                        class="bg-primary toggle-button h-[40px] rounded-[4px] px-3 font-bold text-white text-sm flex justify-center items-center min-w-[120px]"
                        id="submitButton">
                        <div class=" text-center hidden" id="spinner">
                            <svg aria-hidden="true"
                                class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-primary"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                        </div>
                        <div id="text">
                            @lang('lang.Update&Print')
                        </div>
                    </button>
                </div>
            </div>
    </form>





    @include('layouts.footer')

    <script>
        $(document).ready(function() {
            $("#orderForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                let url = $(this).attr('url');

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#submitButton').attr('disabled', true);
                    },
                    success: function(response) {
                        // Handle the success response here
                        if (response.success == true) {
                            $('#text').removeClass('hidden');
                            $('#spinner').addClass('hidden');

                            window.location.href = '/invoice/' + response.orderId;

                        } else if (response.success == false) {
                            Swal.fire(
                                'Warning!',
                                response.message,
                                'warning'
                            )
                        }
                    },
                    error: function(jqXHR) {

                        let response = JSON.parse(jqXHR.responseText);

                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        )
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#submitButton').attr('disabled', false);
                    }
                });
            });

            function calculatetotalvalue() {

                var subTotal = 0;
                console.warn("delted");
                $('#product_output .total').each(function() {
                    subTotal += parseFloat($(this).text());
                    $('#subtotal').html(subTotal.toFixed(2));
                    // console.log("Sub Total is" + subTotal);
                    $('#grandTotal').html(subTotal.toFixed(2));
                    $('#grand_total').val(subTotal.toFixed(2));
                    $('#sub_total').val(subTotal.toFixed(2));
                    console.warn("the sub totao is" + subTotal);
                });
            }

            $('#addProductBtn').click(function() {
                let product = $('#product').val();
                let price = $('#Product_Price').val();
                let tax = $('#tax').val();
                let quantity = $('#order_quantity').val();
                let code = $('#productCode').val();
                let Product_id = $('#Product_id').val();
                let unitStatus = $('#unitStatus').val()
                let weight = $('#weight').val()
                let totalWeight = parseFloat((weight * quantity));
                let total = (price * quantity) + ((price * quantity) * (tax / 100));
                // console.log('the total is' + total);

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
                    let currentWeight = parseFloat(existingRow.find('#totalWeightInput').val());
                    existingRow.find('.quantity').text(updatedQuantity);
                    existingRow.find('#quantityinput').val(updatedQuantity);
                    existingRow.find('#totalinput').html() + total;
                    // existingRow.find('#totalWeightInput').val(totalWeight);

                    existingRow.find('#totalWeightInput').val(currentWeight + totalWeight);
                    existingRow.find('#totalWeightColumn').html(currentWeight + totalWeight + "Kg");

                    ////
                    console.log('currentWeight', currentWeight + ": " + totalWeight)

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
                        $('#subtotal').html(subTotal.toFixed(2));
                        // console.log("Sub Total is" + subTotal);
                        $('#grandTotal').html(subTotal.toFixed(2));
                        $('#grand_total').val(subTotal.toFixed(2));
                        $('#sub_total').val(subTotal.toFixed(2));
                        $('#product').val('Select_Product').trigger('change');
                        $('#Product_Price').val('');
                        $('#tax').val('');
                        $('#order_quantity').val('');
                    });

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
                     <input readonly type="hidden" value="${totalWeight}" id="totalWeightInput" >
                ${code}</td>
            <td class="border-2 border-primary unitStatus hidden">${unitStatus}</td>
            <td class="border-2 border-primary productName">${product}</td>
            <td class="border-2 border-primary">${price}</td>
            <td class="border-2 border-primary px-5">${tax}%</td>
            <td class="border-2 border-primary px-5" id="totalWeightColumn">${totalWeight}Kg</td>
            <td class="border-2 border-primary py-2 quantity">${quantity}</td>
            <td class="border-2 border-primary py-2  total">${total.toFixed(2)}</td>
            <td class="border-2 border-primary">
                <div class="flex justify-center">
                    <button class="delete-btn" type="button">
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
                if ($('#product_output .total').length === 0) {
                    console.log('The length is  0')
                    $('#subtotal').html(0);
                    $('#grandTotal').html(0);
                    $('#grand_total').val(0);
                }
                calculatetotalvalue()
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
                            if (product.unit_price == 0) {
                                $('#unitOption').prop('disabled', true);
                                $('#unitStatus').val('single').trigger('change');
                            } else {
                                $('#unitOption').prop('disabled', false);
                                $('#unitStatus').trigger('change');
                            }

                            function checkUnitStatus() {
                                let unitStatus = $('#unitStatus').val();
                                if (unitStatus == "single") {
                                    $('#Product_Price').val(product.rate);
                                    $('#priceLable').html("@lang('lang.Product_Price')");
                                    $('#weight').val(product.content_weight);
                                } else {
                                    $('#Product_Price').val(product.unit_price);
                                    $('#priceLable').html("@lang('lang.Unit_Price')");
                                    $('#weight').val(product.package_weight);
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
