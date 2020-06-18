<body>
<?php 
//     if (isset($_SESSION['SearchErrorMessage'])) {
//         echo "<div class='p-2 m-2 bg-warn '>
//                 <p>" . $_SESSION['SearchErrorMessage'] . "</p>
//              </div>";
        
//     } else {
        echo "<div class='card-deck'>";
        while($row = $data->fetch_assoc()) {
            echo "<div class='card text-center'>";
                echo "<img class='mx-auto' src='/FruitStore/presentation/images/" . $row['imageFileLocation'] . ".jpg' alt=' ". $data[$x]['name'] ." image' height='200' width='342'>";
                echo "<div class='card-body'>'";
                    echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
                    echo "<p class='card=text'>" . $row['description'] ."</p>";
                    echo "<a href='' class='btn btn-primary'>Details</a>";
                echo "</div>";
            echo "</div>";
        }
        echo "</div>";
//    }
?>
</body>



<script>
	$(document).on('click', '#q', function() {
		$('.p-2').hide();
	})
</script>

