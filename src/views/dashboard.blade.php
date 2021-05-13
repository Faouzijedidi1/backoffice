<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <script src="/outdareBackoffice/js/alloy/alloy-editor-all-min.js"></script>
    <link rel="stylesheet" type="text/css" href="/outdareBackoffice/js/alloy/assets/alloy-editor-ocean-min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="shortcut icon" href="images/favicon.png"> -->
  </head>
  <style type="text/css">
      body{
            width: 100%;
            background-color: #fff;
            font-weight: 400;
            font-family: "Roboto","Helvetica","Arial",sans-serif;
        }
  </style>
  <body>
    <div id="{{$mainDivId}}"></div>
    <script>
    var logout_route = "/logout";
    </script>
    <script>
    var language = <?php echo "'".Config::get('app.locale')."'"; ?>;
    </script>
    <script>
    var mainDivId = <?php echo json_encode($mainDivId); ?>;
    var dashbordName = <?php echo json_encode($dashbordName); ?>;
    var isFrontoffice = <?php echo '"'.Config::get('backoffice::backoffice.frontoffice').'"'; ?>;
    </script>
    @if(isset($navConfig))
    <script>
    var navConfig = <?php echo json_encode($navConfig); ?>
    </script>
    @endif
    @if(isset($contentId))
    <script>
    var contentId = <?php echo json_encode($contentId); ?>
    </script>
    @endif
    @if(isset($pageConfig))
    <script>
    var pageConfig = <?php echo json_encode($pageConfig); ?>
    </script>
    @endif
    @if(isset($package_name))
    <script>
    var package_name = <?php echo json_encode($package_name); ?>
    </script>
    @endif
    <script src="/outdareBackoffice/js/backoffice.js?v=1.1"></script>
  </body>
</html>
