<div class="col-12">
    <div class="float-left">
        <h4>Permissions</h4>
    </div>
    <div class="float-right">
        <div class="col col-md-3">
            <div class="form-group">
                <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                        <input type="radio" id="denyall" name="all" value="false" class="selectgroup-input" >
                        <span class="selectgroup-button">DenyAll</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" id="defaultall" name="all"value="" class="selectgroup-input" >
                        <span class="selectgroup-button">DefaultAll</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" id="allowall" name="all" value="true" class="selectgroup-input" >
                        <span class="selectgroup-button">AllowAll</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#denyall').click(function(){
                
                $('.Deny').removeAttr('checked');
                $('.Default').removeAttr('checked');
                $('.Allow').removeAttr('checked');

                $('.Deny').attr('checked','checked');
            });

            $('#defaultall').click(function(){
                $('.Deny').removeAttr('checked');
                $('.Default').removeAttr('checked');
                $('.Allow').removeAttr('checked');

                $('.Default').attr('checked','checked');
            });

            $('#allowall').click(function(){
                $('.Deny').removeAttr('checked');
                $('.Default').removeAttr('checked');
                $('.Allow').removeAttr('checked');

                $('.Allow').attr('checked','checked');                
            });

        })
    </script>

@endpush
