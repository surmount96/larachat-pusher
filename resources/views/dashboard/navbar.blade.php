<nav class="bg-white px-6 py-2 relative flex justify-between items-center border-b border-gray" >
    <ul class=" w-1/2 lg:flex md:flex hidden font flex-3 items-center ">
        <li class="">
{{--            <a href="/">Home</a>--}}
        </li>
    </ul>

    <ul class=" w-1/2 lg:flex md:flex hidden font flex-3 items-center justify-end">
        <li class="ml-10">
            <a href="/">
                <svg class="w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor" class="gift w-6 h-6"><path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path><path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path></svg>
            </a>
        </li>
        <li class="ml-10">
            <a href="/">
                <svg class="w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor" class="shopping-cart w-6 h-6"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
            </a>
        </li>
        <li class="ml-10 relative">
            <a href="">
                <svg class="w-6 h-8" style="fill: #ccc">
                    <use xlink:href="{{ asset('img/sprite.svg#icon-notifications') }}"></use>
                </svg>
                <span class="flex items-center justify-center h-4 w-4 rounded-full bg-red text-white text-medium absolute top-0 right-0 mb-4">1</span>
            </a>
        </li>
    </ul>

</nav>
