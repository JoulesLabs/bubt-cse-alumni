<div class="modal fade" tabindex="-1" role="dialog" id="{{$id}}" style="display: none;" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              
              {{ $slot }}                
               
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{$deny}}</button>
                <button type="submit" form="{{$formId}}" class="btn btn-primary">{{$confirm}}</button>
              </div>
            </div>
          </div>
        </div>