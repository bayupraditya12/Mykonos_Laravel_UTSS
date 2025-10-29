<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mykonos {{ date('Y') }}</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Scripts -->
<!-- jQuery (wajib pertama) -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Bundle (sudah termasuk Popper.js) -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Plugin jQuery Easing -->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- SB Admin 2 main JS -->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Optional: Chart.js (kalau kamu pakai grafik di dashboard) -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<script>
  $(document).ready(function () {
    $('#accordionSidebar .collapse').collapse({ toggle: false });
  });
</script>

</body>
</html>
