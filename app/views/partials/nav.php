<nav>
    <div class="container-menu">
      <a href="home" class="logo">Striply</a>
      <ul class="menu">
        <li><a class="menu--active" href="home">Home</a></li>
        <li><a href="gallery?category=all&sortby=date&page=1">Gallery</a></li>
        <li><a href="coming-soon">Contests</a></li>
        <li><a href="coming-soon">Shows</a></li>
        <li><a href="coming-soon">Jobs</a></li>
      </ul>
      <span></span>
      <ul class="menu--more">
        <li><a href="#">About us</a></li>
        <li><a href="https://www.facebook.com/StriplyComunity" target="_BLANK">Facebook</a></li>
        <li><a href="https://twitter.com/StriplyFr" target="_BLANK">Twitter</a></li>
        <li><a href="https://plus.google.com/116960483759891056026/about" target="_BLANK">Google +</a></li>
      </ul>
    </div>
    <?php if(empty($SESSION)): ?>
        <div class="menu--footer">
          <!-- NOT CONNECTED -->
          <ul class="disconnected">
            <li><a href="login"><i class="flaticon-user148"></i><span>Sign In</span><i class="flaticon-right11"></i></a></li>

            <li class="btn-cta">
              <a href="signup">
                <span></span>
                <strong>Sign Up</strong>
                <i class="flaticon-plus3"></i>
              </a>
            </li>
          </ul>
        </div>
      <?php endif; ?>
      <?php if(!empty($SESSION)): ?>
        <!-- CONNECTED -->
        <div class="menu--footer">
          <ul class="connected">
            <div class="profilHover">
                <li id="feature-profile-menu">
                  <a href="user/<?php echo $SESSION['id'] ?>">
                    <img src="<?php echo (!empty($users[0]->filepath)) ? $users[0]->filepath : 'http://lorempixel.com/400/200/'; ?>">
                    <div class="username"><p><?php echo $users[0]->name ?></p></div>
                  </a>
                </li>
                <!-- <li id="test" class="feature-menu-hover">
                  <a href="logout"><i class="flaticon-logout11"></i></a>
                  <span></span>
                  <a href="user/<?php echo $SESSION['id'] ?>"><p>See profile</p></a>
                </li> -->
              </div>
              <li class="btn-cta">
                <a href="new-board">
                  <span></span>
                  <strong>Add strip</strong>
                  <i class="flaticon-plus3"></i>
                </a>
              </li>
            </ul>
          </div>
        <?php endif; ?>
  </nav>