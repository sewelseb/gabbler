
//alert("test d'inclusion d'ajax.js");

//biblotheque de fonction ajax
function getXMLHttpRequest()
  {
      var xhr = null;

      if (window.XMLHttpRequest || window.ActiveXObject)
        {
         if (window.ActiveXObject)
         {
         try
                {
                 xhr = new ActiveXObject("Msxml2.XMLHTTP");
                }
         catch(e)
                {
                 xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
         }
         else
         {
         xhr = new XMLHttpRequest();
         }
        }
      else
        {
         alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
         return null;
        }

      return xhr;
  }
function closeAlert()
  {
    document.getElementById('alertPostSuccess').style.visibility = "hidden";
  }
function newGabb()
  {
    
    var xhr = getXMLHttpRequest();
    var gab = document.getElementById('newGab').value;
    //alert(gab);
    

    //fonction de ce qui se passe lorsque le xhr recoit la réponse
    xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
      {
        //alert(xhr.responseText);
        //var gab = document.getElementById('newGabDynamique').innerHTML;
        document.getElementById('newGab').value="";
        document.getElementById('newGab').disabled=false;
        document.getElementById('alertPostSuccess').style.visibility = "visible";

        
	
       
      }
    };
    if (gab!="")
    {
      document.getElementById('newGab').disabled=true;
      xhr.open("POST", "index.php?page=newGab", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send("gab="+gab);
    }
    
  }
function newGabb2()
  {
    
    var xhr = getXMLHttpRequest();
    var gab = document.getElementById('newGab2').value;
    //alert(gab);
    

    //fonction de ce qui se passe lorsque le xhr recoit la réponse
    xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
      {
        //alert(xhr.responseText);
    
       
      }
    };

    xhr.open("POST", "index.php?page=newGab", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("gab="+gab);
  }

function updateProfile()
    {
        var xhr = getXMLHttpRequest();
        var nom = document.getElementById('nom').value;
        var prenom = document.getElementById('prenom').value;
        var mail = document.getElementById('mail').value;
        //alert(gab);
        

        //fonction de ce qui se passe lorsque le xhr recoit la réponse
        xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            //alert(xhr.responseText);
            $('#confirmationUpdateProfile').modal('show'); 
        
           
          }
        };

        xhr.open("POST", "index.php?page=updateProfile", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("nom="+nom+"&prenom="+prenom+"&mail="+mail);
    }
function addLike(idGab)
  {
        var xhr = getXMLHttpRequest();
       
        

        //fonction de ce qui se passe lorsque le xhr recoit la réponse
        xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            //alert(xhr.responseText);
            //alert(document.getElementById("bouttonLike").innerHTML);
            document.getElementById("bouttonLike"+idGab).innerHTML='<button class="btn btn-default" onclick="removeLike('+idGab+')" id="addLike'+idGab+'">-1</button>'
            var nbrOfLikes=parseInt(document.getElementById("nbrOfLikes"+idGab).innerHTML);
            document.getElementById("nbrOfLikes"+idGab).innerHTML = nbrOfLikes+1;
           
          }
        };
        //document.getElementById("addLike"+idGab).disabled = true;
        xhr.open("POST", "index.php?page=addLike", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("idGab="+idGab);



  }
function removeLike(idGab)
  {
     var xhr = getXMLHttpRequest();
       
        

        //fonction de ce qui se passe lorsque le xhr recoit la réponse
        xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            //alert(xhr.responseText);
            //alert(document.getElementById("bouttonLike").innerHTML);
            document.getElementById("bouttonLike"+idGab).innerHTML='<button class="btn btn-default" onclick="addLike('+idGab+')" id="addLike'+idGab+'">+1</button>'
            var nbrOfLikes=parseInt(document.getElementById("nbrOfLikes"+idGab).innerHTML);
            document.getElementById("nbrOfLikes"+idGab).innerHTML = nbrOfLikes-1;
        
           
          }
        };
        document.getElementById("addLike"+idGab).disabled = true;
        xhr.open("POST", "index.php?page=removeLike", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("idGab="+idGab);

  }
function reGab(idGab)
  {
      var xhr = getXMLHttpRequest();
       
        

        //fonction de ce qui se passe lorsque le xhr recoit la réponse
        xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            //alert(xhr.responseText);


        
           
          }
        };
        document.getElementById("reGab"+idGab).disabled = true;
        xhr.open("POST", "index.php?page=reGab", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("idGab="+idGab);
  }
function deleteGab(idGab)
  {
     var xhr = getXMLHttpRequest();
       
        

        //fonction de ce qui se passe lorsque le xhr recoit la réponse
        xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
          {
            //alert(xhr.responseText);
            
            document.getElementById("gabItem"+idGab).innerHTML="";


        
           
          }
        };
        document.getElementById("deleteGab"+idGab).disabled = true;
        xhr.open("POST", "index.php?page=deleteGab", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("idGab="+idGab);
  }
  
