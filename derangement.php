<html>
	<head>
	<title>Derangements</title>
		<style type="text/css">

			h1 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 4em;
			text-align: center;
			background: #666;
			color: #FFF;
			padding: 2px 6px;
			}
			h2{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 4em;
			text-align: center;	
			}

			#block_container
			{
   			text-align:center;
			}

			input[type=submit]{
  			font-family: Arial, Helvetica, sans-serif;
			font-size: 2em;
			text-align: center;
			}

			#count{
			font-size: 0.5em;
			position: absolute;
  			left: 570px;
  			top: 150px;
			}

		</style>
	</head>
<body>
<?php
	$n = $_GET['subject'];

	function swapp($i, $depth, &$d){
		$tmp = $d[$i];
		$d[$i] = $d[$depth];
		$d[$depth] = $tmp;
	}

	function deranged($depth, $len, $d)
	{      
        if ($depth == $len) {             
        		echo "<h1>";
        		for ($i = 0; $i < $len; $i++){
        			echo $i;
        		}
        		echo "<br>";
                for ($i = 0; $i < $len; $i++){
                	echo $d[$i];
                } 
				echo "</h1>";
                echo "<br>";

                return;
        }

        for ($i = $len - 1; $i >= $depth; $i--) {
                if ($i == $d[$depth]) continue;
 
                swapp($i, $depth, $d);
                deranged($depth + 1, $len, $d);
                swapp($i, $depth, $d);
        }
	}

	function gen($n)
	{
        $a = array(); 
 
        for ($i = 0; $i < $n; $i++){
        	$a[$i] = $i;
        } 

        return deranged(0, $n, $a);
	}


	function countC($n) 
	{   
	    if ($n == 1)  
	        return 0; 
	    if ($n == 0) 
	        return 1; 
	    if ($n == 2)  
	        return 1; 

	    return ($n - 1) * (countC($n - 1) + countC($n - 2)); 
	} 

	if ($n > 1){
	echo "<div id='block_container'><div id='butt'> <form action='derangement_html.html'>
   		  <input type='submit' value='Go to previous page' />
		  </form> </div> 
		  <div id='words'> <h2> Your Derangements </h2></div></div>";
	
	echo "<div id='count'><h2>Amount of Derangements = ".countC($n)."</h2></div>";

	gen($n);
	} else {
		echo "<div id='block_container'><div id='butt'> <form action='derangement_html.html'>
			  <input type='submit' value='Go to previous page' />
		      </form> </div>
		      <br><h2>Please enter a bigger number</h2>";	
	}
?>
</body>
</html>