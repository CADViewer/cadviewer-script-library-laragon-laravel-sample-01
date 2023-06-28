<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Laravel CADViewer Sample</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



	<link href="{{ asset('/app/css/cadviewer-core-styles.css) }}" media="screen" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/app/css/font-awesome.min.css) }}" media="screen" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/app/css/bootstrap-multiselect.css) }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/app/css/jquery.qtip.min.css) }}" media="screen" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/app/css/jquery-ui-1.13.2.min.css) }}" media="screen" rel="stylesheet" type="text/css" />

	<link href="{{ asset('/app/css/cadviewer-bootstrap.css) }}" media="screen" rel="stylesheet" type="text/css" />
	

	<script src="{{ asset('/app/js/jquery-2.2.3.js) }}" type="text/javascript"></script>
	<!-- <script src="{{ asset('/app/js/jquery-3.5.1.js" type="text/javascript"></script> -->
	 <script src="{{ asset('/app/js/jquery.qtip.min.js) }}" type="text/javascript"></script> 

	<script src="{{ asset('/app/js/popper.js) }}" type="text/javascript"></script>

	<script src="{{ asset('/app/js/bootstrap-cadviewer.js) }}" type="text/javascript"></script>
	
	<script src="{{ asset('/app/js/jquery-ui-1.13.2.min.js) }}" type="text/javascript"></script>
	<script src="{{ asset('/app/js/eve.js) }}" type="text/javascript" ></script>
	
	<script src="{{ asset('/app/cv/cv-pro/cadviewer.min.js) }}" type="text/javascript" ></script> 

	<script src="{{ asset('/app/cv/cv-pro/custom_rules_template.js) }}" type="text/javascript" ></script>
    <script src="{{ asset('/app/cv/cv-custom_commands/CADViewer_custom_commands.js) }}" type="text/javascript" ></script>

	<script src="{{ asset('/app/cv/cvlicense.js) }}" type="text/javascript" ></script> 
	 
	 
	<script src="{{ asset('/app/js/bootstrap-multiselect.js) }}" type="text/javascript" ></script>
	<script src="{{ asset('/app/js/library_js_svg_path.js) }}" type="text/javascript"></script>			
	<script src="{{ asset('/app/js/snap.svg-min.js) }}" type="text/javascript" ></script>

	<script src="{{ asset('/app/js/cvjs_api_styles_2_0_26.js) }}" type="text/javascript" ></script>
	<script src="{{ asset('/app/js/rgbcolor.js) }}"type="text/javascript" ></script>
	<script src="{{ asset('/app/js/StackBlur.js) }}"type="text/javascript" ></script>
	<script src="{{ asset('/app/js/canvg.js) }}" type="text/javascript"  ></script>
	<script src="{{ asset('/app/js/list.js) }}" type="text/javascript"></script>
	<script src="{{ asset('/app/js/jscolor.js) }}" type="text/javascript" ></script>
	
	<script src="{{ asset('/app/js/jstree/jstree.min.js) }}"></script>
	<script src="{{ asset('/app/js/xml2json.min.js) }}"></script>
	<script src="{{ asset('/app/js/d3.v3.min.js) }}"></script>  
	<script src="{{ asset('/app/js/qrcode.min.js) }}" type="text/javascript"></script> 



	<script type="text/javascript">

// PATH and FILE to be loaded, can be in formats DWG, DXF, DWF, SVG , JS, DGN, PCF, JPG, GIF, PNG

/*
// Location of installation folders
var ServerBackEndUrl = "";
var ServerUrl = "http://localhost/";
var ServerLocation = "/home/casper/laravel/example-app/public/";
var FileName = ServerUrl + "/home/casper/laravel/example-app/public/content/drawings/dwg/hq17_.dwg";	
*/

// NodeJS server  with JavaScript front-end
//var ServerBackEndUrl = "http://127.0.0.1:3000/";
//var ServerUrl = "http://127.0.0.1:8000/";
//var ServerLocation = "/nodejs/cadviewer-conversion-server/";

//var ServerBackEndUrl = "http://localhost/cadviewer/";
//var ServerUrl = "http://localhost/cadviewer/";
// var ServerLocation = "/laragon/www/cadviewer/";

var ServerBackEndUrl = "http://cadviewer-laravel-8.test/";
var ServerUrl = "http://cadviewer-laravel-8.test/";


var ServerLocation = "/laragon/www/cadviewer-laravel-8/public/";

var FileName = ServerUrl + "/content/drawings/dwg/hq17_.dwg";	
        
var textLayer1; 


