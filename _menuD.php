<!-- Menu déroulant exportable-->
<div class="anim dropdown mb-2">
    <button class="btn btn-lg bg-secondary text-light dropdown-toggle"  
            type="button" data-bs-toggle="dropdown" style="padding: 10px 100px">
        Catégorie
    </button>
    <ul class="dropdown-menu text-center "style="padding: 10px 79px" >
        <!-- Envoie de value= en $_Get vers => filtreCat.php grace = ?value= -->
        <li><a class="dropdown-item rounded"  href="index.php">Tous les produits</a></li>
        <li><a class="dropdown-item rounded"  href="filtreCat.php?value=1">Ordinateur</a></li>
        <li><a class="dropdown-item rounded"  href="filtreCat.php?value=2">Tablette</a></li>
        <li><a class="dropdown-item rounded"  href="filtreCat.php?value=3">Mobile</a></li>
    </ul>
</div>
