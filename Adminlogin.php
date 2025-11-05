<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
body{
    direction: rtl;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.formasli{
width: 70%;
padding: 30px;
}
.logo img{
    width: 80px;
    padding: 5px;

}
.line{
  width: 25%;
  height: 3px;
  background-color: gray;
}
</style>
<body>


<div class="formasli col-md-12" style="margin-top: 5%;">
    <div class="lform d-flex">
      <div class="row">
<form class="row col-md-6 g-3 needs-validation" novalidate action="PanelAdmin.php" method="post">
  <div class="row">
    <div class="col-md-12 text-center logo d-flex">
        <img src="https://ecme.savisapp.ir/img/logo/logo-light-streamline.png">
    </div>
    <div class="welcome">
    <p class="fw-bold fs-3">خوش آمدید!</p>
    <p style="font-size: 13px;" class="fw-bold">لطفاً اطلاعات کاربری خود را برای ورود وارد کنید!</p>
    </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">ایمیل</label>
    <input style="max-width: 380px;" name="email" type="email" class="form-control m-1" id="validationCustom01" placeholder="ایمیل" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>


  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">رمز عبور</label>
    <input style="max-width: 380px;" name="password" type="password" class="form-control m-2" id="validationCustom03" placeholder="رمزعبور" required>
    <a href="#" class="text-dark fw-bold" style="text-decoration: none;font-size:14px;">فراموشی رمزعبور</a>
  </div>
  
  
  <div class="col-md-12">
    <button style="width: 87%;padding:10px;" class="btn btn-primary m-1" type="submit" value="ورود" onclick="myStopFunction()">ورود</button>
  </div>

  <div class="edame d-flex mt-3 gap-2 justify-content-center" style="align-items: center;">
    <div class="line flex-1">
    </div>
    <p class="fw-bold" style="font-size: 12px;">یا ادامه دهید با</p>
    <div class="line flex-1">
    </div>
  </div>

  <div class="hesab col-md-12">
    <div class="col-6">
      <div class="icon">

      </div>
    </div>

    <div class="col-6">
     <div class="icon">

      </div>
    </div>

  </div>
  </div>
</form>
<div class="col-md-6">
  <div class="row">
<img src="https://ecme2.savisapp.ir/img/others/auth-split-img.png" style="background-color: blue;border-radius:10px;padding:20px;">
  </div>
</div>
    </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>