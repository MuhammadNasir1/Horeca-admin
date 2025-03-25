@extends('website.layout')
@section('title')
    Cart
@endsection


@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-slate-50 mt-4  rounded-lg  flex gap-6">

        <!-- Left Section: Cart Items -->
        <div class="w-2/3">
            <h2 class="text-2xl font-semibold mb-4">Shopping Cart</h2>

            <!-- Cart Items List -->
            <div id="cartItems" class="space-y-4"></div>
        </div>

        <!-- Right Section: Order Summary -->
        <div class="w-1/3 p-4 bg-white rounded-lg h-fit  ">
            <h3 class="text-xl font-semibold mb-4">Order Summary</h3>

            <div class="flex justify-between py-2 border-b">
                <span>Subtotal</span>
                <span>€<span id="subTotal">0</span></span>
            </div>

            <div class="flex justify-between py-2 border-b">
                <span>Delivery Charges</span>
                <span>€<span id="deliveryCharges">0</span></span>
            </div>

            <div class="flex justify-between py-2 border-b">
                <span>Delivery Type</span>
                <span>COD</span>
            </div>

            <div class="flex justify-between py-3 mt-3 text-lg font-semibold">
                <span>Grand Total</span>
                <span>€<span id="grandTotal">0</span></span>
            </div>

            <button id="checkoutBtn" class="w-full bg-blue-500 text-white px-6 py-2 rounded mt-4">
                Proceed to Checkout
            </button>
        </div>

    </div>
    <div id="checkoutModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-2xl font-semibold mb-4">Checkout</h2>

            <div class="space-y-3">
                <label class="block">Customer Name</label>
                <input type="text" id="customerName" class="w-full border p-2 rounded" placeholder="Enter name">

                <label class="block">Phone</label>
                <input type="text" id="customerPhone" class="w-full border p-2 rounded" placeholder="Enter phone">

                <label class="block">Address</label>
                <input type="text" id="customerAddress" class="w-full border p-2 rounded" placeholder="Enter address">
            </div>

            <div class="mt-4 flex justify-end">
                <button id="confirmCheckout" class="bg-blue-500 text-white px-4 py-2 rounded">Confirm Order</button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let cartHtml = "";
            let subTotal = 0;
            let deliveryCharges = 0; // Fixed delivery charge
            let grandTotal = 0;

            if (cart.length === 0) {
                $("#cartItems").html("<p class='text-center text-gray-600'>Your cart is empty.</p>");
                $("#subTotal").text("0");
                $("#grandTotal").text("0");
                return;
            }

            cart.forEach((item, index) => {
                let itemTotal = item.price * item.quantity;
                subTotal += itemTotal;

                cartHtml += `
                <div class="flex justify-between items-center p-4 border rounded-md">
                    <div>
                        <h3 class="text-lg font-medium">${item.name} (${item.unit_status})</h3>
                        <p class="text-gray-600">Category: ${item.category}</p>
                        <p class="text-gray-800 font-semibold">€${item.price.toFixed(2)}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="bg-gray-300 px-3 py-1 rounded" onclick="updateQuantity(${index}, -1)">-</button>
                        <span class="text-lg font-semibold">${item.quantity}</span>
                        <button class="bg-gray-300 px-3 py-1 rounded" onclick="updateQuantity(${index}, 1)">+</button>
                    </div>
                    <p class="text-gray-800 font-bold">€${itemTotal.toFixed(2)}</p>
                    <button class=" text-black px-3 py-1 rounded" onclick="removeItem(${index})">
                        X
                    </button>
                </div>
            `;
            });

            grandTotal = subTotal + deliveryCharges;

            $("#cartItems").html(cartHtml);
            $("#subTotal").text(subTotal.toFixed(2));
            $("#grandTotal").text(grandTotal.toFixed(2));
        }

        function updateQuantity(index, amount) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (cart[index]) {
                cart[index].quantity = Math.max(1, cart[index].quantity + amount);
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            loadCart();
        }

        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            loadCart();
        }

        $(document).ready(function() {
            loadCart();
        });


        $("#checkoutBtn").on("click", function() {
            $("#checkoutModal").removeClass("hidden");
        });

        // Close checkout modal
        $("#closeCheckout").on("click", function() {
            $("#checkoutModal").addClass("hidden");
        });

        // Confirm order and send data to API
        $("#confirmCheckout").on("click", function() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (cart.length === 0) {
                alert("Your cart is empty!");
                return;
            }

            // Extract order details
            let orderData = {
                user_id: "1", // Change this dynamically if needed
                order_date: new Date().toISOString().split("T")[0], // Current date
                customer_id: 1, // Change if needed
                customer_name: $("#customerName").val(),
                customer_phone: $("#customerPhone").val(),
                customer_adress: $("#customerAddress").val(),
                product_id: cart.map(item => item.id),
                product_quantity: cart.map(item => item.quantity),
                grand_total: parseFloat($("#grandTotal").text()),
                sub_total: parseFloat($("#subTotal").text()),
                payment_type: $("#paymentType").val(),
                order_description: "New order",
                order_note: "N/A",
                delivery_charges: 0, // Fixed charge
                unit_status: cart.map(item => item.unit_status),
                order_from: "customer",
                payment_type: "COD",
                platform: "website",
            };

            // Send order to backend
            $.ajax({
                type: "POST",
                url: "https://horeca-kaya.com/api/Addorders",
                data: JSON.stringify(orderData),
                contentType: "application/json",
                dataType: "json",
                success: function(response) {
                    localStorage.removeItem("cart");
                    $("#checkoutModal").addClass("hidden");
                    alert("Order placed successfully!");
                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    )
                }
            });
        });
    </script>
@endsection
