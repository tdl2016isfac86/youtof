var deleteConfirm = function(id) {
    
    if(confirm('Êtes-vous sûr de vouloir supprimer cette gallerie ?') 
        && confirm('Estes-vous vraiment sur avec des fautes d\'orthographe ?')) {
        window.location.href = 'galleries.php?action=delete&id='+id;
    }
    
};