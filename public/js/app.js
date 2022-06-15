$(document).on('click','#saveLike',function(){
    var _performance=$(this).data('performance');
    var vm=$(this);
    // Run Ajax
    $.ajax({
        url:"/like-performance/"+_performance,
        type:"GET",
        dataType:'json',
        data:{
            _token:"{{ csrf_token() }}"
        },  
        complete: function() {
            vm.attr('data-type', 'dislike');
            vm.attr('id', 'saveDislike');
            vm.children().attr('class', 'fa fa-heart fa-3x color-red-dark');
        }
    });
});

    $(document).on('click','#saveDislike',function(){
    var _performance=$(this).data('performance');
    var vm=$(this);
    // Run Ajax
    $.ajax({
        url:"/unlike-performance/"+_performance,
        type:"GET",
        dataType:'json',
        data:{
            _token:"{{ csrf_token() }}"
        },  
        complete: function() {
            vm.attr('data-type', 'like');
            vm.attr('id', 'saveLike');
            
            vm.children().attr('class', 'far fa-heart fa-3x color-red-dark').fadeIn('slow');
        }
    });
});

function faqFilter() {
    var input, filter, wrapper, question, a, i, txtValue;
    input = document.getElementById("faqSearch");
    filter = input.value.toUpperCase();
    wrapper = document.getElementById("questions-questionst");
    faq = wrapper.getElementsByClassName("question");
    for (i = 0; i < faq.length; i++) {
        question = faq[i].getElementsByTagName("h5")[0];
        answer = faq[i].getElementsByClassName("collapse")[0];
        txtValue = question.textContent || question.innerText;
        txtValue += answer.textContent || answer.innerText
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            faq[i].style.display = "";
        } else {
            faq[i].style.display = "none";
        }
    }
}

$("#formDaysFilter").change(function(){ 
    let amountOfDivs = $(this).children("option").length;
    let indexDay = $(this).children("option:selected").val();
    for (let i= 0; i < amountOfDivs; i++) {
        if(i == indexDay)
        {
            $("#festival-wrapper-day-"+i).show();
        }
        else
        {
            $("#festival-wrapper-day-"+i).hide();
        } 
    }   
});

