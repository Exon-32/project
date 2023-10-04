<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <link rel="stylesheet" href="css/style.css">
    <title>Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src=C:\xampp\htdocs\exam\a1.png" >
            </div>

            <span class="logo_name">PMS</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="booking.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Booking</span>
                </a></li>
                <li><a href="setting.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Setting</span>
                </a></li>
                <li><a href="feedback.php">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Feedback</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total users</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">spots remaining</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">spots booked</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <span class="data-list">Prem Shahi</span>
                    
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <span class="data-list">premshahi@gmail.com</span>
                
                    </div>
                    <div class="data joined">
                        <span class="data-title">booked time</span>
                        <span class="data-list">2022-02-12</span>
                        
                    </div>
                    <div class="data type">
                        <span class="data-title">vehicle Type</span>
                        <span class="data-list">car</span>
                    
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <span class="data-list">pending</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    
    <div >
        <h1>Welcome, <?php
        echo $_REQUEST['firstname']; ?>!</h1>
        <p>This is your dashboard. You can add your content here.</p>

    </div>
</body>
</html>
