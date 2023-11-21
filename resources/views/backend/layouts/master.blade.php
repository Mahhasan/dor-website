<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DoR Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- for tinymce editor -->
    <script src="https://cdn.tiny.cloud/1/pplezfsut9xqvzw1wnk319ah39r5c22kagc1f5992j2ql3om/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- toastr message cdn -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">



    <!-- Custom CSS -->
    <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('backend.common.sideber')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('backend.common.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('backend.common.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script> -->
    <!-- jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
    <!-- js for data table -->
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

    <!-- toastr message cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- For Slider visible or invisible in welcome page -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- JavaScript to store and retrieve the active tab using cookies -->
    <script>
        $(document).ready(function () {
            // Get the active tab from the cookie (if available)
            var activeTab = getCookie("activeTab");

            if (activeTab) {
                // Activate the saved tab
                $("#nav-tabContent").find(activeTab).addClass("show active");
                $("#nav-tab").find('[href="#' + activeTab + '"]').tab("show");
            }

            // Handle tab change events
            $("a[data-toggle='tab']").on("shown.bs.tab", function (e) {
                var tabId = $(e.target).attr("href").substring(1); // Get the tab ID
                setCookie("activeTab", tabId); // Save the active tab to a cookie
            });

            // Function to set a cookie
            function setCookie(name, value) {
                document.cookie = name + "=" + value + "; path=/";
            }

            // Function to get a cookie by name
            function getCookie(name) {
                var cookieValue = document.cookie.match(
                    "(^|;)\\s*" + name + "\\s*=\\s*([^;]+)"
                );
                return cookieValue ? cookieValue.pop() : null;
            }
        });
    </script>
    <!-- Initialize DataTables for each table -->
    <!-- <script>
        $(document).ready(function() {
            $('#dataTableFSIT').DataTable();
            $('#dataTableFBE').DataTable();
            $('#dataTableFAHS').DataTable();
            $('#dataTableFE').DataTable();
            $('#dataTableFHSS').DataTable();
        });
    </script> -->

    <!-- Script for toaster message -->
    @if(Session::has('success'))
    <script type="text/javascript">
        $(function() {
            toastr.success("{{ Session::get('success') }}");
        })
    </script>
    @elseif(Session::has('fail'))
    <script type="text/javascript">
        $(function() {
            toastr.danger("{{ Session::get('fail') }}");
        })
    </script>
    @elseif(Session::has('warning'))
    <script type="text/javascript">
        $(function() {
            toastr.warning("{{ Session::get('warning') }}");
        })
    </script>
    @elseif(Session::has('error'))
    <script type="text/javascript">
        $(function() {
            toastr.error("{{ Session::get('error') }}");
        })
    </script>
    @endif
    
    <!-- Script for tinymce text editor -->
    <script>
        tinymce.init({
            selector: 'textarea#file-picker',
            plugins: 'code imagetools anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            // images_upload_url: '/events', // Specify the image upload route
            image_title: true,
            automatic_uploads: true, // Enable automatic image uploads
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    /*
                Note: Now we need to register the blob in TinyMCEs image blob
                registry. In the next release this part hopefully won't be
                necessary, as we are looking to handle it internally.
                */
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
            };

            input.click();
            },
        });
    </script>
    <!-- script for toggle button -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the form container and the toggle button
            var formContainer = document.getElementById('FormContainer');
            var toggleButton = document.getElementById('toggleForm');

            // Add a click event listener to the toggle button
            toggleButton.addEventListener('click', function() {
                // Toggle the display property of the form container
                formContainer.style.display = (formContainer.style.display === 'none' || formContainer.style.display === '') ? 'block' : 'none';
                // Change button text and color dynamically
                if (formContainer.style.display === 'block') {
                    toggleButton.innerHTML = '<i class="fas fa-times"></i>';
                    toggleButton.classList.remove('btn-primary');
                    toggleButton.classList.add('btn-secondary');
                } else {
                    toggleButton.innerHTML = toggleButton.getAttribute('data-original-text');
                    toggleButton.classList.remove('btn-secondary');
                    toggleButton.classList.add('btn-primary');
                }
            });
        });
    </script>
    <!-- For  dependency field (Research_coordinator blade)-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="faculty_id"]').on('change', function() {
                var facultyID = $(this).val();
                if(facultyID) {
                    $.ajax({
                        url: '/myform/ajax/'+facultyID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="department_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="department_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="department_id"]').empty();
                }
            });
        });
    </script>
    <!-- For Slider visible or invisible in welcome page -->
    <script>
        function toggleVisibility(sliderId) {
            axios.post(`/website/slider/toggle-visibility/${sliderId}`)
                .then(response => {
                    if (response.data.success) {
                        // Update the button text and style
                        const button = document.querySelector(`#visibilityButton${sliderId}`);
                        const buttonText = response.data.is_visible ? 'Visible' : 'Invisible';
                        const buttonClass = response.data.is_visible ? 'btn-success' : 'btn-danger';

                        button.textContent = buttonText;
                        button.className = `btn btn-sm ${buttonClass}`;
                    } else {
                        alert('Failed to toggle visibility. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error toggling visibility:', error);
                });
        }
    </script>
</body>
</html>