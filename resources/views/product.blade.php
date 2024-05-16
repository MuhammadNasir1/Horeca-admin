@include('layouts.header')
@include('layouts.nav')
<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Product')</h1>
    </div>
    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.product_List')</h3>
                <div>

                    <button data-modal-target="addproductmodal" data-modal-toggle="addproductmodal"
                        class="bg-primary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        @lang('lang.Add_Product')</button>
                    <button data-modal-target="addExcelSheetmodal" data-modal-toggle="addExcelSheetmodal"
                        class="bg-secondary cursor-pointer text-white  ml-4 h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        @lang('lang.Import_From_Excel')</button> <br>
                    <a href="{{ asset('assets/products sample.xlsx') }}" class="float-end mt-2 font-semibold"
                        download="products">@lang('lang.Download_Example')</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="datatable" class="overflow-scroll">
                    <thead class="py-6 bg-primary text-white">
                        <tr>
                            <th>@lang('lang.STN')</th>
                            <th>@lang('lang.Image')</th>
                            <th>@lang('lang.Code')</th>
                            <th>@lang('lang.Name')</th>
                            <th>@lang('lang.Category/Sub-Category')</th>
                            <th>@lang('lang.Price')</th>
                            <th>@lang('lang.Status')</th>
                            <th class="flex  justify-center">@lang('lang.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $x => $data)
                            <tr class="pt-4">
                                <td>{{ $x + 1 }}</td>
                                <td class="w-[220px]">
                                    <img class="h-20 w-20 rounded-full"
                                        src="{{ isset($data->image) ? asset($data->image) : asset('images/favicon(32X32).png') }}"
                                        alt="product Image">
                                </td>
                                <td>{{ $data->code }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->category }} / {{ $data->sub_category }}</td>
                                <td>{{ $data->rate }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <div class="flex gap-5 items-center justify-center">

                                        <button data-modal-target="Updateproductmodal"
                                            data-modal-toggle="Updateproductmodal" class=" updateBtn cursor-pointer  "
                                            updateId="{{ $data->id }}"><img width="38px"
                                                src="{{ asset('images/icons/edit.svg') }}" alt="update"></button>
                                        <a href="../delProduct/{{ $data->id }}"><img width="38px"
                                                src="{{ asset('images/icons/delete.svg') }}"
                                                alt="update"></button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- ============ Update  product modal  =========== --}}