$(document).ready(function()
    {
    cvjs_debugMode(true);

    // Set CADViewer with full CADViewer Pro features
    cvjs_CADViewerPro(true);

    cvjs_setServerLocationURL(ServerLocation, ServerUrl);
    cvjs_setServerBackEndUrl(ServerBackEndUrl);
    // cvjs_setServerBackEndUrl(ServerBackEndUrl);
   cvjs_setHandlerSettings("PHP", "floorPlan");

    // cvjs_setServerBackEndUrl(ServerBackEndUrl);
    // cvjs_setHandlerSettings("PHP", "floorPlan");

   // cvjs_setHandlers_FrontEnd("NodeJS", "JavaScript", "floorPlan");


    var myDrawing = cvjs_GetURLParameter("drawing_name");
		console.log("DRAWING NAME >"+cvjs_GetURLParameter("drawing_name")+"</end>  ");
		if (myDrawing==""){
			console.log("no drawing_name parameter!!!");				
		}
		else{
//			console.log("we pass over to FileName to load Drawing");
			FileName =  myDrawing;
		}
		
		cvjs_jsonLocation = cvjs_GetURLParameter("json_location");
		console.log("json_location >"+cvjs_GetURLParameter("json_location")+"</end>  ");
		if (cvjs_jsonLocation==""){
			console.log("no json_location!");				
		}
		else{
//			window.alert("WE GOT JSON "+cvjs_jsonLocation);
			console.log("WE GOT JSON "+cvjs_jsonLocation);
		}

		var print_modal_custom_checkbox = cvjs_GetURLParameter("print_modal_custom_checkbox");
		console.log("print_modal_custom_checkbox >"+cvjs_GetURLParameter("print_modal_custom_checkbox")+"</end>  ");
		if (print_modal_custom_checkbox==""){
			console.log("no print_modal_custom_checkbox!");				
		}
		else{
//			window.alert("WE GOT print_modal_custom_checkbox "+print_modal_custom_checkbox);
			cvjs_setPrintModalCustomCheckBox(true, print_modal_custom_checkbox);
		}


		// For "Merge DWG" / "Merge PDF" commands, set up the email server to send merged DWG files or merged PDF files with redlines/interactive highlight.
		// See php / xampp documentation on how to prepare your server
		cvjs_emailSettings_PDF_publish("From CAD Server", "my_from_address@mydomain.com", "my_cc_address@mydomain.com", "my_reply_to@mydomain.com");
		
		// CHANGE LANGUAGE - DEFAULT IS ENGLISH
		cvjs_loadCADViewerLanguage("English");// cvjs_loadCADViewerLanguage("English", "/app/cv/cv-pro/language_table/cadviewerProLanguage.xml");
		// Available languages:  "English" ; "French, "Korean", "Spanish", "Portuguese", "Portuguese (Brazil)" ;  "Russian" ; "Malay" ;  "Chinese-Simplified"
				
		// Set Icon Menu Interface controls. Users can: 
		// 1: Disable all icon interfaces
		//  cvjs_displayAllInterfaceControls(false, "floorPlan");  // disable all icons for user control of interface
		// 2: Disable either top menu icon menus or navigation menu, or both
		//	cvjs_displayTopMenuIconBar(false, "floorPlan");  // disable top menu icon bar
		//	cvjs_displayTopNavigationBar(false, "floorPlan");  // disable top navigation bar
		// 3: Users can change the number of top menu icon pages and the content of pages, based on a configuration file in folder /cadviewer/app/js/menu_config/

		//	cvjs_setTopMenuXML("floorPlan", "cadviewerjs_menu_viewing_only.xml", "/app/cv/community/menu_config/");		
		//	cvjs_setTopMenuXML("floorPlan", "cadviewer_space_icon_commands_base_01.xml", "/app/cv/cv-pro/menu_config/");
		cvjs_setTopMenuXML("floorPlan", "cadviewer_full_commands_01.xml"); //cvjs_setTopMenuXML("floorPlan", "cadviewer_full_commands_01.xml", "/app/cv/cv-pro/menu_config/");
		

		// Initialize CADViewer  - needs the div name on the svg element on page that contains CADViewerJS and the location of the
		// main application "app" folder. It can be either absolute or relative

		// THIS IS THE DESIGN OF THE pop-up MODAL WHEN CLICKING ON SPACES
		var my_cvjsPopUpBody = "<div class=\"cvjs_modal_1\" onclick=\"my_own_clickmenu1();\">Custom<br>Hello!<br><i class=\"glyphicon glyphicon-transfer\"></i></div>";
		my_cvjsPopUpBody += "<div class=\"cvjs_modal_1\" onclick=\"my_own_clickmenu2();\">Custom<br>Menu 2<br><i class=\"glyphicon glyphicon-info-sign\"></i></div>";
		my_cvjsPopUpBody += "<div class=\"cvjs_modal_1\" onclick=\"cvjs_zoomHere();\">Zoom<br>Here<br><i class=\"glyphicon glyphicon-zoom-in\"></i></div>";


		 // SETTINGS OF THE COLORS OF SPACES
		  cvjsRoomPolygonBaseAttributes = {
					fill: '#ffd7f4', //'#D3D3D3',   // #FFF   #ffd7f4
					"fill-opacity": 0.3,    //"0.05",   // 0.1
					stroke: '#CCC',  
					'stroke-width': 0.25,
					'stroke-linejoin': 'round',
					"opacity": 0.3  
				};

                
        cvjsRoomPolygonBaseAttributes = {
            fill: '#fff', //'#D3D3D3',   // #FFF   #ffd7f4
            "fill-opacity": 0.01,    //"0.05",   // 0.1
            stroke: '#CCC',  
            'stroke-width': 0.25,
            'stroke-linejoin': 'round',
            "opacity": 0.4  
        };


		  cvjsRoomPolygonHighlightAttributes = {
				  fill: '#a4d7f4',
				  "fill-opacity": "0.8",
				  stroke: '#a4d7f4',
				  'stroke-width': 0.75,
                  "opacity": 0.8   
				};
				
		  cvjsRoomPolygonSelectAttributes = {
				  fill: '#5BBEF6',
				  "fill-opacity": "0.8",
				  stroke: '#5BBEF6',
				  'stroke-width': 0.75,
                  "opacity": 0.8   
				};
     
            
//      Setting Space Object Modals Display to be based on a callback method - VisualQuery mode -
        cvjs_setCallbackForModalDisplay(true, myCustomPopUpBody, populateMyCustomPopUpBody);

		// Initialize CADViewer - needs the div name on the svg element on page that contains CADViewerJS and the location of the
		// And we intialize with the Space Object Custom values
		cvjs_InitCADViewer_highLight_popUp_app("floorPlan", ServerUrl+"app/", cvjsRoomPolygonBaseAttributes, cvjsRoomPolygonHighlightAttributes, cvjsRoomPolygonSelectAttributes, my_cvjsPopUpBody );

//		cvjs_InitCADViewer_app("floorPlan", ServerUrl+"app/");
//		//cvjs_InitCADViewerJS_app("floorPlan", "../app/");
		 
		// set the location to license key, typically the js folder in main app application folder ../app/js/
		 cvjs_setLicenseKeyPath(ServerUrl+"/app/cv/");
		// alternatively, set the key directly, by pasting in the cvKey portion of the cvlicense.js file, note the JSON \" around all entities 	 
		//cvjs_setLicenseKeyDirect('{ \"cvKey\": \"00110010 00110010 00110000 00110010 00110001 00111001 00111001 00110001 00110100 00111000 00110001 00110100 00110101 00110001 00110101 00110111 00110001 00110101 00111001 00110001 00110100 00111000 00110001 00110101 00110010 00110001 00110100 00110101 00110001 00110100 00110001 00110001 00110100 00110000 00110001 00111001 00110111 00110010 00110000 00110111 00110010 00110000 00110110 00110010 00110000 00110001 00110010 00110001 00110000 00110010 00110000 00111000 00110010 00110001 00110000 00110010 00110000 00111000 00110010 00110001 00110000 00110010 00110000 00110111 00110001 00111001 00111000 00110010 00110000 00110110 00110010 00110000 00111000 00110010 00110000 00110111 00110001 00111001 00111001 00110010 00110001 00110001 00110010 00110000 00111000 00110010 00110000 00110111 00110010 00110001 00110001 00110010 00110000 00110101 00110010 00110000 00111000 \" }');		 
		 
		cvjs_allowFileLoadToServer(true);

//		cvjs_setUrl_singleDoubleClick(1);
//		cvjs_encapsulateUrl_callback(true);

		// NOTE BELOW: THESE SETTINGS ARE FOR SERVER CONTROLS FOR UPLOAD OF REDLINES, FILES, SPACE OBJECTS
		cvjs_setServerFileLocation_AbsolutePaths(ServerLocation+'/content/drawings/dwg/', ServerUrl+'content/drawings/dwg/',"","");
		cvjs_setRedlinesAbsolutePath(ServerUrl+'/content/redlines/fileloader_610/', ServerLocation+'/content/redlines/fileloader_610/');
		cvjs_setSpaceObjectsAbsolutePath(ServerUrl+'/content/spaceObjects/', ServerLocation+'/content/spaceObjects/');
        cvjs_setInsertImageObjectsAbsolutePath(ServerUrl+'/content/inserted_image_objects/', ServerLocation+'/content/inserted_image_objects/')

        // NOTE ABOVE: THESE SETTINGS ARE FOR SERVER CONTROLS FOR UPLOAD OF REDLINES, FILES, SPACE OBJECTS

		// NOTE BELOW: THESE SETTINGS ARE FOR SERVER CONTROLS FOR CONVERTING DWG, DXF, DWF files
		cvjs_conversion_clearAXconversionParameters();

		var dgn_workspace = cvjs_GetURLParameter("dgn_workspace");
		console.log("dgn_workspace >"+cvjs_GetURLParameter("dgn_workspace")+"</end>  ");
		if (dgn_workspace==""){
			console.log("no dgn_workspace parameter!!!");				
		}
		else{
//			window.alert("WE GOT workspace"+dgn_workspace);
			console.log("WE GOT workspace"+dgn_workspace);
			cvjs_setDgnWorkSpace(dgn_workspace, "");
		}

//		cvjs_conversion_addAXconversionParameter("model", "");		
        cvjs_conversion_addAXconversionParameter("last", "");		
        

        // USE THESE TO PROCESS LAYERS RM_ AND RM_TXT FOR INTERACTIVE HIGHLIGHT 
        cvjs_conversion_addAXconversionParameter("rl", "RM_");		 
		cvjs_conversion_addAXconversionParameter("tl", "RM_TXT");	


//		cvjs_conversion_addAXconversionParameter("RL", "EC1 Space Polygons");		 
//    	cvjs_conversion_addAXconversionParameter("TL", "EC1 Space Numbers");		 

        cvjs_conversion_addAXconversionParameter("la", "");		

        // USE THIS FOR PROCESSING AUTOCAD HANDLES        
 //       cvjs_conversion_addAXconversionParameter("hlall", "");		

//        cvjs_conversion_addAXconversionParameter("lw", "0.1");		 
//		cvjs_conversion_addAXconversionParameter("lwmin", "0.4");	

        // USE THIS TO CALCULATE AREA OF RL/TL PROCESSED SPACES

		cvjs_conversion_addAXconversionParameter("fpath", ServerLocation +"converters/ax2020/windows/fonts");		 
		
		// NOTE ABOVE: THESE SETTINGS ARE FOR SERVER CONTROLS FOR CONVERTING DWG, DXF, DWF files
		// Load file - needs the svg div name and name and path of file to load
	
		
//		cvjs_LoadDrawing_SVG("floorPlan", FileName );
//		cvjs_LoadDrawing_SVG("floorPlan", FileName, "myname" );

//		var svgstring = "<svg><path id=\"cv_2\" fill=\"#F0F000\" stroke=\"#F0F000\" d=\"M339.4,-242.41L180.25,233.82L31.07,680.83l99.77,37.31L427.02,802.33L625.19,836.58l17.62,2.21L865.28,856.43L1010.23,873.56L1211.4,897.49l46.41,5.56L1491.41,945.48L1674.11,977.56L2017.97,1090.17l77.6,25.81l13.91,-34.33L2461.59,125.43\" /></svg>";

/*
		var finalUrl = 	cvjs_serverHandlersPath + cvjs_serverLoadFileController;
		var filelist_data = {};
		filelist_data['file'] = FileName;

		jQuery.ajax({
			url:finalUrl,
			type: 'post',
			data: filelist_data,
			success: function(svgstring){

				cvjs_LoadDrawing_SVG_string("floorPlan", svgstring, "hello" , false);

//				svgstring = btoa(svgstring);
//				cvjs_LoadDrawing_SVG_string("floorPlan", svgstring, "helloBase" , false);

			}

		});

*/

		cvjs_LoadDrawing("floorPlan", FileName );


		
		// set maximum CADViewer canvas side
	    cvjs_resizeWindow_position("floorPlan" );
		// alternatively set a fixed CADViewer canvas size
		//	cvjs_resizeWindow_fixedSize(800, 600, "floorPlan");		

		// NOTE
		// we initialize the space icon size to 100%
		cvjs_setGlobalSpaceImageObjectScaleFactor(1.0);

		// here we clone icons to be able to move them into the canvas
		
		$("#device_drag").clone().appendTo("#myImagesToDrag").prop('id', 'device_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#wifi_drag").clone().appendTo("#myImagesToDrag").prop('id', 'wifi_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#pin_drag").clone().appendTo("#myImagesToDrag").prop('id', 'pin_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#aircon_drag").clone().appendTo("#myImagesToDrag").prop('id', 'aircon_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#boiler_drag").clone().appendTo("#myImagesToDrag").prop('id', 'boiler_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#vent_drag").clone().appendTo("#myImagesToDrag").prop('id', 'vent_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#temp_drag").clone().appendTo("#myImagesToDrag").prop('id', 'temp_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#assembly_drag").clone().appendTo("#myImagesToDrag").prop('id', 'assembly_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#danger_drag").clone().appendTo("#myImagesToDrag").prop('id', 'danger_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#fire_alarm_drag").clone().appendTo("#myImagesToDrag").prop('id', 'fire_alarm_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#fire_exit_drag").clone().appendTo("#myImagesToDrag").prop('id', 'fire_exit_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#fire_extinguisher_drag").clone().appendTo("#myImagesToDrag").prop('id', 'fire_extinguisher_drag_clone').css('position', 'absolute').css('width','40px').hide(); 
		$("#refuge_point_drag").clone().appendTo("#myImagesToDrag").prop('id', 'refuge_point_drag_clone').css('position', 'absolute').css('width','40px').hide(); 

		$("#myImagesToDrag").mousemove(function(event) {
		    //console.log(insertImageSelected);
		  //console.log(event.pageX+"  "+event.pageY);
		  handleDragImages(event);
		});		

		$("#space_icon_table2").mousemove(function(event) {
		    // console.log(insertImageSelected);
		  // console.log(event.pageX+"  "+event.pageY);
		  handleDragImages(event);
		});



		$("#space_icon_table2").mouseover(function(event) {

		});


		$("#space_icon_table2").mouseup(function(event) {

		  console.log("hello "+insertImageSelected);
		  console.log(event.pageX+"  "+event.pageY);
		  
		  if (insertImageSelected == 0){
			lastXbeforeDrag = event.pageX;
			lastYbeforeDrag = event.pageY;
		  }
			
		  if (lastYbeforeDrag>device_from_top_base && lastYbeforeDrag< (device_from_top_base+height*1)){
			insertImageSelected = 1;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*1) && lastYbeforeDrag<(device_from_top_base+height*2)){
			insertImageSelected = 2;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*2) && lastYbeforeDrag<(device_from_top_base+height*3)){
			insertImageSelected = 3;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*3) && lastYbeforeDrag<(device_from_top_base+height*4)){
			insertImageSelected = 4;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*4) && lastYbeforeDrag<(device_from_top_base+height*5)){
			insertImageSelected = 5;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*5) && lastYbeforeDrag<(device_from_top_base+height*6)){
			insertImageSelected = 6;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*6) && lastYbeforeDrag<(device_from_top_base+height*7)){
			insertImageSelected = 7;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*7) && lastYbeforeDrag<(device_from_top_base+height*8)){
			insertImageSelected = 8;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*8) && lastYbeforeDrag<(device_from_top_base+height*9)){
			insertImageSelected = 9;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*9) && lastYbeforeDrag<(device_from_top_base+height*10)){
			insertImageSelected = 10;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*10) && lastYbeforeDrag<(device_from_top_base+height*11)){
			insertImageSelected = 11;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*11) && lastYbeforeDrag<(device_from_top_base+height*12)){
			insertImageSelected = 12;
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*12) && lastYbeforeDrag<(device_from_top_base+height*13)){
			insertImageSelected = 13;
		  } 
		  
		  handleDragImages(event);
		});


		$("#myImagesToDrag").mouseleave(function(event) {
					
		  if (insertImageSelected == 1){
			$("#device_drag_clone").hide();	  
		  }
		  if (insertImageSelected == 2){
			$("#wifi_drag_clone").hide();	  
		  }
		  if (insertImageSelected == 3){
			$("#pin_drag_clone").hide();	  
		  }
		  if (insertImageSelected == 4){
			$("#aircon_drag_clone").hide();	  
		  }
		  if (insertImageSelected == 5){
			$("#boiler_drag_clone").hide();	  
		  }
		  if (insertImageSelected == 6){
			$("#vent_drag_clone").hide();	  
		  }
		  if (insertImageSelected == 7){
			$("#temp_drag_clone").hide();	  
		  }
		  if (insertImageSelected == 8){
			$("#assembly_drag_clone").hide();
		}
		if (insertImageSelected == 9){
			$("#danger_drag_clone").hide();
		}
		if (insertImageSelected == 10){
			$("#fire_alarm_drag_clone").hide();
		}
		if (insertImageSelected == 11){
			$("#fire_exit_drag_clone").hide();
		}
		if (insertImageSelected == 12){
			$("#fire_extinguisher_drag_clone").hide();
		}
		if (insertImageSelected == 13){
			$("#refuge_point_drag_clone").hide();
		}

		  $('#icon_div_popup').hide();
			console.log("out...."+insertImageSelected);
			insertImageSelected = 0;		
		});


   });  // end ready()



   $(window).resize(function() {
		// set maximum CADViewer canvas side
	    cvjs_resizeWindow_position("floorPlan" );
		// alternatively set a fixed CADViewer canvas size
		//	cvjs_resizeWindow_fixedSize(800, 600, "floorPlan");		
   });
	
