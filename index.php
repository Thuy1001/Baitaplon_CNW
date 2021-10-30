<?php include "header.php" ?>
<!-- search -->
    <nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form  action="<?php echo SITEURL; ?>food-search.php" method="POST" class="d-flex mx-auto col-md-6">
                <input class="form-control me-2" type="search" placeholder="Search for Book.." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>     
        </div>
        <!-- end container-fluid -->
    </nav>
    <!-- end nav search -->
    <!-- start explore -->
    <div class="container-fluid my-explore">
        <h1 class="row justify-content-md-center">Latest books</h1>
        <div class="row row1 my-row">
            <div class="col-md-4">
           
                <div class="card bg-dark text-white">
                    <img src="images/haisophan.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                    </div>
                </div>
            </div>
            <!-- end col-md-4 -->
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="images/gian.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                   
                    </div>
                </div>
            </div>
            <!-- end col-md-4 -->
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="images/thiensuvaembe5tuoi.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                    
                    </div>
                </div>
            </div>
            <!-- end col-md-4 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end explore -->
    <?php include "footer.php" ?>