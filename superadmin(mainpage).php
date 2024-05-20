<?php include("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style(Home).css?v=<?php echo time(); ?>">
    <title>Super Admin Home Page</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 450px;
            height: 450px;
            margin: 0 auto;
        }
        
        .summary-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
    </style>
</head>
<body>
    <?php include ("superadmin(header).php"); ?>
    <?php
        $result_basketball = mysqli_query($connect, "SELECT * FROM basketball");	
        $count_basketball = mysqli_num_rows($result_basketball);
        $result_jersey = mysqli_query($connect, "SELECT * FROM jersey");	
        $count_jersey = mysqli_num_rows($result_jersey);
        $result_shoes = mysqli_query($connect, "SELECT * FROM shoes");	
        $count_shoes = mysqli_num_rows($result_shoes);
        $result_stocking = mysqli_query($connect, "SELECT * FROM stocking");	
        $count_stocking = mysqli_num_rows($result_stocking);
        $result_register = mysqli_query($connect, "SELECT * FROM register");	
        $count_register = mysqli_num_rows($result_register);
        $result_orders = mysqli_query($connect, "SELECT * FROM orders");	
        $count_orders = mysqli_num_rows($result_orders);
    ?>
    <div class="main">
        <div class="row">
            <h3>Summary</h3>
            <h3>Welcome to Super Admin Mainpage</h3>
            <hr><br>
            <div class="chart-container">
                <canvas id="summaryChart"></canvas>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('summaryChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Basketball', 'Jersey', 'Basketball Shoes', 'Stocking', 'User', 'Orders'],
                            datasets: [{
                                data: [
                                    <?php echo $count_basketball; ?>,
                                    <?php echo $count_jersey; ?>,
                                    <?php echo $count_shoes; ?>,
                                    <?php echo $count_stocking; ?>,
                                    <?php echo $count_register; ?>,
                                    <?php echo $count_orders; ?>,
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 10)',
                                    'rgba(54, 162, 235, 10)',
                                    'rgba(255, 206, 86, 10)',
                                    'rgba(75, 192, 192, 10)',
                                    'rgba(153, 102, 255, 10)',
                                    'rgba(0, 0, 0, 0.8)',
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(0, 0, 0, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                            }
                        }
                    });
                });
            </script>
            <br>
        </div>
        <br><br>
        <div class="row">
            <h3>Login History</h3>
            <hr><br><br>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Super Admin Name</th>
                </tr>
                <?php
                    mysqli_select_db($connect, "fyp");
                    $result = mysqli_query($connect, "SELECT * FROM superadmin");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["superadmin_id"]; ?></td>
                    <td><?php echo $row["superadmin_name"]; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>

</body>
</html>