/// NOTE: THESE METHODS BELOW ARE JS SCRIPT CALLBACK METHODS FROM CADVIEWER JS, THEY NEED TO BE IMPLEMENTED BUT CAN BE EMPTY

	function cvjs_OnLoadEnd(){
			// generic callback method, called when the drawing is loaded
			// here you fill in your stuff, call DB, set up arrays, etc..
			// this method MUST be retained as a dummy method! - if not implemeted -
			cvjs_resetZoomPan("floorPlan");

			var user_name = "Bob Smith";
			var user_id = "user_1";

			// set a value for redlines
			cvjs_setCurrentStickyNoteValues_NameUserId(user_name, user_id );
			cvjs_setCurrentRedlineValues_NameUserid(user_name, user_id);
            
            // NOTE-NOTE:  cvjs_dragBackgroundToFront_SVG cannot be used with HLALL
			// cvjs_dragBackgroundToFront_SVG("floorPlan");					
			//cvjs_initZeroWidthHandling("floorPlan", 1.0);			

			textLayer1 = cvjs_clearLayer(textLayer1);

			cvjs_LayerOff("EC1 Space Names");
			cvjs_LayerOff("EC1 Space Status Descs");
			cvjs_LayerOff("EC1 Space Project");
			cvjs_LayerOff("EC1 Space Function Descs");
			cvjs_LayerOff("EC1 Space Type Descs");
			cvjs_LayerOff("EC1 Tenant Names");
			cvjs_LayerOff("EC1 UDA Design Capacity");
			cvjs_LayerOff("EC1 UDA Is Secured");
			cvjs_LayerOff("EC1 Space Square Footages");
			cvjs_LayerOff("ACC BH AltaVila -2PAV$0$MBN");	
			cvjs_LayerOff("ACC BH AltaVila -2PAV$0$252");	
	
            console.log("ONLOADEND");
	}


	function cvjs_OnLoadEndRedlines(){
			// generic callback method, called when the redline is loaded
			// here you fill in your stuff, hide specific users and lock specific users
			// this method MUST be retained as a dummy method! - if not implemeted -


			// Reset redlines user, otherwise it will default to last
			cvjs_setCurrentStickyNoteValues_NameUserId(user_name, user_id );
			cvjs_setCurrentRedlineValues_NameUserid(user_name, user_id);


			// I am hiding users added to the hide user list
			cvjs_hideAllRedlines_HiddenUsersList();

			// I am freezing users added to the lock user list
			cvjs_lockAllRedlines_LockedUsersList();
	}





	// Callback Method on Creation and Delete 
	function cvjs_graphicalObjectOnChange(type, graphicalObject, spaceID){
	  // do something with the graphics object created! 
		window.alert(" cvjs_graphicalObjectOnChange: "+type+" "+graphicalObject+" "+spaceID+" indexSpace: "+graphicalObject.toLowerCase().indexOf("space"));

 /*     UPDATE SERVER WITH REDLINES ON CHANGE       
        if (graphicalObject.toLowerCase().indexOf('redline')>-1 && !type.toLowerCase().indexOf('click')==0 ){
//            cvjs_setStickyNoteSaveRedlineUrl(ServerLocation + "/content/redlines/fileloader_610/test"+Math.round(Math.random()*100)+".js");
            cvjs_setStickyNoteSaveRedlineUrl(ServerLocation + "/content/redlines/fileloader_610/test_fixed.js");
            cvjs_saveStickyNotesRedlines("floorPlan", false, "THIS IS PLACEHOLDER FOR CUSTOM STUFF TO SERVER");
        }
*/


		if (type == 'Create' && graphicalObject.toLowerCase().indexOf("space")>-1 && graphicalObject.toLowerCase().indexOf("circle")==-1){
				
            /*
            * Return a JSON structure of all content of a space object clicked: <br>
            * 	var jsonStructure =  	{	"path":   path, <br>
            *								"tags": tags, <br>
            *								"node": node, <br>
            *								"area": area, <br>
            *								"outerhtml": outerHTML, <br>
            *								"occupancy": occupancy, <br>
            *								"name": name, <br>
            *								"type": type, <br>
            *								"id": id, <br>
            *								"defaultcolor": defaultcolor, <br>
            *								"layer": layer, <br>
            *								"group": group, <br>
            *								"linked": linked, <br>
            *								"attributes": attributes, <br>
            *								"attributeStatus": attributeStatus, <br>
            *								"displaySpaceObjects": displaySpaceObjects, <br>
            *								"translate_x": translate_x, <br>
            *								"translate_y": translate_y, <br>
            *								"scale_x": scale_x ,<br>
            *								"scale_y": scale_y ,<br>
            *								"rotate": rotate, <br>
            *								"transform": transform} <br>
            * @return {Object} jsonSpaceObject - Object with the entire space objects content
            */
		
			myobject = cvjs_returnSpaceObjectID(spaceID);
			
			// I can save this object into my database, and then use command 
			// cvjs_setSpaceObjectDirect(jsonSpaceObject) 
			// when I am recreating the content of the drawing at load
			
			// for the fun of it, display the SVG geometry of the space:			
			console.log("This is the SVG path: "+myobject.path)
				
		}
		

		if (type == 'Delete' && graphicalObject.toLowerCase().indexOf("space")>-1 ){
			// remove this entry from my DB

			window.alert("We have deleted: "+spaceID)
		}


		if (type == 'Move' && graphicalObject.toLowerCase().indexOf("space")>-1 ){
			// remove this entry from my DB
			console.log("This object has been moved: "+spaceID)		
			myobject = cvjs_returnSpaceObjectID(spaceID);

		}


		if (type == 'Click'){
			// remove this entry from my DB
			console.log(graphicalObject+" has been clicked");		

		}

    }


	// generic callback method, tells which FM object has been clicked
	function cvjs_change_space(){

	}

	function cvjs_graphicalObjectCreated(graphicalObject){

	// do something with the graphics object created!
//		window.alert(graphicalObject);

	}


	function cvjs_popupTitleClick(myclick){
	
		window.alert(" cvjs_popupTitleClick: "+myclick);
		
	 }

	function cvjs_ObjectSelected(rmid){
	 	// placeholder for method in tms_cadviewerjs_modal_1_0_14.js   - must be removed when in creation mode and using creation modal
    
        // window.alert("object selected");
    }

	function myCustomPopUpBody(rmid){

		console.log("click on myCustomPopUpBody: "+rmid+" I now change the pop-up menu");

		// make your own popup based on callback
		var my_cvjsPopUpBody = "";


			// so we check the SpaceID = rmid, and change the space depending on 
			if (rmid==120 || rmid==121 || rmid==122 || rmid==123 || rmid==124){
				// here we remove an item.....
				my_cvjsPopUpBody = "<div class=\"cvjs_modal_1\" onclick=\"my_own_clickmenu1();\">Custom<br>Menu One<br><i class=\"glyphicon glyphicon-transfer\"></i></div>";
				my_cvjsPopUpBody += "<div class=\"cvjs_modal_1\" onclick=\"cvjs_zoomHere();\">Zoom<br>Here<br><i class=\"glyphicon glyphicon-zoom-in\"></i></div>";

			}else{  // we make a line based modal with content 
				if (rmid==100 || rmid==101 || rmid==102 || rmid==103 || rmid==104 || rmid==105 || rmid==106|| rmid==107){

					var rmid_str = rmid.toString();
					var str = " "+rmid;
					var link = "#mymodal_name_"+rmid;
					//$(link).html(str);

					my_cvjsPopUpBody = "<div>Space Id: <span id=\"mymodal_name_"+rmid+"\" >"+str+"</span><br>";

					if ((rmid_str.indexOf("100")==0) || (rmid_str.indexOf("101")==0) || (rmid_str.indexOf("102")==0))	
						str = " Presumed Wall Void";
					else
						str = " Presumed Ceiling Void";

					link = "#mymodal_survey_"+rmid;
					//$(link).html(str);

					my_cvjsPopUpBody += "Survey: <span id=\"mymodal_survey_"+rmid+"\" >"+str+"</span><br>";
					
					if ((rmid_str.indexOf("103")==0) || (rmid_str.indexOf("104")==0) || (rmid_str.indexOf("105")==0))	
						str = " Service Alert";
					else
						str = " Evaluation Pending";

					link = "#mymodal_notice_"+rmid;
					$(link).html(str);

					my_cvjsPopUpBody += "Notice: <span id=\"mymodal_notice_"+rmid+"\" >"+str+"</span><br>";
					my_cvjsPopUpBody += "Status: <a href=\"javascript:my_own_clickmenu1('"+rmid+"');\">More Info <i class=\"glyphicon glyphicon-transfer\" onclick=\"my_own_clickmenu1("+rmid+");\"></i></a> ";

				}
				else{
					// standard 3 item menu
					my_cvjsPopUpBody = "<div class=\"cvjs_modal_1\" onclick=\"my_own_clickmenu1();\">Custom<br>Menu 1<br><i class=\"glyphicon glyphicon-transfer\"></i></div>";
					my_cvjsPopUpBody += "<div class=\"cvjs_modal_1\" onclick=\"my_own_clickmenu2();\">Custom<br>Menu 2<br><i class=\"glyphicon glyphicon-info-sign\"></i></div>";
					my_cvjsPopUpBody += "<div class=\"cvjs_modal_1\" onclick=\"cvjs_zoomHere();\">Zoom<br>Here<br><i class=\"glyphicon glyphicon-zoom-in\"></i></div>";
				}

			}

			return my_cvjsPopUpBody;
	}


	function cvjs_callbackForModalDisplay(rmid, node){

		console.log("cvjs_callbackForModalDisplay: We can use this method to populate and update the modal if not read in completely!");
		// populateMyCustomPopUpBody(rmid, node);
	}

	function populateMyCustomPopUpBody(rmid, node){

		window.alert(rmid+" "+node);
		console.log(" we actually have a second callback to change the pop-up menu (developed originally for Angular2) populateMyCustomPopUpBody: "+rmid+"  "+node);
		// if can use this callback to populate variables in a designed modal

		if (rmid==100 || rmid==101 || rmid==102 || rmid==103 || rmid==104 || rmid==105 || rmid==106|| rmid==107){

			var rmid_str = rmid.toString();

			var str = " "+rmid;
			var link = "#mymodal_name_"+rmid;
			$(link).html(str);

			if ((rmid_str.indexOf("05A")==0) || (rmid_str.indexOf("41")==0) || (rmid_str.indexOf("38")==0))	
				str = " Presumed Wall Void";
			else
				str = " Presumed Ceiling Void";

			link = "#mymodal_survey_"+rmid;
			$(link).html(str);


			if ((rmid_str.indexOf("05A")==0) || (rmid_str.indexOf("41")==0) || (rmid_str.indexOf("38")==0))	
				str = " Service Alert";
			else
				str = " Evaluation Pending";

			link = "#mymodal_notice_"+rmid;
			$(link).html(str);
		}


	}



/// NOTE: THESE METHODS ABOVE ARE JS SCRIPT CALLBACK METHODS FROM CADVIEWER JS, THEY NEED TO BE IMPLEMENTED BUT CAN BE EMPTY

/// NOTE: BELOW REDLINE SAVE LOAD CONTROLLERS

// This method is linked to the save redline icon in the imagemap
function cvjs_saveStickyNotesRedlinesUser(){

	// there are two modes, user handling of redlines
	// alternatively use the build in redline file manager

	cvjs_openRedlineSaveModal("floorPlan");

	// custom method startMethodRed to set the name and location of redline to save
	// see implementation below
	//startMethodRed();
	// API call to save stickynotes and redlines
	//cvjs_saveStickyNotesRedlines("floorPlan");
}


// This method is linked to the load redline icon in the imagemap
function cvjs_loadStickyNotesRedlinesUser(){

	cvjs_openRedlineLoadModal("floorPlan");

	// first the drawing needs to be cleared of stickynotes and redlines
	//cvjs_deleteAllStickyNotes();
	//cvjs_deleteAllRedlines();

	// custom method startMethodRed to set the name and location of redline to load
	// see implementation below
	// startMethodRed();

	// API call to load stickynotes and redlines
	//cvjs_loadStickyNotesRedlines("floorPlan");
}

/// NOTE: ABOVE REDLINE SAVE LOAD CONTROLLERS




	// Here we are writing a basic function that will be used in the PopUpMenu
	// this is template on all the good stuff users can add
	function my_own_clickmenu1(){
		var id = cvjs_idObjectClicked();
		//		var node = cvjs_NodeObjectClicked();
		window.alert("Custom menu item 1: Here developers can implement their own methods, the look and feel of the menu is controlled in the settings.  Clicked object ID is: "+id);
	}

	// Here we are writing a basic function that will be used in the PopUpMenu
	// this is template on all the good stuff users can add
	function my_own_clickmenu2(){
		var id = cvjs_idObjectClicked();
		//var node = cvjs_NodeObjectClicked();

		window.alert("Custom menu item 2: Here developers can implement their own methods, the look and feel of the menu is controlled in the settings. Clicked object ID is: "+id);
		//window.alert("Custom menu item 2: Clicked object Node is: "+node);
	}








////////// FETCH ALL SPACE OBJECTS 


