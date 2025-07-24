document.addEventListener('DOMContentLoaded', function() {
    const panelToggle = document.getElementById('panelToggle');
    const sidePanel = document.getElementById('sidePanel');
    const overlay = document.getElementById('overlay');

    panelToggle.addEventListener('click', function() {
        sidePanel.classList.toggle('panel-open');
        overlay.classList.toggle('active');
        this.classList.toggle('active');
    });


    overlay.addEventListener('click', function() {
        sidePanel.classList.remove('panel-open');
        overlay.classList.remove('active');
        panelToggle.classList.remove('active');
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            sidePanel.classList.remove('panel-open');
            overlay.classList.remove('active');
            panelToggle.classList.remove('active');
        }
    });
});