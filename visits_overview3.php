<head>
  <title> COVID-CT: Registration </title>
  <link rel="stylesheet" type="text/css" href="report.css"/>
</head>
<body>
    <div id="header">
    COVID - 19 Contact Tracing
    </div>
      <div id="nav">
      <ul>
        <li> <a class="unselected" href="homepage.php"> Home</a></li>
        <li> <a class="unselected" href= "visits_overview.php ">Overview</a></li>
        <li><a class="unselected" href= "visits_overview2.php ">Add Visit</a></li>
        <li><a class="selected" href= "visits_overview3.php ">Report</a></li>
        <li><a class="unselected" href= "settings.HTML">Settings</a></li>
        <li><a class="unselected" href= "index.php">Logout</a></li>
      </ul>
    </div>
    <div class= "right-side">
        <h2> Report an Infection </h2>
        <br>
        <hr class="line">
        <br>
        Please report the date and time you were tested postive for <br>  COVID-19.
        <br>
    </div>
    <div>
        <form id="report-form" method="post" action="report.inc.php">

            <input name="date" type="text" class="report" placeholder="Date" required>
            <br>
            <input name="time" type="text" class="report" placeholder="Time" required>
            <br>
            <div class="btn">
            <button type="submit" name="reportbtn" id="reportbtn" class="Report" > Report </button>
            <button type="reset" id="cancelbtn"> Cancel </button>
            </div>
        </form>
    </div>

    </body>
    </html>
