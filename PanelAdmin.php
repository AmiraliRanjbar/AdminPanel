<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$databasename = "adminpanelproject";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
  die ("اتصال به دیتابیس ناموفق بود" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT Username, Email FROM adminservice WHERE email='$email' AND password='$password'";
  $result = $conn->query($sql);

  if($result->num_rows > 0 ) {
$row = $result->fetch_assoc();
$_SESSION['Username'] = $row['Username'];
$_SESSION['Email'] = $row['Email'];
  } else {
    header("Location: error.php");
    exit();
  }
}

$conn->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      body {
        transition: padding-right 0.3s ease;
        padding-right: 270px;
        background-color: white;
        color: black;
      }
      body.dark-mode {
        background-color: black;
        color: white;
      }

      .sidebar {
        width: 270px;
        height: 100vh;
        box-shadow: 5px 5px 4px 4px black;
        position: fixed;
        top: 0;
        right: 0;       /* 👈 حالا سمت راست */
        left: auto;
        background-color: white;
        padding-top: 60px;
        transition: transform 0.3s ease-in-out;
        z-index: 1040;
        direction: rtl; /* 👈 متن‌ها راست‌چین */
        overflow-y: scroll;
      }

      .sidebar a {
        text-decoration: none;
        display: block;
        padding: 12px 20px;
        text-align: right;
      }

      .sidebar a:hover {
        background-color: #495057;
      }

      .sidebar.closed {
        transform: translateX(100%);
      }

      .menu-toggle {
        direction: rtl;
      }

      body.sidebar-closed {
        padding-right: 0;
      }

      .main-content {
        padding-top: 60px;
      }

      .navbar{
        box-shadow: 5px 5px 4px #d5d5d5;
      }
      .mohtava1 ul {
        gap: 1rem;
        list-style: none;
      }
      .mohtava1 ul li a{
        text-decoration: none;
      }
      .logo img {
        position: relative;
        bottom: 30px;
        margin-right: 10px;
      }
      .dropdown-toggle::after{
        display: none;
      }
      .sod-icon{
        background-color:#a0def5;
    width: 2.5rem;
    padding: 5px;
    border-radius: 50%;
      }
      .btn-all{
        padding: 5px;
    border-radius: 10px;
    box-shadow: 5px 5px 4px #cacaca;
      }
      .darsad span{
        padding: 3px;
    background-color: #d1ffd1;
    border-radius: 10px;
    color: green;
    font-weight: bold;
      }
      .darsad-dng span{
        padding: 3px;
    background-color: #ffe2e2;
    border-radius: 10px;
    color: red;
    font-weight: bold;
      }
      /* .card-body{
        height: 457px;
      } */

    </style>
  </head>
  <body>
    <!-- سایدبار -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img style="width: 145px;" src="https://ecme2.savisapp.ir/_next/image?url=%2Fimg%2Flogo%2Flogo-light-full.png&w=256&q=75">
        </div>
        <ul class="d-flex flex-column" style="gap: 0.7rem;">
          <p class="fw-bold" style="font-size: 17px;">داشبورد</p>
            <li style="list-style: none;" class="d-flex">
                <p>
                    <i class="fa-solid fa-cart-shopping fa-lg"></i>
                    <p class="fw-bold" style="margin-right: 5px;">فروشگاه آنلاین</p>
                </p>
            </li>

            <li style="list-style: none;" class="d-flex">
                <p>
                    <i class="fa-solid fa-rocket fa-lg"></i>
                    <p class="fw-bold" style="margin-right: 5px;">پروژه ها</p>
                </p>
            </li>

            <li style="list-style: none;" class="d-flex">
                <p>
                    <i class="fa-solid fa-volume-high fa-lg"></i>
                    <p class="fw-bold" style="margin-right: 5px;">بازاریابی</p>
                </p>
            </li>

            <li style="list-style: none;" class="d-flex">
                <p>
                    <i class="fa-solid fa-chart-simple fa-lg"></i>
                    <p class="fw-bold" style="margin-right: 5px;">تحلیل</p>
                </p>
            </li>
        </ul>

        <div class="accordion accordion-flush d-flex flex-column" id="accordionFlushExample" style="gap: 0.5rem;">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <i class="fa-solid fa-star ms-2"></i>
        <span style="margin-right: 6px;font-size:14px;" class="flex-grow-1 text-end fw-bold">هوش مصنوعی</span>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul>
          <p>گفت و گو</p>
          <p>تصویر</p>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        <i class="fa-solid fa-calendar fa-lg"></i>
        <span style="margin-right: 7px;font-size:14px" class="flex-grow-1 text-end fw-bold">پروژ ها</span>
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul>
          <p>تابلوی اسکرام</p>
          <p>فهرست</p>
          <p>جزییات</p>
          <p>وظایف</p>
          <p>مسایل</p>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        <i class="fa-solid fa-users fa-lg"></i>
        <span style="margin-right: 7px;font-size:14px" class="flex-grow-1 text-end fw-bold">مشتریان</span>
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul>
          <p>فهرست</p>
          <p>ویرایش</p>
          <p>ایجاد</p>
          <p>جزییات</p>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
        <i class="fa-solid fa-box fa-lg"></i>
        <span style="margin-right: 7px;font-size:14px" class="flex-grow-1 text-end fw-bold">محصولات</span>
      </button>
    </h2>
    <div id="flush-collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul>
          <p>فهرست</p>
          <p>ویرایش</p>
          <p>ایجاد</p>
        </ul>
      </div>
    </div>
  </div>

