<div class="flex flex-wrap justify-start gap-4 mt-6">
    <!-- Dropdown Buttons -->
    <div class="flex space-x-2 w-full">
        <!-- Year Dropdown -->
        @php
            $firstYear = $years->first();
        @endphp
        <form method="GET" action="{{ route('dashboard') }}" id="filterForm" class="flex flex-wrap justify-between w-full">
            <input type="hidden" name="year" value="{{ request('year', $firstYear) }}" id="yearInput">
            <input type="hidden" name="view" value="{{ request('view', 'Top Albums') }}" id="viewInput">
            <input type="hidden" name="genre" value="{{ request('genre', 'Pop') }}" id="genreInput">

            <div class="flex-1 flex flex-col">
                <div class="flex items-center">
                    <label for="dropdownDefaultButton1" class="mr-2 text-gray-700 dark:text-gray-300">Select Year</label>
                    <button id="dropdownDefaultButton1" data-dropdown-toggle="dropdown1" class="my-1 text-gray-800 bg-white hover:bg-gray-300 focus:ring-2 focus:outline-2 focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        {{ request('year', $firstYear) }} <!-- Set the button name to the selected year or the first year -->
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                </div>
                <div id="dropdown1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 max-h-48 overflow-y-auto" aria-labelledby="dropdownDefaultButton1">
                        @foreach($years as $year)
                            <li>
                                <button type="button" value="{{ $year }}" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="year">{{ $year }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- View Dropdown -->
            <div class="flex-1 flex flex-col">
                <div class="flex items-center">
                    <label for="dropdownDefaultButton2" class="mr-2 text-gray-700 dark:text-gray-300">Ranking View</label>
                    <button id="dropdownDefaultButton2" data-dropdown-toggle="dropdown2" class="my-1 text-gray-800 bg-white hover:bg-gray-300 focus:ring-2 focus:outline-2 focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        {{ request('view', 'Top Albums') }} <!-- Set the button name to the selected view or default to 'Top Albums' -->
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                </div>
                <div id="dropdown2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 max-h-48 overflow-y-auto" aria-labelledby="dropdownDefaultButton2">
                        <li>
                            <button type="button" value="Top Albums" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="view">Top Albums</button>
                        </li>
                        <li>
                            <button type="button" value="Bottom Albums" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="view">Bottom Albums</button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Genre Dropdown -->
            <div class="flex-1 flex flex-col">
                <div class="flex items-center">
                    <label for="dropdownDefaultButton3" class="mr-2 text-gray-700 dark:text-gray-300">Select Genre</label>
                    <button id="dropdownDefaultButton3" data-dropdown-toggle="dropdown3" class="my-1 text-gray-800 bg-white hover:bg-gray-300 focus:ring-2 focus:outline-2 focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        {{ request('genre', 'Pop') }} <!-- Set the button name to the selected genre or default to 'Pop' -->
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                </div>
                <div id="dropdown3" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 max-h-48 overflow-y-auto" aria-labelledby="dropdownDefaultButton3">
                        <li>
                            <button type="button" value="Pop" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="genre">Pop</button>
                        </li>
                        <li>
                            <button type="button" value="Rock" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="genre">Rock</button>
                        </li>
                        <li>
                            <button type="button" value="Jazz" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="genre">Jazz</button>
                        </li>
                        <li>
                            <button type="button" value="Hip-Hop" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="genre">Hip-Hop</button>
                        </li>
                        <li>
                            <button type="button" value="Abstract" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="genre">Abstract</button>
                        </li>
                        <li>
                            <button type="button" value="Punk" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="genre">Punk</button>
                        </li>
                        <li>
                            <button type="button" value="Metal" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="genre">Metal</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>


