<?php function page_selec($nb_page_select) { ?>
    <script type="text/javascript">
        /*	var url = window.location.pathname;
            urlsplite = url.split("/");*/
        /*	switch (urlsplite[urlsplite.length-1]){*/
        switch (<?php echo $nb_page_select; ?>) {
            case 1 :
                document.getElementById("nav_home").classList.add("active");
                document.getElementById("the-navbar").classList.add("fixed-top");
                break;
            case 2 :
                document.getElementById("nav_produits").classList.add("active");
                break;
            case 3 :
                document.getElementById("nav_gest_produits").classList.add("active");
                break;
        }
    </script>
<?php } ?>