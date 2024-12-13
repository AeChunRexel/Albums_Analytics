<div class="w-full bg-white rounded-lg shadow-md dark:bg-gray-800 p-4 md:p-6">
  <!-- Header for the chart container -->
  <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
    <dl>
      <!-- Dynamic title displaying the selected year and view -->
      <dt class="text-xl font-bold text-gray-800 dark:text-gray-400 pb-1">Top 10 {{ $viewLabel }}</dt>
      <p class="text-lg font-normal text-gray-600 lg:text-xl dark:text-gray-400">Year  {{ request('year', $firstYear) }}</p>
    </dl>
  </div>

  <!-- Container for the bar chart -->
  <div id="bar-chart2"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

  const albumNames = @json($albumNames);
  const albumRatings = @json($albumRatings);

  const alternatingColors = [
  // "#1f77b4", // Blue
  "#ff7f0e", // Orange
  "#2ca02c", // Green
  // "#d62728", // Red
  // "#9467bd", // Purple
  // "#8c564b", // Brown
  // "#e377c2", // Pink
  // "#7f7f7f", // Gray
  // "#bcbd22", // Yellow-green
  // "#17becf", // Cyan
];
 // Define alternating colors

  // Function to get alternating colors
  const getAlternatingColor = (index) => {
    return alternatingColors[index % alternatingColors.length];
  };

  // Generate colors for bars
  const barColors = albumRatings.map((_, index) => getAlternatingColor(index));

  const options = {
    series: [
      {
        name: "Albums",
        data: albumRatings,
      }
    ],
    chart: {
      type: "bar",
      width: "100%",
      height: 350,
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
        horizontal: true,
        columnWidth: "70%",
        borderRadius: 3,
        dataLabels: {
          position: "top",
          offsetX: -10, // Adjust horizontal spacing
        },
        distributed: true, // Enable individual bar colors
      },
    },
    legend: {
      show: false,
      position: "bottom",
    },
    dataLabels: {
      enabled: false,
      formatter: function (value) {
        return value; // Display the value directly
      },
      style: {
        fontSize: "12px",
        colors: ["#000"], // Label color
      },
    },
    tooltip: {
      enabled: true,
      shared: false,
      intersect: true,
      y: {
        formatter: function (value, { dataPointIndex }) {
          return "Rating: " + value;
        }
      },
      x: {
        formatter: function (value, { dataPointIndex }) {
          return "Album: " + albumNames[dataPointIndex];
        }
      },
    },
    xaxis: {
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        }
      },
      categories: albumNames,
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
    yaxis: {
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        }
      }
    },
    grid: {
      show: true,
      strokeDashArray: 4,
      padding: {
        left: 2,
        right: 2,
        top: -20,
      },
    },
    colors: barColors, // Apply alternating colors
  };

  if (document.getElementById("bar-chart2") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("bar-chart2"), options);
    chart.render();
  }

});
</script>
