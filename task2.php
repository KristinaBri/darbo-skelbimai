<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-color: grey;
        }
    </style>

    <title>TASK 2</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-9">
<?php include "skelbimai.php"; ?>
            <table class="table table-dark">
                 <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Text</th>
                        <th>Cost</th>
                        <th>onPay</th>
                     </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($skelbimai as $skelbimas) {
                    ?>
                    <tr>
                        <td><?=$skelbimas['id'] ?></td>
                        <td><?=$skelbimas['text']?></td>
                        <td><?=$skelbimas['cost']?></td>
                        <td>
                            <?php 
                                $onPay = $skelbimas['onPay'];
                                
                                if ($onPay == 0) {
                                    echo $onPay;
                                } else {
                                    $onPay = date('Y-m-d H:i:s', $onPay);
                                    echo $onPay;
                                }
                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="card col-md-4 ms-5 mt-5 mb-5">
        <div class="card-body">
            <?php 
            $visoSkelbimu = sizeof($skelbimai);
            echo "Iš viso skelbimų: " . $visoSkelbimu . "<br>";
            ?>
             
            <?php 
                $visoApmoketa = 0;
                $apmoketuSuma = 0;
                $visoNeapmoketa = 0;
                $neapmoketuSuma = 0;
                foreach ($skelbimai as $skelbimas) {
               
                    if ($skelbimas['onPay'] > 0) {
                        $visoApmoketa++;
                        $apmoketuSuma += $skelbimas['cost'];
                    } else {
                        $visoNeapmoketa++;
                        $neapmoketuSuma +=  $skelbimas['cost']; 
                    }
                }
                
                
            ?>

            <?php 
                echo "Iš viso apmokėtų skelbimų: " . $visoApmoketa . "<br>";
                echo "Apmokėtų skelbimų kainų suma: " . $apmoketuSuma . "<br>";
                echo "Iš viso neapmokėtų skelbimų: " . $visoNeapmoketa . "<br>";
                echo "Neapmokėtų skelbimų kainų suma: " . $neapmoketuSuma . "<br>";
            ?>

            
        </div>
    </div>
    

</body>
</html>