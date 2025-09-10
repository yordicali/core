<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
	<script src="{{asset('assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    <script>
      document.addEventListener('submit', function (e) {
        const form = e.target;
        if (form.matches('form[data-confirm]')) {
          e.preventDefault();
          const msg = form.getAttribute('data-confirm') || '¿Estás seguro?';
          const title = form.getAttribute('data-confirm-title') || 'Confirmar acción';
          const yes = form.getAttribute('data-confirm-yes') || 'Sí, continuar';
          const no = form.getAttribute('data-confirm-no') || 'Cancelar';
          Swal.fire({
            title: title,
            text: msg,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: yes,
            cancelButtonText: no,
            reverseButtons: true,
          }).then((result) => {
            if (result.isConfirmed) form.submit();
          });
        }
      });
    </script>
    @stack('scripts')
</body>

</html>
