<!--them-->
<!-- Slide Show -->
                 <!--them-->
<!-- Slide Show -->

                  <div id="carouselId" class="carousel slide my-2" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-fade" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-fade" data-slide-to="1" ></li>
                        <li data-target="#carousel-fade" data-slide-to="2" ></li>
                    </ol>
                
                    <div class="carousel-inner" role="listbox">
                      <div class="carousel-item embed-responsive-item active">
                        <img src="img/slide-img/sl7.png" alt="First slide image" width="100%" height="100%" class="img-fluid">
                        
                      </div>
                
                      <div class="carousel-item embed-responsive-item">
                        <img src="img/slide-img/sl2.jpg" alt="Second slide image" class="img-fluid">
                      
                      </div>
                
                      <div class="carousel-item embed-responsive-item">
                        <img src="img/slide-img/sl3.jpg" alt="Third slide image" class="img-fluid">
                      
                      </div>
                    </div>
                
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Trước</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Sau</span>
                    </a>
                </div>
               

                
                <!-- Start Contact Bar -->
                  <div id="contact-bar">
                    <div class="container">
                      <?php      
            			$sql="SELECT * FROM thongtin_web";
						if($db->num_rows($sql))
						{
							foreach($db->fetch_assoc($sql, 0) as $key => $row)
							{
								echo '
								<div class="row">
                        <!--  -->
                        <div class="col-md-4">
                          <div class="row conten-contact">
                            <div class="col-md-2">
                              <i class="fas fa-phone icon-contact-bar"></i>
                            </div>
                            <div class="col-md-10 text-contact-bar">
                              <p>Hotline</p>
                              '.$row['Hotline'].' 
                            </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="col-md-4">
                            <div class="row conten-contact">
                              <div class="col-md-2">
                                  <i class="fas fa-clock icon-contact-bar"></i>
                              </div>
                              <div class="col-md-10 text-contact-bar">
                                <p>Trung tâm hoạt động</p>
                                '.$row['GioLam'].'
                              </div>
                            </div>
                        </div>
								';
							}
						}
					?>      
                      
    
                          <!--  -->
                        <div class="col-md-4">
                              <div class="row conten-contact">
                                <div class="col-md-2">
                                    <i class="fas fa-envelope-open-text icon-contact-bar"></i>
                                </div>
                                <div class="col-md-10 text-contact-bar">
                                  <p>E-mail</p>
                                  <p>tinhocK&Qs@gmail.com</p>
                                </div>
                              </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- End Contact Bar -->
