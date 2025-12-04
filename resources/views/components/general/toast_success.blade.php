@if(session('success'))
    <div id="toast-container" class="toast success">{{ session('success') }}</div>
    <script>
        const container = document.getElementById('toast-container');
        if (container) {
            setTimeout(() => {
                container.style.opacity = '0';
                setTimeout(() => container.remove(), 1500);
            }, 3000);
        }
    </script>
@endif
