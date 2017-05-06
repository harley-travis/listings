// globle array to store in XML data
var ringArray = []; 

function initProgram(){
	
	// hide the init message
	$('.enter-program').fadeOut();
	$('.enter-program-sub').fadeOut();

}

function bandOptions(){

    $.ajax({
        url: 'data/ringOptions.xml',
        dataType: 'xml',
        success: function(data){

			// display the content
			//$('.bandOutput').show();
			
			// display next button
			var btns ='<button type="button" onClick="colorOptions()">Next</button>';
			document.getElementById("band-btns").innerHTML = btns;
				
            // loop through each bandtype
            $(data).find('RING BANDTYPE').each(function(){

                // establish xml variables into js variables
                var bandName  = $(this).find('BANDNAME').text();
                var bandImg   = $(this).find('BANDIMG').text();
                var bandPrice = $(this).find('BANDPRICE').text();

                // output to this specific output
                $('.bandOutput').append(
                    $('<li />', {            
                        html: '<img src="img/'+bandImg+'" class="band-img" /> <br />' + '<a href="#" class="band_this" id="band-'+bandName+'">'+bandName+'</a>' + '<br />' + 'price: ' + bandPrice
                    })
                );
            });

            // grab the id from the loop
            $('.band_this').click(function() {

                //locates the ID name from the class
                var clickedId = $(this).attr("id");
                // adds the # sign to the ID
                var bandId = "#"+clickedId;
                // grabs the value from the ID
                var bandIdValue = $(bandId).html();

                // send value to ringArray
                //ringArray(bandIdValue);
                ringArray.push(ringArray['band'] = bandIdValue);

              console.log(bandIdValue);
            });

        },
        error: function(){
            console.log("WARNING: bandOptions(): Failed to retrive XML data. Please try again.");
        }

    });

} // END bandOptions()

function colorOptions(){

    $.ajax({
        url: 'data/ringOptions.xml',
        dataType: 'xml',
        success: function(data){
			
			// hide band options
			$(".bandOutput").hide();

			// display next/prev button
			var btns ='<div class="container btn-wrapper"><div class="prev-btn"><button type="button" onClick="bandOptions()">Go Back</button></div><div class="next-btn"><button type="button" onClick="stoneOptions()">Next</button></div></div>';
			document.getElementById("color-btns").innerHTML = btns;

            //loop through each bandtype
            $(data).find('RING COLORTYPE').each(function(){

                // establish xml variables into js variables
                var colorName  = $(this).find('COLORNAME').text();
                var colorImg   = $(this).find('COLORIMG').text();
                var colorPrice = $(this).find('COLORPRICE').text();

                // output to this specific output
                $('.colorOutput').append(
                    $('<li />', {            
                        html: '<img src="img/'+colorImg+'" class="band-img" /> <br />' + '<a href="#" class="color_this" id="band-'+colorName+'">'+colorName+'</a>' + '<br />' + 'price: ' + colorPrice
                    })
                );
            });

            // grab the id from the loop
            $('.color_this').click(function() {

                //locates the ID name from the class
                var clickedColorId = $(this).attr("id");
                // adds the # sign to the ID
                var colorId = "#"+clickedColorId;
                // grabs the value from the ID
                var colorIdValue = $(colorId).html();

                // send value to ringArray
                //ringArray(colorIdValue);
                ringArray.push(ringArray['color'] = colorIdValue);
				
              console.log(colorIdValue);
            });

        },
        error: function(){
            console.log("WARNING: colorOptions(): Failed to retrive XML data. Please try again.");
        }

    });

} // END colorOptions()

