
@if (Session::has('success'))
    <div class="alert alert-success fade-property">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger fade-property">
        {{ Session::get('error') }}
    </div>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $('.fade-property').fadeOut('slow');

        }, 5000);
    });
</script>
