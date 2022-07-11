function showBlock(val){
        document.getElementById('РосОргДовер').style.display='none';
        document.getElementById('ИнОргДовер').style.display='none';
        document.getElementById('ФЛДовер').style.display='none'; 
        document.getElementById('ИПДовер').style.display='none';
        document.getElementById(val).style.display='block';        
    }
    function showBlock1(val){
        document.getElementById('id1').style.display='none';
        document.getElementById('id2').style.display='none';
        document.getElementById('id3').style.display='none'; 
        document.getElementById('id'+val).style.display='block';        
    }