function stoneOptions(){

    $.ajax({
        url: 'data/ringOptions.xml',
        dataType: 'xml',
        success: function(data){

			// hide color options
			$(".colorOutput").hide();
			
			// display next/prev button
			var btns ='<div class="container btn-wrapper"><div class="prev-btn"><button type="button" onClick="colorOptions()">Go Back</button></div><div class="next-btn"><button type="button" onClick="cutOptions()">Next</button></div></div>';
			document.getElementById("stone-btns").innerHTML = btns;

            //loop through each bandtype
            $(data).find('RING STONETYPE').each(function(){

                // establish xml variables into js variables
                var stoneName  = $(this).find('STONENAME').text();
                var stoneImg   = $(this).find('STONEIMG').text();
                var stonePrice = $(this).find('STONEPRICE').text();

                // output to this specific output
                $('.stoneOutput').append(
                    $('<li />', {            
                        html: '<img src="img/'+stoneImg+'" class="band-img" /> <br />' + '<a href="#" class="stone_this" id="band-'+stoneName+'">'+stoneName+'</a>' + '<br />' + 'price: ' + stonePrice
                    })
                );
            });

            // grab the id from the loop
            $('.stone_this').click(function() {

                //locates the ID name from the class
                var clickedStoneId = $(this).attr("id");
                // adds the # sign to the ID
                var stoneId = "#"+clickedStoneId;
                // grabs the value from the ID
                var stoneIdValue = $(stoneId).html();

                // send value to ringArray
                //ringArray(stoneIdValue);
                ringArray.push(ringArray['stone'] = stoneIdValue);
				
              console.log(stoneIdValue);
            });

        },
        error: function(){
            console.log("WARNING: stoneOptions(): Failed to retrive XML data. Please try again.");
        }

    });

} // END stoneOptions()

function cutOptions(){

    $.ajax({
        url: 'data/ringOptions.xml',
        dataType: 'xml',
        success: function(data){

			// hide band options
			$(".stoneOutput").hide();
			
			// display next/prev button
			var btns ='<div class="container btn-wrapper"><div class="prev-btn"><button type="button" onClick="stoneOptions()">Go Back</button></div><div class="next-btn"><button type="button" onClick="passArray()">Finish</button></div></div>';
			document.getElementById("cut-btns").innerHTML = btns;
			
            //loop through each bandtype
            $(data).find('RING CUTTYPE').each(function(){

                // establish xml variables into js variables
                var cutName  = $(this).find('CUTNAME').text();
                var cutImg   = $(this).find('CUTIMG').text();
                var cutPrice = $(this).find('CUTPRICE').text();

                // output to this specific output
                $('.cutOutput').append(
                    $('<li />', {            
                        html: '<img src="img/'+cutImg+'" class="band-img" /> <br />' + '<a href="#" class="cut_this" id="band-'+cutName+'">'+cutName+'</a>' + '<br />' + 'price: ' + cutPrice
                    })
                );
            });

            // grab the id from the loop
            $('.cut_this').click(function() {

                //locates the ID name from the class
                var clickedCutId = $(this).attr("id");

                // adds the # sign to the ID
                var cutId = "#"+clickedCutId;

                // grabs the value from the ID
                var cutIdValue = $(cutId).html();

                // send value to ringArray
                //ringArray(cutIdValue);
                ringArray.push(ringArray['cut'] = cutIdValue);

                // make sure it's working
                console.log(cutIdValue);
            });

        },
        error: function(){
            console.log("WARNING: cutOptions(): Failed to retrive XML data. Please try again.");
        }

    });

} // END cutOptions()

function passArray(){

    // store the array into a value
    var arrayList = document.getElementById("options").value = ringArray;

    // pass array to php
    var json = jsObj2phpObj(arrayList);
        $.post('assets/php/json.php', {json:json}, function(data){
            console.log(data);
        });

    // send the junk to php
    function jsObj2phpObj(object){
        var json = "{";
        for(property in object){
            var value = object[property];
            if(typeof(value) == "string"){
                json += '"' + property + '":"' + value + '",'
            }else{
                if(!value[0]){ // if its an associative array
                    json += '"' + property + '":' + jsObj2phpObj(value)+ ',';
                }else{
                    json += '"' + property + '":[';
                    for(prop in value) json += '"' + value[prop] + '",';
                    json = json.substr(0, json.length-1) + "],";
                }
            }
        }
        return json.substr(0, json.length-1) + "}";
    }
}

