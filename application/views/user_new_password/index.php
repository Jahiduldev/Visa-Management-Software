
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <form class="form-signin" id="loginForm" method="post" action="<?php  echo site_url('user_new_password/set_new_password');  ?>">
                <h2 class="form-signin-heading">Enter password now</h2>

                <div class="login-wrap">
                    <input type="password" class="form-control" placeholder="Enter alpaha numeric password" id="new_password" name="new_password" required="required">
                    <input type="hidden" name="id" value="<?=$id?>"/>
                      <input type="hidden" name="ran" value="<?=$ran?>"/>
                    <br>

                    <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="row"  style="min-height: 350px;">

        </div>
    </section>
</section>
<!--main content end-->

