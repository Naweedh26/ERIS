  <section id="banner">
   
  <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>innovation</h3> 
          <p>We create the opportunities</p> 
           
                </div>
              </li>
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Specialize</h3> 
          <p>Success depends on work</p> 
           
                </div>
              </li>
            </ul>
        </div>
  <!-- end slider -->
 
  </section> 
  <section id="call-to-action-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>We Provide ManPower Services</h3>
          <p>"Providing manpower services is at the core of Bucharest recruitment's mission. We specialize in offering a comprehensive range of workforce solutions tailored to meet the unique needs of our clients. Our expertise lies in recruiting, training, and deploying skilled and unskilled workers from diverse backgrounds and regions, ensuring that our clients have the right talent to achieve their business goals. We take pride in being a trusted partner in workforce management, enabling businesses to thrive and grow by leveraging our extensive experience and global network."</p>
        </div>
      </div>
    </div>
  </section>
  
  <section id="content">
    <div class="container">
        <div class="row">
      <div class="col-md-12">
        <div class="aligncenter"><h2 class="aligncenter">Company</h2>
      </div>
        <br/>
      </div>
    </div>

    <?php 
      $sql = "SELECT * FROM `tblcompany`";
      $mydb->setQuery($sql);
      $comp = $mydb->loadResultList();


      foreach ($comp as $company ) {
    
    ?>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-building-o"></i>
                <div class="info-blocks-in">
                    <h3><?php echo $company->COMPANYNAME;?></h3>
                    <p>Address :<?php echo $company->COMPANYADDRESS;?></p>
                    <p>Contact No. :<?php echo $company->COMPANYCONTACTNO;?></p>
                </div>
            </div>

    <?php } ?> 
  </div>
  </section>
  
  <section class="section-padding gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h2 >Popular Jobs</h2>  
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ">
          <?php 
            $sql = "SELECT * FROM `tblcategory`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<div class="col-md-3" style="font-size:15px;padding:5px">* <a href="'.web_root.'index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.'</a></div>';
            }

          ?>
        </div>
      </div>
 
    </div>
  </section>    
  <section id="content-3-10" class="content-block data-section nopad content-3-10">
  <div class="image-container col-sm-6 col-xs-12 pull-left">
    <div class="background-image-holder">

    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
        <div class="editContent">
          <h3>Our Team</h3>
        </div>
        <div class="editContent"  style="height:235px;">
          <p> 
          &nbsp;&nbsp;"Our team at Bucharest Recruitments is a dynamic and dedicated group of professionals with a passion for connecting talent with opportunity. With years of industry experience and a commitment to excellence, we are your reliable partners in staffing solutions, providing the expertise and support you need to succeed."<br/><br/>

          &nbsp;&nbsp;Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis. Erat eget vitae malesuada, tortor tincidunt porta lorem lectus.<br/><br/>

          &nbsp;&nbsp;And we never go it alone. We support and are supported to develop our own personal results stories. We balance challenging and co-creating with our clients, building the internal capabilities required for them to create repeatable results. </p>
        </div> 
      </div>
    </div>
  </div>
</section>
  
  <div class="about home-about">
        <div class="container">
            
            <div class="row">
              <div class="col-md-4">
                <!-- Heading and para -->
                <div class="block-heading-two">
                  <h3><span>Programes</span></h3>
                </div>
                <p>The aim of the proposed system is to develop a web-based recruitment system for Bucharest Recruitment Agency. This system has a job posting, advertise vacancies, apply for vacancies.  All these facilities are held on one platform. The main objective of this system is automating the company’s recruitment procedure.No waste of time,no waste paper and no mistakes encounter. Nevertheless, report generation for decision-making process is easier.</p>
              </div>
              <div class="col-md-4">
                <div class="block-heading-two">
                  <h3><span>Latest News</span></h3>
                </div>    
                <!-- Accordion starts -->
								<div class="panel-group" id="accordion-alt3">
								 <!-- Panel. Use "panel-XXX" class for different colors. Replace "XXX" with color. -->
								  <div class="panel">	
									<!-- Panel heading -->
									 <div class="panel-heading">
										<h4 class="panel-title">
										  <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt3">
											<i class="fa fa-angle-right"></i> Solutions for Unskilled Employees # 1
										  </a>
										</h4>
									 </div>
									 <div id="collapseOne-alt3" class="panel-collapse collapse">
										<!-- Panel body -->
										<div class="panel-body">
										Unskilled laborers and general labor are available through the Bucharest recruitment agency for any industry. From Bangladesh, India, Pakistan, and Nepal, we chose unskilled labor.
										</div>
									 </div>
								  </div>
								  <div class="panel">
									 <div class="panel-heading">
										<h4 class="panel-title">
										  <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseTwo-alt3">
											<i class="fa fa-angle-right"></i> Professional Employee's Solutions # 2
										  </a>
										</h4>
									 </div>
									 <div id="collapseTwo-alt3" class="panel-collapse collapse">
										<div class="panel-body">
										We supply highly qualified workers from Asian and African nations for any industry. Our main areas of interest include construction, agriculture, and IT.
										</div>
									 </div>
								  </div>
								  <div class="panel">
									 <div class="panel-heading">
										<h4 class="panel-title">
										  <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseThree-alt3">
											<i class="fa fa-angle-right"></i> Many Advantages & Easy Processing # 3
										  </a>
										</h4>
									 </div>
									 <div id="collapseThree-alt3" class="panel-collapse collapse">
										<div class="panel-body">
										You select Bucharest Recruitment Agency because finding the right candidate is very complicated. Bucharest Recruitment Agency will assist you in locating both skilled and unskilled workers to increase your success rate.
										</div>
									 </div>
								  </div>
								  <div class="panel">
									 <div class="panel-heading">
										<h4 class="panel-title">
										  <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseFour-alt3">
											<i class="fa fa-angle-right"></i> Our Services # 4
										  </a>
										</h4>
									 </div>
									 <div id="collapseFour-alt3" class="panel-collapse collapse">
										<div class="panel-body">
										"At Bucharest Recruitments, we offer comprehensive workforce solutions designed to meet your staffing needs effectively. Our services encompass skilled and unskilled manpower recruitment, training, and workforce management. We are your trusted partner in finding the right talent to drive your business forward, ensuring seamless and cost-effective solutions for your staffing requirements."										</div>
									 </div>
								  </div>
								</div>
								<!-- Accordion ends -->
                
              </div>
              
              <div class="col-md-4">
                <div class="block-heading-two">
                  <h3><span>Testimonials</span></h3>
                </div>  
                     <div class="testimonials">
                    <div class="active item">
                      <blockquote><p>"Their ability to source skilled and unskilled workers from different corners of the world has been a game-changer for our business. Their professionalism, dedication, and understanding of our specific staffing needs have made them an invaluable resource for us."</p></blockquote>
                      <div class="carousel-info">
                      <img alt="" src="plugins/home-plugins/img/cli.png" class="pull-left">
                      <div class="pull-left">
                        <span class="testimonials-name">John Mac</span>
                        <span class="testimonials-post">HR Manager</span>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>
              
            </div>
            <br>
           
            </div>
            
          </div>