<?php
if ($_SESSION['ask_question_page'] = true) {
    echo '<div class="alert alert-danger" role="alert">You have to login to ask a question on HawkOverflow</div>';
    $_SESSION['ask_question_page'] = false;
}
if (isset($_POST['submit'])) {
    require('login_functions.php');

    echo $_POST['username'];

    list ($check, $data) = check_login($bd, $_POST['username'], $_POST['password']);
    if ($check) {
        $_SESSION['username'] = $data['username'];
        echo '<div class="alert alert-success" role="alert"><p>Authorized! You are now signed in.</p></div>';
        redirect_user('index.php?page=home');
    } else {
        echo '<div class="alert alert-danger" role="alert"><p>Invalid Login</p></div>';
        $errors = $data;


    }
    mysqli_close($bd);
}
?>
<div id="login-overlay">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Login to HawkOverflow</h4>
        </div>
        <div class="panel-body ">
            <div class="row">
                <div class="col-xs-6">
                    <div class="well">
                        <form class="form-horizontal" action="index.php?page=sign_in" method="post">
                            <div class="form-group">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"
                                       placeholder="example@uncw.edu">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"
                                       title="Please enter your password">
                                <span class="help-block"></span>
                            </div>
                            <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" id="remember"> Remember login
                                </label>

                                <p class="help-block">(if this is a private computer)</p>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-xs-6">
                    <p class="lead">Register now for <span style="color: #d85a01">FREE</span></p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><p>UNCW Students and Faculty Only</p></li>
                        <li><p>No Spam just use UNCW email</p></li>
                    </ul>
                    <p><a href="index.php?page=registration" class="btn btn-info btn-block">Register now!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>