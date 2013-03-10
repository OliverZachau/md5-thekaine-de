<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>md5.thekaine.de - MD5 Meta Search Engine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="http://md5.thekaine.de">md5.TheKaine.de</a>

            <div class="nav-collapse">

            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>


<div class="container">
    <h1>Welcome to the MD5 Search Engine!</h1>
    <br>

    <p>
        To fire up the engine enter a <b>valid</b> MD5 Hash to the formular.<br>
        Be aware that looking up the Hash may take a couple of seconds!
    </p>

    <div style="padding: 25px">
        <form class="form-search" style="text-align: center">
            <input type="text" class="search-query" name="hash">
            <button type="submit" class="btn btn-primary">Crack MD5 Hash!</button>
        </form>
    </div>

    <?php
    if (isset($result)) {
        ?>

        <div class="alert alert-success" style="text-align: center">
            <h2><b>Found it:</b> "<?php echo $result; ?>"</h2>
        </div>

        <?php
    } elseif (isset($_GET['hash'])) {
        ?>

        <div class="alert alert-error" style="text-align: center">
            <h2>Sry did not find what you are looking for :(</h2>
        </div>

        <?php
    }
    ?>

    <div class="row-fluid">
        <div class="span4">
            <h2>MD5</h2>

            <p>The MD5 Message-Digest Algorithm is a widely used cryptographic hash function that produces a 128-bit
                (16-byte) hash value. Specified in RFC 1321, MD5 has been employed in a wide variety of security
                applications, and is also commonly used to check data integrity. MD5 was designed by Ron Rivest in 1991
                to replace an earlier hash function, MD4. An MD5 hash is typically expressed as a 32-character
                hexadecimal number.</p>
        </div>
        <div class="span4">
            <h2>Info</h2>
            <br>

            <div class="fb-like" data-send="true" data-layout="button_count" data-width="450"
                 data-show-faces="false"></div>

            <br><br>
            <g:plusone></g:plusone>
            <script type="text/javascript">
                (function () {
                    var po = document.createElement('script');
                    po.type = 'text/javascript';
                    po.async = true;
                    po.src = 'https://apis.google.com/js/plusone.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(po, s);
                })();
            </script>

            <br><br>
            This Search Engine runs against over 20 other engines to get the best result possible for you. If you are
            one of them and are unhappy with me doing so please contact <a href="mailto:md5@thekaine.de">me</a>.
        </div>
        <div class="span4">
            <h2>Latest</h2>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Hash</th>
                    <th>Cleartext</th>
                </tr>
                </thead>
                <?php
                if (is_array($latest)) {


                    $latest = array_reverse($latest);
                    $latest = array_slice($latest, 0, 25, true);
                    foreach ($latest as $h => $v) {
                        echo "<tr><td>$h</td><td>$v</td></tr>";
                    }
                }

                ?>
            </table>
        </div>

    </div>

</div>


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap-transition.js"></script>
<script src="../js/bootstrap-alert.js"></script>
<script src="../js/bootstrap-modal.js"></script>
<script src="../js/bootstrap-dropdown.js"></script>
<script src="../js/bootstrap-scrollspy.js"></script>
<script src="../js/bootstrap-tab.js"></script>
<script src="../js/bootstrap-tooltip.js"></script>
<script src="../js/bootstrap-popover.js"></script>
<script src="../js/bootstrap-button.js"></script>
<script src="../js/bootstrap-collapse.js"></script>
<script src="../js/bootstrap-carousel.js"></script>
<script src="../js/bootstrap-typeahead.js"></script>

</body>
</html>