<div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
        <i class="fa-solid fa-cart-shopping fa-lg"></i>
        <span style="margin-right: 7px;font-size:14px" class="flex-grow-1 text-end fw-bold">سفارش ها</span>
      </button>
    </h2>
    <div id="flush-collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul>
          <p>فهرست</p>
          <p>ویرایش</p>
          <p>ایجاد</p>
          <p>جزییات</p>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
        <i class="fa-solid fa-user fa-lg"></i>
        <span style="margin-right: 7px;font-size:14px" class="flex-grow-1 text-end fw-bold">حساب کاربری</span>
      </button>
    </h2>
    <div id="flush-collapsesix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul>
          <p>تنظیمات</p>
          <p>سابقه فعالیت</p>
          <p>نقش ها و دسترسی ها</p>
          <p>تعرفه ها</p>
        </ul>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
        <i class="fa-solid fa-circle-question fa-lg"></i>
        <span style="margin-right: 7px;font-size:14px" class="flex-grow-1 text-end fw-bold">مرکز راهنمایی</span>
      </button>
    </h2>
    <div id="flush-collapseseven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul>
          <p>مرکز پشتیبانی</p>
          <p>مقاله</p>
          <p>ویرایش مقاله</p>
          <p>مدیریت مقاله</p>
        </ul>
      </div>
    </div>
  </div>

  <ul class="d-flex flex-column mt-5" style="gap: 0.5rem;">
            <li style="list-style: none;">
                <p>
                    <i class="fa-solid fa-calendar-days fa-lg"></i>
                   تقویم
                </p>
            </li>

            <li style="list-style: none;">
                <p>
                    <i class="fa-solid fa-file fa-lg"></i>
                    مدیریت فایل
                </p>
            </li>

            <li style="list-style: none;">
                <p>
                    <i class="fa-solid fa-envelope fa-lg"></i>
                    ایمیل
                </p>
            </li>

            <li style="list-style: none;">
                <p>
                    <i class="fa-solid fa-chart-simple fa-lg"></i>
                    تحلیل
                </p>
            </li>
        </ul>

  
</div>    
</div>

    <div class="navbar">
        <div class="mohtava1" style="margin-top: 8px;">
            <ul style="display: flex;">
                <li><a href="#">
                  <li class="nav-item dropdown" style="width: 35px;background-color:gray;border-radius:50%;padding:5px;">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i style="position: relative;left:4px;" class="fa-solid fa-user fa-lg"></i>
          </a>
          <ul class="dropdown-menu text-end">
            <li><a class="dropdown-item" href="#">
              <p><?php echo $_SESSION['Username']; ?></p>
              <li><a style="font-size: 14px;" class="dropdown-item fw-bold" href="#">
              <p id='demo'></p>
            </a></li>
              <p><?php echo $_SESSION['Email']; ?></p>
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <div class="log d-flex flex-column" style="gap: 0.7rem;">
              <li><a href="#" style="margin-right: 10px;" class="text-dark">پروفایل</a></li>
            <li><a href="#" style="margin-right: 10px;" class="text-dark">تنظیمات حساب</a></li>
            <li><a href="#" style="margin-right: 10px;" class="text-dark">لاگ فعالیت</a></li>
            </div>
            <li><hr class="dropdown-divider"></li>
            <li><button id="logoutBtn" class="border-0 bg-light">خروج</button></li>
          </ul>
        </li>
      </a></li>
                <li class="nav-item dropdown mt-1">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-gear fa-xl" style="color: gray;"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        

                <li class="nav-item dropdown mt-1">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-bell fa-xl">
              <span></span>
            </i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        
            </ul>
        </div>
        <div class="mohtava2 d-flex" style="margin-right: 25px;">
            <div class="mohtavaSearch">
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <input style="width: 90%;direction:rtl;" class="border-0" type="search" placeholder="دنبال چی میگردی">
      </div>
      <div class="modal-body">
        Show a second modal and hide this one with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>
