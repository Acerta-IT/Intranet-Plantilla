<div></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('show-toast', function(data) {
            console.log(data);
            const message = data[0].message;
            const cssClass = data[0].class;


            Toastify({
                text: message, // Usa la propiedad directamente
                duration: 3000,
                gravity: 'top',
                position: 'right',
                className: cssClass, // Clase CSS dinámica
                stopOnFocus: true,
            }).showToast();
        });
    });
</script>
