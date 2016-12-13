<div id="profile_body">
	<div id="profile_area">

        <?php 
            include_once('./php/connectdb.php');
            include_once('./php/users.php');
            include_once('./php/restaurants.php');
            include_once('./php/reviews.php');

            $dbh = connectdb('./database/database.db');

            $restaurant = getRestaurantFromId($dbh,$_GET['restid']);

            if($restaurant == null){
                echo '<div id="not_found">Restaurant not found</div>';
                
            }else{
        ?>
        <br>
        <div id="restaurant_name_and_edit">
            <div id="restaurant_name">
                <?php echo $restaurant['name'];?>
            </div>
            <?php
                if(isset($_SESSION['username'])){
                if($restaurant['owner_id'] == $_SESSION['username']){
                ?>
                    <form action="php/deleteRest.php" method="post" style="float:right;">
                        <input type='hidden' name='restid' value="<?php echo $restaurant['id'];?>"/> 
                        <input id="edit_profile_btn" type="submit" value=" Delete " onclick="if (!confirm('Are you sure you want to delete this restaurant?')) return false;"> 
                    </form>
                    <div id="restaurant_edit_btn">
                        <a href="restaurant_edit.php?restid=<?php echo $restaurant['id']; ?>" id="edit_profile_btn"> &nbspEdit Restaurant&nbsp </a>
                    </div>
            <?php }} ?>
        </div>
         <div id= "restaurant_area">   
            <div id="restaurant_image">
                <img src="resources/<?php echo $restaurant['image'];?>" style="width:300px;height:90%;">
            </div>
            <div id="restaurant_information">
                <div id="restaurant_header">
                        Account Details:
                </div>
                <div id="restaurant_contact">
                    <?php 
                        if($restaurant['phone'] != null)
                            echo '<label id="restaurant_phone">'.$restaurant['phone']."</label>";
                        if($restaurant['email'] != null && $restaurant['phone'] != null)
                            echo '<br>';
                        if($restaurant['email'] != null)
                        echo '<label id="restaurant_email">'.$restaurant['email']."</label>";
                    ?>
                </div>
                <div id="restaurant_local">
                    <?php 
                        if($restaurant['address'] != null)
                             echo '<label id="restaurant_address">'.$restaurant['address']."</label>";
                        if($restaurant['address'] != null && $restaurant['city'] != null || $restaurant['address'] != null && $restaurant['country'] != null )
                            echo ', ';
                        if($restaurant['city'] != null)
                             echo '<label id="restaurant_city">'.$restaurant['city']."</label>";
                        if($restaurant['city'] != null && $restaurant['country'] != null)
                            echo ', ';   
                        if($restaurant['country'] != null)
                             echo '<label id="restaurant_country">'.$restaurant['country']."</label>";
                    ?>
                </div>
                <div id="restaurant_avg_price">
                    <?php 
                        if($restaurant['average_price'] != null)
                            echo '<label id="restaurant_avgprice">'.$restaurant['average_price']."</label>";
                    ?>
                </div>

                <div id="restaurant_avg_score">
                    <?php 
                        if($restaurant['average_score'] != null)
                             echo '<label id="restaurant_avgscore">'.$restaurant['average_score']."</label>";
                    ?>
                </div>
                <div id="restaurant_description">
                    <?php 
                        if($restaurant['description'] != null)
                            echo '<label id="restaurant_bio">'.$restaurant['description']."</label>";
                    ?>
                </div>
            </div>
        </div>
        <div id="restaurant_reviews">
            <?php
                echo '<label id="review_list_header">USER SUBMITED REVIEWS</label>';
                $reviews = getReviews($dbh,$_GET['restid']);
                foreach($reviews as &$review){
                    echo '<div class="searched_res">';
                    echo '<label class="name">' . $review['username']. '</label>';
                    echo '<br>';
                    echo '<label class="review_rating">' . $review['score']. '</label>';
                    echo '<br>';
                    echo '<label class="review_date">' . $review['review_date']. '</label>';
                    echo '<br>';
                    echo '<label class="review_text">' . $review['review_text'] . '</label>';
                    echo '</div>';
                }
            ?>
        </div>
        <?php } ?>
    </div>
</div>