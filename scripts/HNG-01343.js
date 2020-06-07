(
   function greeting() {

   let sQueryParam = window.location.search.substr(1);
   //console.log( "sQueryParam: '" + sQueryParam.trim()  + "'" );
   //console.log( parent.document.URL );

   let sFullName = "Manuel Rodriguez Romero";
   let sId       = "HNG-01343";
   let sLanguage = "JavaScript";
   let sEmail    = "man.rdguez@gmail.com";
   let sFile     = sId + ".js";
   let sMessage  = "";

   let sGreeting = "Hello World, this is "
      + sFullName
      + " with HNGi7 ID "
      + sId
      + " and email "
      + sEmail
      + " using "
      + sLanguage
      + " for stage 2 task";

   sMessage = sGreeting;

   if ( sQueryParam.localeCompare( "json" ) == 0 ) {

      let jsonData = {
         "file": sFile,
         "output": sGreeting,
         "name": sFullName,
         "id": sId
         };

      sMessage = JSON.stringify( jsonData );
   }

   console.log( sMessage );
   }
) ();
