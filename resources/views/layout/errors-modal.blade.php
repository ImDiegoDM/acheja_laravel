@if (count($errors))
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
          <h5 class="modal-title" id="exampleModalLabel">Erro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-confirm" data-dismiss="modal">Ok!</button>
        </div>
      </div>
    </div>
  </div>
@endif
