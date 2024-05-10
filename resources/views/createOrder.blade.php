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
                            <option value="active">@lang('lang.Active')</option>
                            <option value="not active">@lang('lang.Not_Active')</option>
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
                                <button type="button"
                                    class="bg-primary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-sm flex justify-center items-center"
                                    style="width: 132px"> <span class="text-2xl pr-2">+</span> Add Product</button>

                            </div>
                        </div>
                    </div>



            </form>

        </div>
        <table class="w-full">
            <thead class=" border-2 border-primary bg-primary text-white">
                <tr>
                    <th class="py-3">Code</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Tax</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td class="border-2 border-primary py-2">gt6050</td>
                    <td class="border-2 border-primary">RC CAR</td>
                    <td class="border-2 border-primary">500</td>
                    <td class="border-2 border-primary px-5">18%</td>
                    <td class="border-2 border-primary">1</td>
                    <td class="border-2 border-primary">
                        <div class="flex justify-center">
                            <img width="40px" src="{{ asset('images/icons/delete.svg') }}" alt="delete">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="border-2 border-primary py-2" colspan="3">
                        <div class="text-right pr-2 w-[100%]">Sub Total:</div>
                    </td>
                    <td class="border-2 border-primary py-2" colspan="1">
                        <div class="">500</div>
                    </td>
                    <td class="border-2 border-primary py-2" colspan="1">
                        <div class="">500</div>
                    </td>
                    <td class="border-2 border-primary py-1" colspan="1">
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
                                    name="delivery_charges" id="delivery_charges" placeholder="@lang('lang.Delivery_Charges')">
                            </form>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border-2 border-primary py-2 px-2" colspan="3">
                        <div class="text-right    w-[100%] font-bold text-primary">Grand Total:</div>
                    </td>
                    <td class="border-2 border-primary py-2" colspan="1">
                        <div class="">500</div>
                    </td>
                    <td class="border-2 border-primary py-2" colspan="1">
                        <div class="">500</div>
                    </td>
                    <td class="border-2 border-primary py-2" colspan="2">
                        <div class=""></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>





@include('layouts.footer')
