<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<title>Rehabilitation Interactive Visualization</title>
		
		<!-- CSS -->
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link rel="stylesheet" href="./css/font-awesome.min.css">
		<link href="./css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="./css/application.css" rel="stylesheet">
		<link href="./css/dc.css" rel='stylesheet' />
		
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />

		<!-- JS -->
		<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script type="./js/contentslider.js"></script>
		<script src="//dc-js.github.io/dc.js/js/colorbrewer.js"></script>
		<script src="./js/crossfilter.js"></script>
		<script src="./js/d3.min.js"></script>
		<script src="./js/dc.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ4yYk3E0pv5rwJQF1fG6qzKSiY4WVlpE"></script>
		 		<script src="http://dimplejs.org/dist/dimple.v2.2.0.min.js"></script>

		<style>
			html, body {
			height: 100%;
			width: 100%;
			margin: auto;
			padding: 0;
			}
			#map {
			height: 450px;
			width: 100%;
			margin: auto;
			}
			#bubblechartterminal {
			}
			
			#exampletable{
			margin-top: 50px;
			margin-bottom: 30px;
			}
			
			#rrow{
			width: 60%;
			}

			.legend-img{
			width:150px;
			}			

			body{
				margin-top: 50px;
				position: relative;
			}
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			td, th {
				text-align: left;
				padding: 10px;
			}

		</style>
		
		<script>
			var a_lat = [];
			var a_long = [];
			var countries = [];
			var study_id = [];
			var url = [];
			var keep =[];
			var urlLinks=[];
			var link=[];
			var city=[];
			var region=[];

			d3.csv("static/Book2.csv", function(stokedatanew) {
				for (i in stokedatanew){
					//if (studyID.includes(stokedatanew[i].study_id) == false){
						countries.push(stokedatanew[i].country)
						city.push(stokedatanew[i].city)
						region.push(stokedatanew[i].region)
						a_lat.push(parseFloat(stokedatanew[i].lat2))
						a_long.push(parseFloat(stokedatanew[i].long2))
						study_id.push(stokedatanew[i].study_id_all)
						urlLinks.push(stokedatanew[i].url)
						link.push(stokedatanew[i].link)
					//};
				};

				
				fLen=a_lat.length;
				console.log(fLen);
				var bangalore =new Array(fLen);
				
				function initialize() {
					for (i = 0; i < fLen; i++) {
						bangalore[i] = new google.maps.LatLng(a_lat[i],	a_long[i]);
					}
					
					bangalore[fLen] = new google.maps.LatLng(28.0339, 1.6596);
					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 2,
						center: bangalore[fLen]
					});
				
					for (i = 0; i < fLen; i++) {
						// Add a marker at the center of the map.
						addMarker(bangalore[i], map);
					};
					// Adds a marker to the map.
					function addMarker(location, map) {

						var image = {
					        url: './static/paper.png', // image is 512 x 512
					        scaledSize : new google.maps.Size(30, 30),
					    };
						var icons = {
				          paper: {
				            icon: image
				          }
				        };
						// Add the marker at the clicked location, and add the next-available label
						// from the array of alphabetical characters.
						var marker = new google.maps.Marker({
							position: location,
							//label: labels[labelIndex++ % labels.length],
							map: map,
							icon: icons['paper'].icon
							//title: tag[tagIndex++ % tag.length]
						});

						var infowindow = new google.maps.InfoWindow({
						content: "City: "+city[i]+", Region: "+region[i]+", "+countries[i] +"<br>"+ link[i]
					});
						
						marker.addListener('click', function() {
							infowindow.open(map, marker);
						});
						
					}
				}
				google.maps.event.addDomListener(window, 'load', initialize);
			});
		</script>
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-inverse navbar-fixed-top">
 <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><b>SCOAR|</b> Interactive Visualization in Stroke Rehabilitation</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
      		<li><a href="./index.html">Home</a></li>
	        <li><a href="./page2.html">Page 2</a></li>
			<li><a href="#">Page 3</a></li>
    </ul>
      </div>
    </div>
  </div>
