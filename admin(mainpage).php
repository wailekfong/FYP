<?php include("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main Page</title>
    <!-- Link to Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* General styles */
        body 
        {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header 
        {
            background-color: #333;
            color: #fff;
            padding: 50%;
        }

        header h1 
        {
            margin: 0;
        }

        nav ul 
        {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li 
        {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a 
        {
            text-decoration: none;
            color: #fff;
        }

        main 
        {
            padding: 20px;
        }

        section 
        {
            margin-bottom: 30px;
        }

        /* Pie chart styles */
        #salesPieChart 
        {
            max-width: 100%;
            height: auto;
            margin: 0 auto;
            display: block;
        }

        body, html {
            margin: 0;
            padding: 0;
        }

        

    </style>
</head>
<body>

    <?php
    include('admin_header.php');
    ?>  

  <main>
    <section id="pie-chart">
      <h2>Total Year Sales For The Basketball Accessories</h2>
      <p>Check out the distribution of our sales in a pie chart:</p>
      <!-- Canvas for the pie chart -->
      <canvas id="salesPieChart" width="400" height="400"></canvas>
    </section>
  </main>


  <!-- JavaScript for creating the pie chart -->
    <script>
        // Sample data for the pie chart
        const salesData = 
        {
        labels: ['Basketball', 'Jersey', 'Basketball Shoe', 'Stocking', 'Other'],
        datasets: [{
            label: 'Sales Distribution',
            data: [300, 450, 200, 600, 100],
            backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(128, 0, 128, 0.6)',
            ],
            borderWidth: 1
        }]
        };

        // Rendering the pie chart
        const ctx = document.getElementById('salesPieChart').getContext('2d');
        const myPieChart = new Chart(ctx, 
        {
        type: 'pie',
        data: salesData,
        });
    </script>

<?php @include 'admin_footer.php'; ?>
</body>
</html>