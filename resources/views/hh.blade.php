    public function showLoginForm()

    {
        return view('auth.manager-login');
    }

      @if (session('status1'))
      <div align="center">
          <div class="alert alert-success sticky text-center" id="success-alert">
           <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
          </div>
      </div>
  @endif
<script>
/*******************************************/
$(document).ready(function() {
  $("#success-alert").hide();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });

});
/*******************************************/  
</script>