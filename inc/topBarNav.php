 <!-- Navigation-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
   <div class="container-fluid">
     <a class="navbar-brand" href="index.php"><span class="text-white">Easy<sup><img src="images/ring.png" alt=""></sup>Marriage</span></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
       Menu
       <i class="fas fa-bars ms-1"></i>
     </button>
     <div class="collapse navbar-collapse" id="navbarResponsive">
       <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
         <li class="nav-item"><a class="nav-link" href="<?php echo $page != 'home' ? './' : ''  ?>">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="./?page=packages">Packages</a></li>
         <li class="nav-item"><a class="nav-link" href="./?page=services">Services</a></li>
         <li class="nav-item"><a class="nav-link" href="./?page=blog">Blog</a></li>
         <li class="nav-item"><a class="nav-link" href="./?page=shop">Shop</a></li>
         <li class="nav-item"><a class="nav-link" href="./?page=feedback">Feedback</a></li>
         <li class="nav-item"><a class="nav-link" href="<?php echo $page != 'home' ? './' : ''  ?>#about">About</a></li>
         <li class="nav-item"><a class="nav-link" href="<?php echo $page != 'home' ? './' : ''  ?>#contact">Contact</a></li>
         <li class="nav-item"><a class="nav-link" href="./?page=cart"><i class="fa-solid fa-cart-shopping"></i></a></li>
         <?php if (isset($_SESSION['userdata'])) : ?>
           <li class="nav-item"><a class="nav-link" href="./?page=my_account"><i class="fa fa-user"></i> Hi, <?php echo $_settings->userdata('firstname') ?></a></li>

           <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i></a></li>
         <?php else : ?>
           <li class="nav-item"><a href="javascript:void(0)" id="login_btn" class="nav-link login_btn"><i class="fa-solid fa-user-plus"></i></a></li>

         <?php endif; ?>
       </ul>
     </div>
   </div>
 </nav>
 <script>
   $(function() {
     $('#login_btn').click(function() {
       uni_modal("", "login.php", "large")
     })
     $('#navbarResponsive').on('show.bs.collapse', function() {
       $('#mainNav').addClass('navbar-shrink')
     })
     $('#navbarResponsive').on('hidden.bs.collapse', function() {
       if ($('body').offset.top == 0)
         $('#mainNav').removeClass('navbar-shrink')
     })
   })
 </script>
 <style>
   #mainNav .navbar-nav .nav-item .nav-link {
     font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
     font-size: 0.95rem;
     color: #fff;
     letter-spacing: 0.0625em;
   }

   #mainNav .navbar-nav .nav-item .nav-link.active,
   #mainNav .navbar-nav .nav-item .nav-link:hover {
     color: aqua;
     scale: 1.2;
   }

   #mainNav.navbar-shrink {
     background-color: #845ec2;
   }
 </style>