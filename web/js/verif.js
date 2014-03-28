function verifier() 
{ 
    var numeroErreur=0; 
    var ok=true; 
    var tabErreur=new Array(); 
    var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var i; 
    
    if(document.getElementById("email").value.length==0) 
    { 
        ok=false; 
        tabErreur[numeroErreur]="Veuillez saisir le champ mail svp"; 
        numeroErreur++; 
    }
    
    else if(regex.test(document.getElementById("email").value) == false)
       {
        ok=false;
        tabErreur[numeroErreur]="L'adresse mail est invalide"; 
        numeroErreur++;  
       }
    if(document.getElementById("cle").value.length==0) 
    { 
        ok=false;
        tabErreur[numeroErreur]="Veuillez saisir la clé du séminaire svp"; 
        numeroErreur++; 
    } 
    
    if(!ok) 
    { 
        var libelleErreur=""; 
        for(i=0; i<numeroErreur; i++) 
            libelleErreur+="\n*"+tabErreur[i]; 
        window.alert(libelleErreur); 
 } 
return ok;
}