    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ URL::asset('js/landingpage/main.js') }}"></script>

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
              phone: {
                required: true,
              },
              name: {
                required: true
              },
              gender: {
                required: true
              },
              subject:{
                required: true
              },
              message:{
                required: true,
              },

            },
            messages: {
              email: {
                required: "Please enter a email address",
                email: "Please enter a valid email address"
              },
              phone: {
                required: "Enter phone number",
              },
              name: {
                required: "Please enter full name",
              },
              gender:{
                required: "please select gender",
              },
              subject:{
                required: "Please enter subject",
              },
              message:{
                required: "Please enter your message",
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

<script>
    $(document).on('click', '.expertise',function(){
        $('#list').empty();

var stud_id = $(this).val();
// alert(stud_id);
        // console.log(stud_id);
        $('#staticBackdrop').modal('show');

$.ajax({
    type: 'GET',
    url: "/expert/area_of_expertise/"+stud_id,
    success:function(response){

        // console.log(response.data.area);
        // $('#name').val(response.data.name);
        // $('#stud_id').val(stud_id);

        $.each(response.expertise, function (key, value){

            var object = value;
            // console.log(object.name);

                $.each(object, function(k,v) {

                    // var name = v

                    // console.log(v);

                var ul = document.getElementById("list");
                var li = document.createElement("label");

                // var index = k + 1;

                li.text = v.name;

              $('#mini').val(response.data.name);

                $(ul).append("<label id='depli' value='" + li.value + "'>" + li.text +"</label>")
                 })
        });

    }
});

});

</script>
