<?php

session_start();

include("admin/includes/database.php");
if(!isset($_SESSION['cart']) || !isset($_SESSION['user_id'])) {
    echo "<script>window.open('cart.php','_self')</script>";
}
else 


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FlipMarttv</title>
  <meta charset="utf-8">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
      .nav-link {
          color: white !important;
      }
      .nav-link:hover {
        color: #ffc108 !important;
      }
      .cart-amount {
        top: -13px;
        right: -10px;
        min-width: 20px;
        min-height: 20px;
        border-width: 2px;
        border-radius: 50%;
        font-size: 12px;
    }
    enav:disabled {
        color: black;
    }
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
    }
    button:focus {outline:0;}

  </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark sticky-top shadow-lg py-2">
        <div class="container">
            <a class="navbar-brand" href="index.php"><span class="text-warning">FlipMarttv</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
    
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Trang Chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">Sản Phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="introduce.php">Giới Thiệu</a>
            </li>
            
          </ul>

          <form class="form-inline" method="get" action="search.php">
            <input style="width:250px; background:#D3D3D3" class="form-control-sm mr-sm-2 border-0" type="search" name="keyword"  placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn my-sm-0 "><a class="text-light"><i class="fas fa-search"></i></i></a></button>
            <a href="cart.php" class="btn my-sm-0 border-0 bg-transparent text-light">
                <i class="fas fa-shopping-cart position-relative">
                <?php
                    
                    $total_price = 0;
                    $total_qty = 0;
                    if(isset($_SESSION['cart'])) {
                        foreach($_SESSION['cart'] as $value) {
                            $total_qty += $value["quantity"];
                            $total_price += (int)$value["price"]*$value["quantity"];
                        } 
                    }
                ?>
                <div class="cart-amount bg-warning position-absolute text-white d-flex justify-content-center align-items-center font-weight-bold">
                <span id="cart_amount"><?php echo $total_qty ?></span>
                </div></i>
            </a>
            <?php
            if(!isset($_SESSION['user_email'])) {

               echo  "<a class='btn my-sm-0 border-0' data-toggle='modal' data-target='#loginModal'><i class='fas fa-user text-light'></i></a>";

            }
            else {

                include("usernav.php");
            }
            ?>
          </form>
        </div>        
    </nav>
    
    <div class="container pb-5 position-relative pt-2">
            <div class="mt-5 d-block ">
                <ul class="nav nav-pills nav-fill border-0 rounded-0">
                    <li class="flex-grow-1 text-center nav-item">
                        <a href="" class="m-0 px-0 py-3 bg-success text-muted nav-link disabled font-weight-bold rounded-0 nav-link border-right">Giỏ Hàng</a>
                    </li>
                    <li class="flex-grow-1 text-center nav-item">
                        <a class="m-0 px-0 py-3 bg-success text-muted nav-link disabled font-weight-bold rounded-0 nav-link border-right">Vận Chuyển</a>
                    </li>
                    <li class="flex-grow-1 text-center nav-item">
                        <a class="m-0 px-0 py-3 bg-warning text-light nav-link disabled active font-weight-bold rounded-0 nav-link border-right">Thanh Toán</a>
                    </li>
                    <li class="flex-grow-1 text-center nav-item">
                        <a class="m-0 px-0 py-3 bg-warning text-muted nav-link disabled  font-weight-bold rounded-0 nav-link">Xác Nhận Đơn Hàng</a>
                    </li>
                </ul>
            </div>


            <div class="my-5 d-block">
                
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <h4 class="font-weight-bold mb-4">Chọn phương thức thanh toán</h4>

                            <div class="form-check ml-4 my-3">
                                <input type="radio" class="form-check-input mt-2" id="cod" name="paymentMethod" checked>
                                <label for="cod" class="form-check-label"><i class="fas fa-money-bill-alt fa-2x"></i> COD - Thanh toán khi nhận hàng</label>    
                            </div>
                            <div class="form-check ml-4 my-3">
                            
                                <input type="radio" class="form-check-input mt-2" id="visa" name="paymentMethod">
                                <label for="visa" class="form-check-label"><i class="fab fa-cc-visa fa-2x"></i> Thanh toán bằng thẻ quốc tế Visa, Mastercard</label>
   
                            </div>
                            <div class="form-check ml-4 my-3">
                               
                                <input type="radio" class="form-check-input mt-2" id="atm" name="paymentMethod">
                                <label for="atm" class="form-check-label"><i class="fab fa-cc-amazon-pay fa-2x"></i> Thẻ ATM nội địa/Internet Banking</label>
  
                            </div>
                        

                            <a href="submitOrder.php" class="btn btn-block btn-lg btn-danger font-weight-bold mt-4">Xác nhận hình thức thanh toán</a>
                        </div>
                    </div>
            </div>
    </div>
    
    <footer class="bg-secondary">
        <div class="container-fuild text-light">
            <div class="row card-deck pt-3">
                <div class="col-md-5 pr-0">
                    <div class="card border-0 bg-secondary ml-4">
                        <div class="card-header bg-secondary border-0"><h4>ĐỊA CHỈ</h4></div>
                        <div class="card-body border-0">
                            <p>180 Cao Lỗ, Phường 3, Quận 8, Thành phố Hồ Chí Minh</p>
                        </div>
                    </div>
                </div>
                <div class="col-md pl-0">
                    <div class="card border-0 bg-secondary ml-4">
                        <div class="card-header bg-secondary border-0"><h4>CHÍNH SÁCH & DỊCH VỤ</h4></div>
                        <div class="card-body border-0">
                            <a href="#" class="text-light text-decoration-none pb-3"><i class="fas fa-shipping-fast mr-2"></i>Vận chuyển</a><br>
                            <a href="#" class="text-light text-decoration-none pb-3"><i class="fas fa-money-check-alt mr-2"></i>Thanh toán</a><br>
                            <a href="#" class="text-light text-decoration-none pb-3"><i class="fas fa-exchange-alt mr-2"></i>Đổi trả</a>
                        </div>
                    </div>
                </div> 
                <div class="col-md">
                    <div class="card border-0 bg-secondary mx-0 ml-4">
                        <div class="card-header bg-secondary border-0"><h4>LIÊN HỆ</h4></div>
                        <div class="card-body border-0">
                            <p><i class="fas fa-phone-alt mr-2"></i>SĐT: 0123456789 <br>
                            <i class="fab fa-facebook"></i> Facebook: Hùng Nguyễn <br>
                            <i class="fab fa-instagram"></i> Instagram: hungnguyen.my
                        </p>
                        </div>
                    </div>
                </div>             
            </div>
        </div>
    </footer>












    <?php include("login_registry_modal.php"); ?> 
</body>
</html>