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
                <button data-modal-target="addstudentmodal" data-modal-toggle="addstudentmodal"
                    class="bg-secondary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                    @lang('lang.Add_Product')</button>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
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
                </thead>
                <tbody>
                    {{-- @foreach ($products as $x => $data)
                        <tr class="pt-4">
                            <td>{{ $x + 1 }}</td>
                            <td class="w-[220px]">
                                <video class=" rounded-[4px] w-full" controls width="200px"
                                    src="../{{ $data->video }}"></video>
                            </td>
                            <td>{{ $data-> }}</td>
                            <td>{{ $data-> }}</td>
                            <td>{{ $data-> }}</td>
                            <td>{{ $data-> }}</td>
                            <td>
                                <div class="flex gap-5 items-center justify-center">
                                    @if (session('user_det')['role'] == 'admin')
                                        <button class="delbtn" delId="{{ $data->id }}"><img width="38px"
                                                src="{{ asset('images/icons/delete.svg') }}" alt="delete"></button>
                                    @endif
                                    <a class="cursor-pointer" data-modal-target="videodetails{{ $x }}"
                                        data-modal-toggle="videodetails{{ $x }}"><img width="38px"
                                            src="{{ asset('images/icons/view.svg') }}" alt="View"></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach --}}
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>

        </div>
    </div>
</div>


<div id="videodetails" data-modal-backdrop="static"
class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative p-4 w-full   max-w-4xl max-h-full ">
    <form action="registerdata" method="post">
        @csrf
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
            <div
                class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                <h3 class="text-xl font-semibold text-white ">
                    @lang('lang.Video_Details')
                </h3>
                <button type="button"
                    class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="videodetails
                    ">
                    <svg class="w-4 h-4 text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="flex justify-around gap-10">
                <div class="my-4 pl-6">




                </div>

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
        // delete training video
        $('.delbtn').click(function() {
            var delId = $(this).attr('delId');
            console.log(delId);
            var url = "../delRecording/" + delId;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../studentRec';
                    } else if (response.success == false) {
                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        );
                    }
                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        'Recording Not Found',
                        'warning'
                    );
                }

            });
        });
    });
</script>
@include('layouts.footer')
