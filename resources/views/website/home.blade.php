@extends('website.layout')
@section('title')
    Home
@endsection

@section('content')
    <style>
        .highlight {
            background-color: rgba(0, 128, 0, 0.217);
            transition: background-color 0.3s ease;
        }
    </style>
    <div class=" mt-4 mx-1 lg:mx-6 xl:mx-12   ">
        <div id="header-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative sm:h-[10rem] h-[8rem] md:h-[14rem] overflow-hidden rounded-lg lg:h-[20rem] xl:h-[36rem] ">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img class="rounded-md" src="{{ asset('images/banners/penne-banner.png') }}"
                        class="absolute block w-full -translate-x-1/2 top-0 left-1/2" alt="Banner-1">
                </div>

                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/banners/Ket-banner.png') }}"
                        class="absolute block w-full -translate-x-1/2 top-0 left-1/2" alt="Banner-2">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/banners/sp-banner.png') }}"
                        class="absolute block w-full -translate-x-1/2  top-0 left-1/2" alt="Banner-3">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/banners/sp-banner-2.png') }}"
                        class="absolute block w-full -translate-x-1/2  top-0 left-1/2" alt="Banner-4">
                </div>

            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="1"></button>

            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <spa
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </spa>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <div class="mt-10 lg:mx-6 md:mx-4 mx-1 xl:mx-16">
        <div class="category-section">
            <div class="flex gap-6 items-center justify-between ">
                <h2 class="text-2xl font-semibold">@lang('lang.Categories')</h2>
                <div class="flex gap-4">
                    <button
                        class="swiper-prev h-10 w-10 rounded-full bg-slate-300 flex justify-center items-rounded-smh-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="#242424"
                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                        </svg>
                    </button>
                    <button
                        class="swiper-next h-10 w-10 rounded-full bg-slate-300 flex justify-center items-rounded-smh-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="#242424"
                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div>
                <div class="swiper mySwiper mt-4">
                    <div class="swiper-wrapper">
                        {{-- @for ($i = 1; $i < 20; $i++)
                            <div class="swiper-slide">
                                <div
                                    class=" h-48 bg-[#F2FCE4] rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center justify-center flex-1">
                                    <a href="#" class="w-full flex justify-center">
                                        <img class="rounded-t-lg pt-6"
                                            src="https://nest-frontend-v6.vercel.app/assets/imgs/shop/cat-13.png"
                                            alt="" />
                                    </a>
                                    <div class="p-5 pb-8 text-center w-full">
                                        <a href="#">
                                            <h5 class="text-lg font-medium tracking-tight text-gray-900 dark:text-white p">
                                                Cake
                                                &
                                                Milk</h5>
                                        </a>
                                        <p class="text-sm font-normal text-gray-700 dark:text-gray-400">26 items</p>
                                    </div>
                                </div>
                            </div>
                        @endfor --}}

                    </div>
                </div>
            </div>
        </div>


        <div class="mt-10">
            {{-- <div class="mt-10">
                <h2 class="text-2xl font-semibold">Popular Products</h2>
                <div class="grid xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3  grid-cols-2 gap-4 mt-2">
                    @for ($a = 1; $a < 7; $a++)
                        <div class="border border-gray rounded-lg shadow-sm p-4 ">
                            <div class="relative">
                                <a href="tel:000000"><img
                                        src="https://nest-frontend-v6.vercel.app/assets/imgs/shop/product-6-2.jpg"
                                        alt="Product Image" class="w-full h-40 object-contain "></a>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-500">Category</p>
                                <h2 class="text-md font-semibold">Lorem ipsum dolor sit amet.</h2>

                                <p class="text-sm text-gray-500">By <span class="text-primary">Brand</span> </p>
                            </div>

                            <!-- Flex Container for Prices and Button -->
                            <div class="mt-4">
                                <a href="tel:000000">
                                    <button
                                        class="bg-[#def9ec] text-primary py-2 px-4 rounded-md w-full font-semibold text-sm shadow-md"><i
                                            class="fa fa-shopping-cart p-1 "></i>Call For Order</button>
                                </a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div> --}}

            <div id="product-container">
                <div class=" text-center hidden" id="spinner">
                    <svg aria-hidden="true" class="w-10 h-10 mx-auto text-center text-gray-200 animate-spin fill-primary"
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
            <div>
                <section class="bg-[#D8F1E5] dark:bg-gray-900 mt-5 rounded-lg ">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                        <div class="mx-auto max-w-screen-md sm:text-center">
                            <h2
                                class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl dark:text-white">
                                @lang('lang.Sign up for our newsletter')</h2>
                            <p
                                class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">
                                @lang('lang.Stay up to date with the roadmap progress, announcements and exclusive discounts feel free to sign up with your email').</p>
                            <form action="#">
                                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                                    <div class="relative w-full">
                                        <label for="email"
                                            class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">@lang('lang.Email_address')</label>
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                </path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                        </div>
                                        <input
                                            class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary"
                                            placeholder="@lang('lang.Enter_your_email')" type="email" id="email"
                                            required="">
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary border-primary sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 ">Subscribe</button>
                                    </div>
                                </div>
                                <div
                                    class="mx-auto max-w-screen-sm text-sm text-left text-gray-500 newsletter-form-footer">
                                    @lang('lang.We care about the protection of your data'). <a href="#" class="font-medium text-primary hover:underline">
                                        @lang('lang.Read our Privacy Policy')
                                    </a>.</div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

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



        <div id="ProductDetailsModal" data-modal-backdrop="static"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="fixed inset-0 transition-opacity">
                <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
            </div>
            <div class="relative p-4 w-full max-w-2xl max-h-full">

                <div class="relative bg-white shadow-dark rounded-lg dark:bg-gray-700">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between p-5 rounded-t dark:border-gray-600 bg-primary">
                        <h3 class="text-xl font-semibold text-white">
                            @lang('lang.Product_Details')
                        </h3>
                        <button type="button"
                            class="absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8"
                            data-modal-hide="ProductDetailsModal">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    <div class=" text-center  h-60 flex justify-center items-center " id="modalSpinner">
                        <svg aria-hidden="true"
                            class="w-10 h-10 mx-auto text-center text-gray-200 animate-spin fill-primary"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                    </div>
                    <!-- Modal Content: Row Layout -->
                    <div class="flex items-center gap-6 p-6 hidden" id="modalContent">
                        <!-- Image Section -->
                        <div class="w-48 h-48 flex-shrink-0">
                            <img src="{{ asset('images/Horeca-green.svg') }}" alt="product Image"
                                class="w-full h-full object-contain rounded-lg">
                        </div>

                        <!-- Product Details -->
                        <div class="flex flex-col flex-grow">
                            <h2 class="text-lg font-semibold text-primary" id="modalTitle" productId=""></h2>
                            <p class="text-gray-600">Category: <span id="modalCategory"></span></p>
                            <p class="text-gray-800 font-bold text-xl" id="modalPrice"></p>
                            <div class="flex gap-2 items-center mt-2" id="">
                                <button type="button" class="text-xs bg-primary text-white rounded-sm h-6 w-6"
                                    id="decreaseQty">-</button>
                                <h3 class="text-sm" id="quantity">1</h3>
                                <button type="button" class="text-xs bg-primary text-white rounded-sm h-6 w-6"
                                    id="increaseQty">+</button>
                            </div>

                            <!-- Dropdown & Button -->
                            <div class="flex items-center gap-4 mt-4">
                                <div class="w-52">
                                    <select class="border rounded px-3 py-2 bg-gray-100 text-gray-700 w-full"
                                        id="unitStatus">
                                        <option value="single" selected>Single</option>
                                        <option value="full" id="unitOption">Full Unit</option>
                                    </select>
                                </div>
                                <button class="bg-primary w-full text-white px-4 py-2 rounded-md " id="addToCart">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm mx-3 mb-4" id="modalDescription">Lorem ipsum dolor sit amet.</p>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <button data-modal-target="ProductDetailsModal" data-modal-toggle="ProductDetailsModal"></button>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#increaseQty').click(function() {
                let qty = parseInt($('#quantity').text());
                $('#quantity').text(qty + 1);
            });

            $('#decreaseQty').click(function() {
                let qty = parseInt($('#quantity').text());
                if (qty > 1) {
                    $('#quantity').text(qty - 1);
                }
            });

            $("#addToCart").on("click", function() {
                let product = {
                    id: $("#modalTitle").attr("productId"),
                    name: $("#modalTitle").text(),
                    category: $("#modalCategory").text(),
                    price: parseFloat($("#modalPrice").text().replace("€", "")),
                    quantity: parseInt($("#quantity").text()), // Get selected quantity
                    unit_status: $("#unitStatus").val()
                };

                let cart = JSON.parse(localStorage.getItem("cart")) || [];

                // Check if the product already exists in the cart
                let existingProduct = cart.find(item => item.id === product.id);
                if (existingProduct) {
                    existingProduct.quantity += product.quantity;
                } else {
                    cart.push(product);
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                alert("Product added to cart!");
            });

            function handleSearch() {
                $('.search-input').on('keyup', function() {
                    const searchValue = $(this).val().toLowerCase();
                    const $products = $('.product');

                    if (!searchValue) {
                        $products.removeClass('highlight');
                        $('#match-count').text("0");
                        $('#match-count-con').addClass("hidden");
                        return;
                    }

                    $products.removeClass('highlight');
                    const $matchedProducts = $products.filter(function() {
                        return $(this).text().toLowerCase().includes(searchValue);
                    });

                    $matchedProducts.addClass('highlight');
                    $('#match-count-con').removeClass("hidden");
                    $('.match-count').text($matchedProducts.length);

                    if ($matchedProducts.length) {
                        $('html, body').animate({
                            scrollTop: $matchedProducts.first().offset().top - ($(window).height() /
                                2) + ($matchedProducts.first().height() / 2)
                        }, 100);
                    }
                });
            }
            handleSearch();

            function scrollHandle() {
                $('.scroll-link').on('click', function(e) {
                    e.preventDefault();
                    let target = $(this).attr('href');
                    let offset = 150;
                    let targetElement = $(target);

                    if (targetElement.length) {
                        $('html, body').animate({
                            scrollTop: targetElement.offset().top - offset
                        }, 400);
                    } else {
                        Swal.fire({
                            title: "@lang('lang.No_product_Find')",
                            text: "@lang('lang.This_category_has_0_product')",
                            icon: "warning",
                        });
                    }
                });
            }

            const defaultLogoUrl = "{{ asset('images/Horeca-green.svg') }}";
            let baseUrl = 'https://horeca-kaya.com/';

            function productDetailF() {
                $(document).on('click', ".productDetailBtn", function() {
                    let url = baseUrl + 'api/getProductDetail/' + $(this).attr('productId');
                    $.ajax({
                        type: "GET",
                        url: url,
                        beforeSend: function() {
                            $('#modalContent').addClass('hidden');
                            $('#modalSpinner').removeClass('hidden');

                            $('#ProductDetailsModal img').attr('src', defaultLogoUrl);
                        },
                        success: function(response) {
                            $('#modalSpinner').addClass('hidden');
                            $('#modalContent').removeClass('hidden');
                            let product = response.products[0];
                            let imagePath = product.image;
                            let finalImageSrc = imagePath.startsWith("storage/") ? baseUrl +
                                imagePath : imagePath;
                            $('#ProductDetailsModal img').attr('src', finalImageSrc);
                            $('#modalTitle').text(product.name);
                            $('#modalTitle').attr("productId", product.id)
                            $('#modalCategory').text(product.category);
                            $('#modalPrice').text("€" + product.rate);



                            if (product.unit_price == 0) {
                                $('#unitOption').prop('disabled', true);
                                $('#unitStatus').val('single').trigger('change');
                            } else {
                                $('#unitOption').prop('disabled', false);
                                $('#unitStatus').trigger('change');
                            }

                            function checkUnitStatus() {
                                let unitStatus = $('#unitStatus').val();
                                if (unitStatus == "single") {
                                    $('#modalPrice').text("€" + product.rate);
                                    $('#weight').val(product.content_weight);
                                } else {
                                    $('#modalPrice').text("€" + product.unit_price);
                                    $('#weight').val(product.package_weight);
                                }
                            }
                            console.log(unitStatus);
                            checkUnitStatus(); // Initial check
                            $('#unitStatus').change(
                                checkUnitStatus); // Bind the event handler


                            // $('#Product_Price').val(product.rate);
                            // $('#Product_id').val(product.id);
                            // $('#productCode').val(product.code);
                            // $('#tax').val(product.tax);

                            // });


                        }
                    });
                    $('#ProductDetailsModal').removeClass('hidden').addClass('flex');
                });
            }

            scrollHandle();
            $('#spinner').removeClass('hidden');

            function getAllProducts() {
                $.ajax({
                    type: "GET",
                    url: 'https://horeca-kaya.com/api/getProducts',
                    success: function(response) {
                        $('#spinner').addClass('hidden');
                        let products = response.products;
                        let uniqueCategories = [];
                        let categoryNames = new Set();
                        let catBgColors = ["#F2FCE4", "#D6D3C4FF", "#ECFFEC", "#FEEFEA", "#FFF3FF"];

                        products.forEach(product => {
                            if (!categoryNames.has(product.category)) {
                                uniqueCategories.push(product);
                                categoryNames.add(product.category);
                            }
                        });

                        uniqueCategories.forEach((category, i) => {
                            let color = catBgColors[i % catBgColors.length];
                            let categoryHTML = `
                        <div class="swiper-slide">
                            <a href="#category-${category.category}" class="h-48 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center justify-center flex-1 scroll-link" style="background-color: ${color};">
                                <div class="w-full h-28 flex justify-center">
                                    <img class="rounded-t-lg pt-6 w-[90%]" loading="lazy" src="${category.category_image !== "null" ? baseUrl + category.category_image : defaultLogoUrl}" alt="${category.category}" />
                                </div>
                                <div class="p-5 pb-8 text-center w-full">
                                    <h5 class="text-lg font-medium tracking-tight text-gray-900 dark:text-white">${category.category}</h5>
                                </div>
                            </a>
                        </div>`;
                            $('.swiper-wrapper').append(categoryHTML);

                            let categoryData = `<li>
                        <a href="#category-${category.category}" class="scroll-link"> 
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                ${category.category}
                            </button>
                        </a>
                    </li>`;
                            $('.category-dropdown').append(categoryData);
                        });

                        let uniqueCategory = [...new Set(products.map(product => product.category))];

                        let index = 0;

                        function addProductWithDelay() {
                            if (index >= products.length) return;
                            let product = products[index];
                            let categorySelector = `#category-${product.category}`;
                            if (!$(categorySelector).length) {
                                $('#product-container').append(`
                            <div class="mt-10">
                                <h2 class="text-2xl font-semibold">${product.category}</h2>
                                <div class="grid xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-4 mt-4" id="category-${product.category}"></div>
                            </div>
                        `);
                            }
                            $(categorySelector).append(`
                        <div class="border border-gray productDetailBtn rounded-lg shadow-sm p-4 cursor-pointer productCard product" productId="${product.id}">
                            <div>
                                <div class="relative">
                                    <img loading="lazy" src="${product.image && product.image !== 'null' ? product.image : defaultLogoUrl}" alt="${product.name}" class="w-full md:h-40 h-20 object-contain" onerror="this.onerror=null; this.src='${defaultLogoUrl}'">
                                </div>
                                <div class="mt-4">
                                    <h2 class="md:text-md text-sm font-semibold">${product.name}</h2>
                                    <p class="text-xs md:text-sm text-gray-500">By <span class="text-primary">${product.brand}</span></p>
                                </div>
                            </div>
                        </div>
                    `);
                            index++;
                            setTimeout(addProductWithDelay, 50);
                        }
                        addProductWithDelay();
                        productDetailF();
                        scrollHandle();
                        handleSearch();
                    }
                });
            }
            setTimeout(getAllProducts, 1500);
        });

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 25,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            breakpoints: {
                1380: {
                    slidesPerView: 8,
                    spaceBetween: 20,
                },
                1370: {
                    slidesPerView: 6,
                    spaceBetween: 20,
                },

                820: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 8,
                },

            }
        });
    </script>
@endsection
