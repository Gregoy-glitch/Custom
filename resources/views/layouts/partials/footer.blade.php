<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} My System.</strong> All rights reserved.
</footer>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-sign-out-alt mr-2"></i>Confirm Logout</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"
                    onclick="document.getElementById('logout-form').submit();">
                    Yes, Logout
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<!-- Toast Alerts -->
@if(session('success'))
<div id="toast-success" style="position:fixed; bottom:20px; right:20px; z-index:9999;">
    <div class="toast show align-items-center text-white bg-success border-0 shadow" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
            <button type="button" class="ml-auto mr-2 close text-white" data-dismiss="toast">
                <span>&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

@if(session('danger'))
<div id="toast-danger" style="position:fixed; bottom:20px; right:20px; z-index:9999;">
    <div class="toast show align-items-center text-white bg-danger border-0 shadow" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-exclamation-circle mr-2"></i>{{ session('danger') }}
            </div>
            <button type="button" class="ml-auto mr-2 close text-white" data-dismiss="toast">
                <span>&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

<script>
    // Auto-hide toasts after 4 seconds
    setTimeout(function () {
        document.querySelectorAll('.toast').forEach(function (el) {
            el.classList.remove('show');
        });
    }, 4000);
</script>