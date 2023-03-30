<?php include("header.php"); ?>
    <main>

    <?php
                $sql = "select * from peters_notice where notice_id='".$_GET['id']."'";
                $sql_query = mysqli_query( $conn, $sql );
                $num_query = mysqli_num_rows( $sql_query );
                if ( $num_query > 0 ) {
                $data_query = mysqli_fetch_assoc( $sql_query );
            ?>
        <section id="notice_single">
            <div class="ns_cover">
                <p class="ns_date">
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
                <div class="ns_underline"></div>
                <p class="ns_name"><?php echo $data_query['notice_title']; ?></p>
                <div class="ns_underline"></div>
                <p class="ns_notice_des"><?php echo $data_query['notice_description']; ?>
                </p>
            </div>
        </section>
        <?php
           } else {
        ?>
        <section id="notice_single">
           <div class="ns_cover">
                <p class="ns_date">May 3, 2021</p>
                <div class="ns_underline"></div>
                <p class="ns_name">No result found!</p>
               
               
            </div>
        </section>
        <?php
        }
        ?>
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