<button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="border: 0;margin-top:7px;">
    <i class="fa-solid fa-magnifying-glass fa-lg"></i>
</button>
                </div>
                <button class="btn btn-outline-secondary menu-toggle" style="border: 0;font-size:1.5rem;font-weight:bold;color:black;">☰</button>

                <!-- <button id="theme-toggle">DarkMode</button> -->
            </div>
    </div>

    <div class="container-fluid" style="background-color: #dfdfdf;">
  <div class="row">
    <!-- ستون چپ -->
    <div class="col-lg-4" style="margin-top: 20px;">
      <!-- هدف فروش -->
      <div class="card text-center mb-4" style="margin-top: 40px;border-radius:17px;">
        <div class="card-body">
       <h6 class="card-title fw-bold mb-3" style="text-align: right;font-size:21px;">هدف فروش</h6>

      <!-- دایره درصد -->
      <div class="position-relative d-inline-block" style="width: 100px; height: 100px;float:left;">
      <svg class="position-absolute top-0 start-0" width="100" height="100">
        <circle cx="50" cy="50" r="45" stroke="#e5e7eb" stroke-width="10" fill="none" />
        <circle id="progressCircle" cx="50" cy="50" r="45" stroke="#3b82f6" stroke-width="10" fill="none"
                stroke-dasharray="282.6"
                stroke-dashoffset="70"
                stroke-linecap="round"
                transform="rotate(-90 50 50)" />
      </svg>
      <div class="position-absolute top-50 start-50 translate-middle fw-bold" style="font-size: 18px;">75%</div>
    </div>

    <!-- عددها -->
     <div class="adadha text-end" style="position: relative;top:10px;">
      <div class="vahed d-flex justify-content-end">
        <p class="mt-3 fw-bold mb-0"><p>واحد</p>1.3K / 1.8K</p>
      </div>
    <small class="text-muted fw-bold" style="color: gray;">این ماه سال ساخته شده است</small>
     </div>
  </div>
      </div>

      <!-- محصول برتر -->
      <div class="card">
        <div class="card-body">
          
            <button class="border-0 btn-all">مشاهده همه</button>
            <h5 class="card-title text-end" style="position:relative;bottom:26px;">محصول برتر</h5>
          
          <ul class="list-group list-group-flush text-end">
            <div class="list-mahsol d-flex justify-content-between m-2">
              <div class="darsad"><span>+15.2%</span></div>
              <div class="card-item">
                <p class="fw-bold">Maneki Neko Poster</p>
              </div>
            </div>
            <div class="list-mahsol d-flex justify-content-between m-2">
              <div class="darsad"><span>+13.9%</span></div>
              <div class="card-item">
                <p class="fw-bold">Echoes Necklace</p>
              </div>
            </div>
            <div class="list-mahsol d-flex justify-content-between m-2">
              <div class="darsad"><span>+9.5%</span></div>
              <div class="card-item">
                <p class="fw-bold">Spiky Ring</p>
              </div>
            </div>
            <div class="list-mahsol d-flex justify-content-between m-2">
              <div class="darsad"><span>+2.3%</span></div>
              <div class="card-item">
                <p class="fw-bold">Pastel Petals Poster</p>
              </div>
            </div>
            <div class="list-mahsol d-flex justify-content-between m-2">
              <div class="darsad-dng"><span>-0.7%</span></div>
              <div class="card-item">
                <p class="fw-bold">Il Limone</p>
              </div>
            </div>
            <div class="list-mahsol d-flex justify-content-between m-2">
              <div class="darsad-dng"><span>-1.1%</span></div>
              <div class="card-item">
                <p class="fw-bold">Ringed Earring</p>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </div>

    <!-- ستون راست -->
    <div class="col-lg-8">
      <p class="fw-bold text-end" style="font-size: 20px;margin-top:20px;">نظرسنجی</p>
      <!-- سه باکس آماری -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="row">
