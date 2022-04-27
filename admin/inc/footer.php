<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
$(document).ready(function() {
    $(document).ready(function() {
        $(".options").selectpicker();
    });
});
</script>


<script>
if (window.history.replaceState) {

    window.history.replaceState(null, null, window.href);

}
</script>




<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"
    integrity="sha512-iqhWkvLOXVDz+Lr//ZryEKNvZ5pmgdKEe58Wh/VwfTGwTku0MKbuLhjJ1zUAJu8iSbOqfLcXrrxJ61+27THi2Q=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"
    integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
    integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- <script src="js/jquery-ui.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/lobipanel.min.js"></script>
<script src="js/iscroll.js"></script> -->
<script src="js/scripts.js"></script>
<script src="js/main.js"></script>

<script src="js/scripts.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="./js/toastr.min.js"></script>
<script src="./js//jquery.counterup.min.js"></script>
<script src="./js/tootip.js"></script>
<script src="./js/sweat2.js"></script>

<script src="js/scripts.js"></script>


<script>
$(function() {

    // Counter for dashboard stats
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    // Welcome notification
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr["success"]("Welcome to Academy management Admin!");

});
</script>


</body>

</html>