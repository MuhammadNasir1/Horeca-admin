@include('layouts.header')
@include('layouts.nav')
<div class="md:mx-4 mt-12">

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black hidden sm:block">@lang('lang.product_List')</h3>
                <div class="flex">

                    <button id="modalButton" data-modal-target="productModal" data-modal-toggle="productModal"
                        class="bg-primary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        @lang('lang.Add_Product')</button>
                    <div>
                        <button data-modal-target="addExcelSheetmodal" data-modal-toggle="addExcelSheetmodal"
                            class="bg-secondary cursor-pointer text-white  ml-4 h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            @lang('lang.Import_From_Excel')</button> <br>
                        <a href="{{ asset('assets/products sample.xlsx') }}" class="float-end mt-2 font-semibold"
                            download="products">@lang('lang.Download_Example')</a>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="datatable" class="overflow-scroll">
                    <thead class="py-6 bg-primary text-white">
                        <tr>
                            <th class="text-sm">@lang('lang.STN')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Image')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Name')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Brands')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Category/Sub-Category')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Tax')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Price')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Unit')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.quantity')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Alert')</th>
                            <th class="whitespace-nowrap text-sm">@lang('lang.Status')</th>
                            <th class="flex text-sm  justify-center">@lang('lang.Action')</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($products as $x => $data)
                            <tr class="pt-4">
                                <td>{{ $x + 1 }}</td>
                                <td class="md:w-[220px] w-full">
                                    <img class="h-20 w-20 rounded-full bg-black object-contain"
                                        src="{{ isset($data->image) ? asset($data->image) : asset('images/favicon(32X32).png') }}"
                                        alt="product Image">
                                </td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->brand }}</td>
                                <td>{{ $data->category }} / {{ $data->sub_category }}</td>
                                <td>{{ $data->tax }}</td>
                                <td>{{ $data->rate }}&euro;</td>
                                <td>{{ $data->product_unit }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td><button
                                        class="p-1 rounded-md min-w-10 font-bold text-white {{ $data->quantity_alert < $data->quantity ? 'bg-green-700' : 'bg-red-600' }}">
                                        {{ $data->quantity_alert }}</button></td>
                                <td class="whitespace-nowrap"> <button
                                        class="p-1 rounded-md min-w-10 font-bold text-white {{ $data->status == 'active' ? 'bg-green-700' : 'bg-red-600' }}">
                                        @lang('lang.' . $data->status)</button>
                                <td>
                                    <div class="flex gap-5 items-center justify-center">
                                        {{--
                                        <a href="../product/{{ $data->id }}"
                                            class=" updateBtn cursor-pointer  w-[42px]"
                                            updateId="{{ $data->id }}"><svg class="h-[40px] w-[40px]"
                                                width="40" height="40" viewBox="0 0 36 36" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="18" cy="18" r="18" fill="#027C55E7" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.1627 23.6197L22.3132 15.666C22.6474 15.2371 22.7663 14.7412 22.6549 14.2363C22.5583 13.7773 22.276 13.3408 21.8526 13.0097L20.8201 12.1895C19.9213 11.4747 18.8071 11.5499 18.1683 12.3701L17.4775 13.2663C17.3883 13.3785 17.4106 13.544 17.522 13.6343C17.522 13.6343 19.2676 15.0339 19.3048 15.064C19.4236 15.1769 19.5128 15.3274 19.5351 15.508C19.5722 15.8616 19.3271 16.1927 18.9631 16.2379C18.7922 16.2605 18.6288 16.2078 18.51 16.11L16.6752 14.6502C16.5861 14.5832 16.4524 14.5975 16.3781 14.6878L12.0178 20.3314C11.7355 20.6851 11.639 21.1441 11.7355 21.588L12.2927 24.0035C12.3224 24.1314 12.4338 24.2217 12.5675 24.2217L15.0188 24.1916C15.4645 24.1841 15.8804 23.9809 16.1627 23.6197ZM19.5948 22.8676H23.5918C23.9818 22.8676 24.299 23.1889 24.299 23.5839C24.299 23.9797 23.9818 24.3003 23.5918 24.3003H19.5948C19.2048 24.3003 18.8876 23.9797 18.8876 23.5839C18.8876 23.1889 19.2048 22.8676 19.5948 22.8676Z"
                                                    fill="white" />
                                            </svg>
                                        </a> --}}


                                        <button productId="{{ $data->id }}"
                                            class="updateBtn  cursor-pointer w-[42px] "><svg class="h-[40px] w-[40px]"
                                                width="40" height="40" viewBox="0 0 36 36" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="18" cy="18" r="18" fill="#027C55E7" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.1627 23.6197L22.3132 15.666C22.6474 15.2371 22.7663 14.7412 22.6549 14.2363C22.5583 13.7773 22.276 13.3408 21.8526 13.0097L20.8201 12.1895C19.9213 11.4747 18.8071 11.5499 18.1683 12.3701L17.4775 13.2663C17.3883 13.3785 17.4106 13.544 17.522 13.6343C17.522 13.6343 19.2676 15.0339 19.3048 15.064C19.4236 15.1769 19.5128 15.3274 19.5351 15.508C19.5722 15.8616 19.3271 16.1927 18.9631 16.2379C18.7922 16.2605 18.6288 16.2078 18.51 16.11L16.6752 14.6502C16.5861 14.5832 16.4524 14.5975 16.3781 14.6878L12.0178 20.3314C11.7355 20.6851 11.639 21.1441 11.7355 21.588L12.2927 24.0035C12.3224 24.1314 12.4338 24.2217 12.5675 24.2217L15.0188 24.1916C15.4645 24.1841 15.8804 23.9809 16.1627 23.6197ZM19.5948 22.8676H23.5918C23.9818 22.8676 24.299 23.1889 24.299 23.5839C24.299 23.9797 23.9818 24.3003 23.5918 24.3003H19.5948C19.2048 24.3003 18.8876 23.9797 18.8876 23.5839C18.8876 23.1889 19.2048 22.8676 19.5948 22.8676Z"
                                                    fill="white" />
                                            </svg>
                                        </button>

                                        <button data-modal-target="deleteData" data-modal-toggle="deleteData"
                                            class="hidden"></button>
                                        <button class="delButton" delId="{{ $data->id }}">
                                            <svg class="h-[40px] w-[40px]" viewBox="0 0 36 36" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle opacity="0.1" cx="18" cy="18" r="18"
                                                    fill="#DF6F79" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M23.4905 13.7433C23.7356 13.7433 23.9396 13.9468 23.9396 14.2057V14.4451C23.9396 14.6977 23.7356 14.9075 23.4905 14.9075H13.0493C12.8036 14.9075 12.5996 14.6977 12.5996 14.4451V14.2057C12.5996 13.9468 12.8036 13.7433 13.0493 13.7433H14.8862C15.2594 13.7433 15.5841 13.478 15.6681 13.1038L15.7642 12.6742C15.9137 12.0889 16.4058 11.7002 16.9688 11.7002H19.5704C20.1273 11.7002 20.6249 12.0889 20.7688 12.6433L20.8718 13.1032C20.9551 13.478 21.2798 13.7433 21.6536 13.7433H23.4905ZM22.5573 22.4946C22.7491 20.7073 23.0849 16.4611 23.0849 16.4183C23.0971 16.2885 23.0548 16.1656 22.9709 16.0667C22.8808 15.9741 22.7669 15.9193 22.6412 15.9193H13.9028C13.7766 15.9193 13.6565 15.9741 13.5732 16.0667C13.4886 16.1656 13.447 16.2885 13.4531 16.4183C13.4542 16.4261 13.4663 16.5757 13.4864 16.8258C13.5759 17.9366 13.8251 21.0305 13.9861 22.4946C14.1001 23.5731 14.8078 24.251 15.8328 24.2756C16.6238 24.2938 17.4387 24.3001 18.272 24.3001C19.0569 24.3001 19.854 24.2938 20.6696 24.2756C21.7302 24.2573 22.4372 23.5914 22.5573 22.4946Z"
                                                    fill="#D11A2A" />
                                            </svg>

                                        </button>
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

{{-- ============ add  Excel modal  =========== --}}
<div id="addExcelSheetmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
<div id="productModal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full   max-w-6xl max-h-full ">
        <form id="productForm" enctype="multipart/form-data" method="post" url="../addProduct">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex itemtexts-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white " id="modalHeading">
                        @lang('lang.Add_Product')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="productModal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="lg:grid  lg:grid-cols-3 grid-cols-2 gap-x-6 gap-y-2 mx-6 my-6">
                    <div class="  ">
                        <label class="text-[14px] font-normal" for="firstName">@lang('lang.Product_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="productName" placeholder=" @lang('lang.Name_Here')" required>
                    </div>
                    <div class=" lg:mt-0 mt-4">
                        <label class="text-[14px] font-normal" for="productCode">@lang('lang.Product_Code')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="code" id="productCode" placeholder=" @lang('lang.Code_Here')" required>
                    </div>
                    <div class=" lg:mt-0 mt-4">
                        <label class="text-[14px] font-normal" for="tags">@lang('lang.Product_Tags')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="product_tags" id="tags" placeholder=" @lang('lang.Tags_Here')">
                    </div>
                    <div>
                        <div class="flex gap-2  mt-4">
                            <div class="w-full">
                                <label class="text-[14px] font-normal" for="brands">@lang('lang.Brand_Name')</label>
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px] category "
                                    name="brand" id="brands" required>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}">
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button data-modal-target="addbrandmodal" data-modal-toggle="addbrandmodal"
                                type="button"
                                class="bg-primary text-white  rounded-[4px] py-1.5 px-3 mt-6 mb-3 uaddBtn
                            font-semibold">+</button>
                        </div>
                    </div>
                    <div>
                        <div class="flex gap-2  mt-4">
                            <div class="w-full">
                                <label class="text-[14px] font-normal" for="category">@lang('lang.Product_Category')</label>
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px] category "
                                    name="category" id="category" required>
                                    @foreach ($categories as $category)
                                        <option category-tax="{{ $category->tax }}" value="{{ $category->name }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button data-modal-target="addcategorymodal" data-modal-toggle="addcategorymodal"
                                type="button"
                                class="bg-primary text-white  rounded-[4px] py-1.5 px-3 mt-6 mb-3 uaddBtn
                            font-semibold">+</button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="text-[14px] font-normal" for="subCategory">@lang('lang.Product_Sub_Category')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="sub_category" list="subcategory" id="subCategory"
                            placeholder=" @lang('lang.Sub_Category_Here')">
                        <datalist id="subcategory">
                            @foreach ($Subcategories as $Subcategory)
                                <option value="{{ $Subcategory->sub_category }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="mt-4 ">
                        <label class="text-[14px] font-normal" for="purchasePrice">@lang('lang.Purchase_Price')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="purchase_price" id="purchasePrice" placeholder=" @lang('lang.Price_Here')">
                    </div>
                    <div class="flex col-span-2  gap-4  mt-4 flex-wrap sm:flex-nowrap">
                        <div>
                            <label class="text-[14px] font-normal" for="Price">@lang('lang.Price')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="rate" id="WOPrice" placeholder=" @lang('lang.Price_Here')" required>
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="TaxPrice">@lang('lang.Tax')%</label>

                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px] tax-input"
                                name="tax" id="TaxPrice" placeholder="%  @lang('lang.Here')  " required
                                value="0">
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="tax">@lang('lang.Total_Price')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px] tax-input"
                                name="total_price" id="TotalWTax" readonly>
                        </div>


                        <div class="">
                            <label class="text-[14px] font-normal" for="quantityAlert">@lang('lang.Alert_on_Quantity')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="quantity_alert" id="quantityAlert" placeholder=" @lang('lang.Alert_Here')" required
                                value="1" ">
                        </div>
                    </div>
                    <div class="grid grid-cols-2  gap-4  mt-4">

                        <div>
                            <label class="text-[14px] font-normal" for="unitQuantity">@lang('lang.Content_of_Quantity')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="unit_quantity" id="unitQuantity" placeholder=" @lang('lang.Quantity_Here')" required
                                >
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="product_unit">@lang('lang.Unit')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="product_unit" id="product_unit" placeholder=" @lang('lang.Unit_Here')" required
                              >
                        </div>

                    </div>
                    <div class="flex col-span-2  gap-3  mt-4 flex-wrap md:flex-nowrap">
                        <div>
                            {{-- <div class="max-w-[103px]"> --}}
                            <label class="text-[14px] font-normal" for="unitPieces">@lang('lang.Unit_Pieces')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="Unit_Pieces" id="unitPieces" placeholder=" @lang('lang.Pieces_Here')" required
                                >

                        </div>

                        <div>
                            <label class="text-[14px] font-normal" for="UnitPrice">@lang('lang.Unit_Price')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="unit_price" id="UnitPrice" placeholder=" @lang('lang.Unit_Price')" required
                               >
                        </div>


                        <div class="w-full">
                            <label class="text-[13px] font-normal" for="packageQuantity">@lang('lang.Total_Package_Quantity_Warehouse')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="package_quantity" id="packageQuantity" placeholder=" @lang('lang.Quantity_Here')"
                                required >

                        </div>
                        <div class="w-full">
                            <label class="text-[13px] font-normal" for="quantity">@lang('lang.Total_Unit_Quantity_Warehouse')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="quantity" id="quantity" placeholder=" @lang('lang.Quantity_Here')" required
                               >
                        </div>

                        {{-- <div class="">
                        <label class="text-[14px] font-normal" for="statusa">@lang('lang.Status')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="status" id="statusa" required>
                            <option
                                {{ isset($updateproduct->status) && $updateproduct->status == 'active' ? 'selected' : '' }}
                                value="active">@lang('lang.Active')</option>
                            <option
                                {{ isset($updateproduct->status) && $updateproduct->status == 'un-active' ? 'selected' : '' }}
                                value="un-active">@lang('lang.Not_Active')</option>
                        </select>
                    </div> --}}

                        <input type="hidden" name="status" value="active">
                    </div>

                    <div class="mt-4">
                        <div>
                            <label class="text-[14px] font-normal" for="image">@lang('lang.Product_Image')</label>
                            <input type="file"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="product_image" id="image">
                        </div>
                    </div>
                    <div class="mt-4 col-span-3">
                        <label class="text-[14px] font-normal" for="description">@lang('lang.Product_Description')</label>
                        <textarea name="description" id="description"
                            class="w-full h-24  border-[#DEE2E6] rounded-[4px] focus:border-primary text-[14px] "
                            placeholder="@lang('lang.Start_writing_here')" required></textarea>
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
                                    d=" M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0
                                50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100
                                50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094
                                90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013
                                9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                            </svg>
                        </div>
                        <div id="itext">
                        </div>

                        </button>
                    </div>
                </div>
        </form>
        <div>

        </div>

    </div>
