        $n = [1,2,3,4];
        $r = $n;
        for($i=0; $i<=count($n); $i++) {
            $jumlah_n[$i] = 1;
            for($j=0; $j<=$i; $j++){

                // !n
                $jumlah_n[$i] *= $n[$j];
                $faktorial_n[$i] = $jumlah_n[$i];
                
                // !r
                if($i<$n[$j]){
                    $faktorial_r[$j] = $faktorial_n[$i];
                }               
                
                // n-r
                $sub[$i] = $n[$i] - $r[$j];
                if($sub[$i]==0){
                    $sub[$i] = 1;
                }
                if($i<count($n)){
                    $n_r[$i][$j] = $sub[$i]; // Save multidimensional array
                }
            }
        }

        // !(n-r)
        for($i=0; $i<=count($n); $i++){
            // Set array outside nested loop
            $jumlah[] = 1;
            for($j=0; $j<=$i; $j++){

                $jumlah[$j] *= $n_r[$i][$j]; // Call here and get factorial
                $faktorial_n_r[$j][$i] = $jumlah[$j];
                //echo "!".$n_r[$i][$j]." = ".$faktorial_n_r[$j]."<br>";
            }
        }

        // Combinations = !n / !r !(n-r)
        echo "Show Result R1...Rn<br>";
        for($i=0; $i<count($n); $i++){
            echo "N = ".$n[$i]."<br>";
            for($j=0; $j<=$i; $j++){
                $combinations[$i] = @($faktorial_n[$i] / ($faktorial_r[$j] * $faktorial_n_r[$j][$i]));
                echo "C".$n[$i]." & R".$r[$j]." => !".$n[$i]." / ".$r[$j]." !(".$n[$i]." - ".$r[$j].") = ".$faktorial_n[$i]." / (".$faktorial_r[$j]." * ".$faktorial_n_r[$j][$i].") = ".$combinations[$i]."</br>";
            }
            echo "<br>";
        }
