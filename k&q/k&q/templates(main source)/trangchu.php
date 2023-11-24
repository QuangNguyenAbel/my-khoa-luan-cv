 <?php 
  $sql = "select * from tin_tuc";
require_once 'head_f/slide.php';
  ?>
 <header>
   <script type="text/javascript">
     if (self === top) {
       var antiClickjack = document.getElementById("antiClickjack");
       antiClickjack.parentNode.removeChild(antiClickjack);
     } else {
       top.location = self.location;
     }
   </script>
 </header>
 <div id="about-center">
   <div class="container">
     <div class="row">
       <div class="col-md-6">
         <h2 class="about-us-title">GIỚI THIỆU | TRUNG TÂMTIN HỌC K&Q UY TÍN </h2>
         <div class="about-us-description">
           <p>Trung tâm tin học K&Q là trung tâm đặt uy tín lên hàng đầu, đảm bảo chất lượng đầu ra. Với đội ngũ nhân viên và giảng viên ưu tú chúng tôi cam kết học viên sẽ hoàn toàn hài lòng về các dịch vụ mà trung tâm mang lại.</p>
           <p>Trung tâm tin học K&Q chuyên đào tạo các khóa tin học văn phòng từ cơ bản đến nâng cao cùng với đó chúng tôi cũng chuyên đào tạo các khóa học lập trình PHP,Java,C,C++,C#,... Mong các quý học viên sẽ tin tưởng và chọn K&Q đồng hành cùng các bạn.</p>
         </div>
         <div class="btn-about-us">
           <a href="<?php echo $_DOMAIN; ?>gioithieu" class="btn btn-outline-danger">Xem thêm</a>
         </div>
       </div>
       <div class="col-md-6">
         <div class="about-us-img">
           <img src="img/background-img/bk1.jpg" alt="" width="622" height="328">
         </div>
       </div>
     </div>
   </div>
 </div>
 <div id="chinese-course">
   <div class="container">
     <h4 class="heading text-center">Khóa tin học văn phòng</h4>
     <div class="row">
       <div class="col-md-4">
         <div class="course-box">
           <div class="course-box-up">
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="img-course-box"><img src="img/index-img/thvpcb.png" alt=""></a>
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="title-course-box">
               <p>Tin học văn phòng cơ bản</p>
             </a>
           </div>
           <div class="course-box-down">
             <div class="row">
               <div class="col-md-7">
                 <span class="price-course-box">
                   1.350.000đ
                   <small>-10%</small>
                 </span>
                 <span class="price-course-box-through">1.500.000đ</span>
               </div>
               <div class="col-md-5">
                 <a href="<?php echo $_DOMAIN; ?>khoahoc" class="btn-detail-course-box">Xem</a>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-md-4">
         <div class="course-box">
           <div class="course-box-up">
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="img-course-box"><img src="img/index-img/excel.jpg" alt=""></a>
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="title-course-box">
               <p>Excel cơ bản</p>
             </a>
           </div>
           <div class="course-box-down">
             <div class="row">
               <div class="col-md-7">
                 <span class="price-course-box">
                   500.000đ
                   <small>-50%</small>
                 </span>
                 <span class="price-course-box-through">1.000.000đ</span>
               </div>
               <div class="col-md-5">
                 <a href="<?php echo $_DOMAIN; ?>khoahoc" class="btn-detail-course-box">Xem</a>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-md-4">
         <div class="course-box">
           <div class="course-box-up">
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="img-course-box"><img src="img/index-img/pp.jpg" alt=""></a>
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="title-course-box">
               <p>PowerPoint Cơ bản</p>
             </a>
           </div>
           <div class="course-box-down">
             <div class="row">
               <div class="col-md-7"><span class="price-course-box">500.000đ <small>-50%</small> </span> <span class="price-course-box-through">1.000.000đ</span></div>
               <div class="col-md-5">
                 <a href="<?php echo $_DOMAIN; ?>khoahoc" class="btn-detail-course-box">Xem</a>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div id="korean-course">
   <div class="container">
     <h4 class="heading text-center">Khóa Học lập trình</h4>
     <div class="row">
       <div class="col-md-4">
         <div class="course-box">
           <div class="course-box-up">
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="img-course-box"><img src="img/index-img/php.jpg" alt=""></a>
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="title-course-box">
               <p>Lập trình PHP cơ bản</p>
             </a>
           </div>
           <div class="course-box-down">
             <div class="row">
               <div class="col-md-7">
                 <span class="price-course-box">
                   1.350.000đ
                   <small>-10%</small>
                 </span>
                 <span class="price-course-box-through">1.500.000đ</span>
               </div>
               <div class="col-md-5">
                 <a href="<?php echo $_DOMAIN; ?>khoahoc" class="btn-detail-course-box">Xem</a>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-md-4">
         <div class="course-box">
           <div class="course-box-up">
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="img-course-box"><img src="img/index-img/java.jpg" alt=""></a>
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="title-course-box">
               <p>Lập trình Java cơ bản</p>
             </a>
           </div>
           <div class="course-box-down">
             <div class="row">
               <div class="col-md-7">
                 <span class="price-course-box">
                   3.350.000đ
                   <small>-10%</small>
                 </span>
                 <span class="price-course-box-through">3.500.000đ</span>
               </div>
               <div class="col-md-5">
                 <a href="<?php echo $_DOMAIN; ?>khoahoc" class="btn-detail-course-box">Xem</a>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-md-4">
         <div class="course-box">
           <div class="course-box-up">
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="img-course-box"><img src="img/index-img/web.jpg" alt=""></a>
             <a href="<?php echo $_DOMAIN; ?>khoahoc" class="title-course-box">
               <p>Khóa học lập trình web</p>
             </a>
           </div>
           <div class="course-box-down">
             <div class="row">
               <div class="col-md-7">
                 <span class="price-course-box">
                   4.350.000đ
                   <small>-10%</small>
                 </span>
                 <span class="price-course-box-through">4.500.000đ</span>
               </div>
               <div class="col-md-5">
                 <a href="<?php echo $_DOMAIN; ?>khoahoc" class="btn-detail-course-box">Xem</a>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div id="rate">
   <div class="container">
     <h4 class="heading text-center">Tại sao nên chọn K&Q?</h4>
     <div class="row">
       <div class="col-md-6">
         <ul>
           <li>
             <div class="row">
               <div class="col-md-1">
                 <i class="fas fa-chalkboard-teacher icon-rate"></i>
               </div>
               <div class="col-md-11">
                 <p class="text-rate"><strong style="color: #e74c3c">Đội ngũ giáo viên</strong> có trình độ chuyên môn về nhiều ngôn ngữ lập trình và thông thạo các ứng dụng trong Microsoft Office</p>
               </div>
             </div>
           </li>
           <li>
             <div class="row">
               <div class="col-md-1">
                 <i class="far fa-phone-laptop icon-rate"></i>
               </div>
               <div class="col-md-11">
                 <p class="text-rate"><strong style="color: #e74c3c">Cơ hội tiếp xúc với những công nghệ mới cập nhật liên tục</strong> thông qua sự giảng dạy của các giảng viên của K&Q-Những người liên tục theo dõi và cập nhật công nghệ mới và truyền tải đến sinh viên.</p>
               </div>
             </div>
           </li>
           <li>
             <div class="row">
               <div class="col-md-1">
                 <i class="fas fa-money-check-edit-alt icon-rate"></i>
               </div>
               <div class="col-md-11">
                 <p class="text-rate"><strong style="color: #e74c3c">Mức học phí</strong> cựu sinh viên học trên 3 khóa đảm bảo chất lượng ưu đãi giảm 10-20% mỗi khóa đăng ký mới</p>
               </div>
             </div>
           </li>
           <li>
             <div class="row">
               <div class="col-md-1">
                 <i class="fas fa-sparkles icon-rate"></i>
               </div>
               <div class="col-md-11">
                 <p class="text-rate"><strong style="color: #e74c3c">Chính sách ưu đãi:</strong> Có nhiều ưu đãi và phần quà hấp dẫn dành cho những học viên đăng kí học theo nhóm và ưu đãi cho những học viên giới thiệu bạn bè(mỗi người mà học viên giới thiệu sẽ giảm học phí cho học viên 10%)</p>
               </div>
             </div>
           </li>
         </ul>
       </div>
       <div class="col-md-6">
         <h6 class="title-rate-students">Cảm nhận học viên</h6>
         <!-- Slide Rate - How client say -->
         <div class="slides owl-carousel owl-theme">

           <div class="testimonial">
             <div class="test-info">
               <img class="test-pic" src="img/profile-img/pf1.png" alt="">
               <div class="test-name">
                 <span>Huyền Phạm</span>
                 @huyenpham
               </div>
             </div>
             <p>
               Sẽ giới thiệu cho bạn bè được biết đến và có cơ hội theo học trung tâm. Trung tâm có đội ngũ giáo viên nhiệt tình, dạy dễ vào. </p>
           </div>
           <div class="testimonial">
             <div class="test-info">
               <img class="test-pic" src="img/profile-img/pf1.png" alt="">
               <div class="test-name">
                 <span>Nguyễn Long</span>
                 @long21
               </div>
             </div>
             <p>
               Giáo viên nhiệt tình trong giảng dạy, sẽ còn giới thiệu cho bạn bè được biết đến trung tâm nhiều hơn
             </p>
           </div>
           <div class="testimonial">
             <div class="test-info">
               <img class="test-pic" src="img/profile-img/pf1.png" alt="">
               <div class="test-name">
                 <span>Phạm Như</span>
                 @phamnhu
               </div>
             </div>
             <p>
               Nhân viên rất nhiệt tình trong việc tư vấn. Các khóa học đáp ứng được nhu cầu làm việc của công ty</p>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 </body>
 </html>