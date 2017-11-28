@if (session()->has('message'))
<!-- <div class="alert alert-success" style="text-align: center">
  {{session()->get('message')}}
</div> -->

<script>
$(document).ready(function(){
     $('#myModal').modal('show');
});
</script>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content" style="    height: 57px;    margin-top: 87%;">

        <div class="modal-body alert alert-success" style="    text-align: -webkit-center;">
          <p>  {{session()->get('message')}}</p>
        </div>

      </div>

    </div>
  </div>
@endif
