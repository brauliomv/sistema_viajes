let reportForm = document.getElementById('reportForm');

reportForm.onsubmit = function(){
    window.open(this.action, '_blank');
   
};

