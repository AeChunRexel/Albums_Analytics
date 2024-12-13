<div class="w-full bg-white rounded-lg shadow-md dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between">
    <div>
      <h5 class="leading-none text-xl font-bold text-gray-900 dark:text-white pb-2">Total No. of {{ request('genre' , 'Pop') }} Albums in {{ request('year', $firstYear) }}</h5>
      <p class="text-lg font-normal text-gray-600 lg:text-xl dark:text-gray-400">{{ $genreAlbumCounts->sum() }} Albums</p>
    </div>
  </div>
  <div id="area-chart"></div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // Retrieve album counts and months from the controller data
  const albumCounts = @json($genreAlbumCounts);
  const months = @json($genreMonths);

  const options = {
    chart: {
      height: "350",
      maxWidth: "100%",
      type: "area",
      fontFamily: "Inter, sans-serif",
      dropShadow: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    tooltip: {
      enabled: true,
      x: {
        show: false,
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        opacityFrom: 0.55,
        opacityTo: 0,
        shade: "#00ff00",
        gradientToColors: ["#00ff00"],
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 4,
    },
    grid: {
      show: true,
      strokeDashArray: 4,
      padding: {
        left: 2,
        right: 2,
        top: 0
      },
    },
    series: [
      {
        name: "Number of Albums",
        data: albumCounts,
        color: "#00ff00",
      },
    ],
    xaxis: {
      categories: months,
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400',
        },
      },
      axisBorder: {
        show: true,
      },
      axisTicks: {
        show: true,
      },
    },
    yaxis: {
      show: true,
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400',
        },
      },
    },
  }

  if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("area-chart"), options);
    chart.render();
  }
});
</script>

