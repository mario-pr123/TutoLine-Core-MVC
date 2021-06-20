function selectTutor(total) {
    document.getElementById("alumno_id_alumno").value=-1;
    var x = document.getElementById("tutor_id_tutor").value;
    for(var i=0;i<100;i++){
        for(var y=0;y<100;y++){
            if(document.getElementById(i+'-'+y)){
                document.getElementById(i+'-'+y).style.display='none';
            }
        }       
    }
    for(var i=0;i<100;i++){
        if(document.getElementById(x+'-'+i)){
            document.getElementById(x+'-'+i).style.display='block';
        }
    }
    
  }