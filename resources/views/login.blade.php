<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login - AKSAM LAB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        margin: 0;
        font-family: "Poppins";
        background: #FBFBFB;
    }

    .page-content {
        width: 100%;
        margin: 0 auto;
        display: flex;
        display: -webkit-flex;
        justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
    }

    .login-content {
        background: #fff;
        width: 850px;
        box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        -o-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        -ms-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        margin: 75px 0;
        position: relative;
        display: flex;
        display: -webkit-flex;
        font-family: "Poppins";

    }

    .login-content .form-right {
        position: right-side;
        margin-bottom: -1px;
        background: #F4F4F4;
    }

    .login-content .form-right .form-images-2 {
        position: absolute;
        bottom: 0;
    }

    .login-content .form-right i {
        color: #333;
    }

    .login-content .form-detail {
        padding: 30px 40px 30px 47px;
    }

    .login-content .form-detail h2 {
        font-family: "Poppins";
        color: #333;
        font-weight: 700;
        font-size: 30px;
        margin: 12px 0 16px;
        padding-left: 40px;
        position: relative;
    }

    .login-content .form-detail h2::before {
        position: absolute;
        background: #26AB02;
        content: "";
        width: 30px;
        height: 2px;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        -o-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
    }

    .login-content .form-detail .text {
        font-weight: 500;
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
        font-family: "Poppins";

    }

    .login-content .form-detail .form-group {
        display: flex;
        display: -webkit-flex;
        margin: 0 -8px;
    }

    .login-content .form-detail .form-row {
        width: 100%;
        position: relative;
    }

    .login-content .form-detail .form-group.form-group-1 {
        width: 100%;
    }

    .login-content .form-detail .form-group .form-row.form-row-1 {
        width: 100%;
        padding: 0 8px;
    }

    .login-content .form-detail label {
        font-weight: 600;
        font-size: 13px;
        color: #666;
        display: block;
        margin-bottom: 12px;
    }

    .login-content .form-detail .input-text {
        margin-bottom: 29px;
    }

    .login-content .form-detail input {
        width: 100%;
        padding: 12.5px 15px;
        border: 1px solid #e5e5e5;
        appearance: unset;
        -moz-appearance: unset;
        -webkit-appearance: unset;
        -o-appearance: unset;
        -ms-appearance: unset;
        outline: none;
        -moz-outline: none;
        -webkit-outline: none;
        -o-outline: none;
        -ms-outline: none;
        font-family: 'Raleway', sans-serif;
        font-size: 15px;
        color: #333;
        font-weight: 700;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -o-box-sizing: border-box;
        -ms-box-sizing: border-box;
    }

    .login-content .form-detail .form-row input:focus {
        border: 1px solid #b3b3b3;
    }


    .login-content .form-detail .special p {
        font-size: 16px;
        font-weight: 500;
        color: #666;
    }


    /* Responsive */
    @media screen and (max-width: 991px) {
        .login-content {
            margin: 110px 20px;
            flex-direction: column;
            -o-flex-direction: column;
            -ms-flex-direction: column;
            -moz-flex-direction: column;
            -webkit-flex-direction: column;
        }

        .login-content .form-detail .form-group.form-group-1 {
            width: auto;
        }

        .login-content .form-right {
            display: none;
        }

        .login-content .form-detail {
            padding: 30px 20px 30px 20px;
            width: auto;
        }
    }

    @media screen and (max-width: 575px) {
        .login-content .form-detail .form-group {
            flex-direction: column;
            -o-flex-direction: column;
            -ms-flex-direction: column;
            -moz-flex-direction: column;
            -webkit-flex-direction: column;
            margin: 0;
        }

        .login-content .form-detail .form-group .form-row.form-row-1 {
            width: 100%;
            padding: 0;
        }

    }
    </style>
</head>

<body class="login">
    <div class="page-content">
        <div class="login-content">
            <form class="form-detail" action="#" method="post" id="Login">
                <h2>Laboratoire AKSAM</h2>
                <p class="text">Veuillez saisir ci-dessous votre email et mot de passe. &nbsp; &nbsp; &nbsp; &nbsp; </p>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <label for="full-name">Email :</label>
                        <input type="text" name="full-name" id="full-name" class="input-text" required>
                    </div>


                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <label for="full-name">Mot de passe :</label>
                        <input type="text" name="full-name" id="full-name" class="input-text" required>
                    </div>


                </div>



                <div class="form-row-last">
                    <center> <button type="submit" class="btn btn-success mb-2">S'authentifier</button></center>

                </div>
            </form>
            <div class="form-right">
                <div class="form-images-1">

                    <img src="images/logo_login.jpg" alt="Aksam_logo">

                </div>


            </div>
        </div>

    </div>

    <div class="page-content">
        <footer style="font-size:11px;">
            <center>Copyright © 2021 AKSAM | All rights reserved.</center>
        </footer>

    </div>
</body>

</html>