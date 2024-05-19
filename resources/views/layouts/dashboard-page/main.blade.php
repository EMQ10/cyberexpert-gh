<!DOCTYPE html>
<html lang="en">

@include('layouts.dashboard-page.inc.css')

<body class="hold-transition sidebar-mini">
<div class="wrapper">


    @include('layouts.dashboard-page.head')


    @include('layouts.dashboard-page.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('page-content')


  </div>
  <!-- /.content-wrapper -->

        @include('layouts.dashboard-page.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.dashboard-page.inc.js')
<script src="../../dashboard-page/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../dashboard-page/plugins/jquery-validation/additional-methods.min.js"></script>
<script>
    $(function () {
    //   $.validator.setDefaults({
    //     submitHandler: function () {
    //       alert( "Form successful submitted!" );
    //     }
    //   });
      $('#quickForm').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 8
          },
          name: {
            required: true
          },
          'roles[]': {
            required: true
          },
          'confirm-password':{
            required: true
          },
          contact:{
            required: true,
            maxlength: 10
          },
          'years_of_experience':{
            required: true
          },
          'area_id': {
            required: true
          },
          'profile_message':{
            required: true,
          },
          picture:{
            required: true,
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a valid email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
          },
          name: {
            required: "Please enter full name",
          },
          'roles[]':{
            required: "please assign role",
          },
          'confirm-password':{
            required: "Please confirm password",
          },
          contact:{
            required: "Please enter contact number",
            maxlength: "Contact must be 10 numbers long",
          },
          'years_of_experience':{
            required: "Please enter Years",
          },
          'area_id': {
            required: "Please select Area of Expertise",
          },
          'profile_message':{
            required: "Please enter profile message",
          },
          picture:{
            required: "Please upload Expert's picture",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
</body>
</html>