<div class="card text-center" style="border-radius: 20px;">
            <div class="card-body" style="padding: 10px;">
              <div class="sod d-flex mb-3">
                <div class="sod-icon" style="position: relative;top:10px;">
                  <i class="fa-solid fa-eye fa-xl"></i>
                </div>
                <div class="sod-text" style="position: absolute;right:0;margin-right:10px;">
                  <p class="card-text fw-bold" style="color: gray;">برداشت</p>
                </div>
              </div>
              <div class="price1 d-flex justify-content-end" style="margin-right: 10px;">
                <h4 class="fw-bold">تومان</h4>
                <h4 class="fw-bold">3.1M</h4>
              </div>
              <small class="text-success d-flex fw-bold" style="float: right;margin-right:10px;"><p style="color: gray;">از ماه گذشته</p>+4.6٪</small>
            </div>
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center" style="border-radius: 20px;">
            <div class="card-body" style="padding: 10px;">
              <div class="sod d-flex mb-3">
                <div class="sod-icon" style="position: relative;top:10px;">
                  <i class="fa-solid fa-bag-shopping fa-xl"></i>
                </div>
                <div class="sod-text" style="position: absolute;right:0;margin-right:10px;">
                  <p class="card-text fw-bold" style="color: gray;">کل سفارش</p>
                </div>
              </div>
              <div class="price1 d-flex justify-content-end" style="margin-right: 10px;">
                <h4 class="fw-bold">7.324</h4>
              </div>
              <small class="d-flex fw-bold" style="float: right;color:red;margin-right:10px;"><p style="color: gray;">از ماه گذشته</p>-2.8٪</small>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center" style="border-radius: 20px;">
            <div class="card-body" style="padding: 10px;">
              <div class="sod d-flex mb-3">
                <div class="sod-icon" style="position: relative;top:10px;">
                  <i class="fa-solid fa-money-bill fa-xl"></i>
                </div>
                <div class="sod-text" style="position: absolute;right:0;margin-right:10px;">
                  <p class="card-text fw-bold" style="color: gray;">سود کل</p>
                </div>
              </div>
              <div class="price1 d-flex justify-content-end" style="margin-right: 10px;">
                <h4 class="fw-bold">تومان</h4>
                <h4 class="fw-bold">۸۲٬۳۳۳٬۲۱</h4>
              </div>
              <small class="text-success d-flex fw-bold" style="float: right;margin-right:10px;"><p style="color: gray;">از ماه گذشته</p>+3.4٪</small>
            </div>
          </div>
        </div>
      </div>

<div class="card mb-4" style="margin-top: 4.5%;">
  <div class="card-body" style="height: 435px;">
    <h5 class="card-title">نمودار روند فروش</h5>
    <canvas id="salesChart" height="100"></canvas>
  </div>
