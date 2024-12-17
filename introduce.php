<?php

session_start();

include("admin/includes/database.php");
$MyConn = new MyConnect();


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
    .p:hover {
    box-shadow: 0 0 11px rgba(33,33,33,.2); 
}
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


    <div class="container my-5">
    <!-- Phần Giới Thiệu -->
    <h1 class="section-header">Lịch Sử Của FlipMarttv</h1>
    <p>
         - FlipMarttv là một thương hiệu chuyên kinh doanh quần áo thời trang, được thành lập từ năm 2015. Chúng tôi bắt đầu từ một cửa hàng nhỏ tại TP. Hồ Chí Minh và không ngừng phát triển nhờ sự ủng hộ của quý khách hàng.  
    </p>
    <p>
         - Với mục tiêu mang đến những sản phẩm thời trang chất lượng, hiện đại và giá cả hợp lý, FlipMarttv cam kết đáp ứng mọi nhu cầu mua sắm của bạn. Hãy ghé thăm cửa hàng hoặc mua sắm trực tuyến để trải nghiệm sự khác biệt!
    </p>
    <p?>
        - Mang đến sự thoải mái ,với những sợi vãi conton 100% ,mang đến sự thoải mái cho người dùng .
    </p>
    
    <!-- Google Map -->
    <h2 class="section-header">Địa Chỉ Cửa Hàng</h2>
    <p>Địa chỉ: 180 Cao Lỗ, Phường 3, Quận 8, Thành phố Hồ Chí Minh</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3261.292201486988!2d106.67980457406988!3d10.759501159507645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b632ad9fd%3A0xc708f6b44a2df3af!2zMjczIMSQLiBBbiBExrDGoW5nIFbGsMahbmcsIFBoxrDhu51uZyAzLCBRdeG6rW4gNSwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e1!3m2!1svi!2s!4v1732800556589!5m2!1svi!2s" 
        width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    
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
                            <i class="fab fa-facebook"></i> Facebook: Hùng Nguyễn Shop <br>
                            <i class="fab fa-instagram"></i> Instagram: hungnguyen.my
                        </p>
                        </div>
                    </div>
                </div>             
            </div>
        </div>
    </footer>
    