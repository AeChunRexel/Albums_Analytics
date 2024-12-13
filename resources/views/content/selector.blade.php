<div class="w-full flex justify-evenly items-center gap-4 py-2 border-b-2 border-gray-300"> 
    
    <form method="GET" action="{{ route('dashboard') }}" id="filterForm" class="flex flex-wrap justify-between w-full">
    <input type="hidden" name="year" value="{{ request('year', $firstYear) }}" id="yearInput">
    <input type="hidden" name="view" value="{{ request('view', 'Top') }}" id="viewInput">
    <input type="hidden" name="genre" value="{{ request('genre', 'Pop') }}" id="genreInput">

    <!-- Breadcrumb -->
    <nav class="flex justify-between" aria-label="Breadcrumb">
        <ol class="inline-flex items-center mb-3 sm:mb-0">

            <!-- Year Dropdown -->
            <li>
                <div class="flex items-center">
                    <button id="dropdownYear" type="button" data-dropdown-toggle="dropdown-year" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700 ml-2">
                        Year
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-year" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 max-h-60 overflow-y-auto">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownYear">
                            @foreach($years as $year)
                                <li>
                                    <button type="button" value="{{ $year }}" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="year">{{ $year }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>

            <span class="mx-2 text-gray-400">/</span>

            <!-- View Dropdown -->
            <li>
                <div class="flex items-center">
                    <button id="dropdownView" type="button" data-dropdown-toggle="dropdown-view" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700 ml-2">
                       Rank 
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-view" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 max-h-60 overflow-y-auto">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownView">
                            <li>
                                <button type="button" value="Top" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="view">Top</button>
                            </li>
                            <li>
                                <button type="button" value="Bottom" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dropdown-option" data-type="view">Bottom</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <span class="mx-2 text-gray-400">/</span>

            <!-- Genre Dropdown -->
            <li>
                <div class="flex items-center">
                    <button id="dropdownGenre" type="button" data-dropdown-toggle="dropdown-genre" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-white dark:focus:ring-gray-700 ml-2">
                        Genre
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown-genre" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 max-h-60 overflow-y-auto">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownGenre">
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
            </li>

        </ol>
    </nav>
</form>
@include('content.search')
    
</div>