function display_all_objects(){
/*
 * Return a JSON structure with  all Space Object content, each entry is of the form: <br>
 * 	SpaceObjects :[  	{	"path":   path, <br>
 *								"tags": tags, <br>
 *								"node": node, <br>
 *								"area": area, <br>
 *								"outerhtml": outerHTML, <br>
 *								"occupancy": occupancy, <br>
 *								"name": name, <br>
 *								"type": type, <br>
 *								"id": id, <br>
 *								"defaultcolor": defaultcolor, <br>
 *								"layer": layer, <br>
 *								"group": group, <br>
 *								"linked": linked, <br>
 *								"attributes": attributes, <br>
 *								"attributeStatus": attributeStatus, <br>
 *								"displaySpaceObjects": displaySpaceObjects, <br>
 *								"translate_x": translate_x, <br>
 *								"translate_y": translate_y, <br>
 *								"scale_x": scale_x ,<br>
 *								"scale_y": scale_y ,<br>
 *								"rotate": rotate, <br>
 *								"transform": transform} <br> ]
 * @param {string} spaceID - Id of the Space Object to return
 * @return {Object} jsonSpaceObject - Object with all space objects content
 */

  //   get json obhect with all spaces processed from drawing
  var allSpaceObjects = cvjs_returnAllSpaceObjects();

  var myString = "";
  for (var spc in allSpaceObjects.SpaceObjects){
    console.log(spc);
    myString += "("+allSpaceObjects.SpaceObjects[spc].id+", "+allSpaceObjects.SpaceObjects[spc].area+")";
  }

  window.alert("The spaces with area (id,area): "+myString);

}

////////// HIGHLIGHT METHODS START








/// RELAY LOCK JSON SAMPLE 

function unlock_all(){

var spaceObjectIds = cvjs_getSpaceObjectNodeList();
for (var spc in spaceObjectIds){		
    var node = spaceObjectIds[spc];
    
    cvjs_showObjectInSpaceObjectGroup(node, "id_05");
    cvjs_hideObjectInSpaceObjectGroup(node, "id_04");
    cvjs_hideObjectInSpaceObjectGroup(node, "id_06");
}

}

function lock_all(){

    var spaceObjectIds = cvjs_getSpaceObjectNodeList();
    for (var spc in spaceObjectIds){		
        var node = spaceObjectIds[spc];
    
    cvjs_hideObjectInSpaceObjectGroup(node, "id_05");
    cvjs_showObjectInSpaceObjectGroup(node, "id_04");
    cvjs_showObjectInSpaceObjectGroup(node, "id_06");
}


}

function lock_single(){

    var relay_id = jQuery('#relay_id').val();    
    var node = cvjs_getSpaceObjectNodefromId(relay_id);
        
    console.log("lock relay_id"+relay_id+"  "+node);

    cvjs_hideObjectInSpaceObjectGroup(node, "id_05");
    cvjs_showObjectInSpaceObjectGroup(node, "id_04");
    cvjs_showObjectInSpaceObjectGroup(node, "id_06");

}

function unlock_single(){

    var relay_id = jQuery('#relay_id').val();    
    var node = cvjs_getSpaceObjectNodefromId(relay_id);

    console.log("lock relay_id"+relay_id+"  "+node);


    cvjs_showObjectInSpaceObjectGroup(node, "id_05");
    cvjs_hideObjectInSpaceObjectGroup(node, "id_04");
    cvjs_hideObjectInSpaceObjectGroup(node, "id_06");

}






/// NOTE: BELOW CUSTOM MODAL COMMANDS

// General settings method for Space Images, must be declared!!!!!
function cvjs_loadSpaceImage_UserConfiguration(floorplan_div){
    // not used
}


function copy_group_object(){

     newSpaceObjectId = $('#copy_new_id').val();
     originSpaceObjectId = $('#copy_org_id').val();
 
    cvjs_copyGroupObject(originSpaceObjectId, newSpaceObjectId);
}


function show_object_in_group(){

    var currentNode_underbar = $('#group_id').val();    
    var second_group = $('#group_2').val();    
    var objectTag = $('#group_2_subid').val();    

    cvjs_showObjectInSpaceObjectGroup(currentNode_underbar, objectTag);

}


function hide_object_in_group(){

    var currentNode_underbar = $('#group_id').val();    
    var second_group = $('#group_2').val();    
    var objectTag = $('#group_2_subid').val();    

    cvjs_hideObjectInSpaceObjectGroup(currentNode_underbar, objectTag);
    
}

function update_group_with_group(){

    var currentNode_underbar = $('#group_id').val();    
    var second_group = $('#group_2').val();    
    var objectTag = $('#group_2_subid').val();    
    window.alert("here "+currentNode_underbar+" "+second_group);    
    cvjs_addObjectToSpaceObjectGroup(currentNode_underbar, second_group, objectTag, true);

}

function update_group_with_object(){

    // pull the values from the table
    var currentNode_underbar = $('#group_id').val();    
    var objectTag = $('#object_id').val();    
    var object_svg_path = $('#object_svg_path').val();    
    var object_css_style = $('#object_css_style').val();    


    // add to the object
    try{
        console.log(object_svg_path+"  "+object_css_style+" "+currentNode_underbar)
        var baseGraphics = cvjs_makeGraphicsObjectOnCanvas('Path', object_svg_path);
        console.log(baseGraphics);
        baseGraphics.attr(JSON.parse(object_css_style));
        console.log(baseGraphics);
        cvjs_addGraphicsToSpaceObjectGroup(currentNode_underbar, baseGraphics, objectTag);
    }
    catch(err){ 
        console.log("create error: "+err);
    }

}


function apply_group_id_styles(){

// grap content from side panel

// add to group

}

function hide_show_group_id(){

// grap content from side panel

// add to group

}


function clear_space_highlight(){

	cvjs_clearSpaceLayer();
	textLayer1 = cvjs_clearLayer(textLayer1);
}


function highlight_all_spaces(){
	
	var secondcolor = selectedColor.substring(0,5);
	secondcolor+="FF";
	// window.alert(secondcolor);

	var colortype = {
			fill: selectedColor,
			"fill-opacity": "0.8",
			stroke: selectedColor,
			'stroke-width': 1,
			'stroke-opacity': "1",
			'stroke-linejoin': 'round'
		};

	var spaceObjectIds = cvjs_getSpaceObjectIdList();
	for (spc in spaceObjectIds){		
		var rmid = spaceObjectIds[spc];
		cvjs_highlightSpace(rmid, colortype);
	}

}


function highlight_all_borders(){	
	var colortype = {
		fill: '#fff',
		"fill-opacity": 0.01,
		stroke: selectedColor,    
		'stroke-width': 3.0,
		'stroke-opacity': 1,
		'stroke-linejoin': 'round'
		};

	var spaceObjectIds = cvjs_getSpaceObjectIdList();
	for (spc in spaceObjectIds){	
	
		var rmid = spaceObjectIds[spc];
		cvjs_highlightSpace(rmid, colortype);
	}
}

function highlight_space_type(){
	var type = $('#image_Type').val();	
	var colortype = {
			fill: selectedColor,
			"fill-opacity": "0.8",
			stroke: '#fe50d9',
			'stroke-width': 1,
			'stroke-opacity': "1",
			'stroke-linejoin': 'round'
		};

		var spaceObjectIds = cvjs_getSpaceObjectIdList();
		for (spc in spaceObjectIds){	
			var spaceType = cvjs_getSpaceObjectTypefromId(spaceObjectIds[spc]);
			var vqid = spaceObjectIds[spc];
			console.log(spc+"  "+ vqid + "  "+spaceType+ "  "+spaceType.indexOf("Device"));		
			if (spaceType.indexOf(type)==0)
				cvjs_highlightSpace(vqid, colortype);
		}
}

function highlight_space_id(){
	var spaceid = $('#image_ID').val();	
	var colortype = {
			fill: selectedColor,
			"fill-opacity": "0.8",
			stroke: selectedColor,
			'stroke-width': 1,
			'stroke-opacity': "1",
			'stroke-linejoin': 'round'
		};

	var spaceObjectIds = cvjs_getSpaceObjectIdList();
	for (spc in spaceObjectIds){	
		console.log(spaceid+"  "+spaceObjectIds[spc]+" "+(spaceid.indexOf(spaceObjectIds[spc])==0)+" "+((spaceid.length == spaceObjectIds[spc].length)));
		if (spaceid.indexOf(spaceObjectIds[spc])==0 && (spaceid.length == spaceObjectIds[spc].length) )
			cvjs_highlightSpace(spaceObjectIds[spc], colortype);
	}
}




// This is the function that illustrates how to label text inside room polygons

function customAddTextToSpaces(){

// I am making an API call to the function cvjs_getSpaceObjectIdList()
// this will give me an array with IDs of all Spaces in the drawing
var spaceObjectIds = cvjs_getSpaceObjectIdList();
var i=0;


var textString ;
var textStyles ;
var scaleText ; 
var hexColorText; 



for (var spc in spaceObjectIds)
{
	//console.log(spaceObjectIds[spc]+" "+i);

	if ((i % 3) ==0){
		textString = new Array("Custom \u2728", "settings \u2728", "\u2764\u2728\u267B");
		textStyles = new Array(text_style_arial_9pt_normal, text_style_arial_11pt_bold, text_style_dialog);
		scaleText = new Array(0.15, 0.2, 0.15 );
		hexColorText = new Array("#AB5500", "#66D200", "#0088DF");

		// here we clip the roomlables so they are inside the room polygon
		cvjs_AddTextOnSpaceObject(textLayer1, spaceObjectIds[spc],  0.05, textString, textStyles, scaleText, hexColorText, true, false);

	}
	else{
		if ((i % 3) == 1){

			textString = new Array('Unicode:\uf083\uf185\u2728', 'of custom text');
			textStyles = new Array(FontAwesome_9pt_normal, text_style_dialog);
			scaleText = new Array(0.15, 0.15 );
			hexColorText = new Array("#00D2AA", "#AB0055");

			// here we clip the roomlables so they are inside the room polygon            
			cvjs_AddTextOnSpaceObject(textLayer1, spaceObjectIds[spc],  0.1, textString, textStyles, scaleText, hexColorText, true, false);

		}
		else{

			textString = new Array("\uf028");
			textStyles = new Array(FontAwesome_9pt_normal);
			scaleText = new Array( "0.5" );
			hexColorText = new Array("#AAAAAA");
			//var hexColorText = new Array("#00AADF");

			// here we clip the roomlables so they are inside the room polygon, we center object
			cvjs_AddTextOnSpaceObject(textLayer1, spaceObjectIds[spc],  0, textString, textStyles, scaleText, hexColorText, true, true);
		}
	
	}
	i++;
}

}

/* text style for adding text into Space Objects */
var text_style_arial_11pt_bold = {
	  'font-family': "Arial",
	  'font-size': "11pt",
	  'font-weight': "bold",
	  'font-style': "none",
	  'margin': 0,
	  'cursor': "pointer",
	  'text-align': "left",
	  'z-index': 1980,
	  'opacity': 0.5
	};

/* text style for adding text into Space Objects */
var text_style_arial_9pt_normal = {
	  'font-family': "Arial",
	  'font-size': "9pt",
	  'font-weight': "normal",
	  'font-style': "none",
	  'margin': 0,
	  'cursor': "pointer",
	  'text-align': "left",
	  'z-index': 1980,
	  'opacity': 1
	};


var FontAwesome_9pt_normal = {
	  'font-family': "FontAwesome",
	  'font-size': "9pt",
	  'font-weight': "normal",
	  'font-style': "none",
	  'margin': 0,
	  'cursor': "pointer",
	  'text-align': "left",
	  'z-index': 1980,
	  'opacity': 1
	};
	  

/* text style for adding text into Space Objects */
var text_style_dialog = {
	  'font-family': "Dialog",
	  'font-size': "9pt",
	  'font-weight': "normal",
	  'font-style': "italic",
	  'margin': 0,
	  'cursor': "pointer",
	  'text-align': "left",
	  'z-index': 1980,
	  'opacity': 1
	};




// hatch spaces

var hatchtype = 0;

function customHatchSpaces(){
    // I am making an API call to the function cadviewer.cvjs_getSpaceObjectIdList()
    // this will give me an array with IDs of all Spaces in the drawing
    var spaceObjectIds = cvjs_getSpaceObjectIdList();
    
    
    for (var spc in spaceObjectIds)
    {
		hatchtype++;
    	if (hatchtype >4) hatchtype=1;


		if (hatchtype == 1) cvjs_hatchSpace(spaceObjectIds[spc], "pattern_45degree_crosshatch_fine", "#550055" , "0.5");
		if (hatchtype == 2) cvjs_hatchSpace(spaceObjectIds[spc], "pattern_45degree_standard", "#AA2200" , "0.5");
		if (hatchtype == 3) cvjs_hatchSpace(spaceObjectIds[spc],  "pattern_135degree_wide", "#0055BB" , "0.5");
		if (hatchtype == 4) cvjs_hatchSpace(spaceObjectIds[spc],  "pattern_90degree_wide", "#220088" , "0.5");      
    }
    
};



