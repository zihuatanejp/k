<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/app.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
        
        <!--[if lt IE 9]>
            <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <title>亚美</title>
    </head>
    
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-lg-offset-3 col-lg-6">
                    <h1>h1 from app.scss is blue</h1>
                    <h3>h3 from button.scss is red</h3>
                    <form method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <label for="name">name</label>
                        <span><input name="name"></span>
                        <br>
                        <label for="password">password</label>
                        <span><input name="password"></span>
                        <br>
                        <label for="nick-name">nick-name</label>
                        <span><input name="nick-name"></span>
                        <br>
                        <label for="phone">phone</label>
                        <span><input name="phone"></span>
                        <br>
                        <button type="submit">提交</button>
                    </form>

                </div>
            </div>

        </div>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
        $(function(){
            
        });
        </script>
    </body>

</html>




script:src
<script src=""></script>

script
<script></script>

link:css
<link rel="stylesheet" href="style.css">

style
<style></style>
