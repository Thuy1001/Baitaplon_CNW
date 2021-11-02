<?php include "header.php" ?>




<!-- search -->
<nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form class="d-flex mx-auto col-md-6">
                <input class="form-control me-2" type="search" placeholder="Search for Book.." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>     
        </div>
        <!-- end container-fluid -->
    </nav>
    <!-- end nav search -->


    
    <?php
  
  include"config.php";

  $sql    ="SELECT*FROM products" ;

  $result = mysqli_query($conn,$sql); 

  if(mysqli_num_rows($result)>0){
          
      while ($row = mysqli_fetch_assoc($result)){
  

?>

<div class="container">

              <div class="box-3 float-container">
                      <div class="card card-product mb-3">
                          <img class="card-img-top" src="images/<?php echo $row['feature_image']; ?>" alt="Card image cap">
                          <div class="card-body">
                              <h5 class="card-title product-title"><?php echo $row['pro_title']; ?></h5>
                              <a href ="#" class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                              <a href="details.php?pro_id=<?php echo $row['pro_id'];  ?>" class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                          </div>
                      
                      </div>
              </div>

</div>
              <?php
      } //đóng while
  } //đóng if
                      ?>

    <!-- <div class="container">
        <div class="row mt-5">
            <h2 class="list-product-title">Tôn Giáo-Tâm Linh</h2>
            <div class="product-group">
                <div class="row">

                <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="images/thiensuvaembe5tuoi.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title product-title">Thiền sư và em bé 5 tuổi</h5>
                                <div class="card-text product-price">
                                    <span class="del-price">100.000 vnd</span>
                                </div>
                                <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="images/tinhlang.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title product-title">Tĩnh lặng</h5>
                                <div class="card-text product-price">
                                    <span class="del-price">100.000 vnd</span>
                                </div>
                                <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                   
                <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="images/muonanduocan.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title product-title">Muốn an được an</h5>
                                <div class="card-text product-price">
                                    <span class="del-price">100.000 vnd</span>
                                </div>
                                <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="images/gian.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title product-title">Giận</h5>
                                <div class="card-text product-price">
                                    <span class="del-price">100.000 vnd</span>
                                </div>
                                <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                </div> <!--end row-->

            <!-- </div> end product-group --> 





            <!-- <h2 class="list-product-title">Truyện ngắn - Tản văn</h2>
            <div class="product-group">
                <div class="row">

                <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="images/quenoi.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title product-title">Quê nội</h5>
                                <div class="card-text product-price">
                                    <span class="del-price">100.000 vnd</span>
                                </div>
                                <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="images/haisophan.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title product-title">Hai số phận</h5>
                                <div class="card-text product-price">
                                    <span class="del-price">100.000 vnd</span>
                                </div>
                                <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                   
                <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="images/Tatden.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title product-title">Tắt đèn</h5>
                                <div class="card-text product-price">
                                    <span class="del-price">100.000 vnd</span>
                                </div>
                                <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card card-product mb-3">
                            <img class="card-img-top" src="images/tuyeu.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title product-title">Tự yêu</h5>
                                <div class="card-text product-price">
                                    <span class="del-price">100.000 vnd</span>
                                </div>
                                <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                            </div>
                        </div>
                    </div> -->

                <!-- </div> end row -->

            <!-- </div> end product-group -->
            

        <!-- </div> end row -->

    <!-- </div> end container -->

    <!-- end category -->
    <div class="clearfix"></div>

    <?php include"footer.php"?>