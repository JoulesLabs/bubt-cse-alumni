<script !src="">
   @foreach(toaster()->get() as $key => $alert)
      @if($key == "success")
        iziToast.success({
            title: 'Success!',
            message: "{{ $alert }}",
            position: 'topRight'
        });
      @endif

      @if($key == "error")
          iziToast.error({
              title: 'Error!',
              message: "{{ $alert }}",
              position: 'topRight'
          });
      @endif

      @if($key == "warning")
          iziToast.warning({
              title: 'Warning!',
              message: "{{ $alert }}",
              position: 'topRight'
          });
      @endif

      @if($key == "info")
          iziToast.info({
              title: 'Info!',
              message: "{{ $alert }}",
              position: 'topRight'
          });
      @endif
   @endforeach
</script>
