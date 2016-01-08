
var currentsec=0;	
var currentmin=0;	
var currentmil=0;


var keepgoin=false;
function timer(){
if(keepgoin && jogo){
currentmil+=1;
    
if (currentmil==10){
currentmil=0;	
currentsec+=1;
}
    
if (currentsec==60){
currentsec=0;	
currentmin+=1;
}
    
Strsec=""+currentsec;
Strmin=""+currentmin;
Strmil=""+currentmil;
    
if (Strsec.length!=2){
Strsec="0"+currentsec;
}
    
if (Strmin.length!=2){
Strmin="0"+currentmin;
}
    
document.display.seconds.value=Strmin+":"+Strsec;
setTimeout("timer()", 100);
}
}

function startover(){
keepgoin=true;
currentsec=0;
currentmin=0;
currentmil=0;
Strsec="00";
Strmin="00";
Strmil="00";
}


