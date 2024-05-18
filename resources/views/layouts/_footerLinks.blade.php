<!-- # JS Plugins -->
<script src="{{asset('font_utilisateurs/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('font_utilisateurs/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('font_utilisateurs/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('font_utilisateurs/plugins/scrollmenu/scrollmenu.min.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('font_utilisateurs/js/script.js')}}"></script>

<!-- # JS DataTable Plusgin -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        // Obtenir la date actuelle
        var currentDate = new Date();

        // Convertir la date actuelle en format compatible avec l'input de type date
        var formattedCurrentDate = currentDate.toISOString().split('T')[0];

        // Définir la valeur maximale de l'input de type date
        $('#typeDateNaissance').attr('max', formattedCurrentDate);
        $('#typeDateNaissance1').attr('max', formattedCurrentDate);
        $('#typeDateNaissance2').attr('max', formattedCurrentDate);
        $('#typeDateDeces').attr('max', formattedCurrentDate);
        $('#typeDateNaissance3').attr('max', formattedCurrentDate);
        $('#typeDateNaissance4').attr('max', formattedCurrentDate);
    });
</script>