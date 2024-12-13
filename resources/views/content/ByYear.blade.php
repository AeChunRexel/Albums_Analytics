<div class="w-full rounded-lg shadow-md dark:bg-gray-800 p-4 md:p-6">
  <!-- Header for the chart container -->
  <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
    <dl>
      <!-- Dynamic title displaying the selected year -->
      <dt class="text-xl font-bold text-gray-800 dark:text-gray-400 pb-1">Albums Released Each Month in {{ request('year', $firstYear) }}</dt>
      <p class="text-lg font-normal text-gray-600 lg:text-xl dark:text-gray-400">{{ $albumCounts->sum() }} Albums</p>
    </dl>
  </div>

  <!-- Container for the bar chart -->
  <div id="bar-chart"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // Retrieve album counts and months from the controller data
  const albumCounts = @json($albumCounts);
  const months = @json($months);

  // Validate that albumCounts and months arrays exist and have data
  if (!albumCounts || !months || albumCounts.length === 0 || months.length === 0) {
    console.error("Album counts or months data is missing.");
    return; // Stop further execution if data is missing
  }

  // Ensure the number of album counts matches the months
  if (albumCounts.length !== months.length) {
    console.error("Mismatch between album counts and months array lengths.");
    return;
  }

  // Array of unique colors for each bar in the chart
  const colors = [
    "#31C48D", "#FF4560", "#008FFB", "#00E396", "#FEB019",
    "#FF66B2", "#775DD0", "#546E7A", "#D4526E", "#FF6347",
    "#00A87D", "#FFC107", "#1E90FF", "#DAA520", "#32CD32",
    "#BA55D3", "#20B2AA", "#FF1493", "#FFD700", "#00FF7F"
  ];

  // Chart options configuration
  const options = {
    series: [
      {
        name: "Albums",
        data: albumCounts,
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
          offsetX: -15, // Adjust horizontal spacing
        },
        distributed: true, // Enable individual bar colors
      },
    },
    legend: {
      show: false,
    },
    dataLabels: {
        enabled: false,
        position: "end", // Place the data labels at the end of the bars
        offsetX: 5, // Add a little space between the label and the bar
        style: {
          fontSize: "12px",
          colors: ["#000"], // Set label color
        },
        formatter: function (value) {
          return value; // Display the value directly
        },
      },

    tooltip: {
      enabled: true,
      shared: false,
      y: {
        formatter: function (value, { dataPointIndex }) {
          return "Albums: " + value;
        },
      },
      x: {
        formatter: function (value, { dataPointIndex }) {
          return "Month: " + months[dataPointIndex];
        },
      },
    },
    xaxis: {
      categories: months,
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400',
        },
      },
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
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400',
        },
      },
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
    colors: colors, // Apply unique colors to bars
  };

  // Render the chart if the chart container exists and ApexCharts library is available
  const chartContainer = document.getElementById("bar-chart");
  if (chartContainer && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(chartContainer, options);
    chart.render();
  } else {
    console.error("ApexCharts library is not loaded or the chart container is missing.");
  }
});
</script>
