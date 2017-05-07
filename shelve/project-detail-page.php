<!DOCTYPE html>


<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <!-- Meta info -->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Project Detail | 198seven</title>
    <meta content="" name="description" />
    <link rel="Shortcut Icon" type="image/x-icon" href="#" />
    
	<link href="project-detail-page.html" rel="next" />
	<link href="index.html" rel="prev" />
    <meta name="author" content="" />
    <meta name="format-detection" content="" />

    <!-- Styles -->
    <link href="styles/main.css" rel="stylesheet" media="screen, print" type="text/css" />
    <script src="lib/modernizr-2.6.2.js"></script>
</head>
<script>
 var book_id;
	function load(){
    book_id=<?php echo $_GET['data'];?>;
    console.log(book_id);
	propicload();
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
            console.log(this.responseText);
        //if(!this.responseText.match(""))
			myObj = JSON.parse(xhttp.responseText);
			console.log(myObj);
        document.getElementById("book_name").innerHTML=myObj['book_name'];
		document.getElementById("author_name").innerHTML=myObj['book_author'];
		document.getElementById("edition").innerHTML=myObj['edition']+" edition";
		document.getElementById("work-visuals").innerHTML="</br></br></br></br></br><li data-visual=\"website-design-florentina-norfolk\"><img src=\""+myObj['Image']+"\"></li>";
		document.getElementById("num").innerHTML=myObj['book_like'];
    };
    xhttp.open("GET","page.php?id="+book_id,true);

    xhttp.send();
	}
	function likec()
	{
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
            console.log(this.responseText);
        //if(!this.responseText.match(""))
			myObj = JSON.parse(xhttp.responseText);
			console.log(myObj);
			document.getElementById("num").innerHTML=myObj['book_like'];
    };
    xhttp.open("GET","page.php?id="+book_id,true);

    xhttp.send();
		
		
	}
	function like()
	{
		console.log(book_id);
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
		{
			var response=this.responseText;

			if(response=="again") {
                console.log("hello");

            }
            else likec();
		}
		
    };
    xhttp.open("GET","like.php?id="+book_id,true);

    xhttp.send();
		
	}
	 function propicload(){
     xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
            console.log(this.responseText);
        //if(!this.responseText.match(""))
            document.getElementById("propic").innerHTML=this.responseText;
            }
        xhttp.open("GET","propic.php",true);
        xhttp.send();
 }
 window.onload = load;
</script>

<body>
    <div id="container">
        <section id="content">
            
<div id="pfd-work">
	<div id="work-bio">
		<header>
			<div id="pfd">
				<a href="index.html">
            		<img src="images/pyaari-logo.png" alt="Pyaari Website - For Website and Graphic Designers">
        		</a>
            </div>
            
			<div id="preamble">
                <h1 id="book_name"></h1>
                <h2 id="author_name"></h2>
                <p id="edition"></p>
                
				
			</div>
            
            <ul id="links">
                <li>
                    <a href="index.php" id="home">Home</a>
                </li>
                <li>
                    <a id="ilovethis" onclick= like() ><span id="num"></span></a>
                </li>

            </ul>
            <ul id="reviews">

            </ul>
		</header>
    </div>
    
    <div id="work-visuals">
    	
            
        
	</div>
</section>


        <footer id="msf">
            <div class="wrapper">
                <ul id="lets-be-social">
                    <li>
                        <a href="https://twitter.com/198sevenblog" rel="external" target="_blank" title="Follow 198seven on Twitter">Twitter.</a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/198sevenblog" rel="external" target="_blank" title="Be 198seven Facebook friend">Facebook.</a>
                    </li>
                    <li>
                        <a href="http://www.pinterest.com/198seven" rel="external" target="_blank" title="My Pinterest pins">Pinterest.</a>
                    </li>
                </ul>
                <div id="legal">
                 <span>Handcrafted by<br>198seven &copy; 2014 PYAARI</span>
                </div>
            </div>
        </footer>
    </div><!-- container -->
    
    <nav id="toc">
        <ul>
            <li>
                <a href="index.php">All Books</a></li>
            <li>
                <a href="../show_seminar/index.php"></a>Seminar</li>
			<li>
				<div id ="propic">
					
				</div>
			</li>
            <li>
                 <a href="logout.php">Logout</a></li>
        </ul>
	</nav>
    

    
  <script src="ajax/jquery-1.11.0.min.js"></script>
    <script src="lib/underscore-min.js"></script>  
    <script src="lib/jquery-ext.js"></script>
  	<script src="scripts/pyaari-main.1.0.js"></script>
    <script src="scripts/pyaari-menu.1.0.js"></script>
    <script>
        $(document).ready(function () {
            PfdMenu._ctor();
        });
    </script>
    
    <script src="scripts/pyaari-work-bio.1.0.js"></script>
 

</body>
</html>