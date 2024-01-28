<!DOCTYPE html>
<html>
  <head>
    <title>JavaScript Bar Chart</title>
    <!-- Include AnyChart library -->
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-bundle.min.js"></script>
  </head>
  <body>
    <div id="container" style="width: 50%; height: 120%"></div>

    <?php
    // Assuming you have a database connection already established
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "akankshai";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set your query
    $sql = "SELECT response AS ocean_array FROM user_responses WHERE id BETWEEN 35 AND 84";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result === false) {
        die("Error executing the query: " . $conn->error);
    }

    // Fetch and output the results as a single-dimensional array
    $oceanArray = [];
    while ($row = $result->fetch_assoc()) {
        $oceanArray[] = $row['ocean_array'];
    }

    // Calculate the values for O, E, A, N, C
    $e = (20 + $oceanArray[0] - $oceanArray[5] + $oceanArray[10] - $oceanArray[15] + $oceanArray[20] - $oceanArray[25] + $oceanArray[30] - $oceanArray[35] + $oceanArray[40] - $oceanArray[45]) / 0.4;
    $a = (14 - $oceanArray[1] + $oceanArray[6] - $oceanArray[11] + $oceanArray[16] - $oceanArray[21] + $oceanArray[26] - $oceanArray[31] + $oceanArray[36] - $oceanArray[41] + $oceanArray[46]) / 0.4;
    $c = (14 + $oceanArray[2] - $oceanArray[7] + $oceanArray[12] - $oceanArray[17] + $oceanArray[22] - $oceanArray[27] + $oceanArray[32] - $oceanArray[37] + $oceanArray[42] - $oceanArray[47]) / 0.4;
    $n = (38 - $oceanArray[3] + $oceanArray[8] - $oceanArray[13] + $oceanArray[18] - $oceanArray[23] + $oceanArray[28] - $oceanArray[33] + $oceanArray[38] - $oceanArray[43] + $oceanArray[48]) / 0.4;
    $o = (8 + $oceanArray[4] - $oceanArray[9] + $oceanArray[14] - $oceanArray[19] + $oceanArray[24] - $oceanArray[29] + $oceanArray[34] - $oceanArray[39] + $oceanArray[44] - $oceanArray[49]) / 0.4;

    // Close the database connection
    $conn->close();
    ?>

    <script>
        // Your data
        var chartData = [
            ["Extroversion", <?php echo $e; ?>],
            ["Agreeableness", <?php echo $a; ?>],
            ["Conscientiousness", <?php echo $c; ?>],
            ["Neuroticism", <?php echo $n; ?>],
            ["Openness", <?php echo $o; ?>]
        ];

        // Create a bar chart
        anychart.onDocumentReady(function() {
          var chart = anychart.bar();

          // Set chart data
          chart.data(chartData);

          // Set X-axis labels
          chart.xAxis().labels().format("{%Value}");

          // Set Y-axis maximum value
          chart.yScale().maximum(100); // Adjust this value as needed

          // Display the chart in the container with id 'container'
          chart.container("container");
          chart.draw();
        });
        // Your data values
    const dataValues = [10, 20, 70];

// Specific colors for each slice
const specificColors = ['#1749F9', '#1038C9', '#81C5F8'];

// Create a pie chart
const ctx = document.getElementById('myPieChart').getContext('2d');
const myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Child', 'Parent', 'AI'],
    datasets: [{
      data: dataValues,
      backgroundColor: specificColors,
    }]
  },
  options: {
    // You can customize options here
    responsive: true,
    maintainAspectRatio: false,
  }
});

        
    </script>
    
   

  </body>
</html>
