<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content">
            <a class="close">x</a>
            <h3 class="logintext">Log in</h3>
            <form method="post" action="/userlogin">
              <?php echo e(csrf_field()); ?>

              <input name="cururl" type="hidden" value="<?php echo e(Route::current()->getName()); ?>">
              <div class="form-group">
                <label for="usn">
                    Email:

                </label>
                <input type="email" class="form-control" name="email" id="usn" placeholder="Email" required= style="width: 380px"/>
              </div>
              <div class="form-group">
                <label for="password">
                    Password:

                </label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required
                       pattern=".{6,}" style="width: 380px"/>
                  </div>
                <?php if(session('loginerr')): ?>
                  <script>
                  $(document).ready(function(){
                    $(".overlay").fadeToggle("fast");
                  });
                  </script>
                  <div class="alert alert-danger">
                    <?php echo e(session('loginerr')); ?>

                  </div>
                <?php endif; ?>
                <button class="btn btn-success" type="submit">Log in</button>

                <p class="message">You don't have an account?</p>
                <p class="message"><a class="sign-up" href="#">Sign up</a></p>
            </form>
            <form class="register-form" action="/usersignup" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
              <label for="mail">
                  Email:

              </label>
              <input type="email" class="form-control" name="email" id="mail" placeholder="Email@domain.com" required>
            </div>
            <div class="form-group">
                <label for="user">
                    Họ Tên:

                </label>
                <input type="text" class="form-control" name="name" id="user" placeholder="Full name " required>
              </div>
              <div class="form-group">
                <label for="pass">
                    Password:

                </label>
                <input type="password" class="form-control" name="password" id="pass" placeholder="Password " required>
              </div>
                <?php if(session('signuperr')): ?>
                  <script>
                  $(document).ready(function(){
                    $(".overlay").fadeToggle("fast");
                    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                  });
                  </script>
                  <div class="alert alert-danger">
                    <?php echo e(session('signuperr')); ?>

                  </div>
                <?php endif; ?>
                <button class="btn btn-success" type="submit">Sign up</button>

                <p class="message">You have an account?</p>
                <p class="message"><a class="sign-up" href="#">Log in</a></p>
            </form>
        </div>
    </div>
</div>
