<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Horeca-Kaya</title>
    <link rel="shortcut icon" href="{{ asset('images/circle-logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.13.8/css/jquery.dataTables.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        html {
            scroll-behavior: smooth;
        }

        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 9999;
            display: none;
        }
    </style>
</head>

<body class="bg-white">
    <div id="loading">
        <div class=" text-center z-[9999] h-screen w-screen flex justify-center items-center  ">
            <svg aria-hidden="true" class="w-12 h-12 mx-auto text-center text-gray-200 animate-spin fill-primary"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
        </div>
    </div>

    <!-- component -->


    <div class="max-w-[1920px] mx-auto">
        @yield('content')
    </div>
    <footer class="bg-white rounded-lg  dark:bg-gray-900 m-4">
        <div class="w-full  mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/Horeca-green.svg') }}" class="h-8" alt="Flowbite Logo" />
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">@lang('lang.About')</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">@lang('lang.Privacy_Policy')</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">@lang('lang.Licensing')</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">@lang('lang.Contact')</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-primary sm:mx-auto  lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                    href="https://horeca-kaya.com/" class="hover:underline">Horeca</a> @lang('lang.All_Rights_Reserved').</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b6b9586b26.js" crossorigin="anonymous"></script>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="{{ asset('javascript/canvas.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    @if (session()->get('locale') == 'de')
        <script>
            $(document).ready(function() {
                // $('#datatable').DataTable();

                //Spanish
                $('#datatable').DataTable({
                    "language": {
                        "sProcessing": "Verarbeitung...",
                        "sLengthMenu": "_MENU_ Einträge anzeigen",
                        "sZeroRecords": "Keine Übereinstimmungen gefunden",
                        "sEmptyTable": "Keine Daten in dieser Tabelle vorhanden",
                        "sInfo": "Zeige Einträge von _START_ bis _END_ von insgesamt _TOTAL_ Einträgen",
                        "sInfoEmpty": "Zeige Einträge von 0 bis 0 von insgesamt 0 Einträgen",
                        "sInfoFiltered": "(gefiltert von insgesamt _MAX_ Einträgen)",
                        "sInfoPostFix": "",
                        "sSearch": "Suchen:",
                        "sUrl": "",
                        "sInfoThousands": ".",
                        "sLoadingRecords": "Wird geladen...",
                        "oPaginate": {
                            "sFirst": "Erste",
                            "sLast": "Letzte",
                            "sNext": "Nächste",
                            "sPrevious": "Vorherige"
                        },
                        "oAria": {
                            "sSortAscending": ": Aktivieren, um die Spalte aufsteigend zu sortieren",
                            "sSortDescending": ": Aktivieren, um die Spalte absteigend zu sortieren"
                        }
                    }
                });
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function updateCartBadge() {
            // Get cart data from localStorage
            const cartData = JSON.parse(localStorage.getItem('cart')) || [];

            // Calculate total quantity
            const totalQuantity = cartData.reduce((sum, item) => sum + (item.quantity || 0), 0);

            // Find the badge element (assuming it has a specific class or ID)
            const badge = document.querySelector('.cart-quantity-badge');

            // Update the badge content and visibility
            if (badge) {
                badge.textContent = totalQuantity;
                badge.style.display = totalQuantity > 0 ? 'flex' : 'none'; // Hide if 0
            }
        }
        updateCartBadge()
        // $(window).on('load', function() {
        //     $('#loading').hide();
        // })
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
        $(document).ready(function() {
            $('select').select2({
                width: '100%'
            });
            $('#Items_dropdown').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>
    @yield('js')
</body>

</html>
