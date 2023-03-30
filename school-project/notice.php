<?php include("header.php"); ?>
    <main>
        <section id="notice_page">
            <h1 class="heading">Notice</h1>
            <div class="notice_page_cover">

            <?php
                $sql = "select * from peters_notice order by notice_id desc";
                $sql_query = mysqli_query( $conn, $sql );
                $num_query = mysqli_num_rows( $sql_query );
                if ( $num_query > 0 ) {
                while ( $data_query = mysqli_fetch_assoc( $sql_query ) ) {
            ?>
                <div class="notice_box">
                    <p class="notice_date">
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
                    </p>
                    <div class="notice_underline"></div>
                    <div class="notice_inner">
                        <div class="notice_left">
                            <p class="notice_name"><?php echo $data_query['notice_title']; ?></p>
                            <p class="notice_small_des">
                            <?php echo substr($data_query['notice_description'],0,200).'  ...'; ?>
                            </p>
                        </div>
                        <a href="notice_details.php?id=<?php echo $data_query['notice_id']; ?>" class="notice_details_btn">Read More</a>
                    </div>
                </div>
                <?php
                }
                }
                ?>
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
    <?php include("footer.php"); ?>