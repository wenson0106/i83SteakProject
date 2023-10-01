function table_to_jpeg(){
    html2canvas(document.querySelector("#table_to_jpeg")).then(function(canvas){
        a=document.createElement('a');
        a.href=canvas
            .toDataURL("班表/jpeg",0.92)
            .replace("班表/jpeg","班表/octet-stream");
        a.download="班表.jpg";
        a.click();
    })
}