          <!-- <?php
  //           session_start();
  //           $servername = "127.0.0.1";
  //           $username = "root";
  //           $password = "";
  //           $dbname = "adminpanelproject";

  //           $conn = new mysqli($servername, $username, $password, $dbname);

  //           if ($conn->connect_error) {
  //            die ("اتصال به دیتابیس نا موفق بود" .$conn->connect_error);
  //           } 

  //          if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //          $email = $_POST['email'];
  //          $password = $_POST['password'];

  //          $sql = "SELECT Username  FROM adminservice WHERE Email='$email' AND Password='$password'";
  //          $result = $conn->query($sql);
  //          $Aminname = "";

  //         if($result->num_rows > 0) {
  //           $row = $result->fetch_assoc();
  //           $Aminname = $row["Username"];
  //            $_SESSION['email'] = $email;
  //         echo "خوش آمدید";
  //        } else {
  //          header("Location: error.php");
  //          exit();
  //       echo "مشخصاتی با این نام وجود ندارد";
  //      }
  //   }
  //  $conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <style>
    body{
        direction: rtl;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
     
     header{
        height: 60px;
        box-shadow: 5px 5px 4px #b5b5b5;
     }
     .sidebar {
       position: fixed;
        width: 20%;
    bottom: 0;
    background-color: white;
    height: 100vh;
    z-index: 1040;
    transition: transform 0.3s ease-in-out;
    box-shadow: 5px 5px 4px #b5b5b5;
     }
     .sidebar a {
         color: white;
        text-decoration: none;
        display: block;
        padding: 12px 20px;
        text-align: left;
      }
      .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #343a40;
        color: white;
        padding-top: 60px;
        transition: transform 0.3s ease-in-out;
        z-index: 1040;
      }

      .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 12px 20px;
        text-align: left; /* متن منو چپ‌چین */
      }

      .sidebar a:hover {
         background-color: #495057;
      }

      .sidebar.closed {
        transform: translateX(100%);
      }

      .menu-toggle {
        position: fixed;
        
        z-index: 1050;
      }

      body.sidebar-closed {
        padding-left: 0;
      }
      .accordion-button:hover{
        background-color: #eeeef7;
        color: blue;
      }
      .accordion-body ul a{
        color: black;
      }
  </style>
  <body>
    <header class="navbar d-flex justify-content-start" style="width: 80%;float:left;">
    <ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
</ul>
<div class="formcontrol">
<form class="d-flex mt-3" role="search" style="position:absolute;left:0;bottom:0;">
          <button class="btn menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: blue;position:relative;">
      <span class="">
      <i style="color: white;" class="fa-solid fa-bars fa-lg"></i>
      </span>
    </button>
    <input class="form-control m-1" type="search" placeholder="Search" aria-label="Search">
</form>
</div>
</header>
  

<div class="sidebar" id="sidebar">
    <div class="container">
      <ul style="text-decoration: none;list-style:none;">
        <div class="icov d-flex" style="margin-top: 15px;">
        <i class="fa-solid fa-cart-shopping" style="margin: 7px;"></i>
        <li>فروشگاه آنلاین</li>
        </div>
        
        <div class="icov d-flex" style="margin-top: 20px;">
        <i class="fa-solid fa-rocket" style="margin: 7px;"></i>
        <li>پروژه</li>
        </div>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    <div class="accordion accordion-flush mt-3" id="accordionFlushExample" style="margin: 10px;">
        <div class="box1" style="background-color: #eeeefd;padding:7px;">
            <p style="color: blue;">مدیریت داشبورد</p>
            <p style="color: blue;">ادمین:
            <?php echo $Aminname; ?>
            </p>
            
        </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button  class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      برنامه ها
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul class="fw-bold" style="font-size: 13px;">
            <p>تقویم کامل</p>
            <p>گالری</p>
            <p>هشدار ها</p>
            <p>پروژه ها</p>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
  </div>
    </div>

  </div>
</div>





<script>
    const toggleBtn = document.querySelector('.menu-toggle');
      const sidebar = document.getElementById('sidebar');
      const body = document.body;

      toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('closed');
        body.classList.toggle('sidebar-closed');
      });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html> -->