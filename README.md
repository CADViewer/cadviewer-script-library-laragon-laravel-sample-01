# cadviewer-script-library-laragon-laravel-sample-01

Place under your c:/laragon/www folder.   

#### Standard execution:

1: /cadviewer/ folder contains standard **CADViewer 8** with apache php scripts, run http://localhost/cadviewer/html/CADViewer_fileloader_80.html to get started.
For configuration, please modify ServerUrl, ServerLocation and ServerBackEndUrl in all /cadviewer/html/*.html files and $httpHost and $home_dir in  /php/CADViewer_config.php 


#### Laravel project CADViewer implemented as a blade document:


2: /cadviewer-v8-laravel/ contains a Laravel installation of **CADViewer 8**, run: http://cadviewer-v8-laravel.test to get started.  

2A: Go to /routes/web.php,  the current route is defined:

*return view('layouts.logo-only').view('layouts.cadviewer-space-object-canvas-08');*


2B: Go to /resources/views/layouts/  

You can find one CADViewer blade file corresponding to the routes defined in /routes/web.php. 

*layouts.cadviewer-space-object-canvas-08.blade.php*

For configuration:

2C: Please modify ***ServerUrl***, ***ServerLocation*** and ***ServerBackEndUrl*** in /resources/views/layouts/cadviewer-space-object-canvas-08.blade.php 

2D: Please modify ***$httpHost*** and ***$home_dir*** in  /public/php/CADViewer_config.php 





#### NOTE:

#### Laravel project implemented as blade document

3: /cadviewer-laravel-8/ contains legacy Laravel installation of CADViewer, run: http://cadviewer-laravel-8.test to get started.  


For configuration:

3A: Please modify ***ServerUrl***, ***ServerLocation*** and ***ServerBackEndUrl*** in /resources/views/layouts/cadviewer-space-object-canvas-02.blade.php 

3B: Please modify ***$httpHost*** and ***$home_dir*** in  /public/php/CADViewer_config.php 


3C: Go to /routes/web.php,  select between the the routes: 



*// CADViewer CASE 1: - Space Objects*

*return view('layouts.logo-only').view('layouts.cadviewer-space-object-canvas-02');*
	

*// CADViewer CASE 2: - MySQL - Visual Query*

*return view('layouts.cadviewer-visual-query-03');*



3D: Go to /resources/views/layouts/  

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
* [Download **AutoXchange**](/alldownloads/autoxchange) (and other converters), install (unzip) AX2024 in **cadviewer/converters/ax2020/windows** or **cadviewer/converters/ax2020/linux** or in the designated folder structure.
* Read the sections on installing and handling [Fonts](https://tailormade.com/ax2020techdocs/installation/fonts/) in [AutoXchange 2024 TechDocs](https://tailormade.com/ax2020techdocs/) and [TroubleShooting](https://tailormade.com/ax2020techdocs/troubleshooting/).
* Download **Handlers/Connectors** specific to your back-end technology [Download Handlers](/alldownloads/handlers/) and install them as described in the [Handlers Section](https://cadviewer.com/cadviewertechdocs/handlers).


* Try out the samples and build your own application!
 
 
 
 
 ## Troubleshooting

One issue that often appears in installations is that interface icons do not display properly:

![Icons](https://cadviewer.com/cadviewertechdocs/images/missing_icons.png "Icons missing")

Typically the variables *ServerUrl*, *ServerLocation* or *ServerBackEndUrl* in the controlling **HTML**  document in ***/cadviewer/html/*** are not set to reflect the front-end server url or port.

<pre style="line-height: 110%">


    var ServerBackEndUrl = "";  // or what is appropriate for my server; used for NodeJS server only
    var ServerUrl = "http://localhost/cadviewer/";   // or what is appropriate for my server
    var ServerLocation = "c:/xampp/htdocs/cadviewer/"; // or what is appropriate for my server, can be black!
</pre>

 
**Have Fun!**  - and get in [touch](mailto:developer@tailormade.com)  with us!
