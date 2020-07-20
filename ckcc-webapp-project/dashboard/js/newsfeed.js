    // create function to get current time.
function getcurrentdate(){
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var hour = d.getHours();
    var minute = d.getMinutes();
    var second = d.getSeconds();

    var output = d.getFullYear() + '-' +
        ((''+month).length<2 ? '0' : '') + month + '-' +
        ((''+day).length<2 ? '0' : '') + day + ' ' +
        ((''+hour).length<2 ? '0' :'') + hour + ':' +
        ((''+minute).length<2 ? '0' :'') + minute + ':' +
        ((''+second).length<2 ? '0' :'') + second;
    return output;
 }

    //start function on action button
$(document).ready(function(){

    // toggle form and change function of button
    $("#formnewsfeed").hide();
    $("#addpost").click(function(){
        $("#update").hide();
        $("#save").show();
        $("#formnewsfeed").slideToggle();
    });
    $(document).on('click', '#edit', function(){
        $("#update").show();
        $("#save").hide();
        $("#formnewsfeed").slideDown();
    });

    // function for saving data.
    $("#save").click(function() {
        var title = $('input[name=title]').val();
        var description = $('textarea[name=des]').val();
        var dateTIME = getcurrentdate();
        var data = {"title": title, "des": description, "time" : dateTIME};
        var sendData = JSON.stringify(data);
        if (title == "" || description == "") {
            alert("Connot insert into table.");
        } else {
            $.post('newsfeed/saveDatabase.php', {q:sendData}, function (data, status) {
                if (status == "success") {
                    var insert_id = data;
                    var newrecord = "";
                    newrecord += "<tr>";
                    newrecord += "<td>";
                    newrecord += insert_id;
                    newrecord += "</td>";
                    newrecord += "<td>";
                    newrecord += title;
                    newrecord += "</td>";
                    newrecord += "<td>";
                    newrecord += description;
                    newrecord += "</td>";
                    newrecord += "<td>";
                    newrecord += dateTIME;
                    newrecord += "</td>";
                    newrecord += "<td style='align:center;'>";
                    newrecord += "<button class='btn btn-default'id='edit'>Edit</button>";
                    newrecord += "<button class='btn btn-default' id='delete'>Delete</button>";
                    newrecord += "</td>";
                    newrecord += "</tr>";
                    $('table').append(newrecord);
                }
            });
        }
    });

    // delete recorde 
    $(document).on("click", "#delete", function(){
        var id = $(this).parent().parent().children().eq(0).text();
        if(confirm("Do you want to delete this record?")){
            $(this).parent().parent().remove();
            $.post('newsfeed/deleteDatabase.php', {q:id}, function(){
                
            });
        }
    });
    
    // button edit recorde.
    $(document).on('click', '#edit', function(){
        $('body').find('.rowupdate').removeClass();
        $('input[name=title]').val($(this).parent().parent().children().eq(1).text());
        $('textarea[name=des]').val($(this).parent().parent().children().eq(2).text());
        $(this).parent().parent().addClass('rowupdate');
    });
    
    // button update recorde.
    $(document).on('click', '#update', function(){
        var id = $('.rowupdate').children().eq(0).text();
        var title = $('input[name=title]').val();
        var description = $('textarea[name=des]').val();
        var dateTIME = getcurrentdate();
        var data = {'id' : id, 'title' : title, 'des' : description, 'time' : dateTIME};
        var dataupdate = JSON.stringify(data);
        $.post('newsfeed/updateDatabase.php', {q:dataupdate}, function(){
            $('.rowupdate').children().eq(1).text(title);
            $('.rowupdate').children().eq(2).text(description);
            $('.rowupdate').children().eq(3).text(dateTIME);
        });
    });
});