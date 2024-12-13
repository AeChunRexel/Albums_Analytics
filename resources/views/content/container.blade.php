@php
    $firstYear = $years->first();
@endphp
<div class="p-2 mt-4 sm:ml-64">
    <div class="px-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700 mt-14">
        @include('content.selector')
         <!-- Dropdown Filters -->
      
        @include('content.dashboard') 
       
        <!-- Charts -->
        <div class="grid grid-cols-2 gap-2 mt-4">
            <!-- Chart 1: Albums by Month -->
            <div class="col-span-1">
                <div class="aspect-w-1 aspect-h-1">
                    @include('content.ByYear')
                </div>
            </div>
            <!-- Chart 2: Top/Bottom Albums -->
            <div class="col-span-1">
                <div class="aspect-w-2 aspect-h-1">
                    @include('content.chart1')
                </div>
            </div>
            <!-- Chart 3: Other Charts -->
            <div class="col-span-1 sm:col-span-2">
                <div class="aspect-w-1 aspect-h-1">
                    @include('content.chart2')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.dropdown-option').forEach(function(element) {
        element.addEventListener('click', function() {
            var type = this.getAttribute('data-type');
            var value = this.getAttribute('value');
            document.getElementById(type + 'Input').value = value;
            document.getElementById('filterForm').submit();
        });
    });
});
</script>
