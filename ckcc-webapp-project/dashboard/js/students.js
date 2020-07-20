$(document).ready(function(){
	// change button 
	$("#show").click(function(){
		$("#save").show();
		$("#update").hide();
	});
	$(document).on('click', '#edit', function(){
		$("#save").hide();
		$("#update").show();
	});
	// button save 
	$("#save").click(function(){
		var idcard = $("input[name=idcard]").val();
		var fn = $("input[name=fn]").val();
		var ln = $("input[name=ln]").val();
		var sex = $("#sex option:selected").val();
		var address = $("textarea[name=address]").val();
		var clas = $("#clas option:selected").val();
		var rank = $("input[name=rank]").val();
		if(idcard == ""){
			alert("IDcard isn't empty.");
			$("input[name=idcard]").focus();
		}
		else if(fn == ""){
			alert("First name isn't empty.");
			$("input[name=fn]").focus();
		}
		else if(ln == ""){
			alert("Last name isn't empty.");
			$("input[name=ln]").focus();
		}
		else if(rank == ""){
			alert("Rank isn't empty.");
			$("input[name=rank]").focus();
		}
		var data = {'idcard' : idcard, 'fn' : fn, 'ln' : ln, 'sex' : sex, 'clas' : clas, 'address' :address, 'rank' : rank};
		var sendData = JSON.stringify(data);
		$.post("students/saveDatabase.php", {data:sendData}, function (data,status){
			if(status == "success"){
				var newrow = "";
				var insert_id = data;
				newrow += "<tr>";
				newrow += "<td>";
				newrow += insert_id;
				newrow += "</td>";
				newrow += "<td>";
				newrow += idcard;
				newrow += "</td>";
				newrow += "<td>";
				newrow += fn;
				newrow += "</td>";
				newrow += "<td>";
				newrow += ln;
				newrow += "</td>";
				newrow += "<td>";
				newrow += sex;
				newrow += "</td>";
				newrow += "<td>";
				newrow += address;
				newrow += "</td>";
				newrow += "<td>";
				newrow += clas;
				newrow += "</td>";
				newrow += "<td>";
				newrow += rank;
				newrow += "</td>";
				newrow += "<td>";
				newrow += "<button class='btn btn-default' id='edit'>Edit</button>";
				newrow += "<button class='btn btn-default' id='delete'>Delete</button>";
				newrow += "</td>";
				newrow += "</tr>";
				$('table').append(newrow);
			}
		});
	});

	// button delete recorde.
	$(document).on('click', '#delete', function(){
		var id = $(this).parent().parent().children().eq(0).text();
		if(confirm("Do you want to delete this record?")){
            $(this).parent().parent().remove();
            $.post("students/deleteDatabase.php", {id:id}, function(){});
        }
	});


	// button edit, giving value into form
	$(document).on('click', '#edit', function(){
		$('body').find('.rowupdate').removeClass(); // find class rowupdate
		$("input[name=idcard]").val($(this).parent().parent().children().eq(1).text());
		$("input[name=fn]").val($(this).parent().parent().children().eq(2).text());
		$("input[name=ln]").val($(this).parent().parent().children().eq(3).text());
		$("#sex option:selected").val($(this).parent().parent().children().eq(4).text());
		$("textarea[name=address]").val($(this).parent().parent().children().eq(5).text());
		$("#clas option:selected").val($(this).parent().parent().children().eq(6).text());
		$("input[name=rank]").val($(this).parent().parent().children().eq(7).text());
		$(this).parent().parent().addClass("rowupdate"); // add class rowupdate
	});

	// button update
	$(document).on('click', '#update', function(){
		var id = $('.rowupdate').children().eq(0).text();
		var idcard = $("input[name=idcard]").val();
		var fn = $("input[name=fn]").val();
		var ln = $("input[name=ln]").val();
		var sex = $("#sex option:selected").val();
		var address = $("textarea[name=address]").val();
		var clas = $("#clas option:selected").val();
		var rank = $("input[name=rank]").val();
		var data = {'id' : id, 'idcard' :idcard, 'fn' : fn, 'ln' : ln, 'sex' :sex, 'address' : address, 'clas' : clas, 'rank' : rank};
		var updateData = JSON.stringify(data);
		$.post('students/updateDatabase.php', {q:updateData}, function(data,status){
			if(status == 'success'){
				$('.rowupdate').children().eq(1).text(idcard);
				$('.rowupdate').children().eq(2).text(fn);
				$('.rowupdate').children().eq(3).text(ln);
				$('.rowupdate').children().eq(4).text(sex);
				$('.rowupdate').children().eq(5).text(address);
				$('.rowupdate').children().eq(6).text(clas);
				$('.rowupdate').children().eq(7).text(rank);
			}
		});
	});
});