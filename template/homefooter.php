  <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

    <script src="js/charts.js"></script>


    <!--- load charts !-->
    <script type="text/javascript">

        // Load Charts and the corechart package.
        google.charts.load('current', {'packages': ['corechart']});

        // Draw the pie chart for Sarah's pizza when Charts is loaded.
        google.charts.setOnLoadCallback(drawSarahChart);

        // Draw the pie chart for the Anthony's pizza when Charts is loaded.
        google.charts.setOnLoadCallback(drawAnthonyChart);

        // Callback that draws the pie chart for Sarah's pizza.
        function drawSarahChart() {

            // Create the data table for Sarah's pizza.
            var data = new google.visualization.DataTable();
            data.addColumn('string', '');
            data.addColumn('number', '');
            data.addRows([
                ['Personal', 1],
                ['Sports', 1],
                ['Dance', 1],
                ['MMA', 1]
            ]);

            // Set options for Sarah's pie chart.
            var options = {title: 'Types of Training',
                width: 600,
                height: 400};

            // Instantiate and draw the chart for Sarah's pizza.
            var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
            chart.draw(data, options);
        }

        // Callback that draws the column charts for traning session per week.
        function drawAnthonyChart() {

            var data = google.visualization.arrayToDataTable([
                ["Fri", "Sessions", {role: "style"}],
                ["Mon", 4, "#0000FF"],
                ["Tue", 6, "#FF0000"],
                ["Wed", 2, "#800080"],
                ["Thur", 10, "gold"],
                ["Fri", 7, "color: #008000"],
                ["Sat", 9, "color: #e5e4e2"],
                ["Sun", 2, "color: #808000"],
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"},
                2]);

            var options = {
                title: "Training Sessions",
                width: 600,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: {position: "none"},
            };

            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }


    </script>

  </body>

</html>