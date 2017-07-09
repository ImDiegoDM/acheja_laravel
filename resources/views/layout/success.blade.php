@if (Session::has('success'))
  <script type="text/javascript">
  $(document).ready(function() {
    $('#modalmessage').modal('show');
  });
  </script>
  <!-- Modal message -->
  <div class="modal fade" id="modalmessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sucesso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" action="{{env('APP_URL').'/admin/content/category'}}" method="post">
          {{ csrf_field() }}
          <div class="modal-body">
            {{Session::get('success')}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-confirm" data-dismiss="modal">Ok!</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endif