function customColorLayer(){

	var layer_id = jQuery('#layer_id').val();    

	cvjs_setLayerColor(layer_id, selectedColor);


}






/**
 * Highlights an AutoCAD Handle tagged geometrical object
 * @param {string} hexColor - Color of the hightlight in Hex, for example red is: #F00
 * @param {float} lineWeightFactor - factor to increase or decrease line weights, 1.0 is current line weight
 * @param {float} opacity - opacity of hexColor - 1.0 is default.
 * @param {boolean} tooltip - flag for tooltip, true tooltip, false none
 * @param {String} id - id of space Object, generic pass through
 * @param {String} handle - handle of space Object, generic pass through
 */

// function cvjs_HighlightHandleObjectStyles(hexColor, lineWeightFactor, opacity, tooltip, id, handle){

// custom color Handles

function customColorHandles(){
	// color Handles

	console.log("highlight 800 handles!");
	var i = 0;

	// this is just a test loop to run through the SVG
	jQuery(".cvjs_handles").each(function() {

		var elementid = jQuery(this).attr("id");
		// we read in a handle
		var handle = jQuery(this).attr("cvjs:handle");
		
		// but if it is undefined, we read in as a block handle instead
		if (handle == undefined)
			handle = jQuery(this).attr("cvjs:bhandle");
		
		// this counter we use to select a part of the drawing handles
		i++;

		try{
			if (i>3900 && i<4700 && handle!=undefined){  // just highlight 40 handles
				
				//console.log("highlight"+element_val+" "+handle);
				cvjs_HighlightHandle(selectedColor, 1.0, 1.0, handle)
			}
		}
		catch(err){
			console.log("the error is:"+err);
		}
	});	

	console.log("done highlight handles!");

};



function insert_from_type_id_image(){

	var loadSpaceImage_Location = ServerUrl+ "content/drawings/svg/" + $('#image_sensor_location').val();
	var loadSpaceImage_ID = $('#image_ID').val();
	var loadSpaceImage_Type = $('#image_Type').val();
    var loadSpaceImage_Layer = "cvjs_SpaceLayer";
    
    cvjs_setImageSpaceObjectParameters(loadSpaceImage_Location, loadSpaceImage_ID, loadSpaceImage_Type, loadSpaceImage_Layer);


    cvjs_addFixedSizeImageSpaceObject("floorPlan");
    iconObjectCounter++;

    // 6.3.92
    $('#group_id').val( "NODE_"+cvjs_currentMaxNodeId())    
}


var iconObjectCounter = 1;

// Functions to drag elements
var lastXbeforeDrag =0;
var lastYbeforeDrag =0;

// locations of leftside device menu
var device_from_top_base = 250;
var height = 42;


