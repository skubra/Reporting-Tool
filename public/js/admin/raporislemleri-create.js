$(document).ready(function() {

    var counter = 0;

    $("#addParam").click(function(e){

    	var read = $("#readroot").clone();
		read.attr('id','');
		read.css('display','block');
        e.preventDefault();
        counter++;
        read.children().each(function () {
        	// console.log(this);
        	$(this).attr('name',this.name+counter);
		});

        $("#writeroot").append(read);

    });

	$('body').on('click', '#remove-node', function(){
    	// console.log($(this).parent());
    	$(this).parent().remove();
    	counter--;
	});


});