<!DOCTYPE html>
<html lang="en">
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
        <li><a class="unselected" href= "settings.php ">Settings</a></li>
        <li><a class="unselected" href= "index.php">Logout</a></li>
</div>
<div class="report-form">
    <form id="visit-form" method="post" action="report.inc.php">

        <input name="Date" type="text" class="report" placeholder="Date" required>
        <br>
        <input name="Time" type="text" class="report" placeholder="Time" required>
        <br>
            <button type="submit" class="Submit"> Report </button>

            <button type="reset" class="Submit"> Cancel </button>


    </form>
</div>

</body>
</html>