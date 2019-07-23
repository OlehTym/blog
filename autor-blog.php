<?php
require_once("index.php");
require_once("DBconfig.php");
require_once("func.php");
?>
  <div class="content">
            <div class="post-name-time">
            <form action="autor-blog.php" method="GET">
            <p>АВТОР: <span class="autor">Alex</span></p>
            <p>ДАТА: <span class="time">03.07.2019</span></p>
        </div>
      <input class="input-text" type="text" name="text">
                <div class="like-dislike">
                 <div class="like">  <img src="./img/like.png" alt="like"> </div> <div class="like-counter">1</div>
                  <div class="dislike"> <img  src="./img/dislike.png" alt="dislike">  </div> <div class="dislike-counter">0</div>
                </div>
                <div class="comments">
                    <p>Comments:</p> <div class="comments-counter">8</div>
                </div>
               <div class="button-avtor">
                <div class="buttom-updata"><button type="submit" class="content-button" >ОНОВИТИ</button></div>
                <div class="buttom-views"><button class="content-button">ПЕРЕГЛЯНУТИ</button></div>
            </div>
            </form>
        </div>
        <?php