<div id="Updateproductmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative p-4 w-full   max-w-6xl max-h-full ">
        <form id="UpdatecategoryData" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="update_id" name="update_id">
            <div class="relat   ive bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Update_Product')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="Updateproductmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-3 gap-x-6 mx-6 my-6">
                    <div class="  ">
                        <label class="text-[14px] font-normal" for="firstName">@lang('lang.Product_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="Product_Name" placeholder=" @lang('lang.Name_Here')">
                    </div>
                    <div class=" ">
                        <label class="text-[14px] font-normal" for="productCode">@lang('lang.Product_Code')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="code" id="productCode" placeholder=" @lang('lang.Code_Here')">
                    </div>
                    <div class="flex gap-2">
                        <div class="w-full">
                            <label class="text-[14px] font-normal" for="category">@lang('lang.Product_Category')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="category" id="Ucategory">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button data-modal-target="addcategorymodal" data-modal-toggle="addcategorymodal" type="button"
                            class="bg-primary text-white  rounded-[4px] py-1.5 px-3 mt-6 mb-3 uaddBtn
                            font-semibold">+</button>
                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="subCategory">@lang('lang.Product_Sub_Category')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="sub_category" id="subCategory" placeholder=" @lang('lang.Sub_Category_Here')">
                    </div>
                    <div class="mt-4  ">
                        <label class="text-[14px] font-normal" for="tags">@lang('lang.Product_Tags')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="product_tags" id="tags" placeholder=" @lang('lang.Tags_Here')">
                    </div>
                    <div class="flex  gap-4  mt-4">
                        <div>
                            <label class="text-[14px] font-normal" for="Rate">@lang('lang.Rate')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="rate" id="Rate" placeholder=" @lang('lang.Rate_Here')">
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="tax">@lang('lang.Tax')%</label>

                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="tax" id="tax" placeholder="%  @lang('lang.Here')  ">
                        </div>
                    </div>
                    <div class="flex  gap-4  mt-4">
                        <div>
                            <label class="text-[14px] font-normal" for="quantity">@lang('lang.quantity')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="quantity" id="quantity" placeholder=" @lang('lang.quantity_here')">
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="quantityAlert">@lang('lang.Product_Alert_on_Quantity')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="quantity_alert" id="quantityAlert" placeholder=" @lang('lang.Alert_Here')">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="Status">@lang('lang.Status')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="status" id="Status">
                            <option value="active">@lang('lang.Active')</option>
                            <option value="not active">@lang('lang.Not_Active')</option>
                        </select>

                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="image">@lang('lang.Product_Image')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="product_image" id="image">
                    </div>
                    <div class="mt-4 col-span-3">
                        <label class="text-[14px] font-normal" for="description">@lang('lang.Product_Description')</label>
                        <textarea name="description" id="description"
                            class="w-full h-24  border-[#DEE2E6] rounded-[4px] focus:border-primary text-[14px] "
                            placeholder="@lang('lang.Start_writing_here')"></textarea>
                    </div>
                </div>

                <div class="flex justify-end ">
                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                        id="uaddBtn">
                        <div class=" text-center hidden" id="uspinner">
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
                        <div id="utext">
                            @lang('lang.Update')
                        </div>

                    </button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>
{{-- ============ add  Excel modal  =========== --}}
<div id="addExcelSheetmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative p-4 w-full   max-w-2xl max-h-full ">
        <form action="{{ url('product/import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Product')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addExcelSheetmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="mx-6 my-6">
                    <div class="  ">
                        <label class="text-[14px] font-normal" for="excelFile">@lang('lang.Excel_File')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary border   h-[40px] text-[14px]"
                            name="excel_file" id="excelFile" required>
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
                            @lang('lang.Add_Product')
                        </div>

                    </button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>
{{-- ============ add  product modal  =========== --}}
<div id="addproductmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative p-4 w-full   max-w-6xl max-h-full ">
        <form id="productdata" method="post" enctype="multipart/form-data">
            {{-- <form action="addProduct" method="post" enctype="multipart/form-data"> --}}
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Product')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addproductmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-3 gap-x-6 mx-6 my-6">
                    <div class="  ">
                        <label class="text-[14px] font-normal" for="firstName">@lang('lang.Product_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="request" placeholder=" @lang('lang.Name_Here')">
                    </div>
                    <div class=" ">
                        <label class="text-[14px] font-normal" for="productCode">@lang('lang.Product_Code')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="code" id="productCode" placeholder=" @lang('lang.Code_Here')">
                    </div>
                    <div class="flex gap-2">
                        <div class="w-full">
                            <label class="text-[14px] font-normal" for="category">@lang('lang.Product_Category')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="category" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button data-modal-target="addcategorymodal" data-modal-toggle="addcategorymodal"
                            type="button"
                            class="bg-primary text-white  rounded-[4px] py-1.5 px-3 mt-6 mb-3 uaddBtn
                            font-semibold">+</button>
                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="subCategory">@lang('lang.Product_Sub_Category')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="sub_category" id="subCategory" placeholder=" @lang('lang.Sub_Category_Here')">
                    </div>
                    <div class="mt-4  ">
                        <label class="text-[14px] font-normal" for="tags">@lang('lang.Product_Tags')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="product_tags" id="tags" placeholder=" @lang('lang.Tags_Here')">
                    </div>
                    <div class="flex  gap-4  mt-4">
                        <div>
                            <label class="text-[14px] font-normal" for="Rate">@lang('lang.Rate')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="rate" id="Rate" placeholder=" @lang('lang.Rate_Here')">
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="tax">@lang('lang.Tax')%</label>

                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="tax" id="tax" placeholder="%  @lang('lang.Here')  ">
                        </div>
                    </div>
                    <div class="flex  gap-4  mt-4">
                        <div>
                            <label class="text-[14px] font-normal" for="quantity">@lang('lang.quantity')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="quantity" id="quantity" placeholder=" @lang('lang.quantity_here')">
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="quantityAlert">@lang('lang.Product_Alert_on_Quantity')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="quantity_alert" id="quantityAlert" placeholder=" @lang('lang.Alert_Here')">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="Status">@lang('lang.Status')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="status" id="Status">
                            <option value="active">@lang('lang.Active')</option>
                            <option value="not active">@lang('lang.Not_Active')</option>
                        </select>

                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="image">@lang('lang.Product_Image')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="product_image" id="image">
                    </div>
                    <div class="mt-4 col-span-3">
                        <label class="text-[14px] font-normal" for="description">@lang('lang.Product_Description')</label>
                        <textarea name="description" id="description"
                            class="w-full h-24  border-[#DEE2E6] rounded-[4px] focus:border-primary text-[14px] "
                            placeholder="@lang('lang.Start_writing_here')"></textarea>
                    </div>
                </div>

                <div class="flex justify-end ">
                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                        id="iaddBtn">
                        <div class=" text-center hidden" id="ispinner">
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
                        <div id="itext">
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
{{-- ============ add  category modal  =========== --}}
<div id="addcategorymodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative p-4 w-full   max-w-4xl max-h-full ">
        <form id="categoryData" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Category')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addcategorymodal" id="category-modal-close">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-3 gap-x-6 mx-6 my-6">
                    <div>
                        <label class="text-[14px] font-normal" for="Name">@lang('lang.Category_Name')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="CategoryName" placeholder=" @lang('lang.Name_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="image">@lang('lang.Image')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6]  border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="category_img" id="image">
                    </div>
                    <div class="">
                        <label class="text-[14px] font-normal" for="Status">@lang('lang.Status')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="status" id="Status">
                            <option value="active">@lang('lang.Active')</option>
                            <option value="not-active">@lang('lang.Not_Active')</option>
                        </select>

                    </div>
                </div>
                <div class="flex justify-end ">
                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                        id="CaddBtn">
                        <div class=" text-center hidden" id="Cspinner">
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
                        <div id="Ctext">
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
                    $('#ispinner').removeClass('hidden');
                    $('#itext').addClass('hidden');
                    $('#iaddBtn').attr('disabled', true);
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

                    $('#itext').removeClass('hidden');
                    $('#ispinner').addClass('hidden');
                    $('#iaddBtn').attr('disabled', false);
                }
            });
        });

        // update  data
        $('.updateBtn').click(function() {
            var updateId = $(this).attr('updateId');
            var url = "../ProductUpdataData/" + updateId;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    var product = response.product;
                    console.log(product);
                    $('#update_id').val(product.id);
                    $('#Product_Name').val(product.name);
                    $('#productCode').val(product.code);
                    $('#Ucategory').val(product.category);
                    $('#subCategory').val(product.sub_category);
                    $('#tags').val(product.tags);
                    $('#Rate').val(product.rate);
                    $('#tax').val(product.tax);
                    $('#quantity').val(product.quantity);
                    $('#quantityAlert').val(product.quantity_alert);
                    $('#Status').val(product.status);
                    $('#description').val(product.description);

                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        'Product Not Found',
                        'warning'
                    );
                }
            });
        })

        //  insert category data

        $("#categoryData").submit(function(event) {
            var url = "../addCategory";
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
                    $('#Cspinner').removeClass('hidden');
                    $('#Ctext').addClass('hidden');
                    $('#CaddBtn').attr('disabled', true);
                },
                success: function(response) {
                    var categoryName = response.category.name;
                    $('#category-modal-close').click();
                    var newOption = $('<option>', {
                        value: categoryName,
                        text: categoryName
                    });
                    $('#category').append(newOption);
                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );

                    $('#Ctext').removeClass('hidden');
                    $('#Cspinner').addClass('hidden');
                    $('#CaddBtn').attr('disabled', false);
                }
            });
        });
        $("#UpdatecategoryData").submit(function(event) {
            var updateId = $('#update_id').val();
            var url = "../UpdataProduct/" + updateId;
            console.log(url);
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
                    $('#uspinner').removeClass('hidden');
                    $('#utext').addClass('hidden');
                    $('#uaddBtn').attr('disabled', true);
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

                    $('#utext').removeClass('hidden');
                    $('#uspinner').addClass('hidden');
                    $('#uaddBtn').attr('disabled', false);
                }
            });


        });

    });
</script>
