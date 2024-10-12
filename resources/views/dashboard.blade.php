@include('layouts.header')
@include('layouts.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Dashboard')</h1>
    </div>
    <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6  mt-4">
        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_orders')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $totalOrders }}</h2>
                    </div>
                    <div>
                        <svg width="54" height="54" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M28.3334 19.9998C23.7334 19.9998 20 23.7332 20 28.3332C20 32.9332 23.7334 36.6665 28.3334 36.6665C32.9334 36.6665 36.6667 32.9332 36.6667 28.3332C36.6667 23.7332 32.9334 19.9998 28.3334 19.9998ZM31.0834 32.2498L27.5 28.6665V23.3332H29.1667V27.9832L32.25 31.0665L31.0834 32.2498ZM30 4.99984H24.7C24 3.0665 22.1667 1.6665 20 1.6665C17.8334 1.6665 16 3.0665 15.3 4.99984H10C8.16669 4.99984 6.66669 6.49984 6.66669 8.33317V33.3332C6.66669 35.1665 8.16669 36.6665 10 36.6665H20.1834C19.1973 35.7094 18.3952 34.5796 17.8167 33.3332H10V8.33317H13.3334V13.3332H26.6667V8.33317H30V16.7998C31.1834 16.9665 32.3 17.3165 33.3334 17.7998V8.33317C33.3334 6.49984 31.8334 4.99984 30 4.99984ZM20 8.33317C19.0834 8.33317 18.3334 7.58317 18.3334 6.6665C18.3334 5.74984 19.0834 4.99984 20 4.99984C20.9167 4.99984 21.6667 5.74984 21.6667 6.6665C21.6667 7.58317 20.9167 8.33317 20 8.33317Z"
                                fill="#027C56" />
                            <circle cx="28.5" cy="28.4998" r="5.7" fill="#D9D9D9" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M28.5 35.625C29.4357 35.625 30.3622 35.4407 31.2266 35.0826C32.0911 34.7246 32.8765 34.1998 33.5381 33.5381C34.1998 32.8765 34.7246 32.0911 35.0826 31.2266C35.4407 30.3622 35.625 29.4357 35.625 28.5C35.625 27.5643 35.4407 26.6378 35.0826 25.7734C34.7246 24.9089 34.1998 24.1235 33.5381 23.4619C32.8765 22.8002 32.0911 22.2754 31.2266 21.9174C30.3622 21.5593 29.4357 21.375 28.5 21.375C26.6103 21.375 24.7981 22.1257 23.4619 23.4619C22.1257 24.7981 21.375 26.6103 21.375 28.5C21.375 30.3897 22.1257 32.2019 23.4619 33.5381C24.7981 34.8743 26.6103 35.625 28.5 35.625ZM28.3163 31.3817L32.2747 26.6317L31.0587 25.6183L27.6545 29.7025L25.893 27.9403L24.7736 29.0597L27.1486 31.4347L27.7614 32.0475L28.3163 31.3817Z"
                                fill="#027C56" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Pending_orders')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $pendingOrders }}</h2>
                    </div>
                    <div>
                        <svg width="54" height="54" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.3334 18.9998C17.7334 18.9998 14 22.7332 14 27.3332C14 31.9332 17.7334 35.6665 22.3334 35.6665C26.9334 35.6665 30.6667 31.9332 30.6667 27.3332C30.6667 22.7332 26.9334 18.9998 22.3334 18.9998ZM25.0834 31.2498L21.5 27.6665V22.3332H23.1667V26.9832L26.25 30.0665L25.0834 31.2498ZM24 3.99984H18.7C18 2.0665 16.1667 0.666504 14 0.666504C11.8334 0.666504 10 2.0665 9.30002 3.99984H4.00002C2.16669 3.99984 0.666687 5.49984 0.666687 7.33317V32.3332C0.666687 34.1665 2.16669 35.6665 4.00002 35.6665H14.1834C13.1973 34.7094 12.3952 33.5796 11.8167 32.3332H4.00002V7.33317H7.33335V12.3332H20.6667V7.33317H24V15.7998C25.1834 15.9665 26.3 16.3165 27.3334 16.7998V7.33317C27.3334 5.49984 25.8334 3.99984 24 3.99984ZM14 7.33317C13.0834 7.33317 12.3334 6.58317 12.3334 5.6665C12.3334 4.74984 13.0834 3.99984 14 3.99984C14.9167 3.99984 15.6667 4.74984 15.6667 5.6665C15.6667 6.58317 14.9167 7.33317 14 7.33317Z"
                                fill="#027C56" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_product')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $totalProduct }}</h2>
                    </div>
                    <div>
                        <svg width="52" height="52" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.25 1.62477H13.125C13.4702 1.62477 13.75 1.90457 13.75 2.24977V14.1248C13.75 14.47 13.4702 14.7498 13.125 14.7498H1.25C0.904805 14.7498 0.625 14.47 0.625 14.1248V2.24977C0.625 1.90457 0.904805 1.62477 1.25 1.62477ZM23.2935 0.635195L30.3646 7.70629C30.6086 7.95035 30.6086 8.34605 30.3646 8.59016L23.2935 15.6612C23.0494 15.9053 22.6537 15.9053 22.4096 15.6612L15.3386 8.59012C15.0945 8.34605 15.0945 7.95035 15.3386 7.70625L22.4096 0.635195C22.6537 0.391133 23.0494 0.391133 23.2935 0.635195ZM1.25 17.2498H13.125C13.4702 17.2498 13.75 17.5296 13.75 17.8748V29.7498C13.75 30.095 13.4702 30.3748 13.125 30.3748H1.25C0.904805 30.3748 0.625 30.095 0.625 29.7498V17.8748C0.625 17.5296 0.904805 17.2498 1.25 17.2498ZM16.875 17.2498H28.75C29.0952 17.2498 29.375 17.5296 29.375 17.8748V29.7498C29.375 30.095 29.0952 30.3748 28.75 30.3748H16.875C16.5298 30.3748 16.25 30.095 16.25 29.7498V17.8748C16.25 17.5296 16.5298 17.2498 16.875 17.2498Z"
                                fill="#027C56" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_customers')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $totalUser }}</h2>
                    </div>
                    <div>
                        <svg width="52" height="52" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 18C17.3206 18 19.5462 17.0781 21.1872 15.4372C22.8281 13.7962 23.75 11.5706 23.75 9.25C23.75 6.92936 22.8281 4.70376 21.1872 3.06282C19.5462 1.42187 17.3206 0.5 15 0.5C12.6794 0.5 10.4538 1.42187 8.81282 3.06282C7.17187 4.70376 6.25 6.92936 6.25 9.25C6.25 11.5706 7.17187 13.7962 8.81282 15.4372C10.4538 17.0781 12.6794 18 15 18ZM4.375 20.5C3.21468 20.5 2.10188 20.9609 1.28141 21.7814C0.460936 22.6019 0 23.7147 0 24.875V25.5C0 28.4912 1.90375 31.0212 4.60625 32.7412C7.32375 34.4712 11.0025 35.5 15 35.5C18.9975 35.5 22.675 34.4712 25.3938 32.7412C28.0963 31.0212 30 28.4912 30 25.5V24.875C30 23.7147 29.5391 22.6019 28.7186 21.7814C27.8981 20.9609 26.7853 20.5 25.625 20.5H4.375Z"
                                fill="#027C56" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="lg:flex gap-14 mt-16 px-3 ">
    <div class="lg:w-[60%] w-full">
        <div class=" shadow-med p-3 rounded-xl">
            <h2 class="text-xl  font-semibold  ml-6">@lang('lang.Earning')</h2>
            <div id="earningChart" class="mt-4" style="height: 370px; width: 100%;"></div>

        </div>


        <div class=" shadow-med p-3 py-5  mt-8 rounded-xl min-h-[448px]">
            <div class="flex justify-between px-6">
                <h2 class="text-xl  font-semibold ">@lang('lang.Top_Product')</h2>

            </div>
            <div>
                <div class="pt-3  mt-2 border-t  border-gray-200">

                    <div class="relative overflow-auto h-[300px] ">
                        <table class="w-full text-sm text-center ">
                            <thead class="text-sm text-gray-900  text-dblue ">
                                <tr>
                                    <th class="px-6 py-3">
                                        @lang('lang.Code')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Photo')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Name')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Rank')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $i => $product)
                                    <tr class="bg-white ">
                                        <td class="px-6 py-3 ">
                                            {{ $product->id }}
                                        </td>
                                        <td class="px-6 py-3 flex  justify-center">
                                            <img class="h-16 w-16 object-contain bg-black rounded-full"
                                                src="{{ isset($product->image) ? asset($product->image) : asset('images/circle-logo.png') }}"
                                                width="70px" alt="Product">
                                        </td>
                                        <td class="px-6 py-3">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-6 py-3">
                                            <div class="flex items-center justify-center flex-col">
                                                <div>
                                                    <p class="text-dblue flex">{{ $i + 1 }}</p>

                                                </div>
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
    </div>
    <div class="lg:w-[40%] w-full">
        <div class=" shadow-med p-3 rounded-xl">
            <h2 class="text-xl  font-semibold ml-6">@lang('lang.Orders')</h2>
            <div id="studentChart" class="mt-4" style="height: 370px; width: 100%;"></div>
        </div>
        <div class=" shadow-med p-3 rounded-xl mt-10">

            <div>
                <div class="flex justify-between px-6">
                    <h2 class="text-xl  font-semibold ">@lang('lang.Orders')</h2>
                </div>
                <div id="attendanceChart" class="mt-4" style="height: 270px; width: 100%;"></div>
                <div class="mt-8 mx-10">
                    <div class="flex justify-around">
                        <div class="flex flex-col items-center">
                            <p class="text-[#CECECE] text-lg font-semibold">@lang('lang.Pending')</p>
                            <div class="h-10  w-10 bg-secondary rounded-full">

                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-[#CECECE] text-lg font-semibold">@lang('lang.Confirm')</p>
                            <div class="h-10  w-10 bg-primary rounded-full">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    window.onload = function() {
        CanvasJS.addColorSet("colors",
            [

                "#EDBD58",
                "#339B96",
                "#027C56",

            ]);
        var chart = new CanvasJS.Chart("earningChart", {
            animationEnabled: true,
            axisX: {
                valueFormatString: "DDD",
                minimum: new Date(Date.now() - 7 * 24 * 60 * 60 * 1000),
                maximum: new Date(Date.now() + 7 * 24 * 60 * 60 * 1000)
            },
            axisY: {
                gridColor: "#00000016",
                lineDashType: "dot"
            },
            toolTip: {
                shared: true
            },
            data: [{

                name: "Sent",
                type: "area",
                color: "#027C56",
                fillOpacity: 100,
                markerSize: 2,
                dataPoints: [

                    @foreach ($dailySalesData as $data)
                        {
                            x: new Date({{ $data['date'] }}),
                            y: {{ $data['total'] }}
                        }, {
                            x: new Date(2024, 4, 30),
                            y: 150
                        },
                    @endforeach


                ]
            }]
        });

        var chart2 = new CanvasJS.Chart("studentChart", {
            colorSet: "colors",
            animationEnabled: true,
            theme: "light1",
            axisY: {
                gridColor: "#00000016",
                suffix: "-"

            },

            data: [{
                type: "column",
                yValueFormatString: "#,##0.0#\"\"",
                dataPoints: [
                    @foreach ($orderData as $data)
                        {
                            label: "{{ $data['month'] }}",

                            y: {{ $data['order_count'] }}
                        },
                    @endforeach


                ]
            }]
        });

        var chart3 = new CanvasJS.Chart("attendanceChart", {
            animationEnabled: true,

            data: [{
                type: "doughnut",
                startAngle: 60,
                //innerRadius: 60,
                indexLabelFontColor: "transparent",
                indexLabelPlacement: "inside",
                dataPoints: [{
                        y: {{ $pendingOrders }},
                        color: "#edbd58",
                        label: "Pending Orders"
                    },
                    {
                        y: {{ $confirmedOrders }},
                        color: "#027C56",
                        label: "Complete Orders"
                    },

                ]
            }]
        });
        chart.render();
        chart2.render();
        chart3.render();

    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
    integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@include('layouts.footer')
