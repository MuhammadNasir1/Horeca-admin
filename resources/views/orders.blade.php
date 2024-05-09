@include('layouts.header')
@include('layouts.nav')
<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Orders')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Order_List')</h3>
                <div>

                    <button data-modal-target="addordermodal" data-modal-toggle="addordermodal"
                        class="bg-primary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        @lang('lang.Add_Order')</button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="datatable" class="overflow-scroll">
                    <thead class="py-6 bg-primary text-white">
                        <tr>
                            <th>@lang('lang.STN')</th>
                            <th>@lang('lang.Code')</th>
                            <th>@lang('lang.Name')</th>
                            <th>@lang('lang.Price')</th>
                            <th>@lang('lang.Price')</th>
                            <th>@lang('lang.Price')</th>
                            <th>@lang('lang.Status')</th>
                            <th>@lang('lang.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($products as $x => $data)
                            <tr class="pt-4">
                                <td>{{ $x + 1 }}</td>
                                <td>{{ $data->code }}</td>
                                <td>{{ $data->name }}</td>
                                <td class="w-[220px]">
                                    <img class="h-20 w-20 rounded-full"
                                        src="../{{ $data->image ?? asset('images/favicon(32X32).png') }}"
                                        alt="product Image">

                                </td>
                                <td>{{ $data->category }} / {{ $data->sub_category }}</td>
                                <td>{{ $data->rate }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <div class="flex gap-5 items-center justify-center">
                                        <button class="edit_btn" updId="{{ $data->id }}"><img width="38px"
                                                src="{{ asset('images/icons/edit.svg') }}" alt="delete"></button>
                                        <a href="../delProduct/{{ $data->id }}" ><img width="38px"
                                                src="{{ asset('images/icons/delete.svg') }}" alt="delete"></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach --}}
                        <tr>
                            <th>@lang('lang.STN')</th>
                            <th>@lang('lang.Code')</th>
                            <th>@lang('lang.Name')</th>
                            <th>@lang('lang.Image')</th>
                            <th>@lang('lang.Category/Sub-Category')</th>
                            <th>@lang('lang.Price')</th>
                            <th>@lang('lang.Status')</th>
                            <th>@lang('lang.Action')</th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- ============ add  product modal  =========== --}}
<div id="addordermodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative p-4 w-full   max-w-6xl max-h-full ">
        <form id="productdata" method="post" enctype="multipart/form-data">
            {{-- <form action="addProduct" method="post" enctype="multipart/form-data"> --}}
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Order')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addordermodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-3 gap-x-6 mx-6 my-6">
                    <div class="  ">
                        <label class="text-[14px] font-normal" for="customer_name">@lang('lang.Customer_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="customer_name" id="customer_name" placeholder=" @lang('lang.Name_Here')">
                    </div>
                    <div class=" ">
                        <label class="text-[14px] font-normal" for="order_date">@lang('lang.Order_Date')</label>
                        <input type="date"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="order_date" id="order_date">
                    </div>
                    <div class=" ">
                        <label class="text-[14px] font-normal" for="product">@lang('lang.Product')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="product" id="product">
                            <option value="active">@lang('lang.Active')</option>
                            <option value="not active">@lang('lang.Not_Active')</option>
                        </select>

                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="order_quantity">@lang('lang.Quantity')</label>
                        <input type="number"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="order_quantity" id="order_quantity" placeholder=" @lang('lang.Quantity')" min="1">

                    </div>
                    <div class="mt-4  ">
                        <label class="text-[14px] font-normal" for="order_tracking">@lang('lang.Order_Tracking')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="order_tracking" id="order_tracking" placeholder=" @lang('lang.Order_Tracking')">

                    </div>
                    <div class=" mt-4">
                        <label class="text-[14px] font-normal" for="order_status">@lang('lang.Order_Status')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="order_status" id="order_status">
                            <option value="active">@lang('lang.Active')</option>
                            <option value="not active">@lang('lang.Not_Active')</option>
                        </select>

                    </div>
                    <div class=" mt-4">
                        <label class="text-[14px] font-normal" for="order_discount">@lang('lang.Discount')</label>
                        <input type="number"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="order_discount" id="order_discount" placeholder=" @lang('lang.Discount')" min="1">
                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="payment_type">@lang('lang.Payment_Type')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="payment_type" id="payment_type">
                            <option value="cod">@lang('lang.COD')</option>
                            <option value="Credit/Debit Card">@lang('lang.Credit_Debit_Card')</option>
                        </select>

                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="image">@lang('lang.Product_Image')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="product_image" id="image">
                    </div>
                    <div class="mt-4  col-span-3">
                        <div>
                            <label class="text-[14px] font-normal" for="order_description">@lang('lang.Order_Description')</label>
                            <textarea name="order_description" id="order_description"
                                class="w-full h-24  border-[#DEE2E6] rounded-[4px] focus:border-primary text-[14px] "
                                placeholder="@lang('lang.Order_Description')"></textarea>
                        </div>

                    </div>

                </div>

                <div class="flex justify-end ">
                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                        id="addBtn">
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
                            @lang('lang.Save')
                        </div>

                    </button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>



@include('layouts.footer')
<script>
    $(document).ready(function() {
        // insert data
        $("#productdata").submit(function(event) {
            var url = "../addProduct/";
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#spinner').removeClass('hidden');
                    $('#text').addClass('hidden');
                    $('#addBtn').attr('disabled', true);
                },
                success: function(response) {
                    window.location.href = '../product';

                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );

                    $('#text').removeClass('hidden');
                    $('#spinner').addClass('hidden');
                    $('#addBtn').attr('disabled', false);
                }
            });
        });

        // delete data

    });
</script>
