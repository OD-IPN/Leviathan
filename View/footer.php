<?php 
echo '  <!-- content end -->
  </div>
</div>
<div class="body4">
  <div class="main">
    <article id="content2">
      <div class="wrapper">
        <section class="col3">
          <h4>Why Us?</h4>
          <ul class="list1">
            <li><a href="#">Lorem ipsum dolor sit</a></li>
            <li><a href="#">Dmet, consectetur</a></li>
            <li><a href="#">Adipisicing elit eiusmod </a></li>
            <li><a href="#">Tempor incididunt ut</a></li>
          </ul>
        </section>
        <section class="col3 pad_left2">
          <h4>Address</h4>
          <ul class="address">
            <li><span>Country:</span>USA</li>
            <li><span>City:</span>San Diego</li>
            <li><span>Phone:</span>8 800 154-45-67</li>
            <li><span>Email:</span><a href="#">progress@mail.com</a></li>
          </ul>
        </section>
        <section class="col3 pad_left2">
          <h4>Follow Us</h4>
          <ul id="icons">
            <li><a href="#"><img src="images/icon1.jpg" alt="">Facebook</a></li>
            <li><a href="#"><img src="images/icon2.jpg" alt="">Twitter</a></li>
            <li><a href="#"><img src="images/icon3.jpg" alt="">LinkedIn</a></li>
            <li><a href="#"><img src="images/icon4.jpg" alt="">Delicious</a></li>
          </ul>
        </section>
      </div>
    </article>
    <!-- content end -->
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
<script type="text/javascript">
$(document).ready(function () {
    tabs.init();
})
</script>'; ?>

<?php
$title = get_title();
footer_javascript($title);

echo '</body>
</html>';
 ?>