<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <title>Matrouh Stores |
        Dashboard
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/main-merchant.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/MoneAdmin.css') }}"/>

    <link rel="shortcut icon"
          href="{{ asset('/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-3.2.1.css') }}"/>
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="{{ asset('css/layout2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/examples.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"/>
    <script class="include" type="text/javascript"
            src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="padTop53 ">
<!-- MAIN WRAPPER -->
<div id="wrap">
    <!-- HEADER SECTION -->
    <div oncontextmenu="return false"></div>
    <div id="top">

        <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">

            <!-- LOGO SECTION -->
            <header class="navbar-header">

                <a href="/owner" class="navbar-brand">
                    <img height="45px" src="{{ asset('images/logo-header.png') }}" alt="Logo"/></a>
            </header>
            <!-- END LOGO SECTION -->
            <ul class="nav navbar-top-links navbar-right">

                <!-- MESSAGES SECTION -->

                <!--END MESSAGES SECTION -->

                <!--TASK SECTION -->

                <!--END TASK SECTION -->

                <!--ALERTS SECTION -->

                <!-- END ALERTS SECTION -->

                <!--ADMIN SETTINGS SECTIONS -->
                <!--<select name="Language_change" id="Language_change" onchange="Lang_change()">
        </select>-->


                <strong class="text-capitalize"> Hi, {{ auth()->user()->first_name }}</strong>
                <li><a href="/" class="btn btn-default"><i
                            class="icon-shopping-cart"></i> Main Website </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"
                       class="btn btn-default"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="icon-signout"></i>
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </li>
                <!--END ADMIN SETTINGS -->
            </ul>

        </nav>
        <div class="mainmenu">
            <ul class="">
                <li><a href="{{ route('owner.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('owner.stores') }}" > Stores </a></li>
                <li><a href="{{ route('owner.products') }}"> Products </a></li>
                <li><a href="#"> Deals </a></li>
                <li><a href="#"> Transactions </a></li>
                <li><a href="#"> Settings</a></li>
            </ul>
        </div>


        <div class="container" style="width: 98%; margin: auto; overflow: hidden;"><a
                data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip"
                class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu"
                id="menu-toggle">
                SUB MENU <i class="icon-align-justify"></i>
            </a></div>


    </div>
    <!--Loader & alert-->
    <div id="loader" style="position: absolute; display: none;">
        <div class="loader-inner"></div>

        <div class="loader-section"></div>
    </div>
    <div id="loadalert" class="alert-success"
         style="margin-top:18px; display: none; position: fixed; z-index: 9999; width: 50%; text-align: center; left: 25%; padding: 10px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong>
    </div>
    <!--Loader & alert-->
    <script type="text/javascript">
        function Lang_change() {

            var language_code = $("#Language_change option:selected").val();

            $.ajax
            ({
                type: 'POST',
                url: "https://demo.laravelecommerce.com/merchant_new_change_languages",
                data: {'language_code': language_code},
                success: function (data) {

                    window.location.reload();
                }
            });
        }
    </script>
    <!-- END HEADER SECTION -->



@yield('content')
<!-- FOOTER -->
    <div id="footer">
        <p>&copy; Laravel eCommerce - 2020&nbsp;</p>
    </div>
    <script type="text/javascript">
        var __lc = {};
        __lc.license = 4302571;

        (function () {
            var lc = document.createElement('script');
            lc.type = 'text/javascript';
            lc.async = true;
            lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(lc, s);
        })();
    </script>

    <script type="text/javascript">

        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);
    </script>
    <!--END FOOTER -->

    <script>
        $(document).ready(function () {

            plot6 = $.jqplot('chart6', [[0, 4]], {seriesDefaults: {renderer: $.jqplot.PieRenderer}});
        });
    </script>
    <script>
        $(document).ready(function () {

            plot10 = $.jqplot('chart10', [[3, 3]], {seriesDefaults: {renderer: $.jqplot.PieRenderer}});
        });
    </script>
    <script class="code" type="text/javascript">
        $(document).ready(function () {
            $.jqplot.config.enablePlugins = true;

            var s1 = [5, 13, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            var ticks = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            plot1 = $.jqplot('chart1', [s1], {
                // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
                animate: !$.jqplot.use_excanvas,
                seriesDefaults: {
                    renderer: $.jqplot.BarRenderer,
                    pointLabels: {show: true}
                },
                axes: {
                    xaxis: {
                        renderer: $.jqplot.CategoryAxisRenderer,
                        ticks: ticks
                    }
                },
                highlighter: {show: false}
            });

            $('#chart1').bind('jqplotDataClick',
                function (ev, seriesIndex, pointIndex, data) {
                    $('#info1').html('series: ' + seriesIndex + ', point: ' + pointIndex + ', data: ' + data);
                }
            );
        });</script>

    <script class="include" type="text/javascript"
            src="https://demo.laravelecommerce.com/public/assets/js/chart/jquery.jqplot.min.js"></script>
    <script class="include" type="text/javascript"
            src="https://demo.laravelecommerce.com/public/assets/js/chart/jqplot.barRenderer.min.js"></script>
    <script class="include" type="text/javascript"
            src="https://demo.laravelecommerce.com/public/assets/js/chart/jqplot.pieRenderer.min.js"></script>
    <script class="include" type="text/javascript"
            src="https://demo.laravelecommerce.com/public/assets/js/chart/jqplot.categoryAxisRenderer.min.js"></script>
    <script class="include" type="text/javascript"
            src="https://demo.laravelecommerce.com/public/assets/js/chart/jqplot.pointLabels.min.js"></script>


    <!-- GLOBAL SCRIPTS -->

    <script src="https://demo.laravelecommerce.com/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://demo.laravelecommerce.com/public/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="https://demo.laravelecommerce.com/public/assets/plugins/flot/jquery.flot.js"></script>
    <script src="https://demo.laravelecommerce.com/public/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="https://demo.laravelecommerce.com/public/assets/plugins/flot/jquery.flot.categories.js"></script>
    <script src="https://demo.laravelecommerce.com/public/assets/plugins/flot/jquery.flot.errorbars.js"></script>
    <script src="https://demo.laravelecommerce.com/public/assets/plugins/flot/jquery.flot.navigate.js"></script>
    <script src="https://demo.laravelecommerce.com/public/assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="https://demo.laravelecommerce.com/public/assets/js/bar_chart.js"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
    </script>
</body>
<!-- END BODY -->
</html>