</div>

{{-- Delete Data Modal --}}
<div id="deleteData" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="flex justify-center items-center h-full">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-lg max-h-full ">
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="">

                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="deleteData">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class=" mx-6 my-6 pt-5">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100px" class="mx-auto"
                            viewBox="0 0 512 512">
                            <path
                                d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"
                                fill="red" />
                        </svg>
                        <h1 class="text-center pt-3 text-4xl">@lang('lang.Are_You_Sure')</h1>
                        <div class="flex  justify-center gap-5 mx-auto mt-5 pb-5">
                            <button data-modal-hide="deleteData" class="bg-primary px-7 py-3 text-white rounded-md">
                                @lang('lang.No')
                            </button>
                            <a class="" id="delLink" href="">

                                <button class=" bg-red-600 px-7 py-3 text-white rounded-md">
                                    @lang('lang.Yes')
                                </button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- ============ add  category modal  =========== --}}
<div id="addcategorymodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
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
                <div class="grid lg:grid-cols-2 gap-x-6 gap-y-4  mx-6 my-6">
                    <div>
                        <label class="text-[14px] font-normal" for="Name">@lang('lang.Category_Name')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="CategoryName" placeholder=" @lang('lang.Name_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="tax">@lang('lang.Tax')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6]  border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="tax" id="tax" placeholder="% @lang('lang.Here')">
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
                            name="status" id="status">
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


