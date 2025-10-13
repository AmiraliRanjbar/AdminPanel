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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body {
        transition: padding-right 0.3s ease;
        padding-right: 270px;
        direction: rtl;
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
      table{
        direction: rtl;
        max-width:80%;
        margin-top: 5%;
      }
      .tableheader{
        background-color: gray;
    padding: 30px;
    display: flex;
    margin: 10px 20px 5px 30px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
      }
#tablecontainer{
    background-color: gainsboro;
    padding: 20px;
}
</style>
<body>
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
            </div>

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
    </div>

    <?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$databasename = "adminpanelproject";

$conn = new mysqli($servername, $username, $password, $databasename);;
if($conn->connect_error) {
    die ("اتصال به دیتابیس نا موفق بود" .$conn->connect_error);
}

$sql = "SELECT username, email, location, status, spent FROM customeradmin WHERE id >= 1";
$result = $conn->query($sql);

$users = [];
if($result && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $users[] = $row;
  }
} else {
  echo "<p>هیچ داده ای برای نمایش وجود ندارد</p>";
  $conn->close();
  exit;
}

$conn->close();

     ?>
    <section class="container" id="tablecontainer">
      <div class="row">
        <h3 class="fw-bold">مشتریان</h3>
        <div class="searchbar">
          <input type="text" placeholder="سریع تر جست و جو کن" />
        </div>

        <div class="table-responsive">
        <table class="table">
         <thead>
    <tr>
      <th scope="col">
        <input type="checkbox">
      </th>
      <th>نام</th>
      <th scope="col">ایمیل</th>
      <th scope="col">مکان</th>
      <th scope="col">وضعیت</th>
      <th scope="col">صرف کرده</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
    <tr>
                <td><input type="checkbox"></td>
                <td><?= htmlspecialchars($user['username']) ?>
              <div class="memberimg">
          <img style="border-radius: 50%;width:20px;" src="https://ecme2.savisapp.ir/img/avatars/thumb-2.jpg">
        </div>
              </td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['location']) ?></td>
                <td><?= htmlspecialchars($user['status']) ?></td>
                <td><?= htmlspecialchars($user['spent']) ?></td>
            </tr>
            <?php endforeach; ?>
      <th scope="row">
        <input type="checkbox">
      </th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">
        <input type="checkbox">
      </th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
        </div>
      </div>
    </section>
    



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
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>