</div>      
    </div>

    <div class="col-md-12" style="background-color: white;padding:20px;width:95%;margin:10px 20px;margin-left:50px;border-radius:10px;">
  <div class="row m-2">
    <table class="table" style="direction: rtl;">
      <p class="text-end fw-bold" style="font-size: 20px;">سفارشات اخیر</p>
  <thead>
    <tr>
      <th scope="col">سفارش</th>
      <th scope="col">وضعیت</th>
      <th scope="col">تاریخ</th>
      <th scope="col">مشتری</th>
      <th scope="col">	مبلغ صرف شده</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" style="color: #4e4e4e;">#92627</th>
      <td class="d-flex" style="gap: 0.7rem;">
        <i class="fa-solid fa-circle fa-xs" style="margin-top: 13px;color:green;"></i>
        <p class="fw-bold" style="color: green;">پرداخت شده</p>
      </td>
      <td>	1401/04/18</td>
      <td>Tara Fletcher</td>
      <td class="fw-bold">$279.00</td>
    </tr>
    <tr>
      <th scope="row" style="color: #4e4e4e;">#92509</th>
      <td class="d-flex" style="gap: 0.7rem;">
        <i class="fa-solid fa-circle fa-xs" style="margin-top: 13px;color:orange;"></i>
        <p class="fw-bold" style="color: orange;">در انتظار</p>
      </td>
      <td>1401/04/05</td>
      <td>Joyce Freeman</td>
      <td class="fw-bold">$831.00</td>
    </tr>
    <tr>
      <th scope="row" style="color: #4e4e4e;">#91631</th>
      <td class="d-flex" style="gap: 0.7rem;">
        <i class="fa-solid fa-circle fa-xs" style="margin-top: 13px;color:green;"></i>
        <p class="fw-bold" style="color: green;">پرداخت شده</p>
      </td>
      <td>1401/03/28</td>
      <td>Brittany Hale</td>
      <td class="fw-bold">$142.00</td>
    </tr>
    <tr>
      <th scope="row" style="color: #4e4e4e;">#90963</th>
      <td class="d-flex" style="gap: 0.7rem;">
        <i class="fa-solid fa-circle fa-xs" style="margin-top: 13px;color:green;"></i>
        <p class="fw-bold" style="color: green;">پرداخت شده</p>
      </td>
      <td>1401/03/21</td>
      <td>Luke Cook</td>
      <td class="fw-bold">$232.00</td>
    </tr>
    <tr>
      <th scope="row" style="color: #4e4e4e;">#89332</th>
      <td class="d-flex" style="gap: 0.7rem;">
        <i class="fa-solid fa-circle fa-xs" style="margin-top: 13px;color:orange;"></i>
        <p class="fw-bold" style="color: orange;">در انتظار</p>
      </td>
      <td>1401/03/12</td>
      <td>Eileen Horton</td>
      <td class="fw-bold">$597.00</td>
    </tr>
    <tr>
      <th scope="row" style="color: #4e4e4e;">#89107</th>
      <td class="d-flex" style="gap: 0.7rem;">
        <i class="fa-solid fa-circle fa-xs" style="margin-top: 13px;color:red;"></i>
        <p class="fw-bold" style="color: red;">شکست خورده</p>
      </td>
      <td>1401/01/27</td>
      <td>Frederick Adams</td>
      <td class="fw-bold">$72.00</td>
    </tr>
    <tr>
      <th scope="row" style="color: #4e4e4e;">#89021</th>
      <td class="d-flex" style="gap: 0.7rem;">
        <i class="fa-solid fa-circle fa-xs" style="margin-top: 13px;color:green;"></i>
        <p class="fw-bold" style="color: green;">پرداخت شده</p>
      </td>
      <td>1401/01/24</td>
      <td>Lee Wheeler</td>
      <td class="fw-bold">$110.00</td>
    </tr>
  </tbody>
</table>
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

      const myTimeout = setTimeout(myGreeting, 1000);

function myGreeting() {
  document.getElementById("demo").innerHTML = "مدیر برنامه به پنل خوش آمدید";
}

function myStopFunction() {
  clearTimeout(myTimeout);
}



//Chart
const ctx = document.getElementById('salesChart').getContext('2d');
  const salesChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['1403فروردین', '1403اردیبهشت', '1403خرداد', '1403تیر', '1403مرداد', '1403شهریور', '1403مهر'],
      datasets: [{
        label: 'مقدار فروش',
        data: [242, 334, 297, 364, 342, 431, 368],
        borderColor: '#3b82f6',
        backgroundColor: 'rgba(196, 219, 255, 0.2)',
        tension: 0.3,
        fill: true,
        pointRadius: 2,
        pointBackgroundColor: '#3b82f6',
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  //closeWindow
  document.getElementById("logoutBtn").addEventListener('click' , function() {
    window.close();

    window.location.href = "Adminlogin.php";

  });


  //DarkMode
  // const toggleButton = document.getElementById('theme-toggle');
  // // const body = document.body;

  // if (localStorage.getItem('theme') === 'dark') {
  //   body.classList.add('dark-mode');
  // }

  // toggleButton.addEventListener('click' , () => {
  //   body.classList.toggle('dark-mode');

  //   if(body.classList.contains('dark-mode')) {
  //     localStorage.setItem('theme' , 'dark');
  //   } else {
  //     localStorage.setItem('theme' , 'light');
  //   }
  // });
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>