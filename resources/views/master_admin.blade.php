<!DOCTYPE html>
<html lang="vi">
<head>
<title>HTBook Admin</title>
<meta charset="UTF-8" />
<base href="{{asset('')}}" >
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="source/assets/admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="source/assets/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="source/assets/admin/css/fullcalendar.css" />
<link rel="stylesheet" href="source/assets/admin/css/matrix-style.css" />
<link rel="stylesheet" href="source/assets/admin/css/matrix-media.css" />
<link rel="stylesheet" href="source/assets/admin/css/style.css" />
<link href="source/assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="source/assets/admin/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="source/ckeditor/ckeditor.js"></script>
</head>
<body>
    @include('header_admin')
    @include('menu_admin')
    
    <div id="content">
    @yield('content')
    </div>


    <script src="source/assets/admin/js/jquery.min.js"></script> 
    <script src="source/assets/admin/js/excanvas.min.js"></script> 
    <script src="source/assets/admin/js/jquery.ui.custom.js"></script> 
    <script src="source/assets/admin/js/bootstrap.min.js"></script> 
    <script src="source/assets/admin/js/jquery.flot.min.js"></script> 
    <script src="source/assets/admin/js/jquery.flot.resize.min.js"></script> 
    <script src="source/assets/admin/js/jquery.peity.min.js"></script> 
    <script src="source/assets/admin/js/fullcalendar.min.js"></script> 
    <script src="source/assets/admin/js/matrix.js"></script> 
    <script src="source/assets/admin/js/matrix.dashboard.js"></script> 
    <script src="source/assets/admin/js/jquery.gritter.min.js"></script> 
    <script src="source/assets/admin/js/matrix.interface.js"></script> 
    <script src="source/assets/admin/js/matrix.chat.js"></script> 
    <script src="source/assets/admin/js/jquery.validate.js"></script> 
    <script src="source/assets/admin/js/matrix.form_validation.js"></script> 
    <script src="source/assets/admin/js/jquery.wizard.js"></script> 
    <script src="source/assets/admin/js/jquery.uniform.js"></script> 
    <script src="source/assets/admin/js/select2.min.js"></script> 
    <script src="source/assets/admin/js/matrix.popover.js"></script> 
    <script src="source/assets/admin/js/jquery.dataTables.min.js"></script> 
    <script src="source/assets/admin/js/matrix.tables.js"></script> 

    <script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {
        
            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();            
            } 
            // else, send page to designated URL            
            else {  
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
    }
    </script>
</body>
</html>
