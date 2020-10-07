



<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <form class="form-signin" id="loginForm" method="post" action="<?php  echo site_url('home/login_new');  ?>">
                <h2 class="form-signin-heading">Change password now</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="Old Password" id="old_password" name="old_password" required="required">
                    <input type="password" class="form-control" placeholder="New Password" id="new_password" name="new_password" required="required">
                   
                    <br>
                    <button class="btn btn-lg btn-login btn-block" type="submit">Change</button>
                </div>
            </form>
        </div>
        <div class="row"  style="min-height: 350px;">

        </div>
    </section>
</section>
<!--main content end-->
<script>
    function init() {
        // Clear forms here
        document.getElementById("old_password").value = "";
        document.getElementById("new_password").value = "";
    }
    window.onload = init;
</script>