{{-- ============ add  Brand modal  =========== --}}
<div id="addbrandmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full   max-w-4xl max-h-full ">
        <form id="brandData" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Brand')
                    </h3>
                    <button id="brandCloseBtn" type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addbrandmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="grid lg:grid-cols-2 gap-x-6 gap-y-4 mx-6 my-6">
                    <div>
                        <label class="text-[14px] font-normal" for="Name">@lang('lang.Brand_Name')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="brandName" placeholder=" @lang('lang.Name_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="image">@lang('lang.Image')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6]  border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="image" id="image">
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
@if (isset($updateproduct))
    <script>
        $(document).ready(function() {
            $('#productModal').removeClass("hidden");
            $('#productModal').addClass("flex");
            calculateTotal()

        });
    </script>
@endif
<script>
    $(document).ready(function() {
        function updateData() {
            $('.updateBtn').click(function() {
                let id = $(this).attr('productId');
                $.ajax({
                    type: "get",
                    url: '../ProductUpdataData/' + id,
                    // url: '../UpdataProduct/' + id,
                    success: function(response) {
                        let data = response.product
                        console.log(data);
                        $('#productName').val(data.name);
                        $('#productCode').val(data.code);
                        $('#tags').val(data.tags);
                        $('#tags').val(data.tags);
                        $('#brands').val(data.brand).trigger('change');
                        $('#category').val(data.category).trigger('change');

                        $('#subCategory').val(data.sub_category);
                        $('#purchasePrice').val(data.purchase_price);
                        $('#WOPrice').val(data.rate);
                        $('#TaxPrice').val(data.tax);
                        let drate = Number(data.rate);
                        let dtax = Number(data.tax);
                        let dtaxAmount = (drate * dtax) / 100;
                        let totalWithTax = drate + dtaxAmount;

                        totalWithTax = totalWithTax.toFixed(2);
                        $('#TotalWTax').val(totalWithTax);
                        $('#quantityAlert').val(data.quantity_alert);
                        $('#unitQuantity').val(data.unit_quantity);
                        $('#product_unit').val(data.product_unit);
                        $('#unitPieces').val(data.Unit_Pieces);
                        $('#UnitPrice').val(data.unit_price);
                        $('#packageQuantity').val(data.package_quantity);
                        $('#quantity').val(data.quantity);
                        $('#description').val(data.description);


                        $('#itext').html("@lang('lang.Update')");
                        $('#modalHeading').html("@lang('lang.Update_Brand')");


                        $('#productModal').removeClass("hidden");
                        $('#productModal').addClass("flex");
                        $('#productForm').attr("url", "UpdataProduct/" + id);

                    },

                });
            })

        }
        updateData();



        function deleteDatafun() {

            $('.delButton').click(function() {
                $('#deleteData').removeClass("hidden");
                var id = $(this).attr('delId');
                $('#delLink').attr('href', '../delProduct/' + id);
                console.log(id);
            });

        }
        deleteDatafun();
        var table = $('#datatable').DataTable();
        table.on('draw', function() {
            deleteDatafun();
            updateData();
        });

        function closeModal() {
            $('#productForm')[0].reset();
            $('#productForm').attr("url", "../addProduct");
            $('#modalHeading').html("@lang('lang.Add_Product')");
            $('#itext').html("@lang('lang.Save')");
        }
        closeModal()

        $('#modalButton').click(function() {
            closeModal()
        })

        function TotalQuantity() {
            let packageQuantity = parseFloat($('#packageQuantity').val()) || 1;
            let unitPieces = parseFloat($('#unitPieces').val()) || 0;
            let totalQuan = unitPieces * packageQuantity;
            $('#quantity').val(totalQuan);
        }
        $('#packageQuantity, #unitPieces').on('input', TotalQuantity);


        function calculateTotal() {

            $('#WOPrice , #Price').on('input', function() {
                var inputValue = $(this).val();
                $(this).val(inputValue.replace(/,/g, '.'));
            });
        }
        calculateTotal()

        $("#WOPrice").on('input', function() {
            var inputValue = $(this).val();
            $(this).val(inputValue.replace(/,/g, '.'));


        })


        function calculateTotal() {
            var price = parseFloat($('#WOPrice').val()) || 0;
            var tax = parseFloat($('#TaxPrice').val()) || 0;
            var totalPrice = price + (price * (tax / 100));
            $('#TotalWTax').val(totalPrice.toFixed(2));
        }

        $('#WOPrice, #TaxPrice').on('input', calculateTotal);

        function calculateTotal2() {
            var price = parseFloat($('#Price').val()) || 0;
            var tax = parseFloat($('#tax').val()) || 0;
            var totalPrice = price + (price * (tax / 100));
            $('#TotalPrice').val(totalPrice.toFixed(2));
        }
        $('#Price').trigger('tax');
        $('#Price, #tax').on('input', calculateTotal2);

        $('.category').change(function() {
            var selectedOption = $(this).find(':selected');
            var tax = selectedOption.attr('category-tax');
            $('.tax-input').val(tax)
        });
        // insert data
        $("#productForm").submit(function(event) {
            var url = $("#productForm").attr('url');
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
                    var categoryTax = response.category.tax;
                    $('#category-modal-close').click();
                    var newOption = $('<option>', {
                        value: categoryName,
                        text: categoryName,
                        'category-tax': categoryTax
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

    });

    $("#brandData").submit(function(event) {
        var url = "../addBrand";
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
                $('#brandCloseBtn').click();
                var brandName = response.brand;
                console.log(brandName);
                var newOption = $('<option>', {
                    value: brandName,
                    text: brandName,
                });
                $('#brands').append(newOption);
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
</script>
