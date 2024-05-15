@include('layouts.header')
@include('layouts.nav')
<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Reqorts')</h1>
    </div>
    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Reqorts_List')</h3>
                <div class="flex gap-4 items-center">

                    <div class="mb-1">
                        <label class="text-[14px] font-normal" for="from_date">@lang('lang.From_Date')</label>
                        <br>
                        <input type="date"
                            class="w-70 border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="from_date" id="from_date">
                    </div>
                    <div class="mb-1">
                        <label class="text-[14px] font-normal" for="to_date">@lang('lang.To_Date')</label>
                        <br>
                        <input type="date"
                            class="w-70 border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="to_date" id="to_date">
                    </div>
                    <div class="w-36  mt-5">
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="report" id="category">
                            <option value="Daily"> @lang('lang.Daily')</option>
                            <option value="Weekly"> @lang('lang.Weekly')</option>
                            <option value="Monthly"> @lang('lang.Monthly')</option>
                        </select>

                    </div>
                    <div>

                        <button
                            class="bg-primary cursor-pointer text-white h-10 px-5 rounded-[6px] mt-5 shadow-sm font-semibold ">
                            @lang('lang.Get_Report')
                        </button>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto px-5 pb-10 pt-5">
                <table class="overflow-scroll w-full text-center">
                    <thead class=" bg-primary text-white border-2 border-primary">
                        <tr>
                            <th class="py-3">@lang('lang.STN')</th>
                            <th class="border-2 border-primary">@lang('lang.Customer_Name')</th>
                            <th class="border-2 border-primary">@lang('lang.Customer_phone')</th>
                            <th class="border-2 border-primary">@lang('lang.Customer_Email')</th>
                            <th class="border-2 border-primary">@lang('lang.Total')</th>
                            <th class="border-2 border-primary">@lang('lang.Tax')</th>
                            <th class="border-2 border-primary">@lang('lang.Grand_total')</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr>
                            <td>1</td>
                            <td>Peter</td>
                            <td>1234567</td>
                            <td>Peter@gmail.com</td>
                            <td>100&euro;</td>
                            <td>10%</td>
                            <td>110&euro;</td>
                        </tr>
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

                                        <button class="] updateBtn cursor-pointer  " updateId="{{ $data->id }}"><img
                                                width="38px" src="{{ asset('images/icons/edit.svg') }}"
                                                alt="update"></button>
                                        <a href="../delProduct/{{ $data->id }}"><img width="38px"
                                                src="{{ asset('images/icons/delete.svg') }}"
                                                alt="update"></button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach --}}

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>





@include('layouts.footer')
<script>
    $(document).ready(function() {
        // insert data
        $("#customerData").submit(function(event) {
            var url = "../categoryData/";
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
                    window.location.href = '../customers';

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
                    // $('#update_id').val(parent.id);
                    // $('#firstName').val(parent.first_name);
                    // $('#gender').val(parent.gender);
                    // $('#phoneNo').val(parent.phone_no);
                    // $('#address').val(parent.address);
                    // $('#lastName').val(parent.last_name);
                    // $('#email').val(parent.email);
                    // $('#contact').val(parent.contact);
                    // $('#child_ren').val(parent.child_ren);

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

    });
</script>
