<?php




require "connection.php";

$txt = $_POST["s"];
$genre = $_POST["s1"];
$price  = $_POST["s2"];
$s3 = $_POST["s3"];
$s4 = $_POST["s4"];

$query = "SELECT * FROM `product`";

$status = 0;

if($price == 0){

    if(!empty($txt)){

        $query.= "WHERE `title` LIKE '%".$txt."%'";
        $status = 1;

    }

    if( $status == 0 && $genre != 0){
        $query.= "WHERE `Genre_ID` = '".$genre."'";
        $status = 1;

    }else if($status != 0 && $genre !=1){

        $query.= "AND `Genre_ID` = '".$genre."'";
    }
    

}

if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}


$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 10;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {
?>





    <div class="col-4">
        <div class="card bg-black" style="width: 18rem;">
            <img src="resources/capsule_616x353.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                    <h5 class="cd1"><?php echo $results_data["title"];?></h5>
                    <p class="cdt"><?php echo $results_data["description"];?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>


<?php

}

?>

    



<div class="offset-lg-4 col-12 col-lg-4 mb-3 text-center">
    <div class="row">

        <div class="pagination">
            <a <?php if ($pageno <= 1) {
                    echo "#";
                } else {
                ?> onclick="search1('<?php echo ($pageno - 1); ?>')" <?php
                                                                        } ?>>&laquo;</a>

            <?php

            for ($page = 1; $page <= $number_of_pages; $page++) {

                if ($page == $pageno) {

            ?>
                    <a onclick="search1('<?php echo ($page); ?>')" class="active">
                        <?php echo $page; ?>
                    </a>
            <?php

                }else{

                    ?>
                    <a onclick="search1('<?php echo ($page); ?>')">
                        <?php echo $page; ?>
                    </a>
            <?php

                }
            }

            ?>

            <a <?php if ($pageno >= $number_of_pages) {
                    echo "#";
                } else {
                ?> onclick="search1('<?php echo ($pageno + 1); ?>')" <?php
                                                                        } ?>>&raquo;</a>
        </div>

    </div>
</div>