function handleDragImages(event){

	// handle move 
	
	lastXbeforeDrag = event.pageX;
	lastYbeforeDrag = event.pageY;


	  if (insertImageSelected == 0){  // nothing selected , we show a popup
	          
		  if (lastYbeforeDrag>device_from_top_base && lastYbeforeDrag< (device_from_top_base+height*1)){
			$('#icon_div_popup').html("Device");
          } 
          
		  if (lastYbeforeDrag>(device_from_top_base+height*1) && lastYbeforeDrag<(device_from_top_base+height*2)){
			$('#icon_div_popup').html("WiFi");
          } 
          
		  if (lastYbeforeDrag>(device_from_top_base+height*2) && lastYbeforeDrag<(device_from_top_base+height*3)){
			$('#icon_div_popup').html("Marker");
          } 
          
		  if (lastYbeforeDrag>(device_from_top_base+height*3) && lastYbeforeDrag<(device_from_top_base+height*4)){
			$('#icon_div_popup').html("Aircon");
		  } 

		  if (lastYbeforeDrag>(device_from_top_base+height*4) && lastYbeforeDrag<(device_from_top_base+height*5)){
			$('#icon_div_popup').html("Boiler");
		  } 

		  if (lastYbeforeDrag>(device_from_top_base+height*5) && lastYbeforeDrag<(device_from_top_base+height*6)){
			$('#icon_div_popup').html("Vent");
		  } 
		  
		  if (lastYbeforeDrag>(device_from_top_base+height*6) && lastYbeforeDrag<(device_from_top_base+height*7)){
			$('#icon_div_popup').html("Heater");
		  } 

		  if (lastYbeforeDrag>(device_from_top_base+height*7) && lastYbeforeDrag<(device_from_top_base+height*8)){
			$('#icon_div_popup').html("Assembly Point");
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*8) && lastYbeforeDrag<(device_from_top_base+height*9)){
			$('#icon_div_popup').html("Danger");
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*9) && lastYbeforeDrag<(device_from_top_base+height*10)){
			$('#icon_div_popup').html("Alarm");
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*10) && lastYbeforeDrag<(device_from_top_base+height*11)){
			$('#icon_div_popup').html("Exit");
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*11) && lastYbeforeDrag<(device_from_top_base+height*12)){
			$('#icon_div_popup').html("Fire Extinguisher");
		  } 
		  if (lastYbeforeDrag>(device_from_top_base+height*12) && lastYbeforeDrag<(device_from_top_base+height*13)){
			$('#icon_div_popup').html("Meet");
		  } 

	      $('#icon_div_popup').css({
			   left:  56,
               top:   event.pageY-20,
               "z-index" : 1000
			});

			$('#icon_div_popup').show();
	  
	  }
	  else{
		$('#icon_div_popup').hide();
	  }

	  console.log("1b "+lastXbeforeDrag+ " "+lastYbeforeDrag+"  "+event.pageX+"  "+event.pageY);

	  if (insertImageSelected == 1){
		$("#device_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 2){
		$("#wifi_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 3){
		$("#pin_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 4){
		$("#aircon_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 5){
		$("#boiler_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 6){
		$("#vent_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 7){
		$("#temp_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 8){
		$("#assembly_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 9){
		$("#danger_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 10){
		$("#fire_alarm_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 11){
		$("#fire_exit_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 12){
		$("#fire_extinguisher_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }
	  if (insertImageSelected == 13){
		$("#refuge_point_drag_clone").css({"left" : (event.pageX+4), "top" : (event.pageY-device_from_top_base+20 ) }).css({'z-index': 1000}).css({'border': '1px solid black'}).show();	  
	  }


}

var selectedColor = '#AAAA00';

function custom_ColorHex(pickcolor){

    selectedColor = "#"+pickcolor;
    console.log("selectedColor"+selectedColor);

}


/////////  CANVAS CONTROL METHODS START


///  HERE ARE ALL THE CUSTOM TEMPLATES TO DO STUFF ON THE CANVAS 

var generic_canvas_flag_first_click_rectangle = false;
var generic_canvas_flag_rectangle= false;
var tPath_r;
var cvjs_RubberBand;
var cvjs_firstX;
var cvjs_firstY;
var cvjs_lastX;
var cvjs_lastY;

var selected_handles = [];
var handle_selector = false;
var current_selected_handle = "";



///// DRAG + CLICK ON CANVAS  - CONSOLE

/**
 * Template start drag method for custom canvas
 */

 var generic_start_method_01 = function() {
  console.log("generic_start_method_01");
}

/**
* Template move drag method for custom canvas
*/
var generic_move_method_01 = function(dx,dy,x,y) {

  var svg_x =  cvjs_SVG_x(x);
  var svg_y =  cvjs_SVG_y(y);
  console.log("generic_move_method_01: dx="+dx+" dy="+dy+" x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);
}

/**
* Template stop drag method for custom canvas
*/
var generic_stop_method_01 = function() {

   cvjs_removeCustomCanvasMethod();
  console.log("REMOVE: generic_stop_method_01");
};

/**
* Template mouse-move method for custom canvas
*/

var generic_mousemove_method_01 = function(e,x,y) {

  var svg_x =  cvjs_SVG_x(x);
  var svg_y =  cvjs_SVG_y(y);
  
  // cvjs_removeCustomCanvasMethod();
  console.log("generic_mousemove_method_01: x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);
}

/**
* Template mouse-down method for custom canvas
*/

var generic_mousedown_method_01 = function(e,x,y) {

  var svg_x =  cvjs_SVG_x(x);
  var svg_y =  cvjs_SVG_y(y);
  
  // cvjs_removeCustomCanvasMethod();
  console.log("generic_mousedown_method_01: x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);

};

/**
* Template mouse-up method for custom canvas
*/

var generic_mouseup_method_01 = function(e,x,y) {

  var svg_x =  cvjs_SVG_x(x);
  var svg_y =  cvjs_SVG_y(y);
  
  console.log("generic_mouseup_method_01: x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);

};

/**
* Template double-click method for custom canvas
*/

var generic_dblclick_method_01 = function(e,x,y) {
   cvjs_removeCustomCanvasMethod();

  var svg_x =  cvjs_SVG_x(x);
  var svg_y =  cvjs_SVG_y(y);
  console.log("REMOVE: generic_dblclick_method_01: x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);
};


///// DRAG + CLICK ON CANVAS  - CONSOLE


// SAMPLE TO CREATE RECTANGLE BY CLICK

var generic_make_rect_init_method = function(){
  console.log("generic_make_rect_init_method");
  generic_canvas_flag_first_click_rectangle = false;
  generic_canvas_flag_rectangle= false;
}


var generic_make_rect_mousedown_method = function(e, x, y) {

  try{
      console.log("generic_make_rect_mousedown_method");

      if (!generic_canvas_flag_first_click_rectangle){
      var tPath_r = "M" + 0 + "," + 0;
          cvjs_RubberBand =  cvjs_makeGraphicsObjectOnCanvas('Path', tPath_r).attr({stroke: "#b00000", fill : "none", 'stroke-width': 0.5});
          generic_canvas_flag_first_click_rectangle = true;
          generic_canvas_flag_rectangle= false;
          console.log("rubberband");
      }
      else{
          console.log(generic_canvas_flag_first_click_rectangle+"  "+generic_canvas_flag_rectangle);            
          if (generic_canvas_flag_rectangle){
              generic_make_rect_stop_method();
          }
      }
  }
  catch(err){console.log(err)}
  //console.log("mouse down ");
}


var generic_make_rect_mouseup_method = function() {

  try{
      console.log("generic_make_rect_mouseup_method");
  }
  catch(err){console.log(err)}
}


var generic_make_rect_dblclick_method = function() {

  try{
      console.log("generic_make_rect_dblclick_method");
  }
  catch(err){console.log(err)}
}


var generic_make_rect_mousemove_method = function(e, x, y) {
 
 try{
      if (generic_canvas_flag_first_click_rectangle){
           cvjs_customCanvasMethod_globalScale();        
          if (!generic_canvas_flag_rectangle){
              cvjs_firstX =  cvjs_SVG_x(x);
              cvjs_firstY =  cvjs_SVG_y(y)
              cvjs_lastX = cvjs_firstX;
              cvjs_lastY = cvjs_firstY;
              generic_canvas_flag_rectangle = true;
          }
          else{
              // we cannot have the mouse directly on top of the rubberband path, then it will not respond
              var mousedelta = 2;
              cvjs_lastX =  cvjs_SVG_x(x-mousedelta);
              cvjs_lastY =  cvjs_SVG_y(y-mousedelta);
          }	
          
          tPath_r = "M" + cvjs_firstX + "," + cvjs_firstY;		
          tPath_r += "L" + cvjs_firstX + "," + cvjs_lastY;
          tPath_r += "L" + cvjs_lastX + "," + cvjs_lastY;
          tPath_r += "L" + cvjs_lastX + "," + cvjs_firstY;
          tPath_r += "L" + cvjs_firstX + "," + cvjs_firstY+" Z"; 
          cvjs_RubberBand.attr({'path': tPath_r});
      }
  }
  catch(err){
      console.log(err);
  } 
}

var generic_make_rect_stop_method = function() {

 // find the current highest node number
 var Node_id =  cvjs_currentMaxSpaceNodeId();
 Node_id++;
 var currentNode_underbar = "Node_"+Node_id;
  
 window.alert("generic_make_rect_stop_method "+currentNode_underbar);


  var loadSpaceImage_ID = jQuery('#image_ID').val();
  var loadSpaceImage_Type = jQuery('#image_Type').val();
  var loadSpaceImage_Layer = "cvjs_SpaceLayer";

  // create a group with space as main object
   cvjs_createSpaceObjectGroup( currentNode_underbar, cvjs_RubberBand, loadSpaceImage_ID, loadSpaceImage_ID, loadSpaceImage_Type, loadSpaceImage_Layer, "myGroup");   

  // make an equal rect, but with the proper color settings and controls
  var grayBox =  cvjs_makeGraphicsObjectOnCanvas('Path', tPath_r).attr({fill: '#808080', "fill-opacity": "1.0", stroke: '#000', 'stroke-opacity': "1.0", 'stroke-width': 0.5 });
   cvjs_addGraphicsToSpaceObjectGroup( currentNode_underbar,  grayBox, "rect01");

   cvjs_removeCustomCanvasMethod();    
};

// END - SAMPLE TO CREATE RECTANGLE BY CLICK





// SAMPLE TO CREATE RECTANGLE BY DRAG

var generic_drag_rect_start = function() {

  generic_canvas_flag_first_click_rectangle = true;
  generic_canvas_flag_rectangle = false;

  var tPath_r = "M" + 0 + "," + 0;
  cvjs_RubberBand =  cvjs_makeGraphicsObjectOnCanvas('Path', tPath_r).attr({stroke: "#b00000", fill : "none"});

  console.log("generic_start_method_01");
}

/**
* Template move drag method for custom canvas
*/
var generic_drag_rect_move = function(dx,dy,x,y) {

  try{
      if (generic_canvas_flag_first_click_rectangle){
           cvjs_customCanvasMethod_globalScale();        
          if (!generic_canvas_flag_rectangle){
              cvjs_firstX =  cvjs_SVG_x(x);
              cvjs_firstY =  cvjs_SVG_y(y)
              cvjs_lastX = cvjs_firstX;
              cvjs_lastY = cvjs_firstY;
              generic_canvas_flag_rectangle = true;
          }
          else{
              // we cannot have the mouse directly on top of the rubberband path, then it will not respond
              var mousedelta = 1;
              cvjs_lastX =  cvjs_SVG_x(x-mousedelta);
              cvjs_lastY =  cvjs_SVG_y(y-mousedelta);
          }	
          
          var tPath_r = "M" + cvjs_firstX + "," + cvjs_firstY;		
          tPath_r += "L" + cvjs_firstX + "," + cvjs_lastY;
          tPath_r += "L" + cvjs_lastX + "," + cvjs_lastY;
          tPath_r += "L" + cvjs_lastX + "," + cvjs_firstY;
          tPath_r += "L" + cvjs_firstX + "," + cvjs_firstY+" Z"; 
          cvjs_RubberBand.attr({'path': tPath_r});
      }
  }
  catch(err){
      console.log(err);
  } 

}

/**
* Template stop drag method for custom canvas
*/
var generic_drag_rect_stop = function() {

  cvjs_RubberBand.attr({fill: '#99ff99', "fill-opacity": "0.5", stroke: '#ff9999', 'stroke-opacity': "1"});
   cvjs_removeCustomCanvasMethod();
  console.log("REMOVE: generic_drag_rect_stop");
};

// END - SAMPLE TO CREATE RECTANGLE BY DRAG






// SAMPLE TO DRAG RECTANGLE if overlapping space objects 

var select_drag_rect_start = function() {

  generic_canvas_flag_first_click_rectangle = true;
  generic_canvas_flag_rectangle = false;

  var tPath_r = "M" + 0 + "," + 0;
  cvjs_RubberBand =  cvjs_makeGraphicsObjectOnCanvas('Path', tPath_r).attr({fill: '#ff9999', "fill-opacity": "0.5", stroke: '#ff9999', 'stroke-opacity': "1"});

  console.log("generic_start_method_01");
}

var select_drag_rect_move = function(dx,dy,x,y) {

  try{
      if (generic_canvas_flag_first_click_rectangle){
           cvjs_customCanvasMethod_globalScale();        
          if (!generic_canvas_flag_rectangle){
              cvjs_firstX =  cvjs_SVG_x(x);
              cvjs_firstY =  cvjs_SVG_y(y)
              cvjs_lastX = cvjs_firstX;
              cvjs_lastY = cvjs_firstY;
              generic_canvas_flag_rectangle = true;
          }
          else{
              // we cannot have the mouse directly on top of the rubberband path, then it will not respond
              var mousedelta = 1;
              cvjs_lastX =  cvjs_SVG_x(x-mousedelta);
              cvjs_lastY =  cvjs_SVG_y(y-mousedelta);
          }	
          
          var tPath_r = "M" + cvjs_firstX + "," + cvjs_firstY;		
          tPath_r += "L" + cvjs_firstX + "," + cvjs_lastY;
          tPath_r += "L" + cvjs_lastX + "," + cvjs_lastY;
          tPath_r += "L" + cvjs_lastX + "," + cvjs_firstY;
          tPath_r += "L" + cvjs_firstX + "," + cvjs_firstY+" Z"; 
          cvjs_RubberBand.attr({'path': tPath_r});
      }
  }
  catch(err){
      console.log(err);
  } 

}


var select_drag_rect_stop = function() {

  cvjs_RubberBand.attr({'path': "M0,0"});
  var mybox;
  var overlap;
  var selected_list = "";

  // reorder x,  if not dragged left to right, top to buttom
  var temp;
  if (cvjs_firstX>cvjs_lastX){
      temp = cvjs_firstX;
      cvjs_firstX = cvjs_lastX;
      cvjs_lastX = temp;
  }
  // reorder y,  if not dragged left to right, top to buttom
  if (cvjs_firstY>cvjs_lastY){
      temp = cvjs_firstY;
      cvjs_firstY = cvjs_lastY;
      cvjs_lastY = temp;
  }

  
  // get all spaces
  var spaceObjectIds =  cvjs_getSpaceObjectIdList();
  // loop over all spaces
  for (var spc in spaceObjectIds){
      // get the bounding box of the space
      
      mybox =  cvjs_getSpaceObjectBoundingBox(spaceObjectIds[spc]);
      // check if it operlaps with the drag rectangle
      if (mybox == false) continue;

      //console.log(cvjs_firstX+"  "+ cvjs_firstY+" "+ cvjs_lastX+ " "+ cvjs_lastY+"  "+spc);
      //console.log(mybox.x+" "+ mybox.y+" "+ (mybox.x+mybox.width) + " "+ (mybox.y+mybox.height));

      overlap=  cvjs_rect_doOverlap( cvjs_firstX, cvjs_firstY, cvjs_lastX, cvjs_lastY, mybox.x, mybox.y, mybox.x+mybox.width, mybox.y+mybox.height);

      if (overlap) 
          selected_list+= spaceObjectIds[spc]+";";
  }

  if (selected_list == "") selected_list = "None";

  window.alert("Selected Objects: "+selected_list);
  //cvjs_RubberBand.attr({fill: '#99ff99', "fill-opacity": "0.5", stroke: '#ff9999', 'stroke-opacity': "1"});
   cvjs_removeCustomCanvasMethod();
  console.log("REMOVE: generic_drag_rect_stop");
};

// END - SAMPLE TO DRAG RECTANGLE if overlapping space objects 





// SAMPLE TO CREATE RECTANGLE w TEXT and ARRow BY CLICK

var logic_flags = [false,false,false,false,false,false];
var operation_type = "";
var mybasewidth = 1;

var generic_make_rect_arrow_init_method = function(){
  console.log("generic_make_rect_init_method");
  logic_flags = [false,false,false,false,false,false];
  operation_type = "box";    
}

var tPath_r;

var generic_make_rect_arrow_mousedown_method = function(e, x, y) {

  try{
      if ((operation_type.indexOf("arrow") ==0) && logic_flags[0] && logic_flags[1]){
          generic_make_rect_arrow_stop_method2();
      }

      if ((operation_type.indexOf("box") ==0) && !logic_flags[0]){  // first box
          var tPath_r = "M" + 0 + "," + 0;
          cvjs_RubberBand =  cvjs_makeGraphicsObjectOnCanvas('Path', tPath_r).attr({stroke: "#b00000", fill : "none"});
          logic_flags[0] = true;
          logic_flags[1]= false;
      }
      if ((operation_type.indexOf("box") ==0) && logic_flags[0] && logic_flags[1]){
          generic_make_rect_arrow_stop_method1();
      }
 }
  catch(err){console.log(err)}
  //console.log("mouse down ");
}


var generic_make_rect_arrow_mouseup_method = function() {

  try{
      console.log("generic_make_rect_mouseup_method");
  }
  catch(err){console.log(err)}
}


var generic_make_rect_arrow_dblclick_method = function() {

  try{
      console.log("generic_make_rect_dblclick_method");
  }
  catch(err){console.log(err)}
}


var generic_make_rect_arrow_mousemove_method = function(e, x, y) {
 
 try{
      if ((operation_type.indexOf("box") ==0) && logic_flags[0]){
           cvjs_customCanvasMethod_globalScale();        
          if (!logic_flags[1]){
              cvjs_firstX =  cvjs_SVG_x(x);
              cvjs_firstY =  cvjs_SVG_y(y)
              cvjs_lastX = cvjs_firstX;
              cvjs_lastY = cvjs_firstY;
              logic_flags[1] = true;
          }
          else{
              // we cannot have the mouse directly on top of the rubberband path, then it will not respond
              var mousedelta = 1;
              cvjs_lastX =  cvjs_SVG_x(x-mousedelta);
              cvjs_lastY =  cvjs_SVG_y(y-mousedelta);
          }	
          
          tPath_r = "M" + cvjs_firstX + "," + cvjs_firstY;		
          tPath_r += "L" + cvjs_firstX + "," + cvjs_lastY;
          tPath_r += "L" + cvjs_lastX + "," + cvjs_lastY;
          tPath_r += "L" + cvjs_lastX + "," + cvjs_firstY;
          tPath_r += "L" + cvjs_firstX + "," + cvjs_firstY+" Z"; 
          cvjs_RubberBand.attr({'path': tPath_r});
      }


      if ((operation_type.indexOf("arrow") ==0) && logic_flags[0]){
           cvjs_customCanvasMethod_globalScale();        

          logic_flags[1] = true;
          var mousedelta = 1;
          cvjs_lastX =  cvjs_SVG_x(x-mousedelta);
          cvjs_lastY =  cvjs_SVG_y(y-mousedelta);

          tPath_r = "M" + cvjs_firstX + "," + cvjs_firstY;		
          tPath_r += "L" + cvjs_lastX + "," + cvjs_lastY;
          cvjs_RubberBand.attr({'path': tPath_r});
      }
  }
  catch(err){
      console.log(err);
  } 
}

var randomNr;

var generic_make_rect_arrow_stop_method1 = function() {

  // find the current highest node number
  var Node_id =  cvjs_currentMaxSpaceNodeId();
  // increment and set current node underbar
  Node_id++;
  var currentNode_underbar = "Node_"+Node_id;

  randomNr = Math.floor(Math.random() * Math.floor(100000)); window.alert("randomNr "+randomNr);

  cvjs_RubberBand.attr({fill: 'none', "fill-opacity": "0.5", stroke: '#0000b0', 'stroke-opacity': "1"});
  // create a group with space as main object

  // we pull the ID from the general settings:  
  var loadSpaceImage_ID = jQuery('#image_ID').val();
  var loadSpaceImage_Type = jQuery('#image_Type').val();
  var loadSpaceImage_Layer = "cvjs_SpaceLayer";

  cvjs_createSpaceObjectGroup( currentNode_underbar, cvjs_RubberBand, loadSpaceImage_ID, loadSpaceImage_ID, loadSpaceImage_Type, loadSpaceImage_Layer, "myGroup");   

  // create a new border object as separate graphics - we use the rubberband as our graphics variable
  cvjs_RubberBand =  cvjs_makeGraphicsObjectOnCanvas('Path', tPath_r).attr({fill: 'none', "fill-opacity": "1", stroke: '#000', 'stroke-opacity': "1", 'stroke-width': mybasewidth});
   cvjs_addGraphicsToSpaceObjectGroup( currentNode_underbar,  cvjs_RubberBand, "rect01");

  // create the text string add add to graphics group
  var myText =  cvjs_makeTextObjectOnCanvas(cvjs_firstX+(cvjs_lastX-cvjs_firstX)/10.0, cvjs_lastY - (cvjs_lastY-cvjs_firstY)/5.0, "API"+randomNr).attr({fill: '#000', "fill-opacity": "1", stroke: '#000', 'font-size' : (Math.abs(cvjs_lastY-cvjs_firstY)/2.0) });
   cvjs_addGraphicsToSpaceObjectGroup( currentNode_underbar,  myText, "text01");

  // we change to arrow, and directly make the mouse draggable
  operation_type = "arrow";
  logic_flags[0] = true;
  logic_flags[1]= false;  

  // set rubberband to middle of box side
  cvjs_firstX = (cvjs_firstX+cvjs_lastX)/2.0;
  cvjs_firstY = cvjs_lastY;
// make new rubberband 
  tPath_r = "M" + cvjs_firstX + "," + cvjs_firstY;
  cvjs_RubberBand =  cvjs_makeGraphicsObjectOnCanvas('Path', tPath_r).attr({stroke: "#b00000", fill : "none"});
};



var generic_make_rect_arrow_stop_method2 = function() {

  cvjs_RubberBand.attr({fill: 'none', "fill-opacity": "1", stroke: '#000', 'stroke-opacity': "1", 'stroke-width': mybasewidth});
// we create an arrow object and add to space object

  // here we have to add the graphical object to our already created object
  var Node_id =  cvjs_currentMaxSpaceNodeId();
  var currentNode_underbar = "Node_"+Node_id;
  
   cvjs_addGraphicsToSpaceObjectGroup( currentNode_underbar, cvjs_RubberBand, "arrow-line01");

// create an arrow
var angleInDegrees = ( Math.atan2((cvjs_lastY-cvjs_firstY),(cvjs_lastX-cvjs_firstX)) / Math.PI * 180.0);
var scaleTriangle = mybasewidth;  // same as stroke-width
var triangle_design= -5.0*scaleTriangle+","+5.5*scaleTriangle+" "+0.0*scaleTriangle+","+-4.5*scaleTriangle+" "+5.0*scaleTriangle+","+5.5*scaleTriangle;
var mysin = Math.sin(angleInDegrees/180*Math.PI);
var mycos = Math.cos(angleInDegrees/180*Math.PI);
var Ttrans = 'r' + (angleInDegrees - 270)+'T' + (cvjs_lastX+ mycos*scaleTriangle) +"," + cvjs_lastY ;
  var Triangle =  cvjs_makeGraphicsObjectOnCanvas('Polyline', triangle_design);
  Triangle.attr({fill: 'none', "fill-opacity": "1", stroke: '#000', 'stroke-opacity': "1", 'stroke-width': mybasewidth});
Triangle.attr({
  fill: "#000",
  transform: Ttrans
});

// here we add an arrow to the object
 cvjs_addGraphicsToSpaceObjectGroup( currentNode_underbar, Triangle, "arrow01");

  //NOTE:  IF THE CADViewer callback method is not exported from this component, then we need to catch it
  try{
    this.cvjs_graphicalObjectOnChange('Create', 'CustomObject',  "API"+randomNr);  
  }
  catch(err){console.log("cvjs_graphicalObjectOnChange: arrow method:"+ err);};
   cvjs_removeCustomCanvasMethod();    
};



function change_arrow_text(){

	var spaceObjectId = jQuery('#image_ID').val();
	var subGroupObjectId = "text01";    // the group id of text is text01
	var newText = jQuery('#arrow_text').val();

	cvjs_changeTextOnSpaceObjectGroup(spaceObjectId, subGroupObjectId, newText);	

}

// END OF DRAG  Arrow



// CLICK TO SELECT HANDLES


// NOTE  - for Handles to be processed in DWG conversion, the conversion parameter -hlall  must be set:
      // USE THIS FOR PROCESSING AUTOCAD HANDLES        
// include this:          cvjs_conversion_addAXconversionParameter("hlall", "");		

// USE THESE TO PROCESS LAYERS RM_ AND RM_TXT FOR INTERACTIVE HIGHLIGHT 
// optional:        cvjs_conversion_addAXconversionParameter("rl", "RM_");		 
// optional:		 cvjs_conversion_addAXconversionParameter("tl", "RM_TXT");	

var generic_handles_init_method_01 = function(){
  selected_handles = [];
  // we want to send click object to back!!!!!!
  // so we can click on Handle Objects
   cvjs_sendCustomCanvasToBack("floorPlan");
  handle_selector = true;
}

/**
* Template mouse-move method for custom canvas
*/

var generic_handles_mousemove_method_01 = function(e,x,y) {

var svg_x =  cvjs_SVG_x(x);
var svg_y =  cvjs_SVG_y(y);

// cvjs_removeCustomCanvasMethod();
// console.log("generic_mousemove_method_01: x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);
}


/**
* Template mouse-down method for custom canvas
*/

var generic_handles_mousedown_method_01 = function(e,x,y) {

var svg_x =  cvjs_SVG_x(x);
var svg_y =  cvjs_SVG_y(y);

//  cvjs_removeCustomCanvasMethod();
// onsole.log("generic_mousedown_method_01: x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);

};

/**
* Template mouse-up method for custom canvas
*/

var generic_handles_mouseup_method_01 = function(e,x,y) {

var svg_x =  cvjs_SVG_x(x);
var svg_y =  cvjs_SVG_y(y);

// console.log("generic_mouseup_method_01: x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);

};

/**
* Template double-click method for custom canvas
*/

var generic_handles_dblclick_method_01 = function(e,x,y) {
 cvjs_removeCustomCanvasMethod();
handle_selector = false;

var mystring = "";
for (var spc in selected_handles){
  // we find all handles
  mystring+= selected_handles[spc].handle+";";
  // we need to clean out highlighted handles
   cvjs_mouseout_handleObjectStyles(selected_handles[spc].id, selected_handles[spc].handle);
}

window.alert(mystring);

var svg_x =  cvjs_SVG_x(x);
var svg_y =  cvjs_SVG_y(y);
console.log("REMOVE: generic_dblclick_method_01: x="+x+" y="+y+" svg_x="+svg_x+"  svg_y="+svg_y);
};


// END - SAMPLE TO DRAG RECTANGLE over HANDLES



/////////  CANVAS CONTROL METHODS END



// ENABLE ALL API EVENT HANDLES FOR AUTOCAD Handles
function cvjs_mousedown(id, handle, entity){

}

function cvjs_click(id, handle, entity){


    console.log("mysql click "+id+"  "+handle);
    // if we click on an object, then we add to the handle list
    if (handle_selector){
        selected_handles.push({id,handle});
        current_selected_handle = handle;
    }

	// tell to update the Scroll bar 
	//vqUpdateScrollbar(id, handle);
	// window.alert("We have clicked an entity: "+entity.substring(4)+"\r\nThe AutoCAD Handle id: "+handle+"\r\nThe svg id is: "+id+"\r\nHighlight SQL pane entry");
}

function cvjs_dblclick(id, handle, entity){

	console.log("mysql dblclick "+id+"  "+handle);
	window.alert("We have double clicked entity with AutoCAD Handle: "+handle+"\r\nThe svg id is: "+id);
}

function cvjs_mouseout(id, handle, entity){

    console.log("mysql mouseout "+id+"  "+handle);
    
    if (current_selected_handle == handle){
        // do nothing
    }
    else{
        cvjs_mouseout_handleObjectStyles(id, handle);
    }
}

function cvjs_mouseover(id, handle, entity){

	console.log("mysql mouseover "+id+"  "+handle+"  "+jQuery("#"+id).css("color"))
	//cvjs_mouseover_handleObjectPopUp(id, handle);	
}

function cvjs_mouseleave(id, handle, entity){

	console.log("mysql mouseleave "+id+"  "+handle+"  "+jQuery("#"+id).css("color"));
}


function cvjs_mouseenter(id, handle, entity){
//	cvjs_mouseenter_handleObjectStyles("#a0a000", 4.0, 1.0, id, handle);
//	cvjs_mouseenter_handleObjectStyles("#ffcccb", 5.0, 0.7, true, id, handle);


	cvjs_mouseenter_handleObjectStyles("#F00", 2.0, 1.0, true, id, handle);
	
}

// END OF MOUSE OPERATION


</script>	


</head>
  <body bgcolor="white" style="margin:0" >

	<table width="100%" height="100%" border="0" cellspacing="0" border-spacing="0" id="mainTable">
    <tbody>
	<tr style="background-color:rgb(255,255,255)" height="100px" >
		<td height="10">
				<canvas id="dummy" width="10" height="10"></canvas>
		</td>
		<td width="300" height="1">
		
    

        <table id="space_icon_table1" border="0" style="vertical-align:top">
<tbody>
	
		<tr>
	<td>
	<strong>Space Type:</strong>&nbsp; 
	</td>
	<td>
	<canvas id="dummy" width="5" height="10"></canvas>
	</td>
	<td>
	<input type="text" id="image_Type" value="Wifi" />
	</td>
	<td>
	</td>	
	</tr>

	<tr>
	<td>
	<strong>Space ID:</strong>&nbsp; 
	</td>
	<td>
	<canvas id="dummy" width="5" height="10"></canvas>
	</td>
	<td>
	<input type="text" id="image_ID" value="wifi_1" />
	</td>
	</tr>

	<tr>
	<td>
	<strong>Space Image:</strong>&nbsp; 
	</td>
	<td>
	<canvas id="dummy" width="5" height="10"></canvas>
	</td>
	<td>
	<input type="text" id="image_sensor_location" value="wifi_25.svg" />
	</td>
	</tr>
	<tr>
        <td>
            <b>Type/ID/Image:&nbsp;</b>
        </td>    
        <td>
            <canvas id="dummy" width="5" height="10"></canvas>
            </td>
                <td>
            <button class="w3-button demo" onClick="insert_from_type_id_image();">New Space Object</button>
        </td>    
</tr>

</tbody>
</table>





    
        </td>
		<td>
		<canvas id="dummy" width="10" height="10"></canvas>
		</td>
		<td>
        <b>Highlight based on Color:&nbsp; </b> <input id="cvjs_backgroundPickerValue" value="AAAA00" class="cvjs_inputBackgroundColorModal jscolor {width:101, padding:10, shadow:false, borderWidth:0, backgroundColor:'transparent', insetColor:'#AAAA00',closable:true, closeText:'Close Color Picker!', onFineChange:'custom_ColorHex(this)'}">        
        <button class="w3-button demo" onClick="highlight_all_spaces();">Spaces</button>
        <button class="w3-button demo" onClick="highlight_all_borders();">Borders</button>
        <button class="w3-button demo" onClick="highlight_space_type();">Space Type</button>
        <button class="w3-button demo" onClick="highlight_space_id();">Space ID</button>
        <button class="w3-button demo" onClick="clear_space_highlight();">Clear All</button>
		<button class="w3-button demo" onClick="display_all_objects();">All:(id,area)</button>
		<button class="w3-button demo" onClick="customAddTextToSpaces();">Label Spaces with Text</button>
		<button class="w3-button demo" onClick="customHatchSpaces();">Hatch Spaces</button>
		<button class="w3-button demo" onClick="customColorHandles();">Color Handles</button>
		&nbsp&nbsp&nbsp&nbsp<button class="w3-button demo" onClick="customColorLayer();">Color Layer</button>
		<input type="text" id="layer_id" value="EC1 Space Numbers" />


		

		<br><strong>Samples - Custom Canvas:&nbsp;</strong><canvas id="dummy" width="10" height="10"></canvas>
		<button class="w3-button demo" onClick="cvjs_executeCustomCanvasMethod_drag(generic_start_method_01, generic_stop_method_01, generic_move_method_01,'');">console trace Canvas-DRAG</button>
		<button class="w3-button demo" onClick="cvjs_executeCustomCanvasMethod_click(generic_mousemove_method_01, generic_mousedown_method_01, generic_mouseup_method_01, generic_dblclick_method_01,'');">console trace Canvas-CLICK</button>
		<button class="w3-button demo" onClick="cvjs_executeCustomCanvasMethod_click(generic_make_rect_mousemove_method, generic_make_rect_mousedown_method, generic_make_rect_mouseup_method, '', generic_make_rect_init_method);">Make Rect Canvas-CLICK</button>
		<button class="w3-button demo" onClick="cvjs_executeCustomCanvasMethod_drag(generic_drag_rect_start, generic_drag_rect_stop, generic_drag_rect_move,'');">Make Rect Canvas-DRAG</button>
		<button class="w3-button demo" onClick="cvjs_executeCustomCanvasMethod_drag(select_drag_rect_start, select_drag_rect_stop, select_drag_rect_move,'');">Select Spaces Rect Canvas-DRAG (rl/tl in ax2020)</button>
		<button class="w3-button demo" onClick="cvjs_executeCustomCanvasMethod_click(generic_make_rect_arrow_mousemove_method, generic_make_rect_arrow_mousedown_method, generic_make_rect_arrow_mouseup_method, generic_make_rect_arrow_dblclick_method, generic_make_rect_arrow_init_method);">Make Box/Arrow Canvas-CLICK</button>
		<button class="w3-button demo" onClick="cvjs_executeCustomCanvasMethod_click(generic_handles_mousemove_method_01, generic_handles_mousedown_method_01, generic_handles_mouseup_method_01, generic_handles_dblclick_method_01,generic_handles_init_method_01);">Select Handles  Canvas-Click (DblClick End)  (hlall in ax2020)</button>
        
        <br/><b>JSON file sample(Relay - relaysample-01.json):&nbsp;</b><button className="w3-button demo" onClick="lock_all();">Lock all Relays</button>&nbsp;<button className="w3-button demo" onClick="unlock_all();">Unlock all Relays</button>&nbsp; <input type="text" id="relay_id" value="relay_01" />&nbsp;<button className="w3-button demo" onClick="unlock_single();">Unlock Relay</button>&nbsp;<button className="w3-button demo" onClick="lock_single();">Lock Relay</button>&nbsp;
        <br/><b>Change Text in Arrow Symbol(Space ID upper left):&nbsp;</b><input type="text" id="arrow_text" value="new text" />&nbsp;</b><button className="w3-button demo" onClick="change_arrow_text();">Change Arrow Text</button>
    </p></td>
    </tr> 
</tbody>
	</table>

<style>
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
</style>
<div class="slidecontainer">
  <strong><small>SVG Icon Size at Insert: <span id="iconsize"></span></small></strong><input type="range" min="1" max="400" value="100" class="slider" id="myRange">
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("iconsize");
output.innerHTML = slider.value+"%";

slider.oninput = function() {
  output.innerHTML = this.value+"%";
  // SETTTING THE CADVIEWER GLOBAL CONTROLS:
  cvjs_setGlobalSpaceImageObjectScaleFactor(this.value/100.0);
  
}
</script>

<style>

#myImagesToDrag {
	position: absolute; 
	left: 0px; 
	top: 240px; 
	width: 120px;
	height: 680px;
	border: 0px solid red;
	
}

#space_icon_table2 {
	position: absolute; 
	left: 10px; 
	top: 240px; 
	width: 40px ;
	border: 2px solid gray;
	
}

#space_icon_table2 tr td{
    border: 2px solid gray;
	text-align: center; 
    vertical-align: middle;
	width : 40px;
}

#space_icon_table1 {
	/*position: absolute; 
	left: 4px; 
	 top: 50px;  */
}

.slidecontainer {
	width: 200px;
	position: absolute;
	top: 200px;
	left: 10px;
	z-index: 100;
}

#cadviewer_table_01 {
	position: absolute; 
	left: 100px; 
	top: 240px; 
}


#icon_div_popup {
	position: absolute;
	border: 1px solid black;
	background: #F5F5F5;
	
	font-family:Verdana;
	font-size:9pt;
	
	
}


</style>


<div id="myImagesToDrag"></div>

<table id="space_icon_table2" >
<tbody>
	

	<tr border="1px">
	<td border="1px">
		<div id="device_drag">
	  <img src= "{{ asset('/content/drawings/svg/device_54.svg')}}" alt="CADViewer insert Object" width="40px" onClick="selectIconImage(1)"/>
		</div>
	</td>
	</tr>

	<tr>
	<td> 
		<div id="wifi_drag">
		  <img src= "{{ asset('/content/drawings/svg/wifi_25.svg')}}" alt="CADViewer insert Object" width="40px"  onClick="selectIconImage(2)"/>
		</div>
	</td>
	</tr>
	
	<tr>
	<td>
		<div id="pin_drag">
		<img src= "{{ asset('/content/drawings/svg/pin_01.svg')}}"  alt="CADViewer insert Object"  width="40px" height="40px" onClick="selectIconImage(3)"/> 
		</div>
	</td>
	</tr>
	<tr>
	<td>
		<div id="aircon_drag">
	  <img src= "{{ asset('/content/drawings/svg/HVAC_04.svg')}}"  alt="CADViewer insert Object"  width="40px"  onClick="selectIconImage(4)"/>
		</div>
	</td>
	</tr>

	<tr>
	<td>
		<div id="boiler_drag">
	  <img src="{{ asset('/content/drawings/svg/HVAC_01.svg')}}"  alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(5)"/>
		</div>
	</td>
	</tr>

	<tr>
	<td>
		<div id="vent_drag">
	  <img src="{{ asset('/content/drawings/svg/HVAC_02.svg')}}" alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(6)"/>
		</div>
	</td>
	</tr>

	<tr>
	<td>
		<div id="temp_drag">
	  <img src="{{ asset('/content/drawings/svg/HVAC_03.svg')}}" alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(7)"/>
		</div>
	</td>
	</tr>


	<tr>
	<td>
		<div id="assembly_drag">
			<img src="{{ asset('/content/drawings/svg/assembly_point.png')}}"  alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(8)"/>
		</div>
	</td>
	</tr>

	<tr>
	<td>
		<div id="danger_drag">
			<img src="{{ asset('/content/drawings/svg/danger.png')}}" alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(9)"/>
		</div>
	</td>
	</tr>
	
	<tr>
	<td>
		<div id="fire_alarm_drag">
			<img src="{{ asset('/content/drawings/svg/fire_alarm_call_point.png')}}"  alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(10)"/>
		</div>
	</td>
    </tr>

	<tr>
	<td>
		<div id="fire_exit_drag">
			<img src="{{ asset('/content/drawings/svg/fire_exit.png')}}" alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(11)"/>
		</div>
	</td>
	</tr>

	<tr>
	<td>
		<div id="fire_extinguisher_drag">
			<img src="{{ asset('/content/drawings/svg/fire_extinguisher.png')}}"  alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(12)"/>
		</div>
	</td>
    </tr>

	<tr>
	<td>
		<div id="refuge_point_drag">
			<img src="{{ asset('/content/drawings/svg/refuge_point.png')}}" alt="CADViewer insert Object"  width="40px" onClick="selectIconImage(13)"/>
		</div>
	</td>
    </tr>

</tbody>
</table>

<div id="icon_div_popup"></div>

<script>


var insertImageSelected = 0;

function selectIconImage(n) {

	insertImageSelected  = n;

  if (n==1){
	$('#image_Type').val("Device");
	$('#image_ID').val("device_"+iconObjectCounter);
//	$('#image_sensor_location').val("H1.svg");  
	$('#image_sensor_location').val("device_54.svg");  
  }
  
  if (n==2){
	$('#image_Type').val("Wifi");
	$('#image_ID').val("wifi_"+iconObjectCounter);
	$('#image_sensor_location').val("wifi_25.svg");  
  }
   
  if (n==3){
	$('#image_Type').val("Marker");
	$('#image_ID').val("marker_"+iconObjectCounter);
	$('#image_sensor_location').val("pin_02.svg");  
//	$('#image_sensor_location').val("assembly_point.png");  
	
  }
  
  if (n==4){
	$('#image_Type').val("AirCon");
	$('#image_ID').val("aircon_"+iconObjectCounter);
	$('#image_sensor_location').val("HVAC_04.svg");  
  }

  if (n==5){
	$('#image_Type').val("Boiler");
	$('#image_ID').val("boiler_"+iconObjectCounter);
	$('#image_sensor_location').val("HVAC_01.svg");  
  }
  
  if (n==6){
	$('#image_Type').val("Ventilator");
	$('#image_ID').val("vent_"+iconObjectCounter);
	$('#image_sensor_location').val("HVAC_02.svg");  
  }

  if (n==7){
	$('#image_Type').val("Temp");
	$('#image_ID').val("temp_"+iconObjectCounter);
	$('#image_sensor_location').val("HVAC_03.svg");  
  }

  if (n==8){
	$('#image_Type').val("Assembly");
	$('#image_ID').val("assembly_"+iconObjectCounter);
	$('#image_sensor_location').val("assembly_point.png");  
  }

  if (n==9){
	$('#image_Type').val("Danger");
	$('#image_ID').val("danger_"+iconObjectCounter);
	$('#image_sensor_location').val("danger.png");  
  }

  if (n==10){
	$('#image_Type').val("Fire Alarm");
	$('#image_ID').val("fire_alarm_"+iconObjectCounter);
	$('#image_sensor_location').val("fire_alarm_call_point.png");  
  }

  if (n==11){
	$('#image_Type').val("Fire Exit");
	$('#image_ID').val("exit_"+iconObjectCounter);
	$('#image_sensor_location').val("fire_exit.png");  
  }

  if (n==12){
	$('#image_Type').val("Fire Extinguisher");
	$('#image_ID').val("extinguisher_"+iconObjectCounter);
	$('#image_sensor_location').val("fire_extinguisher.png");  
  }

  if (n==13){
	$('#image_Type').val("Refuge");
	$('#image_ID').val("refuge_"+iconObjectCounter);
	$('#image_sensor_location').val("refuge_point.png");  
  }


// clone image

 // API COMMAND CALL TO CADVIEWER
  
 	var loadSpaceImage_Location = ServerUrl+ "content/drawings/svg/" + $('#image_sensor_location').val();
	var loadSpaceImage_ID = $('#image_ID').val();
	var loadSpaceImage_Type = $('#image_Type').val();
	var loadSpaceImage_Layer = "cvjs_SpaceLayer";

    cvjs_setImageSpaceObjectParameters(loadSpaceImage_Location, loadSpaceImage_ID, loadSpaceImage_Type, loadSpaceImage_Layer);

	cvjs_addFixedSizeImageSpaceObject("floorPlan");
	iconObjectCounter++;

    // 6.3.92
    $('#group_id').val( "NODE_"+cvjs_currentMaxNodeId()) ;  

}



var highlight_colorgrade_C_legend_1 = "#fe50d9";
var highlight_colorgrade_C_1 = {
            fill: '#fe50d9',
            "fill-opacity": "0.9",
            stroke: '#fe50d9',
            'stroke-width': 1,
            'stroke-opacity': "1",
            'stroke-linejoin': 'round'
        };

var highlight_colorgrade_C_legend_2 = "#0dff8a";
var highlight_colorgrade_C_2 = {
            fill: '#0dff8a',
            "fill-opacity": "0.9",
            stroke: '#0dff8a',
            'stroke-width': 1,
            'stroke-opacity': "1",
            'stroke-linejoin': 'round'
        };

var highlight_colorgrade_C_legend_3 = "#0c8dff";
var highlight_colorgrade_C_3 = {
            fill: '#0c8dff',
            "fill-opacity": "0.9",
            stroke: '#0c8dff',
            'stroke-width': 1,
            'stroke-opacity': "1",
            'stroke-linejoin': 'round'
        };

var highlight_colorgrade_C_legend_4 = "#fafa00";
var highlight_colorgrade_C_4 = {
            fill: '#fafa00',
            "fill-opacity": "0.9",
            stroke: '#fafa00',
            'stroke-width': 1,
            'stroke-opacity': "1",
            'stroke-linejoin': 'round'
        };

var highlight_colorgrade_C_legend_5 = "#ff00dd";
var highlight_colorgrade_C_5 = {
            fill: '#ff00dd',
            "fill-opacity": "0.9",
            stroke: '#ff00dd',
            'stroke-width': 1,
            'stroke-opacity': "1",
            'stroke-linejoin': 'round'
        };


var no_colorgrade_C_reading = {
            fill: '#A2C2A2',
            "fill-opacity": "0.5",
            stroke: '#D2D2D2',
            'stroke-width': 1,
            'stroke-opacity': "1",
            'stroke-linejoin': 'round'
        };




</script>

	<table id="cadviewer_table_01">
    <tbody>

	<tr>
	<td>

	<!--This is the CADViewer floorplan div declaration -->

		<div id="floorPlan"  style="border:2px none; width:1800;height:1400;">
		</div>

	<!--End of CADViewer declaration -->

	</td>
    </tr>
    <tbody>
	</table>




</body>
</html>
