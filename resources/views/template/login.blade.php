<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="{{asset('public/logo.ico')}}" type="image/x-icon" />
        <title>Book Meeting</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/datatable.css')}}">
        <link rel="stylesheet" href="{{url('css/font-awesome.css')}}">
        <script src="{{url('js/jquery.min.js')}}"></script>
        <script src="{{url('js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
              } );
            $(document).ready(function() {
            $('#example2').DataTable();
              } );
        </script>
        <style type="text/css">
            body{
                background-color: #eaeaea;
            }
        </style>
    </head>
    <body>
        <section id="login">
            @yield('content')
        </section>
        <div id="error" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Error</h4>
                    </div>
                    <div class="modal-body">
                        <h3></h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="success" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Success</h4>
                    </div>
                    <div class="modal-body">
                        <h3></h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick="close_user();">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Script -->
        <script src="{{url('/js/ajax.js')}}"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="{{url('/js/bootstrap.min.js')}}"></script>
	    <meta name="csrf-token" content="{{ csrf_token() }}" />
    </body>
</html>
