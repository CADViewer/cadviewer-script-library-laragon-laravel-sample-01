# cadviewer-script-library-laragon-laravel-sample-01

Place under your c:/laragon/www folder.   

1: /cadviewer/ folder contains standard CADViewer with apache php scripts, run http://cadviewer.test/html/ or http://cadviewer.test/html/CADViewer_fileloader_650.html to get started.
For configuration, please modify ServerUrl, ServerLocation and ServerBackEndUrl in all /cadviewer/html/*.html files and $httpHost and $home_dir in  /php/CADViewer_config.php 


2: /cadviewer-laravel-8/ contains a Laravel installation of CADViewer, run: http://cadviewer-laravel-8.test to get started.  

For configuration, please modify ServerUrl, ServerLocation and ServerBackEndUrl in /resources/views/layouts/cadviewer-space-object-canvas-02.blade.php and $httpHost and $home_dir in  /public/php/CADViewer_config.php 


2A: Go to /routes/web.php,  select between the the routes: 



*// CADViewer CASE 1: - Space Objects*

*return view('layouts.logo-only').view('layouts.cadviewer-space-object-canvas-02');*
	

*// CADViewer CASE 2: - MySQL - Visual Query*

*return view('layouts.cadviewer-visual-query-03');*



2B: Go to /resources/views/layouts/  

You can find two CADViewer blade files corresponding to the routes defined in /routes/web.php. 


*layouts.cadviewer-space-object-canvas-02.blade.php*

and

*layouts.cadviewer-visual-query-03.blade.php*

use these template samples for your reference. 





## Documentation 

-   [CADViewer Techdocs and Installation Guide](https://cadviewer.com/cadviewertechdocs/download)


## How To Install CADViewer 

* [Download **CADViewer**](/alldownloads/cadviewer), the CADViewer download comes with CADViewer and a base folder structure with drawings, and html sample(s).
* Modify or move the CADViewer folderstructure specific to your back-end technology and do other specifics associated with your platform.
	* [NodeJS](https://cadviewer.com/cadviewertechdocs/handlers/nodejs/)
	* [PHP](https://cadviewer.com/cadviewertechdocs/handlers/php/)
	* [.NET](https://cadviewer.com/cadviewertechdocs/handlers/asp.net/)
	* [Servlets](https://cadviewer.com/cadviewertechdocs/handlers/servlets/)
	* [Angular](https://cadviewer.com/cadviewertechdocs/handlers/angular/)
	* [ReactJS](https://cadviewer.com/cadviewertechdocs/handlers/reactjs/)
* [Download **AutoXchange**](/alldownloads/autoxchange) (and other converters), install (unzip) AX2020 in **cadviewer/converters/ax2020/windows** or **cadviewer/converters/ax2020/linux** or in the designated folder structure.
* Read the sections on installing and handling [Fonts](https://tailormade.com/ax2020techdocs/installation/fonts/) in [AutoXchange 2020 TechDocs](https://tailormade.com/ax2020techdocs/) and [TroubleShooting](https://tailormade.com/ax2020techdocs/troubleshooting/).
* Download **Handlers/Connectors** specific to your back-end technology [Download Handlers](/alldownloads/handlers/) and install them as described in the [Handlers Section](https://cadviewer.com/cadviewertechdocs/handlers).
* Configure the **Handler** specific **XXXHandlerSettings.js** file in **/cadviewer/app/cv/**
	* NodeJS: [CADViewer_NodeJSHandlerSettings.js](/cadviewertechdocs/handlers/nodejs#windows---handler-settings-js-file)
	* PHP: [CADViewer_PHPHandlerSettings.js](/cadviewertechdocs/handlers/php#windows---handler-settings-js-file)
	* .NET: [CADViewer_AshxHandlerSettings.js](/cadviewertechdocs/handlers/asp.net#handler-settings-js-file)
	* Servlets [CADViewer_ServletHandlerSettings.js](https://cadviewer.com/cadviewertechdocs/handlers/servlets#handler-settings-js-file)
	* Angular [CADViewer_AngularHandlerSettings.js](https://cadviewer.com/cadviewertechdocs/handlers/angular#update-cadviewer_nodejshandlersettings-js)
	* ReactJS [CADViewer_ReactJSHandlerSettings.js](https://cadviewer.com/cadviewertechdocs/handlers/reactjs#update-cadviewer_reactjshandlersettings-js)
* Go to samples **/cadviewer/html/** and modify the headers for your install platform, so the platform specific **XXXHandlerSettings.js** is loaded.
	* NodeJS: [HTML settings for CADViewer_NodeJSHandlerSettings.js](/cadviewertechdocs/handlers/nodejs#windows---html)
	* PHP: [HTML settings for CADViewer_PHPHandlerSettings.js](/cadviewertechdocs/handlers/php#windows---html)
	* .NET: [HTML settings for CADViewer_AshxHandlerSettings.js](/cadviewertechdocs/handlers/asp.net#html)
	* Servlets: [HTML settings for CADViewer_AshxHandlerSettings.js](/cadviewertechdocs/handlers/servlets#html)
	* Angular: [Settings for CADViewer_Angular01.js](https://cadviewer.com/cadviewertechdocs/handlers/angular#cadviewer_angular01.js---source-code)
	* ReactJS: [Settings for CADViewer_ReactJS01.js](https://cadviewer.com/cadviewertechdocs/handlers/reactjs#cadviewer_reactjs01.js---source-code)
* Try out the samples and build your own application!
 
 
 
 
 ## Troubleshooting

One issue that often appears in installations is that interface icons do not display properly:

![Icons](https://cadviewer.com/cadviewertechdocs/images/missing_icons.png "Icons missing")

Typically the variables *ServerUrl*, *ServerLocation* or *ServerBackEndUrl* in the controlling **HTML**  document in ***/cadviewer/html/*** are not set to reflect the front-end server url or port.

<pre style="line-height: 110%">


    var ServerBackEndUrl = "";  // or what is appropriate for my server; used for NodeJS server only
    var ServerUrl = "http://localhost/cadviewer/";   // or what is appropriate for my server
    var ServerLocation = "c:/xampp/htdocs/cadviewer/"; // or what is appropriate for my server
</pre>

 
**Have Fun!**  - and get in [touch](mailto:developer@tailormade.com)  with us!
