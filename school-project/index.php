<?php include("header.php"); 
?>

    <main>
        <section id="hero-slider">
            <div class="swiper-container" id="hero-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image:url('./asset/img/pic-1.jpg')"></div>
                    <div class="swiper-slide" style="background-image:url('./asset/img/pic-2.jpg')"></div>
                    <div class="swiper-slide" style="background-image:url('./asset/img/pic-3.jpg')"></div>
                </div>

                <div id="overlay"></div>
                <div class="hero-text">
                    <h1>Call To Enroll Your Child</h1>
                    <p>I’m very happy interdum eget ipsum. 
                            Nunc pulvinar ut nulla eget sollicitudin. In hac habitasse platea dictumst.
                             Integer mattis varius ipsum, posuere posuere est porta vel. 
                            Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus.</p>
                </div>
                <div class="marque-notice">
                    <marquee behavior="" direction="">MARCH 26. 2021 | VACANCIES : 2021-22, ST.PETER'S, PURULIA | St. Peter's School B.T. Sarkar Road Purulia, West Bengal 723101 India</marquee>
                </div>

            </div>
        </section>

        <section id="p-desk">
            
            <div class="p-desk-container">
                <div class="text-box">
                    <h1 class="heading desktop" >Message From The Principal's Desk</h1>
                    <p>St. Peter’s School is the ‘Dream Project’ of The Rt. Rev. Dr. Probal Kanto Dutta 
                        which he built in collaboration with the Ascension (Town) Church of Purulia.I feel proud to say that ‘St. Peter’s do exactly the same every year in the best possible way and even go beyond. School is a temple of learning and in St. Peter’s School, we are making best efforts to give quality education to our students. Education means ’all round development of the child’.</p>
                        
                    <!-- <a href="" class="l-m-btn">Learn more</a> -->
                    <p class="name desktop">Mrs. Archita Sen,</p>
                    <p class="des desktop">Principal</p>
                </div>
                <div class="principle-img">
                    <h1 class="heading mobile">Message From The Principal's Desk</h1>
                    <img src="./asset/img/principal.jpg" alt="" class="d-ib img-fluid">
                    <p class="name mobile">Mrs. Archita Sen,</p>
                    <p class="des mobile">Principal</p>
                </div>
            </div>
        </section>
        <h1 class="heading">Notice</h1>
        <section id="notice">
            <div class="notice-container">
                <div class="swiper-container" id="notice-slider">
                    <div class="swiper-wrapper">
               <?php
                    $sql = "select * from peters_notice order by notice_id desc";
                    $sql_query = mysqli_query( $conn, $sql );
                    $num_query = mysqli_num_rows( $sql_query );
                    if ( $num_query > 0 ) {
                        $i=1;
                      while ( $data_query = mysqli_fetch_assoc( $sql_query ) ) {
                        ?>
                        <div class="swiper-slide">
                            <div class="notice-container-x">
                                <h1 class="title">VACANCIES : <?php echo $data_query['notice_title']; ?></h1>
                                <div class="details">
                                    <p>
                                        <span class="date">
                                            <?php
                                                if(!empty($data_query['notice_date']))
                                                {
                                                    $create_date = $data_query['notice_date'];
                                                    $year = substr($create_date,0,4);
                                                    $month = substr($create_date,5,2);
                                                    $day = substr($create_date,8,2);
                                                    $month_name = date("F", mktime(0, 0, 0, $month, 10));
                                                    echo substr($month_name,0,3).' '.$day.', '.$year;
                                                }
                                            ?>
                                        </span>
                                        <span class="school-ads">|  <?php echo $data_query['school_name']; ?>  <?php echo $data_query['school_address']; ?>, </span>
                                    </p>
                                    <span class="ads"><?php echo $data_query['school_state']; ?> <?php echo $data_query['school_pin']; ?> <br> <?php echo $data_query['school_country']; ?></span>
                                </div>
                                <a href="notice.php" class="notice-btn">More Details</a>
                            </div>
                        </div>
                        <?php
                      }
                    }
                    ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="dot d-1"></div>
                <div class="dot d-2"></div>
                <div class="dot d-3"></div>
                <div class="dot d-4"></div>
            </div>
        </section>

        <section id="key-features" class="d-key-features">
            <h1 class="heading">Key Features</h1>
            <div class="key-features-cover">
                <!-- <div class="tabs_"> -->
                <div class="left">
                    <a href="#key-features" class="tabs active" id="lab">
                        <img src="./asset/img/microscope.svg" alt="" class="img-fluid d-none iw">
                        <img src="./asset/img/microscope-b.svg" alt="" class="img-fluid d-ib ib">
                        <span class="d-ib">Hitech Labs</span>
                    </a>
                    <a href="#key-features" class="tabs" id="classroom">
                        <img src="./asset/img/classroom.svg" alt="" class="img-fluid d-ib iw">
                        <img src="./asset/img/classroom-b.svg" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">Large classrooms</span>
                    </a>
                    <a href="#key-features" class="tabs" id="transport">
                        <img src="./asset/img/bus.svg" alt="" class="img-fluid d-ib iw">
                        <img src="./asset/img/bus-b.svg" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">Transport facilities</span>
                    </a>
                </div>

                <div class="center" id="center-img-box">
                    <div class="center-img">
                        <img src="./asset/img/resource/lab.jpg" alt="" class="img-fluid d-block">
                    </div>
                </div>

                <div class="right">
                    <a href="#key-features" class="tabs" id="library">
                        <img src="./asset/img/library.svg" alt="" class="img-fluid d-ib iw">
                         <img src="./asset/img/library.png" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">Well equiped library</span>
                    </a>
                    <a href="#key-features" class="tabs" id="cctv">
                        <img src="./asset/img/cctv-camera.svg" alt="" class="img-fluid d-ib iw">
                        <img src="./asset/img/cctv-camera-b.svg" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">24 x 7 CCTV</span>
                    </a>
                    <a href="#key-features" class="tabs d-block" id="online-cls">
                        <img src="./asset/img/videoconference.svg" alt="" class="img-fluid d-ib iw">
                        <img src="./asset/img/videoconference-b.svg" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">Online Classs</span>
                    </a>
                </div>
            <!-- </div> -->
            </div>
            <div class="text-box">
                <p class="head">Well equiped library</p>
                <p class="des">This is a school that has a mission to take each child to achieve his or her best. 
                    We give a lot of importance to make discipline a core value, 
                    encourage students to develop a sense of responsibility through well planned academic schedule. </p>
            </div>
        </section>

        <section id="key-features" class="m-key-features">
            <h1 class="heading">Key Features</h1>
            <div class="key-features-cover">
                <!-- <div class="tabs_"> -->
                <div class="left">
                    <div class="center " id="m-lab-img">
                        <div class="center-img">
                            <img src="./asset/img/resource/lab.jpg" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <a class="tabs active" id="m-lab">
                        <img src="./asset/img/microscope.svg" alt="" class="img-fluid d-none iw">
                        <img src="./asset/img/microscope-b.svg" alt="" class="img-fluid d-ib ib">
                        <span class="d-ib">Hitech Labs</span>
                    </a>
                    <div class="center" id="m-classroom-img">
                        <div class="center-img">
                            <img src="./asset/img/resource/large-classroom.jpg" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <a class="tabs" id="m-classroom">
                        <img src="./asset/img/classroom.svg" alt="" class="img-fluid d-ib iw">
                        <img src="./asset/img/classroom-b.svg" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">Large classrooms</span>
                    </a>
                    <div class="center" id="m-transport-img">
                        <div class="center-img">
                            <img src="./asset/img/resource/school-bus.jpg" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <a class="tabs" id="m-transport">
                        <img src="./asset/img/bus.svg" alt="" class="img-fluid d-ib iw">
                        <img src="./asset/img/bus-b.svg" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">Transport facilities</span>
                    </a>
                    <div class="center" id="m-library-img">
                        <div class="center-img">
                            <img src="./asset/img/resource/library.jpg" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <a class="tabs" id="m-library">
                        <img src="./asset/img/library.svg" alt="" class="img-fluid d-ib iw">
                        <img src="./asset/img/library.png" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">Well equiped library</span>
                    </a>
                    <div class="center" id="m-cctv-img">
                        <div class="center-img">
                            <img src="./asset/img/resource/cctv-camera.jpg" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <a class="tabs" id="m-cctv">
                        <img src="./asset/img/cctv-camera.svg" alt="" class="img-fluid d-ib iw">
                         <img src="./asset/img/cctv-camera-b.svg" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">24 x 7 CCTV</span>
                    </a>
                    <div class="center" id="m-online-cls-img">
                        <div class="center-img">
                            <img src="./asset/img/resource/online-class.jpg" alt="" class="img-fluid d-block">
                        </div>
                    </div>
                    <a class="tabs" id="m-online-cls">
                        <img src="./asset/img/videoconference.svg" alt="" class="img-fluid d-ib iw">
                        <img src="./asset/img/videoconference-b.svg" alt="" class="img-fluid d-none ib">
                        <span class="d-ib">Online Classs</span>
                    </a>
                </div>
            <!-- </div> -->
            </div>
            <div class="text-box">
                <p class="head">Well equiped library</p>
                <p class="des">This is a school that has a mission to take each child to achieve his or her best. 
                    We give a lot of importance to make discipline a core value, 
                    encourage students to develop a sense of responsibility through well planned academic schedule. </p>
            </div>
        </section>

        <section id="gallery">
            <h1 class="heading">Gallery</h1>
            <div class="gallery-container">
                <div class="gallery-img">
                    <img src="./asset/img/resource/DSC_0020.JPG" alt="" class="d-block img-fluid mx-auto">
                </div>
                <div class="gallery-img">
                    <img src="./asset/img/resource/DSC_0367.JPG" alt="" class="d-block img-fluid mx-auto">
                </div>
                <div class="gallery-img">
                    <img src="./asset/img/resource/DSC_0666.JPG" alt="" class="d-block img-fluid mx-auto">
                </div>
                <div class="gallery-img">
                    <img src="./asset/img/resource/DSC_0253.JPG" alt="" class="d-block img-fluid mx-auto">
                </div>
                <div class="gallery-img">
                    <img src="./asset/img/resource/DSC_0180.JPG" alt="" class="d-block img-fluid mx-auto">
                </div>
                <div class="gallery-img">
                    <img src="./asset/img/resource/DSC_5624.JPG" alt="" class="d-block img-fluid mx-auto">
                </div>
            </div>
            <a href="" class="btn-gallery">View All Gallery</a>
        </section>

        <section id="intro-video">
            <h1 class="heading">Watch our video</h1>
            <div class="intro-video-container">
                <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/x382HRS_Y3Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </section>

        <section id="testimonial">
            <h1 class="heading">What Parents Say</h1>
            <div class="testimonial-cover">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                          <img src="./asset/img/profile.png" alt="" class="d-block img-fluid mx-auto testimonial-img">
                          <p class="testimonial-text">
                                Im very happy interdum eget ipsum. 
                                Nunc pulvinar ut nulla eget sollicitudin. In hac habitasse platea dictumst.
                                Integer mattis varius ipsum, posuere posuere est porta vel. 
                                Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus.
                          </p>
                        </div>
                    </div>
                  </div>
            </div>
        </section>

        <section id="call-section">
            <h1 class="heading">Call To Enroll Your Child</h1>
            <div class="call-section-cover">
                <p class="call-section-text">
                    Im very happy interdum eget ipsum. 
                    Nunc pulvinar ut nulla eget sollicitudin. In hac habitasse platea dictumst.
                    Integer mattis varius ipsum, posuere posuere est porta vel. 
                    Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus.
                </p>
                <div class="call-btn">
                    <img src="./asset/img/call.png" alt="" class="d-block img-fluid">
                    <a href="tel:+91 9876 5432 10" class="d-block">9876 5432 10</a>
                </div>
            </div>
        </section>

        <section id="newsletter">
            <div class="newsletter-cover">
                <div class="newsletter-left">
                    <p>Newsletter</p>
                    <p>Subscribe to get our newsletter
                        delivered directly to your inbox
                    </p>
                </div>
                <div class="newsletter-right">
                    <form action="">
                        <div class="newsletter-form">
                            <input type="text" placeholder="Email Address">
                            <button>Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
   <?php
        include("footer.php");
   ?>