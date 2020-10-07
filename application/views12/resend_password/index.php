
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <form class="form-signin" id="loginForm" method="post" action="<?php  echo site_url('resend_password/get_user_id');  ?>">
                <h2 class="form-signin-heading">Enter valid email now</h2>

                <div class="login-wrap">
                    <input type="email" class="form-control" placeholder="Valid Email" id="email_add" name="email_add" required="required">
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
<script>
    function init() {
        // Clear forms here
        document.getElementById("old_password").value = "";
        document.getElementById("new_password").value = "";
    }
    window.onload = init;
</script>