</nav>    


  
            
    
            
            <section id="Team" class="bg-light-gray">

            	<div class="row  vbar1">
					  <div class="row">
						<div class="col-lg-12">
							<h2 style="color:#0047b3">Meet our amazing team!</h2> 
							<p align="justify"> <strong> Interdisciplinary study </strong> plays an important role in solving complex real world problems and making desisions. 
                            It synthesizes broad perspectives, knowledge, and skills to explore and integrate knowledge across multiple disciplines. 
                            The data visualization website for SCOAR is the result of a <strong>interdisciplinary study and research </strong> which is created through the 
                            collabration of professors and Ph.D. students in engineering, information science, neuroscience, and rehabilitation. We provide a brief introduction 
                            to our team members below:</p>
						</div>
					</div>
				<!-- Team Members Row -->
					
						
						
						<table id="teamtable"  style="width:100%">
						
						
						
							  <tr>
							  <th rowspan="2", width="15%"><img  src="./static/keith.jpg" class="img-responsive"  style="border-radius: 25px;" height="170" width="170"> </th>
								<td width="85%"><b>Keith Lohse, PhD</b></td>
							  </tr>
							  <tr>
								<td width="85%", style="text-align:justify">Keith is the principal investigator of the Rehabilitation Informatics Lab at Auburn University. 
                                He received a joint-PhD in psychology, cognitive science, and neuroscience in 2012 from the University of Colorado and was a 
                                post-doctoral research associate at the University of British Columbia. The evidence-base in rehabilitation is always expanding. Researchers, 
                                clinicians, and other stakeholders need effective tools for collecting, managing, analyzing, and visualizing data. 
                                This need is especially urgent as the scale of our information grows and fields embrace progressively “bigger” data. As such, the goal of Keith's 
                                research is to help improve methods for data collection, management, and analysis in rehabilitation research and, ultimately, to improve the quality 
                                of life for individuals with disabilities.</td>
							  </tr>
							  
						
							
							  <tr style="margin-top:30px;">
							  <th rowspan="2", width="15%"><img  src="./static/nasrin.jpg" class="img-responsive"  style="border-radius: 25px;" height="170" width="170"> </th>
								<td ><b>Nasrin Mohabbati Kalejahi</b></td>
							  </tr>
							  <tr>
								<td style="text-align:justify">Nasrin is a Ph.D. student and Graduate Research and Teaching Assistant in Industrial and Systems Engineering Department 
                                at Auburn University. Her research mainly focuses on mathematical modeling and optimization of risk-averse stochastic problems with real world 
                                applications such as Portfolio Optimization, Insurance Lost Optimization, and Vehicle Routing Problems (VRP). She is also interested in big data 
                                analytics and she has studied Data Mining, Big Data, and Data Visualization. She received her Masters of Industrial and Systems Engineering (MISE) 
                                from Auburn University (Fall 2016). She has a Master of Science and a Bachelor of Science degree in Industrial Engineering from Amirkabir University 
                                of Technology (Iran) and Tabriz University (Iran), respectively.</td>
							  </tr>
							 <tr style="margin-top:30px;">
							  <th rowspan="2", style="padding-bottom: 10px; padding-top: 10px;"><img  src="./static/moh.jpg" class="img-responsive"  style="border-radius: 25px;" height="170" width="170"> </th>
								<td><b>Mohammad Ali Alamdar Yazdi</b></td>
							  </tr>
							  <tr>
								<td style="text-align:justify">Mohammad Ali is a Ph.D student in Industrial and Systems Engineering at Auburn University.</td>
							  </tr>
							  <tr style="margin-top:30px;">
							  <th rowspan="2", style="padding-bottom: 10px; padding-top: 10px;"><img  src="./static/meg.jpg" class="img-responsive"  style="border-radius: 25px;" height="170" width="170"> </th>
								<td><b>Fadel Megahed, PhD</b></td>
							  </tr>
							  <tr>
								<td style="text-align:justify">Fadel M. Megahed is an Assistant Professor of Information Systems and Analytics at Miami University. He received his Ph.D. 
                                and M.S. in Industrial and Systems Engineering from Virginia Tech, and a B.S. in Mechanical Engineering from the American University in Cairo. 
                                His current research focuses on creating new tools to store, organize, analyze, model, and visualize the large heterogeneous data sets associated with 
                                modern manufacturing, healthcare and service environments. </td>
							  </tr>
                              
                              <tr style="margin-top:30px;">
							  <th rowspan="2", style="padding-bottom: 10px; padding-top: 10px;"><img  src="./static/sys.jpg" class="img-responsive"  style="border-radius: 25px;" height="170" width="170"> </th>
								<td><b>Sydney Schaefer, PhD</b></td>
							  </tr>
							  <tr>
								<td style="text-align:justify">Sydney Schaefer is an Assistant Professor in the School of Biological and Health Systems Engineering at Arizona State 
                                University where she is the director of the Motor Rehabilitation and Learning Lab. Her lab pursues basic and translational research to support evidence-based
                                approaches to clinical neurorehabilitation.</td>
							  </tr>
							   
                              <tr style="margin-top:30px;">
							  <th rowspan="2", style="padding-bottom: 10px; padding-top: 10px;"><img  src="./static/lab.jpg" class="img-responsive"  style="border-radius: 25px;" height="170" width="170"> </th>
								<td><b>Lara Boyd, PT PhD</b></td>
							  </tr>
							  <tr>
								<td style="text-align:justify">Lara Boyd is the Canada Research Chair in the Neurobiology of Motor Learning and Director of the Brain Behavior Lab in the Faculty of 
                                Medicine at the University of British Columbia. An expert in the use of magnetic resonance imaging (MRI) and transcranial magnetic stimulation (TMS), her work seeks to 
                                understand neurobiological basis of recovery from stroke.</td>
							  </tr>
							   
                              <tr style="margin-top:30px;">
							  <th rowspan="2", style="padding-bottom: 10px; padding-top: 10px;"><img  src="./static/cel.jpg" class="img-responsive"  style="border-radius: 25px;" height="170" width="170"> </th>
								<td><b>Catherine Lang, PT PhD</b></td>
							  </tr>
							  <tr>
								<td style="text-align:justify">Catherine Lang is a Professor of Physical Therapy, Neurology, and Occupational Therapy at the Washington University School of 
                                Medicine in St. Louis. Her research is focused on characterizing neural and behavioral changes over the course of stroke recovery, improving the efficacy of  
                                current practices in motor rehabilitation, and developing new interventions that individualize rehabilitation for people with neurological injury, particulary 
                                those with stroke. </td>
							  </tr>
                              </table>

						
						
						
					

             </div>
			</section>


            <section id="Copyright">
            	<div class="row  vbar2">
					<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 style="color:#0047b3">Copyright</h3>
				<p align="justify"> <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
                <br />SCOAR is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a> 
                by Keith R. Lohse. Please feel free to use these visualizations or the SCOAR <a href="https://github.com/keithlohse/SCOAR/" target="_blank">raw data</a> at any time. 
                If you have questions about troubleshooting, or how to use the SCOAR database in your own research, please contact Keith Lohse.</p>
				<p align="justify"> We are also interested in hearing the comments and ideas of researchers in the field. Furthermore, if you have conducted a clinical trial and would like to 
                see your data added to the SCOAR database, please contact Keith Lohse. Please keep in mind that SCOAR is also continuously being updated. We will include version notes here on 
                which RCTs have been added to the database as new RCTs are incorporated.</p>
                
                <h3 style="color:#0047b3">Version Notes</h3>
				<p align="justify"> <b>2016-03-31:</b> Initial data extraction (see Lohse et al., 2016) or the full list of included references <a href="https://github.com/keithlohse/SCOAR/" target="_blank">here</a>.</p>
                
                <h3 style="color:#0047b3">Publications</h3>
				<p align="justify"> Lohse KR, Schaefer SY, Raikes AC, Boyd LA, Lang CE. Asking new questions with old data: The Centralized Open-Access Rehabilitation database for Stroke. 
                <i>Frontiers in Neurology</i>. 2016;7.</p>
				</div></div>
            </section>


			<section id="contact">
				<div class="row  vbar1">
				<h2 style="color:#0047b3">Contact us!</h2> 

			<?php
			$action=$_REQUEST['action'];
			if ($action=="")    /* display the contact form */
			    {
			    ?>
			    <form  action="" method="POST" enctype="multipart/form-data">
			    
			    	<input type="hidden" name="action" value="submit">
				<div class="form-group"> 
			    <input name="name" type="text" value="" size="50"  placeholder="Name"/>
				</div>

			    <div class="form-group"> 
			    <input name="email" type="text" value="" size="50"  placeholder="Email"/>
			    </div>
			    <div class="form-group"> 
			    <textarea name="message" rows="7" cols="50"  placeholder="Your message"></textarea><br>
			    </div>
			    <input type="submit" value="Send email"/>
			    </form>
			    <?php
			    } 
			else                /* send the submitted data */
			    {
			    $name=$_REQUEST['name'];
			    $email=$_REQUEST['email'];
			    $message=$_REQUEST['message'];
			    if (($name=="")||($email=="")||($message==""))
			        {
			        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
			        }
			    else{        
			        $from="From: $name<$email>\r\nReturn-path: $email";
			        $subject="Message sent using your contact form";
			        mail("krl0022@tigermail.auburn.edu", $subject, $message, $from);
			        echo "Email sent!";
			        }
			    }  
			?>	
			</div>
			</section>
<link href="./css/mycss.css" rel='stylesheet' />

	</body>







<script>  
	$('body').scrollspy({ target: '#navbar-example' })
	$('[data-spy="scroll"]').each(function () {
	  var $spy = $(this).scrollspy('refresh')
	})

</script>  
</html>		
