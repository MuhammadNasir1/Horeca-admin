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
            </div>
            <div class="overflow-x-auto">
                <table id="datatable" class="overflow-scroll">
                    <thead class="py-6 bg-primary text-white">
                        <tr>
                            <th>@lang('lang.STN')</th>
                            <th>@lang('lang.Order_Number')</th>
                            <th>@lang('lang.Order_Date')</th>
                            <th>@lang('lang.Customer_Name')</th>
                            <th>@lang('lang.Customer_phone')</th>
                            <th>@lang('lang.Amount')</th>
                            <th>@lang('lang.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $x => $data)
                            <tr class="pt-4">
                                <td>{{ $x + 1 }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->order_date }}</td>
                                <td>{{ $data->customer_name }}</td>
                                <td>{{ $data->customer_phone }}</td>
                                <td>{{ $data->grand_total }}</td>
                                <td>
                                    <div class="flex gap-5 items-center justify-center">
                                        <button class="edit_btn" updId="{{ $data->id }}"><img width="38px"
                                                src="{{ asset('images/icons/edit.svg') }}" alt="delete"></button>
                                        <a href="../delProduct/{{ $data->id }}"><img width="38px"
                                                src="{{ asset('images/icons/delete.svg') }}" alt="delete"></a>
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
