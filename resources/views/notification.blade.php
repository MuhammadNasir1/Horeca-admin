@include('layouts.header')
@include('layouts.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Notifications')</h1>
    </div>

    <div id="reloadDiv" class="shadow-dark mt-3  px-5 rounded-xl pt-8  bg-white">
        <div class="w-full pb-5">

            <a href="#" class="flex px-4 py-3  hover:bg-gray-100 dark:hover:bg-gray-700">

                <div class="w-full ps-3 pb-3 border-b-2 border-primary flex justify-between">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span
                            class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey,
                        what's up? All set for the presentation?"</div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                </div>
            </a>
            <a href="#" class="flex px-4 pt-3 hover:bg-gray-100 dark:hover:bg-gray-700">

                <div class="w-full ps-3 pb-3 border-b-2 border-primary flex justify-between">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span
                            class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey,
                        what's up? All set for the presentation?"</div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                </div>
            </a>

        </div>
    </div>
</div>



@include('layouts.footer')
