<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check user role from backend
    const userRole = @json(auth()->user()->role ?? null);
    
    // Protect chef-only buttons and links
    const chefOnlyElements = document.querySelectorAll('[data-chef-only]');
    
    chefOnlyElements.forEach(element => {
        if (userRole !== 'chef') {
            element.style.display = 'none';
            // Or disable the element
            element.disabled = true;
            element.classList.add('opacity-50', 'cursor-not-allowed');
        }
    });
    
    // Intercept clicks on protected links
    document.addEventListener('click', function(e) {
        const target = e.target.closest('[data-chef-only]');
        if (target && userRole !== 'chef') {
            e.preventDefault();
            alert('Access denied. Chef privileges required.');
            return false;
        }
    });
});
</script>