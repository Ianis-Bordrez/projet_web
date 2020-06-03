		    </div> <!-- Content -->
            <!-- ---------------------CONTENT-END--------------------- -->
	    </div> <!-- Wrapper -->

        <!-- ---------------------OPTION--------------------- -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- ---------------------OPTION-END--------------------- -->

        <script>
            $(document).ready(function(){
                $('#sidebarCollapse').on('click',function(){
                    $('#sidebar').toggleClass('active');
                });
            });  
        </script>

        <!-- ---------------------HAMBURGER--------------------- -->
        <script>
            var hamburger = document.querySelector(".hamburger");
            hamburger.addEventListener("click", function() {
            hamburger.classList.toggle("is-active");
            });
        </script>
        <!-- ---------------------HAMBURGER-END--------------------- -->
    </body>
</html>